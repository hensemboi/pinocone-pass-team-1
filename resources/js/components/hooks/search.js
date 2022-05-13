import { ref, computed, watch } from 'vue';

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