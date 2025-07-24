<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class JobController extends Controller
{
    public function index()
    {
        $grouped = Job::query()
            ->with(['employer', 'tags'])
            ->latest()
            ->get()
            ->groupBy('featured');

        return view('jobs.index', [
            'jobs' => $grouped->get(0, collect()),
            'featuredJobs' => $grouped->get(1, collect()),
            'tags' => Tag::all(),
        ]);
    }

    public function create() {
        return view('jobs.create');
    }

    public function store(Request $request) {
        $attributes = request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required', 'min:3'],
            'location' => ['required', 'min:3'],
            'schedule' => ['required', Rule::in(['Part Time', 'Full Time'])],
            'url' => ['required', 'active_url'],
            'tags' => ['nullable'],
        ]);

        $attributes['featured'] = $request->has('featured');

        $job = Auth::user()->employer->jobs()->create(Arr::except($attributes, 'tags'));

        if($attributes['tags'] ?? false) {
            foreach (explode(',', $attributes['tags']) as $tag) {
                $job->tag($tag);
            }
        }

        return redirect('/');
    }


    public function edit(Job $job)
    {
        return view('jobs.edit', ['job' => $job]);
    }

    public function update(Request $request, Job $job)
    {
        $attributes = $request->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required', 'min:3'],
            'location' => ['required', 'min:3'],
            'schedule' => ['required', Rule::in(['Part Time', 'Full Time'])],
            'url' => ['required', 'active_url'],
            'tags' => ['nullable'],
        ]);

        $attributes['featured'] = $request->has('featured');
        $job->update(Arr::except($attributes, 'tags'));
        if ($attributes['tags'] ?? false) {
            $job->tags()->delete();

            // Add new tags
            foreach (explode(',', $attributes['tags']) as $tag) {
                $job->tag(trim($tag));
            }
        }
        return redirect('/');
    }


    public function destroy(Job $job) {
        $job->delete();
        return redirect('/');
    }
}
