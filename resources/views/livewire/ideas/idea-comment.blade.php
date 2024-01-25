<div class="flex px-5 py-6">
    <x-loading-spinner />
    <div href="" class="flex-none self-start">
        <img class="w-14 h-14 rounded-xl" src="{{ $comment->user->avatar }}" alt="avatar">
    </div>
    <div class="ml-4 w-full">
        <p class=" text-gray-600">{{ $comment->body }}
        </p>
        <div class="flex items-center justify-between mt-4">
            <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
                <div class="font-bold text-gray-900">
                    <span>{{ $comment->user->name }}</span>
                    @if ($idea->user_id === $comment->user_id)
                        <span
                            class="rounded-xl text-xxs font-medium leading-none px-2.5 py-0.5 bg-gray-100 border border-gray-700/30 text-gray-900">OP</span>
                    @endif
                </div>
                <div>&bull;</div>
                <div>{{ $comment->created_at->diffForHumans() }}</div>

            </div>
            <div class="relative" x-data="{ open: false }" @click="open = !open" class="flex items-center space-x-2">
                <button
                    class="bg-gray-100 hover:bg-gray-200 rounded-full border h-7 px-3 transition ease-in duration-150">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="20" fill="currentColor"
                        class="bi bi-three-dots" viewBox="0 0 16 16">
                        <path
                            d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3" />
                    </svg>
                </button>
                <ul x-show="open" x-transition x-cloak @click.away="open = false"
                    class="absolute right-1/4 sm:right-auto mt-1 sm:ml-7 text-left font-semibold z-10 w-44 py-3 shadow-lg rounded-xl bg-white">
                    @can('update', $comment)
                        <li class="hover:bg-gray-100 block px-5 py-3 transition ease-in duration-150">
                            <button @click="$dispatch('open-editcomment-modal',  { comment: {{ $comment->id }} })"
                                class="w-full text-left">
                                Edit Comment
                            </button>
                        </li>
                    @endcan
                    @can('delete', $comment)
                        <li @click="$dispatch('open-deletecomment-modal', {comment: {{ $comment->id }}})"
                            class="hover:bg-gray-100 block px-5 py-3 transition ease-in duration-150">
                            <button class="w-full text-left">
                                Delete Comment
                            </button>
                        </li>
                    @endcan
                    <li class="hover:bg-gray-100 block px-5 py-3 transition ease-in duration-150">
                        <button class="w-full text-left">
                            Report
                        </button>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</div><!-- end of comment container -->
