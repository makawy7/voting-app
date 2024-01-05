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
            <svg class="absolute text-gray-700 w-4 left-2" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>
            <input class="w-full pl-8 px-4 py-2 border-none rounded-xl placeholder-gray-900" placeholder="Find an idea" type="text">
        </div>
    </section>
    {{-- end filters --}}
</x-app-layout>
