@props(['job'])

<!-- Modal -->
<div x-show="showModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/5 backdrop-blur-[3px]" x-cloak>
    <div class="bg-black p-6 rounded-lg shadow-lg w-96 text-center border border-gray-700">
        <h2 class="text-lg font-semibold mb-8">Are you sure you want to delete this post?</h2>
        <div class="flex justify-center space-x-4">
            <form method="POST" action="/jobs/{{ $job }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-700 text-white px-4 py-2 rounded hover:bg-red-800">
                    Delete
                </button>
            </form>
            <button @click="showModal = false" type="button" class="bg-gray-600 px-4 py-2 rounded hover:bg-gray-700">
                Cancel
            </button>
        </div>
    </div>
</div>
