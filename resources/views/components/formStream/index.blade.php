@props([
    'stages',
    'currentStage',
])
<div {{ $attributes->class('flex items-center w-full gap-4') }}>
    @foreach($stages as $index => $stage)
        <div class="flex gap-1 items-center shrink-0">
            <div
                class="@if($currentStage >= $index + 1) bg-primary @else bg-gray-100 @endif text-sm w-5 h-5 rounded-full items-center justify-center flex shrink-0"
            >
                @if($currentStage <= $index + 1)
                    {{ $index + 1 }}
                @else
                    <x-icon.check class="size-3"/>
                @endif
            </div>
            <div class="@if($currentStage === $index + 1) font-bold @endif">{{ $stage }}</div>
        </div>
        @if(!$loop->last)
            <div class="h-[1px] w-full bg-gray-100"></div>
        @endif
    @endforeach
</div>
