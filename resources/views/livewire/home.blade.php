<div>
    <livewire:ideas.filters />

    <div class="ideas-container my-6 space-y-6">
        @forelse ($ideas as $idea)
            <livewire:ideas.idea-card wire:key="{{ $idea->id }}" :idea="$idea" />
        @empty
            <div
                class="text-lg font-bold text-gray-600 w-full rounded-xl shadow h-24 mt-12 bg-white flex">
                <span class="m-auto">No results found ..</span>
            </div>
        @endforelse
    </div> <!-- end of ideas container -->
    <div class="mb-8">{{ $ideas->links() }}</div>
</div>
