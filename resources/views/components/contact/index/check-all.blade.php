<div
    x-data="checkAll"
>
    <input x-ref="checkbox" @change="handleCheck" class="rounded" type="checkbox">
</div>

@script
<script>
    Alpine.data('checkAll', () => {
        return {
            init() {
                this.$wire.$watch('selectedItems', () => {
                    this.updateCheckAllState();
                });
                this.$wire.$watch('itemsOnPage', () => {
                    this.updateCheckAllState();
                });
            },

            updateCheckAllState() {
                if (this.pageIsSelected()) {
                    this.$refs.checkbox.checked = true;
                    this.$refs.checkbox.indeterminate = false;
                } else if (this.pageIsEmpty()) {
                    this.$refs.checkbox.checked = false;
                    this.$refs.checkbox.indeterminate = false;
                } else {
                    this.$refs.checkbox.checked = false;
                    this.$refs.checkbox.indeterminate = true;
                }
            },

            pageIsSelected() {
                return this.$wire.itemsOnPage.every(id => this.$wire.selectedItems.includes(id));
            },

            pageIsEmpty() {
                return this.$wire.selectedItems.length === 0;
            },

            handleCheck(e) {
                e.target.checked ? this.selectAll() : this.deselectAll();
            },

            selectAll() {
                this.$wire.itemsOnPage.forEach(id => {
                    if (this.$wire.selectedItems.includes(id)) return;

                    this.$wire.selectedItems.push(id);
                });
            },

            deselectAll() {
                this.$wire.selectedItems = [];
            }
        }
    })
</script>
@endscript
