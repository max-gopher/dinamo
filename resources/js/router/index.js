import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '@/js/views/Home.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/articles',
    name: 'Articles',
    component: () => import('@/js/views/Articles.vue')
  },
  {
    path: '/articles/:id',
    name: 'Article',
    component: () => import('@/js/views/Article.vue')
  },
  {
    path: '/games',
    name: 'Games',
    component: () => import('@/js/views/Games.vue')
  },
  {
    path: '/games/:id',
    name: 'Game',
    component: () => import('@/js/views/Game.vue')
  },
  {
    path: '/table',
    name: 'Table',
    component: () => import('@/js/views/Table.vue')
  },
  {
    path: '/team',
    name: 'Team',
    component: () => import('@/js/views/Team.vue')
  },
  {
    path: '/school',
    name: 'School',
    component: () => import('@/js/views/School.vue')
  },
  {
    path: '/contacts',
    name: 'Contacts',
    component: () => import('@/js/views/Contacts.vue')
  },
  {
    path: '*',
    component: () => import('@/js/views/404.vue')
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.APP_URL,
  routes
})

export default router
