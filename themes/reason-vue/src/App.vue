<template>
  <div id="app">
  <div class="o-body__border"></div>
    <div class="container">
      <wpheader></wpheader>
      <div id="content">
        <router-view :key="$route.fullPath"></router-view>
      </div>
    </div>
  </div>
</template>
<script>
import wpheader from './components/partials/Header.vue'

export default {
  name: 'app',

  components: {
    wpheader
  }
}
</script>

<style src="../style.scss" lang="scss"></style>
