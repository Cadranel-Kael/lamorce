@props([
    'collection' => 'Collection',
    'link' => '#',
    'status' => '',
    'amount' => '0.00',
    ])
<a class="p-6 bg-white rounded flex justify-between" href="{{ $link }}">
    <div class="flex gap-2">
        <h2 class="font-bold">{{ $collection }}</h2>
        @if($status)
            <span>–</span>
            <span>{{ $status }}</span>
        @endif
    </div>
    <div>{{ $amount }} €</div>
    <button>More</button>
</a>
