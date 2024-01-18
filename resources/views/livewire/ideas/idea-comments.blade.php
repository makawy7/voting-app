<div>
    @if ($comments->IsNotEmpty())
        <div
            class="relative comments-container space-y-6 sm:ml-22 pt-2 mb-8 sm:before:content-[''] sm:before:absolute sm:before:-left-10 sm:before:w-0.75 sm:before:h-full sm:before:bg-gray-200">
            <div class="pt-6">
                @foreach ($comments as $comment)
                    <div @class([
                        "relative comment-container hover:shadow-md transition ease-in duration-150 bg-white rounded-xl mt-3 sm:before:content-[''] sm:before:absolute sm:before:-left-10 sm:before:top-1/2 sm:before:w-10 sm:before:h-0.75 sm:before:bg-gray-200",
                        "sm:after:content-[''] sm:after:absolute sm:after:-left-10 sm:after:w-0.75 sm:after:top-1/2 sm:after:translate-y-0.75 sm:after:h-1/2 sm:after:bg-background" =>
                            $loop->last,
                    ])>
                        <div class="flex px-5 py-6">
                            <div href="" class="flex-none self-start">
                                <img class="w-14 h-14 rounded-xl" src="{{ $comment->user->avatar }}" alt="avatar">
                            </div>
                            <div class="ml-4 w-full">
                                <p class=" text-gray-600">{{ $comment->body }}
                                </p>
                                <div class="flex items-center justify-between mt-4">
                                    <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
                                        <div class="font-bold text-gray-900">{{ $comment->user->name }}</div>
                                        <div>&bull;</div>
                                        <div>{{ $comment->created_at->diffForHumans() }}</div>

                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <button x-data="{ open: false }" @click="open = !open"
                                            class="relative bg-gray-100 hover:bg-gray-200 rounded-full border h-7 px-3 transition ease-in duration-150">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="20"
                                                fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                                <path
                                                    d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3" />
                                            </svg>

                                            <ul x-show="open" x-transition x-cloak @click.away="open = false"
                                                class="absolute right-1/4 sm:right-auto mt-1 sm:ml-7 text-left font-semibold z-10 w-44 py-3 shadow-lg rounded-xl bg-white">
                                                <li>
                                                    <a href=""
                                                        class="hover:bg-gray-100 block px-5 py-3 transition ease-in duration-150">
                                                        Mark as Spam
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href=""
                                                        class="hover:bg-gray-100 block px-5 py-3 transition ease-in duration-150">
                                                        Delete Post
                                                    </a>
                                                </li>

                                            </ul>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end of comment container -->
                    </div>
                @endforeach
            </div>
        </div><!-- end of comments container -->
    @else
        <div class="text-base font-bold text-gray-700 w-full rounded-xl  h-24 mt-6 bg-white flex">
            <span class="m-auto">No comments yet ...</span>
        </div>
    @endif
</div>
