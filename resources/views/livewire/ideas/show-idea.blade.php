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
        <div class="flex px-5 py-6">
            <a href="" class="flex-none self-start">
                <img class="w-14 h-14 rounded-xl" src="https://source.unsplash.com/200x200/?face&crop=face&v=1"
                    alt="avatar">
            </a>
            <div class="ml-4 w-full">
                <h4 class="text-xl font-semibold">
                    <a wire:navigate class="hover:underline" href="/idea">A random title can go here</a>
                </h4>
                <p class="mt-3 text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Voluptas itaque cumque a perferendis, consequatur nihil error dolorum atque voluptates suscipit
                    velit harum reiciendis amet possimus explicabo alias voluptatum quaerat quod eum officiis. Porro
                    deserunt excepturi, tempora doloremque ipsa veniam laborum! Provident fuga omnis dignissimos
                    recusandae, iure nesciunt eveniet, doloribus perferendis saepe incidunt maiores eligendi
                    blanditiis nihil non, magnam numquam necessitatibus voluptatum optio vitae. Nam minima
                    reiciendis, iste natus quae ducimus, ipsa sequi nesciunt ipsam delectus nihil voluptatibus
                    quidem veritatis enim numquam a sit facilis eius optio vel! Dolor totam dolore non reiciendis!
                    Totam quisquam quae tenetur quasi sit? Reiciendis, natus?
                </p>
                <div class="flex items-center justify-between mt-6">
                    <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
                        <div class="font-bold text-gray-900">Jhon Doe</div>
                        <div>&bull;</div>
                        <div>10 hours ago</div>
                        <div>&bull;</div>
                        <div>Category</div>
                        <div>&bull;</div>
                        <a class="text-gray-900" href="">6 comments</a>
                    </div>
                    <div class="flex items-center space-x-2">
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

                            <ul x-show="open" x-transition x-cloak
                                class="absolute ml-7 text-left font-semibold w-44 py-3 shadow-lg rounded-xl bg-white">
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
    <div class="mt-4 ml-6 flex justify-between">
        <div class="flex items-center  space-x-3">
            <button class="h-10 px-8 bg-blue text-white rounded-xl font-semibold">Reply</button>
            <select class="rounded-xl h-10 pl-4 font-semibold border-none w-full bg-gray-200" name="status"
                id="status">
                <option value="Set Status">Set Status</option>
                <option value="Set Status">Set Status</option>
                <option value="Set Status">Set Status</option>
            </select>
        </div>
        <div class="flex items-center space-x-3">
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
        class="relative comments-container space-y-6 ml-22 pt-2 mb-8 before:content-[''] before:absolute before:-left-10 before:w-0.75 before:h-full before:bg-gray-200">
        <div class="pt-6">
            <div
                class="relative comment-container hover:shadow-md transition ease-in duration-150 bg-white rounded-xl mt-2 before:content-[''] before:absolute before:-left-10 before:top-1/2 before:w-10 before:h-0.75 before:bg-gray-200">
                <div class="flex px-5 py-6">
                    <a href="" class="flex-none self-start">
                        <img class="w-14 h-14 rounded-xl" src="https://source.unsplash.com/200x200/?face&crop=face&v=2"
                            alt="avatar">
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

                                    <ul x-show="open" x-transition x-cloak
                                        class="absolute ml-7 text-left font-semibold w-44 py-3 shadow-lg rounded-xl bg-white">
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
                class="relative comment-container hover:shadow-md transition ease-in duration-150 bg-white rounded-xl mt-2 before:content-[''] before:absolute before:-left-10 before:top-1/2 before:w-10 before:h-0.75 before:bg-gray-200 after:content-[''] after:w-7 after:h-7 after:bg-purple after:border-4 after:border-white after:absolute after:rounded-full after:top-1/2 after:-left-10 after:-translate-x-3 after:-translate-y-3">
                <div class="flex px-5 py-6">
                    <a href="" class="flex-none self-start">
                        <img class="w-14 h-14 rounded-xl" src="https://source.unsplash.com/200x200/?face&crop=face&v=3"
                            alt="avatar">
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

                                    <ul x-show="open" x-transition x-cloak
                                        class="absolute ml-7 text-left font-semibold w-44 py-3 shadow-lg rounded-xl bg-white">
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
                class="relative comment-container hover:shadow-md transition ease-in duration-150 bg-white rounded-xl mt-2 before:content-[''] before:absolute before:-left-10 before:top-1/2 before:w-10 before:h-0.75 before:bg-gray-200 after:content-[''] after:absolute after:-left-10 after:w-0.75 after:top-1/2 after:translate-y-0.75 after:h-1/2 after:bg-background">
                <div class="flex px-5 py-6">
                    <a href="" class="flex-none self-start">
                        <img class="w-14 h-14 rounded-xl"
                            src="https://source.unsplash.com/200x200/?face&crop=face&v=4" alt="avatar">
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

                                    <ul x-show="open" x-transition x-cloak
                                        class="absolute ml-7 text-left font-semibold w-44 py-3 shadow-lg rounded-xl bg-white">
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
