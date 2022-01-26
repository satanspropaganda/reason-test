<template>
    <div id="homepage" class="o-wrapper">
    <div class="c-posts__categories">
        <ul>
        <category-link v-for="category in categories" :key="category.id" v-bind:category="category"></category-link>
        </ul>
    </div>
        <div class="c-posts-grid">
          <post-grid v-for="post in posts" :key="post.id" v-bind:post="post"></post-grid>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
import PostGrid from './partials/PostGrid.vue'
import MenuItem from './partials/MenuItem.vue'
export default {
  name: 'Home',
  data () {
    return {
      title: 'Reason Home',
      posts: [],
      categories: []
    }
  },
  created () {
    this.getCategory()
    this.getCategories()
    document.title = this.title
  },
  methods: {
    getCategory () {
      var path = this.$route.path.split('/')
      axios.get('http://reason.local/wp-json/wp/v2/categories?slug=' + path[path.length - 1])
        .then(response => {
          this.category = response.data[0]
          if (this.category === undefined) {
            this.$router.push({name: 'NotFound'})
          }
          document.title = this.category.name
          this.getPosts()
        })
        .catch(e => {
          console.log(e)
        })
    },
    getPosts () {
      let postsUrl = 'http://reason.local/wp-json/wp/v2/posts?categories=' + this.category.id
      if (this.$route.query.page !== undefined) {
        postsUrl += '?page=' + this.$route.query.page
      }
      axios.get(postsUrl)
        .then(response => {
          this.posts = response.data
        })
        .catch(e => {
          console.log(e)
        })
    },
    getCategories () {
      let categoriesUrl = 'http://reason.local/wp-json/wp/v2/categories'
      axios.get(categoriesUrl)
        .then(response => {
          this.categories = response.data
        })
        .catch(e => {
          console.log(e)
        })
    }
  },
  components: {
    'post-grid': PostGrid,
    'category-link': MenuItem
  }
}
</script>
