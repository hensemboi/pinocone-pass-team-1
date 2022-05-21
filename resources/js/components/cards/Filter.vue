<template>
  <div class="category-cloud">
    <h3>categories</h3>
    <div v-for="category in categories" :key="category.PK_categoryID">
      <div @click="filtercategory(category.PK_categoryID)" class="uniq-category">#{{ category.name }}</div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["categories"],
  setup(props, context) {
    const { categories } = props.categories.flatMap(x => x.categories);

    const filtercategory = (id) => {
        context.emit("categoryEvent", id)
    }
    return { categories, filtercategory };
  },
};
</script>

