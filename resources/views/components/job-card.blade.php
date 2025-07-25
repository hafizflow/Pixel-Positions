@props(['job'])

<div x-data="{ showModal: false }">
    <x-panel class="flex-col text-center h-60">
        <div class="flex justify-between">
            <div class="text-sm text-left">{{ $job->employer->name }}</div>
            <div class="flex space-x-2">
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

        <div class="py-8">
            <h3 class="group-hover:text-blue-600 text-xl font-bold transition-colors duration-300">
                <a href="{{ $job->url }}" target="_blank">
                    {{ $job->title }}
                </a>
            </h3>
            <p class="text-sm mt-4">{{ $job->schedule }} - {{ $job->salary }}</p>
        </div>

        <div class="flex justify-between items-center mt-auto">
            <div>
                @foreach($job->tags as $tag)
                    <x-tag :$tag size="small" />
                @endforeach
            </div>

            <x-employer-logo :employer="$job->employer" width="42"/>
        </div>
    </x-panel>

    <x-modal :job="$job->id"/>
</div>
