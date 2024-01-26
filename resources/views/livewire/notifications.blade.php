<div wire:poll.5s="getCount" x-data="{ notificationOpen: false, subOpen: false }" class="relative b mr-4 z-10">
    <button @click="$wire.openNotification(); notificationOpen = !notificationOpen;"
        class='hover:bg-gray-200 p-1 rounded-full'>
        @if ($notificationsCount > 0)
            <span
                class="absolute top-0 right-1.5 bg-red-600 rounded-full w-5 h-5 flex 
                      justify-center min-w-fit items-center text-white 
                      font-bold border border-gray-100 text-xxs">
                {{ $notificationsCount }}
            </span>
        @endif
        <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 27 27" viewBox="0 0 27 27"
            focusable="false">
            <path
                d="M10 20h4c0 1.1-.9 2-2 2s-2-.9-2-2zm10-2.65V19H4v-1.65l2-1.88v-5.15C6 7.4 7.56 5.1 10 4.34v-.38c0-1.42 1.49-2.5 2.99-1.76.65.32 1.01 1.03 1.01 1.76v.39c2.44.75 4 3.06 4 5.98v5.15l2 1.87zm-1 .42-2-1.88v-5.47c0-2.47-1.19-4.36-3.13-5.1-1.26-.53-2.64-.5-3.84.03C8.15 6.11 7 7.99 7 10.42v5.47l-2 1.88V18h14v-.23z">
            </path>
        </svg>
    </button>
    <div x-show="notificationOpen" x-transition x-cloak @click.away="notificationOpen = false"
        class="absolute bg-white border border-gray-700/10 shadow-md rounded-lg right-0 min-w-[30rem]">
        <div class="flex justify-between px-4 py-3 border-b border-b-gray-300">
            <h4 class="font-medium text-lg">Notifications</h4>
            @if ($notificationFirstOpen && $notifications->isNotEmpty())
                <div class="relative">
                    <button @click="subOpen = !subOpen" class="hover:bg-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24"
                            focusable="false" class="w-6 h-6">
                            <path
                                d="M12 9.5c1.38 0 2.5 1.12 2.5 2.5s-1.12 2.5-2.5 2.5-2.5-1.12-2.5-2.5 1.12-2.5 2.5-2.5m0-1c-1.93 0-3.5 1.57-3.5 3.5s1.57 3.5 3.5 3.5 3.5-1.57 3.5-3.5-1.57-3.5-3.5-3.5zM13.22 3l.55 2.2.13.51.5.18c.61.23 1.19.56 1.72.98l.4.32.5-.14 2.17-.62 1.22 2.11-1.63 1.59-.37.36.08.51c.05.32.08.64.08.98s-.03.66-.08.98l-.08.51.37.36 1.63 1.59-1.22 2.11-2.17-.62-.5-.14-.4.32c-.53.43-1.11.76-1.72.98l-.5.18-.13.51-.55 2.24h-2.44l-.55-2.2-.13-.51-.5-.18c-.6-.23-1.18-.56-1.72-.99l-.4-.32-.5.14-2.17.62-1.21-2.12 1.63-1.59.37-.36-.08-.51c-.05-.32-.08-.65-.08-.98s.03-.66.08-.98l.08-.51-.37-.36L3.6 8.56l1.22-2.11 2.17.62.5.14.4-.32c.53-.44 1.11-.77 1.72-.99l.5-.18.13-.51.54-2.21h2.44M14 2h-4l-.74 2.96c-.73.27-1.4.66-2 1.14l-2.92-.83-2 3.46 2.19 2.13c-.06.37-.09.75-.09 1.14s.03.77.09 1.14l-2.19 2.13 2 3.46 2.92-.83c.6.48 1.27.87 2 1.14L10 22h4l.74-2.96c.73-.27 1.4-.66 2-1.14l2.92.83 2-3.46-2.19-2.13c.06-.37.09-.75.09-1.14s-.03-.77-.09-1.14l2.19-2.13-2-3.46-2.92.83c-.6-.48-1.27-.87-2-1.14L14 2z">
                            </path>
                        </svg>
                    </button>
                    <ul x-show="subOpen" x-transition x-cloak @click.away="subOpen = false"
                        class="absolute font-semibold z-10 w-44 right-0 shadow-lg border border-gray-700/20 rounded-lg  bg-white">
                        <li class="hover:bg-gray-100 block cursor-pointer px-5 py-3 transition ease-in duration-150">
                            <button @click="subOpen = false; notificationOpen = false;" wire:click='markAllAsRead'
                                class="w-full text-left">Mark all as read</button>
                        </li>
                    </ul>
                </div>
            @endif
        </div>
        <div class="relative py-2 min-h-20 max-h-[30rem] overflow-y-auto">
            <x-notification-spinner />
            @if ($notificationFirstOpen)
                @forelse ($notifications as $notification)
                    <div class="flex space-x-4 px-4 py-2 hover:bg-gray-100">
                        <img class="w-14 h-14 rounded-xl" src="{{ $notification->data['user_avatar'] }}" alt="avatar">
                        <a wire:click.prevent="goToNotification('{{ $notification->id }}')"
                            href="{{ route('idea.show', $notification->data['idea_slug']) . '?comment=' . $notification->data['comment_id'] }}">
                            <p><span class="font-semibold">{{ $notification->data['user_name'] }}</span>
                                Commented on <span class="font-semibold">{{ $notification->data['idea_title'] }}</span>
                            </p>
                            <p class="line-clamp-3">{{ $notification->data['comment_body'] }}</p>
                            <span
                                class="text-xs mt-1 text-gray-500">{{ $notification->created_at->diffForHumans() }}</span>
                        </a>
                    </div>
                @empty
                    <div class="text-lg font-semibold h-20 flex justify-center items-center">No new notification</div>
                @endforelse
            @endif
        </div>
    </div>
</div>
