<div>
    @foreach($modalComponents as $index => $modalComponent)
        <x-drawer
            :modal-component="$modalComponent"
            :modal-expand="$modalExpands[$index]"
            :modal-data="$modalData[$index]"
            :modal-title="$modalTitles[$index]"
            :index="$index"
        />
    @endforeach
</div>
