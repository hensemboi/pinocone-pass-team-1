import { ref, computed, watch } from "vue";

export default function useSearch(items, searchProp) {
    const enteredSearchTerm = ref("");
    const activeSearchTerm = ref("");

    const availableItems = computed(function () {
        let filteredItems = [];
        if (activeSearchTerm.value) {
            items.value.forEach((element) => {
                if (element[searchProp] == activeSearchTerm.value) {
                    filteredItems.push(element);
                }
            });
        } else if (items.value) {
            filteredItems = items.value;
        }
        return filteredItems;
    });

    watch(enteredSearchTerm, function (newValue) {
        setTimeout(() => {
            if (newValue === enteredSearchTerm.value) {
                activeSearchTerm.value = newValue;
            }
        }, 300);
    });

    function updateSearch(val) {
        enteredSearchTerm.value = val;
    }

    return {
        enteredSearchTerm,
        availableItems,
        updateSearch,
    };
}
