<div x-data="{ open: false }" class="relative">
    <button @click="open = !open" class="h-10 px-5 bg-gray-200 rounded-xl font-semibold">
        <span class="ml-1">Set Status</span>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd"
                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                clip-rule="evenodd" />
        </svg>
    </button>
    <div x-show="open" x-cloak @click.away="open = false"
        class="absolute -translate-x-36 sm:-translate-x-0 z-10 mt-2 w-80 bg-white rounded-xl shadow-xl px-4 py-5">
        <form wire:submit='setStatus' class="space-y-2">
            @foreach ($statuses as $status)
                <div>
                    <input wire:model="status" @class([
                        'mr-0.5 bg-gray-200 border-none checked:bg-none focus:ring-0 focus:ring-offset-0',
                        'text-gray-900' => strtolower($status->name) === 'open',
                        'text-purple' => strtolower($status->name) === 'considering',
                        'text-yellow' => strtolower($status->name) === 'in progress',
                        'text-green' => strtolower($status->name) === 'implemented',
                        'text-red' => strtolower($status->name) === 'closed',
                    ]) type="radio"
                        id="{{ strtolower($status->name) }}" name="status" value="{{ $status->id }}"
                        {{ $idea->status_id === $status->id ? 'checked' : '' }} />
                    <label class="font-semibold"
                        for="{{ strtolower($status->name) }}">{{ ucwords($status->name) }}</label>
                </div>
            @endforeach
            <div class="pt-2">
                <textarea class="w-full border-none text-xs bg-gray-100 rounded-xl placeholder-gray-900" name="update_comment"
                    id="update_comment" rows="3" placeholder="Add an update comment (optional)"></textarea>
            </div>
            <div class="flex items-center space-x-2">
                <button type="submit" class="py-2 px-6 flex w-fit items-center gap-0.5 bg-gray-200 text-xs rounded-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 -rotate-45 text-gray-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                    </svg>
                    <span>Attach</span>
                </button>
                <button type="submit" class="py-2 px-6 bg-blue text-white rounded-xl disabled:opacity-60"
                    x-init="$wire.on('status-updated', () => {
                        open = false
                    })">Update</button>
            </div>
            <div class="flex items-center">
                <input wire:model="notifyVotedUsers" type="checkbox" name="notify_users" id="notify_users"
                    class="bg-gray-200 border-none focus:ring-0 rounded">
                <label for="notify_users" class="text-gray-900 ml-1">Notify All voters</label>
            </div>
        </form>
    </div>
</div>
