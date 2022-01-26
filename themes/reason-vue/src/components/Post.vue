<template>
    <div class="o-wrapper c-single__wrapper">
    <div class="c-single__content">
        <h1 class="c-single__content-title" v-html="title"></h1>
        <div class="o-content-block" v-html="content">
        </div>
    </div>
    <div class="c-single__media">
        <img :src="image" :alt="title">
    </div>
</div>
</template>

<script>
import axios from 'axios'
export default{
  name: 'Single',
  data () {
    return {
      title: '',
      post: [],
      content: [],
      author: [],
      image: []
    }
  },
  created () {
    this.getPost()
  },
  methods: {
    getPost () {
      var path = this.$route.path
      axios.get('http://reason.local/wp-json/wp/v2/posts?slug=' + path.replace(/^\/|\/$/g, ''))
        .then(response => {
          this.post = response.data[0]
          if (this.post === undefined) {
            this.$router.push({name: 'NotFound'})
          }
          // Set document title
          document.title = this.post.title.rendered

          this.content = this.post.content.rendered

          // Get post image
          this.image = this.getImage(this.post.featured_media)
        })
        .catch(e => {
          console.log(e)
        })
    },
    getImage (e) {
      let imageUrl = 'http://reason.local/wp-json/wp/v2/media/' + e
      axios.get(imageUrl)
        .then(response => {
          this.image = response.data.source_url
        })
        .catch(e => {
          console.log(e)
        })
    }
  }
}
</script>
