<form class="flex flex-col gap-7" wire:submit="save">
    <div class="flex items-center">
        <div class="flex-grow font-bold text-4xl">{{ __('New collection') }}</div>
    </div>
    <div class="flex flex-col gap-5">
        <x-input model="form.name" autofocus placeholder="My collection" label="Name" name="name" required/>
        <x-select model="form.type" label="Type" name="type" :options="$types" required/>
        <x-textarea placeholder="Some text here..." label="Description" name="description"/>
    </div>
    <x-button-primary>{{ __('Create collection') }}</x-button-primary>
</form>
