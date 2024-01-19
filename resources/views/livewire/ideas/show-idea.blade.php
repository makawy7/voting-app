<div>
    <x-loading-spinner />
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
                @admin
                    <p class="text-red text-xs font-semibold">
                        {{ $idea->spam_reports !== 0 ? 'Spam Reports: ' . $idea->spam_reports : '' }}
                    </p>
                @endadmin
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
                        <a class="text-gray-900" href="">{{ $idea->comments->count() }} Comments</a>
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
                        @auth
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
                                    class="absolute right-1/4 sm:right-auto mt-1 sm:ml-7 font-semibold z-10 w-44 py-3 shadow-lg rounded-xl bg-white">
                                    @can('update', $idea)
                                        <li class="hover:bg-gray-100 block px-5 py-3 transition ease-in duration-150">
                                            <button class="w-full text-left"
                                                @click="$dispatch('open-edit-modal'); open = !open">
                                                Edit Idea
                                            </button>
                                        </li>
                                    @endcan
                                    <li class="hover:bg-gray-100 block px-5 py-3 transition ease-in duration-150">
                                        <button class="w-full text-left"
                                            @click="$dispatch('open-spam-modal'); open = !open">
                                            Report Spam
                                        </button>
                                    </li>
                                    @can('delete', $idea)
                                        <li class="hover:bg-gray-100 block px-5 py-3 transition ease-in duration-150">
                                            <button class="w-full text-left"
                                                @click="open = !open; $dispatch('open-delete-modal')">
                                                Delete Idea
                                            </button>
                                        </li>
                                    @endcan
                                    @admin
                                        @if ($idea->spam_reports > 0)
                                            <li class="hover:bg-gray-100 block px-5 py-3 transition ease-in duration-150">
                                                <button class="w-full text-left"
                                                    @click="open = !open; $dispatch('open-notspam-modal')">
                                                    Not Spam
                                                </button>
                                            </li>
                                        @endif
                                    @endadmin
                                </ul>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end of idea container -->
    <div class="mt-4 sm:ml-6 flex justify-center sm:justify-between">
        <div class="flex items-center space-x-1 sm:space-x-3">
            <livewire:ideas.add-comment :$idea />
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
    <livewire:ideas.idea-comments :$idea />
    <x-modals-container :$idea />

</div>
