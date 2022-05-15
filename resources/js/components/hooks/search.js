import { ref, computed, watch } from "vue";

<<<<<<< HEAD
export default function useSearch(module = 'menu/fetchAllCategories') {
  async function getAllCategories (){
    if (!store.getters["menu/getIsCategoriesPopulated"]) {
        try {
            return await store.dispatch(module);
        } catch (error) {
            console.log(
                error.errorMessage || "Failed to fetch categories"
            );
        }
    } else {
        console.log("The fetching is not executing!");
        computed(() =>store.getters['menu/getAllCategories']);
    }
    return true
}

  return {
      enteredSearchTerm,
    availableItems,
    updateSearch,
  };
} 
=======
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
>>>>>>> origin/pinocone-requestDashboard
