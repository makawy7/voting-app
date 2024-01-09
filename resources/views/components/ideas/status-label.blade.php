<div @class([
    'w-28 py-2 text-xxs font-bold uppercase leading-none rounded-full text-center',
    'bg-gray-200' => $status === 'Open',
    'bg-yellow text-white' => $status === 'In progress',
    'bg-red text-white' => $status === 'Closed',
    'bg-green text-white' => $status === 'Implemented',
    'bg-purple text-white' => $status === 'Considering',
])>
    {{ $status }}
</div>
