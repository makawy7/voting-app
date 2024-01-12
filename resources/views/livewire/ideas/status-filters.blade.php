<div>
    <nav class="hidden sm:flex items-center justify-between text-xs">
        <ul class="uppercase font-semibold flex space-x-6 rtl:space-x-reverse pb-3 border-b-4 border-gray-20">
            <li><a href="{{ route('idea.index', ['status' => 'All']) }}" wire:click.prevent="setStatus('All')"
                    @class([
                        'pb-3 border-b-4 transition ease-in duration-150 hover:border-blue',
                        'border-blue text-gray-900' => $currentStatus === 'All',
                        'text-gray-400' => $currentStatus !== 'All',
                    ])>All ideas
                    ({{ $statusCount['total'] }})</a>
            </li>
            @foreach ($statuses as $status)
                @if ($loop->iteration > 3)
                @break
            @endif
            <li><a href={{ route('idea.index', ['status' => $status->name]) }}
                    wire:click.prevent="setStatus('{{ $status->name }}')"
                    @class([
                        'pb-3 border-b-4 transition ease-in duration-150 hover:border-blue',
                        'border-blue text-gray-900' => $currentStatus === $status->name,
                        'text-gray-400' => $currentStatus !== $status->name,
                    ])>{{ $status->name }} ({{ $statusCount[$status->id] }})</a>
            </li>
        @endforeach
    </ul>
    <ul class="uppercase font-semibold flex space-x-6 pb-3 border-b-4 border-gray-20">
        @foreach ($statuses as $status)
            @if ($loop->iteration <= 3)
                @continue
            @endif
            <li><a href="" wire:click.prevent="setStatus('{{ $status->name }}')"
                    @class([
                        'text-gray-400 pb-3 border-b-4 transition ease-in duration-150 hover:border-blue',
                        'border-blue' => $currentStatus === $status->name,
                    ])>{{ $status->name }} ({{ $statusCount[$status->id] }})</a>
            </li>
        @endforeach
    </ul>
</nav>
</div>
