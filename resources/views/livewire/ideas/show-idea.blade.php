<div>
    <a wire:navigate href="{{ $backUrl }}" class="font-semibold hover:underline flex items-center">
        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd"
                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                clip-rule="evenodd" />
        </svg>
        <span class="ml-1">Back</span>
    </a>
    <div class="idea-container hover:shadow-lg transition ease-in duration-150 bg-white rounded-xl mt-2">
        <div class="flex flex-col sm:flex-row px-5 py-6">
            <div href="" class="flex-none self-start">
                <img class="w-14 h-14 rounded-xl" src="{{ $idea->user->avatar }}" alt="avatar">
            </div>
            <div class="sm:ml-4 w-full">
                <h4 class="text-xl font-semibold mt-2 sm:mt-0">
                    {{ $idea->title }}
                </h4>
                <p class="mt-3 text-gray-600">{{ $idea->description }}
                </p>
                <div class="flex flex-col sm:flex-row sm:items-center justify-between mt-4 sm:mt-6">
                    <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
                        <div class="font-bold text-gray-900 hidden sm:block">{{ $idea->user->name }}</div>
                        <div class="hidden sm:block">&bull;</div>
                        <div>{{ $idea->created_at->diffForHumans() }}</div>
                        <div>&bull;</div>
                        <div>{{ $idea->category->name }}</div>
                        <div>&bull;</div>
                        <a class="text-gray-900" href="">6 comments</a>
                    </div>
                    <div class="flex items-center justify-end mt-3 sm:mt-0 space-x-2">
                        <div class="flex sm:hidden mr-auto bg-gray-100 rounded-xl">
                            <div class="px-4 py-2">
                                <span @class([
                                    'block text-center font-bold leading-none',
                                    'text-blue' => $votedByUser,
                                ])>{{ $votesCount }}</span>
                                <span class="text-xs font-semibold leading-none text-gray-500">Votes</span>
                            </div>
                            <button wire:click="vote" type="button" @class([
                                'px-4 rounded-xl',
                                'bg-blue text-white' => $votedByUser,
                                'bg-gray-300' => !$votedByUser,
                            ])>Vote</button>
                        </div>
                        <x-ideas.status-label :status="$idea->status->name" />
                        <div x-data="{ open: false }" class="relative">
                            <button @click="open = !open"
                                class="relative bg-gray-100 hover:bg-gray-200 rounded-full border h-7 px-3 transition ease-in duration-150">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="20"
                                    fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                    <path
                                        d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3" />
                                </svg>


                            </button>
                            <ul x-show="open" x-transition x-cloak @click.away="open = false"
                                class="absolute right-1/4 sm:right-auto mt-1 sm:ml-7  font-semibold z-10 w-44 py-3 shadow-lg rounded-xl bg-white">
                                @can('update', $idea)
                                    <li class="hover:bg-gray-100 block px-5 py-3 transition ease-in duration-150">
                                        <button @click="$dispatch('open-edit-modal'); open = !open">
                                            Edit Idea
                                        </button>
                                    </li>
                                @endcan
                                <li class="hover:bg-gray-100 block px-5 py-3 transition ease-in duration-150">
                                    <button @click="open = !open">
                                        Mark as Spam
                                    </button>
                                </li>
                                <li class="hover:bg-gray-100 block px-5 py-3 transition ease-in duration-150">
                                    <button @click="open = !open">
                                        Delete Post
                                    </button>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end of idea container -->
    <div class="mt-4 sm:ml-6 flex justify-center sm:justify-between">
        <div class="flex items-center space-x-1 sm:space-x-3">
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open"
                    class="h-10 px-8 relative bg-blue text-white rounded-xl font-semibold">Reply</button>
                <form x-show="open" x-cloak @click.away="open = false"
                    class="absolute -translate-x-10 sm:-translate-x-0 mt-2 text-gray-900 text-left font-semibold w-80 sm:w-96 z-10 px-3 py-4 space-y-2 shadow-xl rounded-xl bg-white">
                    <textarea class="border-none bg-gray-100 px-4 py-2 rounded-xl w-full text-xs placeholder-gray-500" name="comment"
                        id="comment" rows="5" placeholder="Go ahead, don't be shy. Share your thoughts"></textarea>
                    <div class="flex items-center space-x-2">
                        <button type="submit"
                            class="py-2 px-8 bg-blue shadow-sm shadow-blue text-white rounded-xl">Post
                            Comment</button>
                        <button class="py-2 px-4 flex w-fit items-center gap-0.5 bg-gray-200 rounded-xl"> <svg
                                xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 -rotate-45 text-gray-600"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                            </svg>
                            <span>Attach</span>
                        </button>
                    </div>
                </form>
            </div>
            @admin
                <livewire:ideas.set-status :$idea />
            @endadmin
        </div>
        <div class="hidden sm:flex items-center space-x-3">
            <div class="text-center bg-white p-2 rounded-xl">
                <h3 @class([
                    'text-xl font-semibold leading-none',
                    'text-blue' => $votedByUser,
                ])>
                    {{ $votesCount }}</h3>
                <p class="text-gray-700 font-semibold mt-1 text-xs leading-none">Votes</p>
            </div>
            <button type="button" wire:click="vote" @class([
                'h-10 px-8 justify-center items-center rounded-xl font-bold border uppercase',
                'bg-blue text-white border-blue-500 hover:border-blue-900' => $votedByUser,
                'bg-gray-200 border-gray-200 hover:border-gray-400' => !$votedByUser,
            ])>
                Vote
            </button>
        </div>
    </div><!-- end of buttons container -->
    <div
        class="relative comments-container space-y-6 sm:ml-22 pt-2 mb-8 sm:before:content-[''] sm:before:absolute sm:before:-left-10 sm:before:w-0.75 sm:before:h-full sm:before:bg-gray-200">
        <div class="pt-6">
            <div
                class="relative comment-container hover:shadow-md transition ease-in duration-150 bg-white rounded-xl mt-3 sm:before:content-[''] sm:before:absolute sm:before:-left-10 sm:before:top-1/2 sm:before:w-10 sm:before:h-0.75 sm:before:bg-gray-200">
                <div class="flex px-5 py-6">
                    <div href="" class="flex-none self-start">
                        <img class="w-14 h-14 rounded-xl" src="{{ $idea->user->avatar }}" alt="avatar">
                    </div>
                    <div class="ml-4 w-full">
                        <p class=" text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, illo.
                        </p>
                        <div class="flex items-center justify-between mt-4">
                            <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
                                <div class="font-bold text-gray-900">Jhon Doe</div>
                                <div>&bull;</div>
                                <div>10 hours ago</div>

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
            <div
                class="relative comment-container hover:shadow-md border border-blue transition ease-in duration-150 bg-white rounded-xl mt-3 sm:before:content-[''] sm:before:absolute sm:before:-left-10 sm:before:top-1/2 sm:before:w-10 sm:before:h-0.75 sm:before:bg-gray-200 sm:after:content-[''] sm:after:w-7 sm:after:h-7 sm:after:bg-purple sm:after:border-4 sm:after:border-white sm:after:absolute sm:after:rounded-full sm:after:top-1/2 sm:after:-left-10 sm:after:-translate-x-3 sm:after:-translate-y-3">
                <div class="flex px-5 py-6">
                    <div href="" class="flex-none self-start">
                        <img class="w-14 h-14 rounded-xl" src="{{ $idea->user->avatar }}" alt="avatar">
                        <div class="font-bold uppercase text-xxs text-center mt-0.5 text-blue">admin</div>

                    </div>
                    <div class="ml-4 w-full">
                        <h4 class="text-xl font-semibold">
                            <a wire:navigate class="hover:underline" href="/idea">A random title can go here</a>
                        </h4>
                        <p class="mt-2 text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi,
                            illo.
                        </p>
                        <div class="flex items-center justify-between mt-4">
                            <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
                                <div class="font-bold uppercase text-blue">Andres</div>
                                <div>&bull;</div>
                                <div>10 hours ago</div>

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
            <div
                class="relative comment-container hover:shadow-md transition ease-in duration-150 bg-white rounded-xl mt-3 sm:before:content-[''] sm:before:absolute sm:before:-left-10 sm:before:top-1/2 sm:before:w-10 sm:before:h-0.75 sm:before:bg-gray-200 sm:after:content-[''] sm:after:absolute sm:after:-left-10 sm:after:w-0.75 sm:after:top-1/2 sm:after:translate-y-0.75 sm:after:h-1/2 sm:after:bg-background">
                <div class="flex px-5 py-6">
                    <div href="" class="flex-none self-start">
                        <img class="w-14 h-14 rounded-xl" src="{{ $idea->user->avatar }}" alt="avatar">
                    </div>
                    <div class="ml-4 w-full">
                        <p class=" text-gray-600">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                            Voluptatibus eius animi nihil nam, molestias reprehenderit ut modi aspernatur at incidunt
                            atque nemo cupiditate dolores. Cum aspernatur officia ipsam, ab iusto quidem labore error
                            debitis fugiat nulla obcaecati, ex veniam vitae.
                        </p>
                        <div class="flex items-center justify-between mt-4">
                            <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
                                <div class="font-bold text-gray-900">Jhon Doe</div>
                                <div>&bull;</div>
                                <div>10 hours ago</div>

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
        </div>
    </div><!-- end of comments container -->
    <livewire:ideas.edit-idea :$idea />
</div>
