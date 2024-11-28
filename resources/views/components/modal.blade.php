<div class="absolute top-0 left-0 right-0 bottom-0 justify-center items-center flex">
    <div
        class="inset-0 fixed w-full z-10 bg-black opacity-10 h-full"
        aria-hidden="true"></div>
    <div class="bg-white z-10 rounded">
        <div>
            <div class="flex justify-between shadow rounded-t items-center px-8 py-4 bg-white">
                <div class="font-bold">{{ $modalTitle }}</div>
                <button @click="open = false" title="{{ __('Close the drawer') }}">
                    <svg class="h-6 w-6 text-gray-400 hover:text-black" title="{{ __('close') }}"
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
        <div class="p-8">
            {{ $slot }}
        </div>
    </div>
</div>
