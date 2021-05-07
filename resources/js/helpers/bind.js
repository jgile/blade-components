const AlpineComponentMagicMethod = {
    start() {
        Alpine.addMagicProperty('bind', ($el) => {
            return function (parentAttribute, localValue) {
                this.$nextTick(() => {
                    const parent = $el.parentNode.closest('[x-data]');
                    if (typeof parent === 'object' && parent !== null) {
                        const setLocalMethod = typeof localValue === 'function' ? function (newVal) {
                            return localValue(newVal);
                        } : function (newVal) {
                            if ($el[localValue] !== newVal) {
                                $el[localValue] = newVal;
                            }
                        }
                        this.$parent.$watch(parentAttribute, setLocalMethod)
                        setLocalMethod(this.$parent[parentAttribute]);
                    }
                });
            }
        })
    }
}

const alpine = window.deferLoadingAlpine || ((alpine) => alpine())

window.deferLoadingAlpine = function (callback) {
    AlpineComponentMagicMethod.start()

    alpine(callback)
}

export default AlpineComponentMagicMethod
