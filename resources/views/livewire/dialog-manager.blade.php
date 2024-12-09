<div>
    @foreach($dialogComponents as $index => $dialogComponent)
        @if($dialogTypes[$index] === 'drawer')
            <x-drawer
                    :component="$dialogComponent"
                    :expand="$dialogExpands[$index]"
                    :data="$dialogData[$index]"
                    :title="$dialogTitles[$index]"
                    :index="$index"
                    :edit="$dialogEdits[$index]"
            />
        @else
            <x-modal
                    :component="$dialogComponent"
                    :data="$dialogData[$index]"
                    :title="$dialogTitles[$index]"
                    :index="$index"
            />
        @endif
    @endforeach
</div>
