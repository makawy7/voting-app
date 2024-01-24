<div>
    <x-loading-spinner />
    <livewire:ideas.edit-comment />
    <livewire:ideas.delete-comment />
    @if ($comments->IsNotEmpty())
        <div
            class="relative comments-container space-y-6 sm:ml-22 pt-2 mb-8 sm:before:content-[''] sm:before:absolute sm:before:-left-10 sm:before:w-0.75 sm:before:h-full sm:before:bg-gray-200">
            <div class="pt-6">
                @foreach ($comments as $comment)
                    <div id="comment_{{ $comment->id }}" @class([
                        "relative comment-container hover:shadow-md transition ease-in-out duration-500 bg-white rounded-xl mt-3 sm:before:content-[''] sm:before:absolute sm:before:-left-10 sm:before:top-1/2 sm:before:w-10 sm:before:h-0.75 sm:before:bg-gray-200",
                        "sm:after:content-[''] sm:after:absolute sm:after:-left-10 sm:after:w-0.75 sm:after:top-1/2 sm:after:translate-y-0.75 sm:after:h-1/2 sm:after:bg-background" =>
                            $loop->last,
                    ])>
                        <livewire:ideas.idea-comment key="{{ $comment->id }}" :$idea :$comment />

                    </div>
                @endforeach
            </div>
        </div><!-- end of comments container -->
        <div class="sm:ml-22 mb-8">
            {{ $comments->onEachSide(1)->links() }}
        </div>
    @else
        <div class="text-base font-bold text-gray-700 w-full rounded-xl  h-24 mt-6 bg-white flex">
            <span class="m-auto">No comments yet ...</span>
        </div>
    @endif
</div>
