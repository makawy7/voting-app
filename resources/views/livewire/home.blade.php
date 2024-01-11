<div>
    <livewire:ideas.filters />

    <div class=" ideas-container my-6 space-y-6">
        @foreach ($ideas as $idea)
            <livewire:ideas.idea-card wire:key="{{ $idea->id }}" :idea="$idea" />
        @endforeach
    </div> <!-- end of ideas container -->
    <div class="mb-8">{{ $ideas->links() }}</div>
</div>
