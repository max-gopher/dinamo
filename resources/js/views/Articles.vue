<template>
  <div class="page">
    <div class="page__container">
      <div class="page__content">

        <ul class="breadcrumbs">
          <li><router-link to="/">Главная</router-link></li>
          <li><span>Новости</span></li>
        </ul>

        <div class="page__head">
          <h1>Новости</h1>
        </div>

        <div class="list">
          <router-link
            v-for="(article, index) in articles"
            :key="index"
            :to="`articles/${index}`"
            class="card">
            <div class="card__head">
              <!-- <img :src="require(`@/assets/img/${article.source}`)" :alt="article.title"> -->
            </div>
            <div class="card__body">
              <p>{{ article.title }}</p>
            </div>
          </router-link>
        </div>

        <div>
          pagination
        </div>

      </div>
    </div>
  </div>
</template>

<script>
// import { getArticles } from '@/js/services';

export default {
  name: 'Posts',
  data () {
    return {
      articles: [
        {
          url: '',
          title: 'Обзор матча с «Балтикой»',
          source: 'photo-1.jpg'
        },
        {
          url: '',
          title: 'Молодые «барсы» вышли в финал турнира памяти П.С. Гаврилиади ',
          source: 'photo-1.jpg'
        },
        {
          url: '',
          title: 'Владимир Федотов: «Присутствие тренеров сборной России – хорошая мотивация для игроков» ',
          source: 'photo-1.jpg'
        },
        {
          url: '',
          title: 'Обзор матча с «Балтикой»',
          source: 'photo-1.jpg'
        }
      ]
    }
  }
}
</script>

<style lang="scss" scoped>
.list {
  display: flex;
  flex-wrap: wrap;
  margin: 0 -16px;
}
.card {
  margin: 16px;
  flex-basis: 100%;
  text-decoration: none;
  &__head {
    border-radius: 4px;
    margin-bottom: 8px;
    font-size: 0;
    overflow: hidden;
    img {
      width: 100%;
    }
  }
  &__body {
    font-size: 18px;
    font-weight: 700;
    letter-spacing: .2px;
    color: #191919;
  }
  @media (min-width: 1280px) {
    flex-basis: calc(33.33% - 32px);
    min-width: 300px;
  }
}
</style>