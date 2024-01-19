<div x-data="{ open: false }"
    @comment-added.window="({detail})=>{
        open = false;
        const commentId = detail.commentId;
        let lastElement = null
        let hookCompleted = false
        Livewire.hook('morph.added', ({ el }) => {
            if(hookCompleted){
                return;
            }
            //occures only when there's no comments
            if(el.firstElementChild.id === `comment_${commentId}`){
                lastElement = el.firstElementChild;
                hookCompleted = true;
            }
            if(el.id === `comment_${commentId}`){
                lastElement = el;
                hookCompleted = true;
            }
        })
        const elementInterval = setInterval(()=>{
            if(hookCompleted && lastElement){
                lastElement.scrollIntoView({ behavior: 'smooth' });
                lastElement.classList.add('border', 'border-gray-600');
                setTimeout(() => { 
                    lastElement.classList.remove('border', 'border-gray-600'); 
                    lastElement = null; 
                }, 5000);
                clearInterval(elementInterval)
            }
        },100)
    }"
    class="relative">
    <button @click="open = !open; if(open){$nextTick(()=>$refs.comment.focus())}"
        class="h-10 px-8 relative bg-blue text-white rounded-xl font-semibold">Reply</button>
    <form wire:submit="addComment" x-show="open" x-cloak @click.away="open = false"
        class="absolute -translate-x-10 sm:-translate-x-0 mt-2 text-gray-900 text-left font-semibold w-80 sm:w-96 z-10 px-3 py-4 space-y-2 shadow-xl rounded-xl bg-white">
        <div>
            <textarea wire:model.blur="comment" x-ref="comment" @class([
                'bg-gray-100 px-4 py-2 rounded-xl w-full text-xs placeholder-gray-500',
                'border-none ' => $errors->missing('comment'),
                'border-2 border-red ' => $errors->has('comment'),
            ]) name="comment" id="comment"
                rows="5" placeholder="Go ahead, don't be shy. Share your thoughts"></textarea>
            @error('comment')
                <p class="text-xs font-semibold text-red pl-2 text-start peer-focus:hidden">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex items-center space-x-2">
            <button type="submit"
                class="py-2 px-8 bg-blue shadow-sm shadow-blue text-white rounded-xl disabled:opacity-50">Post
                Comment</button>
            <button type="submit" class="py-2 px-4 flex w-fit items-center gap-0.5 bg-gray-200 rounded-xl"> <svg
                    xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 -rotate-45 text-gray-600" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                </svg>
                <span>Attach</span>
            </button>
        </div>
    </form>
</div>
