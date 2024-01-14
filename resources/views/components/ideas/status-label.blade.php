<div @class([
    'w-28 py-2 text-xxs font-bold uppercase leading-none rounded-full text-center',
    'bg-gray-200' => strtolower($status) === 'open',
    'bg-yellow text-white' => strtolower($status) === 'in progress',
    'bg-red text-white' => strtolower($status) === 'closed',
    'bg-green text-white' => strtolower($status) === 'implemented',
    'bg-purple text-white' => strtolower($status) === 'considering',
])>
    {{ ucwords($status) }}
</div>
