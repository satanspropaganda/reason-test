<template>
  <li>
    <router-link :to="{ name:'category', params: {categorySlug: category.slug} }" v-html="category.name"></router-link>
  </li>
</template>

<script>
export default {
  props: ['category']
}
</script>
