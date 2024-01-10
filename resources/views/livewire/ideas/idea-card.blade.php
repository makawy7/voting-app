<div class="idea-container hover:shadow-lg transition ease-in duration-150 bg-white px-4 sm:px-0 rounded-xl flex">
    <div class="hidden sm:block px-5 py-8 border-r border-gray-100">
        <div class="text-center">
            <h3 @class([
                'text-2xl font-semibold',
                'text-blue' => $votedByUser,
            ])>{{ $voteCount }}</h3>
            <p class="text-gray-500">Votes</p>
        </div>
        <div class="mt-8">
            <button wire:click="vote" type="button" @class([
                'border px-4 py-3 w-20 rounded-xl text-xxs leading-4 font-bold uppercase transition ease-in duration-150 ',
                'bg-blue border-blue hover:border-blue-900 text-white' =>
                    $votedByUser,
                'bg-gray-200 border-gray-200 hover:border-gray-400' => !$votedByUser,
            ])>

                Vote</button>
        </div>
    </div>
    <div class="flex flex-col sm:flex-row flex-1 px-2 py-6">
        <a href="" class="flex-none sm:mx-0">
            <img class="w-14 h-14 rounded-xl" src="{{ $idea->user->avatar }}" alt="avatar">
        </a>
        <div class="sm:mx-4 w-full">
            <h4 class="text-xl font-semibold mt-2 sm:mt-0">
                <a wire:navigate class="hover:underline"
                    href="{{ route('idea.show', $idea->slug) }}">{{ $idea->title }}</a>
            </h4>
            <p class="mt-3 text-gray-600 line-clamp-3 max-w-sm sm:max-w-none">{{ $idea->description }}
            </p>
            <div class="flex flex-col sm:flex-row sm:items-center justify-between mt-4 sm:mt-6">
                <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
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
                            ])>{{ $voteCount }}</span>
                            <span class="text-xs font-semibold leading-none text-gray-500">Votes</span>
                        </div>
                        <button wire:click="vote" type="button" @class([
                            'px-4 rounded-xl',
                            'bg-blue text-white' => $votedByUser,
                            'bg-gray-300' => !$votedByUser,
                        ])>Vote</button>
                    </div>
                    <x-ideas.status-label :status="$idea->status->name" />
                    <button x-data="{ open: false }" @click="open = !open"
                        class="relative bg-gray-100 hover:bg-gray-200 rounded-full border h-7 px-3 transition ease-in duration-150">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="20" fill="currentColor"
                            class="bi bi-three-dots" viewBox="0 0 16 16">
                            <path
                                d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3" />
                        </svg>

                        <ul x-show="open" @click.away="open = false" x-transition x-cloak
                            class="absolute right-1/4 sm:right-auto mt-1 sm:ml-7 text-left font-semibold w-44 py-3 shadow-lg rounded-xl bg-white">
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
