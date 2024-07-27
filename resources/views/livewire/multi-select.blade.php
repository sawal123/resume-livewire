<div x-data="{
    open: false,
    selectedOptions: @entangle('selectedOptions'),
    toggleOption(option) {
        let index = this.selectedOptions.findIndex(selected => selected.id === option.id);
        if (index > -1) {
            this.selectedOptions.splice(index, 1);
        } else {
            this.selectedOptions.push(option);
        }
        @this.set('selectedOptions', this.selectedOptions);
    }
}" class="relative">
    <div class="border border-gray-300 rounded-md">
        <div x-on:click="open = !open" class="p-2 cursor-pointer">
            <span x-text="selectedOptions.length > 0 ? selectedOptions.map(option => option.name).join(', ') : 'Select options'"></span>
        </div>
    </div>
    <div x-show="open" class="overflow-y-auto mt-1 w-full bg-white border border-gray-300 rounded-md z-10" x-on:click.away="open = false">
        <template x-for="option in {{ json_encode($options) }}" :key="option.id">
            <div x-on:click="toggleOption(option)" class="p-2 cursor-pointer hover:bg-gray-100" :class="selectedOptions.some(selected => selected.id === option.id) ? 'bg-gray-200' : ''">
                <span x-text="option.name"></span>
            </div>
        </template>
    </div>
</div>
