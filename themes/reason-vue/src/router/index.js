import Vue from 'vue'
import Router from 'vue-router'
import FrontPage from '@/components/FrontPage.vue'
import Single from '@/components/Post.vue'
import CategoryPage from '@/components/CategoryPage.vue'

Vue.use(Router)

export default new Router({
  mode: 'history',
  routes: [ { path: '/', name: 'Front-page', component: FrontPage },
    { name: 'category', path: '/:categorySlug', component: CategoryPage },
    { name: 'post', path: '/:postSlug', component: Single } ]
})
