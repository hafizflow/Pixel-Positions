<x-layout>
    <x-page-heading>Edit Job</x-page-heading>

    <x-forms.form method="POST" action="/jobs/{{ $job->id }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf

        <x-forms.input
            label="Title"
            name="title"
            placeholder="CEO"
            :value="old('title', $job->title)"
        />

        <x-forms.input
            label="Salary"
            name="salary"
            placeholder="90,000$ USD"
            :value="old('salary', $job->salary)"
        />

        <x-forms.input
            label="Location"
            name="location"
            placeholder="Winter Park, Japan"
            :value="old('location', $job->location)"
        />

        <x-forms.select
            label="Schedule"
            name="schedule"
        >
            <option {{ old('schedule', $job->schedule) == 'Part Time' ? 'selected' : '' }}>Part Time</option>
            <option {{ old('schedule', $job->schedule) == 'Full Time' ? 'selected' : '' }}>Full Time</option>
        </x-forms.select>

        <x-forms.input
            label="URL"
            name="url"
            placeholder="https://google.com"
            :value="old('url', $job->url)"
        />

        <x-forms.checkbox
            label="Feature (Cost Extra)"
            name="featured"
            :checked="old('featured', $job->featured)"
        />

        <x-forms.divider />

        <x-forms.input
            label="Tags (comma separated)"
            name="tags"
            placeholder="Laravel, PHP, Swift"
            :value="old('tags', $job->tags->pluck('name')->implode(', '))"
        />

        <x-forms.button>Update</x-forms.button>
    </x-forms.form>
</x-layout>
