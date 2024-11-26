<div>
    @if($modalComponent)
        <x-drawer :modal-component="$modalComponent" :modal-expand="$modalExpand" :modal-data="$modalData" :modal-title="$modalTitle"/>
    @endif
</div>
