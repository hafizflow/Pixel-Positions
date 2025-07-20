@props(['job'])

<x-panel class="space-x-6">

    <x-employer-logo width="100"/>

    <div class="flex-1 flex flex-col">
        <a href="#" class="text-sm text-left text-gray-400">{{ $job->employer->name }}</a>
        <h3 class="font-bold text-xl mt-3 group-hover:text-blue-600 transition-colors duration-300">{{ $job->title }}</h3>
        <p class="text-sm text-gray-400 mt-auto">{{ $job->schedule }} - {{ $job->salary }}</p>
    </div>

    <div>
        @foreach($job->tags as $tag)
            <x-tag :$tag />
        @endforeach
    </div>
 </x-panel>

