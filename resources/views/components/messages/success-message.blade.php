<!-- flash messages normally listens for livewire events, and set the message from the event -->
<!-- but if the flash message comes after a redirect, a session is needed -->

<div x-data="{ open: {{ session('success') ? 'true' : 'false' }}, message: '{{ session('success') ? session('success') : '' }}' }" 
    {{-- listening for livewire 'success-message' event and setting open status and the message --}}
    {{-- if the message comes after a redirect, then the message is set inside x-data with session('success') --}}
    @success-message.window ="({detail})=>{open=true; message=detail.message}"
    x-effect="if(open === true) setTimeout(()=>open = false,3000)">
    <div x-show="open" x-cloak x-transition:enter="transition ease-in duration-300"
        x-transition:enter-start="opacity-0 transform translate-x-full"
        x-transition:enter-end="opacity-100 transform translate-x-0" x-transition:leave="transition ease-out duration-150"
        x-transition:leave-start="opacity-100 transform translate-x-0"
        x-transition:leave-end="opacity-0 transform translate-x-full"
        class="fixed bottom-0 right-0 mb-2 mr-2 sm:mr-6 sm:mb-8 py-4 px-6 bg-white shadow-xl ring-1 ring-gray-900/5 z-10 flex rounded-xl justify-center font-semibold text-green-700">
        <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
            stroke="currentColor" class="w-5 h-5 mr-1">
            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <span class="capitalize" x-text="message"></span>
    </div>
</div>
