@props(['job'])

<div x-data="{ showModal: false }">
    <x-panel class="space-x-6">

        <x-employer-logo :employer="$job->employer" width="100"/>

        <div class="flex-1 flex flex-col">
            <a href="#" class="text-sm text-left text-gray-400">{{ $job->employer->name }}</a>
            <h3 class="font-bold text-xl mt-3 group-hover:text-blue-600 transition-colors duration-300">
                <a href="{{ $job->url }}" target="_blank">
                    {{ $job->title }}
                </a>
            </h3>
            <p class="text-sm text-gray-400 mt-auto">{{ $job->schedule }} - {{ $job->salary }}</p>

        </div>

        <div class="flex flex-col justify-between">
            <div>
                @foreach($job->tags as $tag)
                    <x-tag :$tag />
                @endforeach
            </div>
                <div class="flex justify-end space-x-2">
                    @can('delete', $job)
                        <button @click="showModal = true" type="button">
                            <x-icons.delete/>
                        </button>
                    @endcan
                    @can('update', $job)
                        <a href="/jobs/{{ $job->id }}/edit">
                            <x-icons.edit/>
                        </a>
                    @endcan
                </div>

        </div>
     </x-panel>

    <x-modal :job="$job->id"/>
</div>
