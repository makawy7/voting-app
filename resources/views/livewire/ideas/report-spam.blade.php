<div x-data="{ open: false }" x-cloak @open-spam-modal.window="open = true" @keydown.escape.window="open = false"
    class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">

    <div x-transition.opacity x-show="open" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

    <div x-transition.origin.bottom.duration.500ms x-show="open" class="fixed inset-0 z-10 overflow-y-autp">

        <div class="flex min-h-full items-center justify-center">
            <div @click.away="open = false"
                class="relative transform overflow-hidden rounded-xl bg-white transition-all sm:w-full sm:max-w-lg ">
                <div @click="open = false"
                    class="absolute right-2 top-2 p-2 hover:bg-gray-300 rounded-lg cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <form wire:submit="reportIdeaAsSpam" class="space-y-4 mt-6 mb-2">
                    <div class="flex space-x-3 px-6">
                        <div
                            class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                            <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z">
                                </path>
                            </svg>
                        </div>
                        <div class="pb-2 ">
                            <h3 class="text-xl font-semibold mb-1">Report Idea As Spam</h3>
                            <p>Are you sure you want to report this idea as spam?</p>
                        </div>
                    </div>


                    <div class="flex space-x-3 bg-gray-100 justify-end py-2 px-6">
                        <button type="button" @click="open = false"
                            class="py-2 px-4 gap-0.5 justify-center items-center bg-gray-100 rounded-lg font-semibold border border-gray-700 hover:bg-gray-200">
                            <span>Cancel</span>
                        </button>
                        <button type="submit" @click="open = false"
                            class="py-2 px-4 bg-red-600 hover:bg-red-700 text-white rounded-lg font-semibold border border-gray-700 disabled:opacity-50">Report</button>
                    </div>
                    {{-- <div x-cloak x-show="$wire.successMessage"
                        x-effect="if($wire.successMessage) setTimeout(()=>{$wire.successMessage = false},2000)"
                        x-transition class="flex rounded-xl justify-center font-semibold text-green-700">
                        <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 mr-1">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>Idea added successfully</span>
                    </div> --}}
                </form>

            </div>
        </div>
    </div>
</div>
