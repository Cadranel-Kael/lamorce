<div>
    @foreach($drawerComponents as $index => $drawerComponent)
        <x-drawer
            :component="$drawerComponent"
            :expand="$drawerExpands[$index]"
            :data="$drawerData[$index]"
            :title="$drawerTitles[$index]"
            :index="$index"
            :edit="$drawerEdits[$index]"
        />
    @endforeach
</div>
