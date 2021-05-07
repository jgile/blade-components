module.exports = function (config) {
    return {
        modelName: 'selected',
        open: false,
        activeIndex: 0,
        numberOfOptions: null,
        selectedOption: null,
        label: '',
        value: null,
        get optionCount() {
            if (this.numberOfOptions === null) {
                this.numberOfOptions = this.$refs.listbox.children.length
            }
            return this.numberOfOptions;
        },
        onButtonClick() {
            if (!this.open) {
                this.open = true

                if (this.value) {
                    this.activeIndex = parseInt(this.$el.querySelector('[data-value="' + this.value + '"]').dataset.index);
                }

                this.$nextTick(() => {
                    this.$refs.listbox.focus();
                    if (this.activeIndex) {
                        this.$el.querySelector('[data-index="' + this.activeIndex + '"]').scrollIntoView({block: 'nearest'});
                    }
                })
            }
        },
        selectOption(dispatch, option) {
            this.selectedOption = option;

            if (this.selectedOption) {
                this.value = this.selectedOption.dataset.value;
                this.label = this.selectedOption.dataset.label;
                dispatch('input', this.value);
            }

            this.open = false;
        },
        selectIndex(dispatch, index) {
            this.selectOption(dispatch, this.$el.querySelector('[data-index="' + index + '"]'))
        },
        selectActiveIndex(dispatch) {
            if (null !== this.activeIndex) {
                this.selectIndex(dispatch, this.activeIndex);
            }
        },
        selectValue(dispatch, val) {
            this.selectOption(dispatch, this.$el.querySelector('[data-value="' + val + '"]'));
        },
        onEscape() {
            this.open = false;
            this.$refs.button.focus();
        },
        onArrowUp() {
            this.activeIndex = this.activeIndex - 1 < 0 ? this.optionCount - 1 : this.activeIndex - 1
            this.$refs.listbox.children[this.activeIndex].scrollIntoView({block: 'nearest'})
        },
        onArrowDown() {
            this.activeIndex = this.activeIndex + 1 > this.optionCount - 1 ? 0 : this.activeIndex + 1
            this.$refs.listbox.children[this.activeIndex].scrollIntoView({block: 'nearest'})
        },
        ...config
    }
}
