<x-app-layout>
    <section class="filters flex space-x-6">
        <div class="w-1/4">
            <select class="rounded-xl px-4 py-2 border-none w-full" name="category" id="">
                <option value="Category One">Category One</option>
                <option value="Category One">Category One</option>
                <option value="Category One">Category One</option>
            </select>
        </div>
        <div class="w-1/4">
            <select class="rounded-xl px-4 py-2 border-none w-full" name="other_filters" id="">
                <option value="Filter One">Filter One</option>
                <option value="Filter One">Filter One</option>
                <option value="Filter One">Filter One</option>
            </select>
        </div>
        <div class="w-1/2 relative flex items-center">
            <svg class="absolute text-gray-700 w-4 left-2 rtl:right-2" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>
            <input class="w-full pl-8 rtl:pr-8 px-4 py-2 border-none rounded-xl placeholder-gray-900"
                placeholder="Find an idea" type="text">
        </div>
    </section> <!-- end filters -->

    <div class="ideas-container my-6 space-y-6">
        <div class="idea-container hover:shadow-lg transition ease-in duration-150 bg-white rounded-xl flex">
            <div class="px-5 py-8 border-r border-gray-100">
                <div class="text-center">
                    <h3 class="text-2xl font-semibold">12</h3>
                    <p class="text-gray-500">Votes</p>
                </div>
                <div class="mt-8">
                    <button
                        class="bg-gray-200 border border-gray-200 px-4 py-3 w-20 rounded-xl text-xxs leading-4 font-bold uppercase transition ease-in duration-150 hover:border-gray-400">Vote</button>
                </div>
            </div>
            <div class="flex flex-1 px-2 py-6">
                <a href="" class="flex-none self-start">
                    <img class="w-14 h-14 rounded-xl" src="https://source.unsplash.com/200x200/?face&crop=face&v=1"
                        alt="avatar">
                </a>
                <div class="mx-4 w-full">
                    <h4 class="text-xl font-semibold">
                        <a wire:navigate class="hover:underline" href="/idea">A random title can go here</a>
                    </h4>
                    <p class="mt-3 text-gray-600 line-clamp-3">Lorem ipsum dolor sit amet consectetur adipisicing elit.
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
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="20"
                                    fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                    <path
                                        d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3" />
                                </svg>

                                <ul x-show="open" @click.away="open = false" x-transition x-cloak
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
        </div><!-- end of idea container -->
        <div class="idea-container hover:shadow-lg transition ease-in duration-150 bg-white rounded-xl flex">
            <div class="px-5 py-8 border-r border-gray-100">
                <div class="text-center">
                    <h3 class="text-2xl text-blue font-semibold">66</h3>
                    <p class="text-gray-500">Votes</p>
                </div>
                <div class="mt-8">
                    <button
                        class="bg-blue border border-blue px-4 py-3 w-20 rounded-xl text-xxs text-white leading-4 font-bold uppercase transition ease-in duration-150 hover:border-blue-400">Vote</button>
                </div>
            </div>
            <div class="flex flex-1 px-2 py-6">
                <a href="" class="flex-none">
                    <img class="w-14 h-14 rounded-xl" src="https://source.unsplash.com/200x200/?face&crop=face&v=2"
                        alt="avatar">
                </a>
                <div class="mx-4 w-full">
                    <h4 class="text-xl font-semibold">
                        <a wire:navigate class="hover:underline" href="/idea">A random title can go here</a>
                    </h4>
                    <p class="mt-3 text-gray-600 line-clamp-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Explicabo
                        atque nesciunt placeat asperiores animi at distinctio sint deleniti neque optio quam velit qui
                        eaque, laudantium eligendi impedit ab aspernatur quis rem aliquid cumque repellat! Dignissimos
                        aliquam iste modi distinctio ex praesentium consectetur voluptates dolores aut excepturi.
                        Molestiae voluptatibus dicta, cum harum voluptatum similique atque dolore asperiores repudiandae
                        facilis, est voluptate alias! Quisquam minus et autem debitis alias possimus eligendi.
                        Reiciendis iure nulla aspernatur quae accusantium maxime! Ea id, ratione ducimus aspernatur
                        nihil voluptas eius. Officia pariatur fuga fugit sit quo distinctio, vel qui ratione molestiae
                        provident numquam totam architecto similique!
                    </p>
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
                            <div>10 hours ago</div>
                            <div>&bull;</div>
                            <div>Category</div>
                            <div>&bull;</div>
                            <a class="text-gray-900" href="">6 comments</a>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div
                                class="bg-yellow w-28 py-2 text-xxs text-white font-bold uppercase leading-none rounded-full text-center">
                                In progress</div>
                            <button x-data="{ open: false }" @click="open = !open"
                                class="relative bg-gray-100 hover:bg-gray-200 rounded-full border h-7 px-3 transition ease-in duration-150">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="20"
                                    fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                    <path
                                        d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3" />
                                </svg>

                                <ul x-show="open" @click.away="open = false" x-transition x-cloak
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
        </div><!-- end of idea container -->
        <div class="idea-container hover:shadow-lg transition ease-in duration-150 bg-white rounded-xl flex">
            <div class="px-5 py-8 border-r border-gray-100">
                <div class="text-center">
                    <h3 class="text-2xl font-semibold">22</h3>
                    <p class="text-gray-500">Votes</p>
                </div>
                <div class="mt-8">
                    <button
                        class="bg-gray-200 border border-gray-200 px-4 py-3 w-20 rounded-xl text-xxs leading-4 font-bold uppercase transition ease-in duration-150 hover:border-gray-400">Vote</button>
                </div>
            </div>
            <div class="flex flex-1 px-2 py-6">
                <a href="" class="flex-none">
                    <img class="w-14 h-14 rounded-xl" src="https://source.unsplash.com/200x200/?face&crop=face&v=3"
                        alt="avatar">
                </a>
                <div class="mx-4 w-full">
                    <h4 class="text-xl font-semibold">
                        <a wire:navigate class="hover:underline" href="/idea">A random title can go here</a>
                    </h4>
                    <p class="mt-3 text-gray-600 line-clamp-3">Lorem ipsum dolor sit amet, consectetur adipisicing
                        elit.
                        Explicabo
                        atque nesciunt placeat asperiores animi at distinctio sint deleniti neque optio quam velit qui
                        eaque, laudantium eligendi impedit ab aspernatur quis rem aliquid cumque repellat! Dignissimos
                        aliquam iste modi distinctio ex praesentium consectetur voluptates dolores aut excepturi.
                        Molestiae voluptatibus dicta, cum harum voluptatum similique atque dolore asperiores repudiandae
                        facilis, est voluptate alias! Quisquam minus et autem debitis alias possimus eligendi.
                        Reiciendis iure nulla aspernatur quae accusantium maxime! Ea id, ratione ducimus aspernatur
                        nihil voluptas eius. Officia pariatur fuga fugit sit quo distinctio, vel qui ratione molestiae
                        provident numquam totam architecto similique!
                    </p>
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
                            <div>10 hours ago</div>
                            <div>&bull;</div>
                            <div>Category</div>
                            <div>&bull;</div>
                            <a class="text-gray-900" href="">6 comments</a>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div
                                class="bg-red w-28 py-2 text-xxs text-white font-bold uppercase leading-none rounded-full text-center">
                                Closed</div>
                            <button x-data="{ open: false }" @click="open = !open"
                                class="relative bg-gray-100 hover:bg-gray-200 rounded-full border h-7 px-3 transition ease-in duration-150">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="20"
                                    fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                    <path
                                        d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3" />
                                </svg>

                                <ul x-show="open" @click.away="open = false" x-transition x-cloak
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
        </div><!-- end of idea container -->
        <div class="idea-container hover:shadow-lg transition ease-in duration-150 bg-white rounded-xl flex">
            <div class="px-5 py-8 border-r border-gray-100">
                <div class="text-center">
                    <h3 class="text-2xl font-semibold">32</h3>
                    <p class="text-gray-500">Votes</p>
                </div>
                <div class="mt-8">
                    <button
                        class="bg-gray-200 border border-gray-200 px-4 py-3 w-20 rounded-xl text-xxs leading-4 font-bold uppercase transition ease-in duration-150 hover:border-gray-400">Vote</button>
                </div>
            </div>
            <div class="flex flex-1 px-2 py-6">
                <a href="" class="flex-none">
                    <img class="w-14 h-14 rounded-xl" src="https://source.unsplash.com/200x200/?face&crop=face&v=4"
                        alt="avatar">
                </a>
                <div class="mx-4 w-full">
                    <h4 class="text-xl font-semibold">
                        <a wire:navigate class="hover:underline" href="/idea">A random title can go here</a>
                    </h4>
                    <p class="mt-3 text-gray-600 line-clamp-3">Lorem ipsum dolor sit amet, consectetur adipisicing
                        elit.
                        Explicabo
                        atque nesciunt placeat asperiores animi at distinctio sint deleniti neque optio quam velit qui
                        eaque, laudantium eligendi impedit ab aspernatur quis rem aliquid cumque repellat! Dignissimos
                        aliquam iste modi distinctio ex praesentium consectetur voluptates dolores aut excepturi.
                        Molestiae voluptatibus dicta, cum harum voluptatum similique atque dolore asperiores repudiandae
                        facilis, est voluptate alias! Quisquam minus et autem debitis alias possimus eligendi.
                        Reiciendis iure nulla aspernatur quae accusantium maxime! Ea id, ratione ducimus aspernatur
                        nihil voluptas eius. Officia pariatur fuga fugit sit quo distinctio, vel qui ratione molestiae
                        provident numquam totam architecto similique!
                    </p>
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
                            <div>10 hours ago</div>
                            <div>&bull;</div>
                            <div>Category</div>
                            <div>&bull;</div>
                            <a class="text-gray-900" href="">6 comments</a>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div
                                class="bg-green w-28 py-2 text-xxs text-white font-bold uppercase leading-none rounded-full text-center">
                                Implemented</div>
                            <button x-data="{ open: false }" @click="open = !open"
                                class="relative bg-gray-100 hover:bg-gray-200 rounded-full border h-7 px-3 transition ease-in duration-150">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="20"
                                    fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                    <path
                                        d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3" />
                                </svg>

                                <ul x-show="open" @click.away="open = false" x-transition x-cloak
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
        </div><!-- end of idea container -->
        <div class="idea-container hover:shadow-lg transition ease-in duration-150 bg-white rounded-xl flex">
            <div class="px-5 py-8 border-r border-gray-100">
                <div class="text-center">
                    <h3 class="text-2xl font-semibold">2</h3>
                    <p class="text-gray-500">Votes</p>
                </div>
                <div class="mt-8">
                    <button
                        class="bg-gray-200 border border-gray-200 px-4 py-3 w-20 rounded-xl text-xxs leading-4 font-bold uppercase transition ease-in duration-150 hover:border-gray-400">Vote</button>
                </div>
            </div>
            <div class="flex flex-1 px-2 py-6">
                <a href="" class="flex-none">
                    <img class="w-14 h-14 rounded-xl" src="https://source.unsplash.com/200x200/?face&crop=face&v=5"
                        alt="avatar">
                </a>
                <div class="mx-4 w-full">
                    <h4 class="text-xl font-semibold">
                        <a wire:navigate class="hover:underline" href="/idea">A random title can go here</a>
                    </h4>
                    <p class="mt-3 text-gray-600 line-clamp-3">Lorem ipsum dolor sit amet, consectetur adipisicing
                        elit.
                        Explicabo
                        atque nesciunt placeat asperiores animi at distinctio sint deleniti neque optio quam velit qui
                        eaque, laudantium eligendi impedit ab aspernatur quis rem aliquid cumque repellat! Dignissimos
                        aliquam iste modi distinctio ex praesentium consectetur voluptates dolores aut excepturi.
                        Molestiae voluptatibus dicta, cum harum voluptatum similique atque dolore asperiores repudiandae
                        facilis, est voluptate alias! Quisquam minus et autem debitis alias possimus eligendi.
                        Reiciendis iure nulla aspernatur quae accusantium maxime! Ea id, ratione ducimus aspernatur
                        nihil voluptas eius. Officia pariatur fuga fugit sit quo distinctio, vel qui ratione molestiae
                        provident numquam totam architecto similique!
                    </p>
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
                            <div>10 hours ago</div>
                            <div>&bull;</div>
                            <div>Category</div>
                            <div>&bull;</div>
                            <a class="text-gray-900" href="">6 comments</a>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div
                                class="bg-purple w-28 py-2 text-xxs text-white font-bold uppercase leading-none rounded-full text-center">
                                Considering</div>
                            <button x-data="{ open: false }" @click="open = !open"
                                class="relative bg-gray-100 hover:bg-gray-200 rounded-full border h-7 px-3 transition ease-in duration-150">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="20"
                                    fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                    <path
                                        d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3" />
                                </svg>

                                <ul x-show="open" @click.away="open = false" x-transition x-cloak
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
        </div><!-- end of idea container -->
    </div> <!-- end of ideas container -->
</x-app-layout>
