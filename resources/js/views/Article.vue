<template>
  <div class="page">
    <div class="page__container">
      <div class="page__content">

        <ul class="breadcrumbs">
          <li><router-link to="/">Главная</router-link></li>
          <li><router-link to="/news">Новости</router-link></li>
          <!-- <li><span>{{ article.title }}</span></li> -->
        </ul>

        <!-- <div class="page__head">
          <h1>{{ article.title }}</h1>
        </div>

        <div>
          {{ article.date }}
        </div>

        <div>
          <div v-html="article.content" />
        </div> -->

        {{ this.$route.params.id }}

      </div>
    </div>
  </div>
</template>

<script>
// import { getArticle } from '@/js/services';

export default {
  name: 'Post',
  data () {
    return {
      article: null
    }
  },
}
</script>
