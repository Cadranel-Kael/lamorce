@props([
    'collection' => 'Collection',
    'isClosed' => '',
    'type' => '',
    'amount' => 0.00,
    'desc' => '',
    'showStatus' => false
    ])
<div
    class="cursor-pointer p-6 bg-white rounded flex-col justify-between shadow flex shrink-0"
    title="{{ __('Open') }} {{ $collection }}"
    {{ $attributes }}
>
    <div class="mb-5">
        <div class="flex justify-between">
            <div class="flex gap-2">
                <h2 class="font-bold">{{ ucfirst($collection) }}</h2>
                @if($showStatus)
                    <span>–</span>
                    <span>{{ $isClosed ? __('Closed') : __('Open') }}</span>
                @endif
            </div>
            <button class="ml-2">More</button>
        </div>
        @if($type)
            <div class="text-gray-400">{{ $type }}</div>
        @endif
    </div>
   <div class="w-fit">
       <div class="text-3xl">{{ format_currency($amount) }} €</div>
       @if($desc)
           <p class="mt-5">{{ $desc }}</p>
       @endif
   </div>
</div>
