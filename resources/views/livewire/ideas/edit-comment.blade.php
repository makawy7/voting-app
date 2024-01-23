<div x-data="{ open: false }" x-cloak @open-editcomment-modal.window="open = true" @keydown.escape.window="open = false"
    x-effect="if($wire.commentUpdated) {open = false; $wire.commentUpdated = false;}" class="relative z-10"
    aria-labelledby="modal-title" role="dialog" aria-modal="true">

    <div x-transition.opacity x-show="open" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

    <div x-transition.origin.bottom.duration.500ms x-show="open" class="fixed inset-0 z-10 overflow-y-autp">

        <div class="flex min-h-full items-end justify-center">
            <div @click.away="open = false"
                class="relative transform overflow-hidden rounded-t-xl bg-white transition-all sm:w-full sm:max-w-xl px-6 pt-2 pb-6">
                <div @click="open = false"
                    class="absolute right-2 top-2 p-2 hover:bg-gray-300 rounded-lg cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <form wire:submit="updateComment" class="space-y-4 mt-6">
                    <div class="pb-2 text-center">
                        <h3 class="text-xl font-semibold mb-1">Edit Comment</h3>
                    </div>
                    <div>
                        <textarea wire:model.blur="commentBody" @class([
                            'bg-gray-100 py-2 px-4 w-full placeholder-gray-900 rounded-xl peer focus:border-none',
                            'border-none' => $errors->missing('commentBody'),
                            'border-2 border-red' => $errors->has('commentBody'),
                        ]) placeholder="Describe your idea" rows="4"
                            name="idea"></textarea>
                        @error('commentBody')
                            <p class="text-xs font-semibold mt-1 text-red pl-2 text-start peer-focus:hidden">
                                {{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex space-x-3">
                        <button type="button"
                            class="py-2 flex-1 flex gap-0.5 justify-center items-center bg-gray-100 rounded-xl font-semibold border border-gray-200 hover:border-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 -rotate-45 text-gray-600"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                            </svg>
                            <span>Attach</span>
                        </button>
                        <button type="submit"
                            class="py-2 flex-1 bg-blue text-white rounded-xl font-semibold disabled:opacity-50">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
