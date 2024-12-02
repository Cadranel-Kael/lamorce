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
                this.$wire.$watch('selectedContactIds', () => {
                    this.updateCheckAllState();
                });
                this.$wire.$watch('contactIdsOnPage', () => {
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
                return this.$wire.contactIdsOnPage.every(id => this.$wire.selectedContactIds.includes(id));
            },

            pageIsEmpty() {
                return this.$wire.selectedContactIds.length === 0;
            },

            handleCheck(e) {
                e.target.checked ? this.selectAll() : this.deselectAll();
            },

            selectAll() {
                this.$wire.contactIdsOnPage.forEach(id => {
                    if (this.$wire.selectedContactIds.includes(id)) return;

                    this.$wire.selectedContactIds.push(id);
                });
            },

            deselectAll() {
                this.$wire.selectedContactIds = [];
            }
        }
    })
</script>
@endscript
