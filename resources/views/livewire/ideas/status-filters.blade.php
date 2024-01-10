<div>
    <nav class="hidden sm:flex items-center justify-between text-xs">
        <ul class="uppercase font-semibold flex space-x-10 rtl:space-x-reverse pb-3 border-b-4 border-gray-20">
            <li><a href="" wire:click.prevent="setStatus('All')" @class([
                'text-gray-400 pb-3 border-b-4 transition ease-in duration-150 hover:border-blue',
                'border-blue' => $currentStatus === 'All' || $currentStatus === null,
            ])>All ideas</a>
            </li>
            @foreach ($statuses as $status)
                @if ($loop->iteration > 3)
                @break
            @endif
            <li><a href="" wire:click.prevent="setStatus('{{ $status->name }}')"
                    @class([
                        'text-gray-400 pb-3 border-b-4 transition ease-in duration-150 hover:border-blue',
                        'border-blue' => $currentStatus === $status->name,
                    ])>{{ $status->name }}</a>
            </li>
        @endforeach
    </ul>
    <ul class="uppercase font-semibold flex space-x-10 pb-3 border-b-4 border-gray-20">
        @foreach ($statuses as $status)
            @if ($loop->iteration <= 3)
                @continue
            @endif
            <li><a href="" wire:click.prevent="setStatus('{{ $status->name }}')"
                    @class([
                        'text-gray-400 pb-3 border-b-4 transition ease-in duration-150 hover:border-blue',
                        'border-blue' => $currentStatus === $status->name,
                    ])>{{ $status->name }}</a>
            </li>
        @endforeach
    </ul>
</nav>
</div>
