<div>
    <section class="filters flex flex-col space-y-2 sm:space-y-0 sm:flex-row sm:space-x-6">
        <div class="w-full sm:w-1/4">
            <select wire:model.live="category" class="rounded-xl px-4 py-2 border-none w-full" name="category"
                id="">
                <option value="All">All Categories</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->name }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="w-full sm:w-1/4">
            <select class="rounded-xl px-4 py-2 border-none w-full" name="other_filters" id="">
                <option value="Filter One">Filter</option>
                <option value="Filter One">Filter</option>
                <option value="Filter One">Filter</option>
            </select>
        </div>
        <div class="w-full sm:w-1/2 relative flex items-center">
            <svg class="absolute text-gray-700 w-4 left-2 rtl:right-2" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>
            <input class="w-full pl-8 rtl:pr-8 px-4 py-2 border-none rounded-xl placeholder-gray-900"
                placeholder="Find an idea" type="text">
        </div>
    </section> <!-- end filters -->
</div>
