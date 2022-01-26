<template>
    <article class="c-posts-grid__post">
      <router-link :to="{ name:'post', params: {postSlug: post.slug} }" class="c-posts-grid__post-link"></router-link>
        <div class="c-posts-grid__post-media">
          <img :src="image.source_url" :alt="post.title.rendered">
        </div>
        <p class="c-posts-grid__post-heading" v-html="post.title.rendered"></p>
    </article>
</template>

<script>
import axios from 'axios'
export default {
  data () {
    return {
      image: []
    }
  },
  created () {
    this.getImage()
  },
  methods: {
    getImage () {
      let imageUrl = 'http://reason.local/wp-json/wp/v2/media/' + this.post.featured_media
      axios.get(imageUrl)
        .then(response => {
          this.image = response.data
        })
        .catch(e => {
          console.log(e)
        })
    }
  },
  props: ['post']
}
</script>
