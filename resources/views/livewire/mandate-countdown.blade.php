<div class="bg-white p-6 flex-col flex gap-7 w-fit rounded shadow">
    <h2 class="text-xl font-bold">{{ $title }}</h2>
    <div class="flex gap-7" wire:poll>
        <div class="bg-white shadow p-5 flex flex-col items-center">
            <div class="text-2xl">{{ $this->daysUntil }}</div>
            <div>Days</div>
        </div>
        <div class="flex gap-4 items-center">
            <div class="bg-white shadow p-5 flex flex-col items-center">
                <div class="text-2xl">{{ $this->hoursUntil }}</div>
                <div>Hours</div>
            </div>
            <div class="text-2xl">:</div>
            <div class="bg-white shadow p-5 flex flex-col items-center">
                <div class="text-2xl">{{ $this->minutesUntil }}</div>
                <div>Minutes</div>
            </div>
        </div>
    </div>
{{--    <x-button-primary>Change Time and Day</x-button-primary>--}}
</div>
