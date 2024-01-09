<div>
    <a wire:navigate href="/" class="font-semibold hover:underline flex items-center">
        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd"
                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                clip-rule="evenodd" />
        </svg>
        <span class="ml-1">All ideas</span>
    </a>
    <div class="idea-container hover:shadow-lg transition ease-in duration-150 bg-white rounded-xl mt-2">
        <div class="flex flex-col sm:flex-row px-5 py-6">
            <a href="" class="flex-none self-start">
                <img class="w-14 h-14 rounded-xl" src="{{ $idea->user->avatar }}" alt="avatar">
            </a>
            <div class="sm:ml-4 w-full">
                <h4 class="text-xl font-semibold mt-2 sm:mt-0">
                    <a wire:navigate class="hover:underline" href="/idea">{{ $idea->title }}</a>
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
                            <div class="px-4 py-1">
                                <span class="block text-center font-bold leading-none">12</span>
                                <span class="text-xs font-semibold leading-none text-gray-500">Votes</span>
                            </div>
                            <button class="bg-gray-300 px-4 rounded-xl">Vote</button>
                        </div>
                        <div
                            class="bg-gray-200 w-28 py-2 text-xxs font-bold uppercase leading-none rounded-full text-center">
                            Open</div>
                        <button x-data="{ open: false }" @click="open = !open"
                            class="relative bg-gray-100 hover:bg-gray-200 rounded-full border h-7 px-3 transition ease-in duration-150">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="20" fill="currentColor"
                                class="bi bi-three-dots" viewBox="0 0 16 16">
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
        </div>
    </div>
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
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open" class="h-10 px-5 bg-gray-200 rounded-xl font-semibold">
                    <span class="ml-1">Set Status</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
                <div x-show="open" x-cloak @click.away="open = false"
                    class="absolute -translate-x-36 sm:-translate-x-0 z-10 mt-2 w-80 bg-white rounded-xl shadow-xl px-4 py-5">
                    <form class="space-y-2">
                        <div>
                            <input
                                class="mr-0.5 bg-gray-200 border-none checked:bg-none focus:ring-0 focus:ring-offset-0 text-gray-900"
                                type="radio" id="open" name="drone" value="open" checked />
                            <label class="font-semibold" for="open">Open</label>
                        </div>
                        <div>
                            <input
                                class="mr-0.5 bg-gray-200 border-none checked:bg-none focus:ring-0 focus:ring-offset-0 text-purple"
                                type="radio" id="considering" name="drone" value="considering" />
                            <label class="font-semibold" for="considering">Considering</label>
                        </div>
                        <div>
                            <input
                                class="mr-0.5 bg-gray-200 border-none checked:bg-none focus:ring-0 focus:ring-offset-0 text-yellow"
                                type="radio" id="progress" name="drone" value="progress" />
                            <label class="font-semibold" for="progress">In Progress</label>
                        </div>
                        <div>
                            <input
                                class="mr-0.5 bg-gray-200 border-none checked:bg-none focus:ring-0 focus:ring-offset-0 text-green"
                                type="radio" id="implemented" name="drone" value="implemented" />
                            <label class="font-semibold" for="implemented">Implemented</label>
                        </div>
                        <div>
                            <input
                                class="mr-0.5 bg-gray-200 border-none checked:bg-none focus:ring-0 focus:ring-offset-0 text-red"
                                type="radio" id="closed" name="drone" value="closed" />
                            <label class="font-semibold" for="closed">Closed</label>
                        </div>
                        <div class="pt-2">
                            <textarea class="w-full border-none text-xs bg-gray-100 rounded-xl placeholder-gray-900" name="update_comment"
                                id="update_comment" rows="3" placeholder="Add an update comment (optional)"></textarea>
                        </div>
                        <div class="flex items-center space-x-2">
                            <button class="py-2 px-6 flex w-fit items-center gap-0.5 bg-gray-200 text-xs rounded-xl">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 -rotate-45 text-gray-600"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                                </svg>
                                <span>Attach</span>
                            </button>
                            <button type="submit" class="py-2 px-6 bg-blue text-white rounded-xl">Update</button>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" name="notify_users" id="notify_users"
                                class="bg-gray-200 border-none focus:ring-0 rounded">
                            <label for="notify_users" class="text-gray-900 ml-1">Notify All voters</label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="hidden sm:flex items-center space-x-3">
            <div class="text-center bg-white p-2 rounded-xl">
                <h3 class="text-xl font-semibold leading-none">12</h3>
                <p class="text-gray-500 text-xs leading-none">Votes</p>
            </div>
            <button
                class="h-10 px-8 justify-center items-center bg-gray-200 rounded-xl font-bold border border-gray-200 hover:border-gray-400 uppercase">
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
                    <a href="" class="flex-none self-start">
                        <img class="w-14 h-14 rounded-xl" src="{{ $idea->user->avatar }}" alt="avatar">
                    </a>
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
                    <a href="" class="flex-none self-start">
                        <img class="w-14 h-14 rounded-xl" src="{{ $idea->user->avatar }}" alt="avatar">
                        <div class="font-bold uppercase text-xxs text-center mt-0.5 text-blue">admin</div>

                    </a>
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
                    <a href="" class="flex-none self-start">
                        <img class="w-14 h-14 rounded-xl" src="{{ $idea->user->avatar }}" alt="avatar">
                    </a>
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

</div>
