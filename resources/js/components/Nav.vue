<template>
  <nav class="nav">
    <ul>
      <li v-for="(item, index) in nav" :key="index" class="nav__item">
        <router-link :to="item.path">{{ item.name }}</router-link>
      </li>
    </ul>
  </nav>
</template>

<script>
export default {
  name: 'Nav',
  data () {
    return {
      nav: [
        {
          path: 'news',
          name: 'Новости'
        },
        {
          path: 'games',
          name: 'Игры'
        },
        {
          path: 'table',
          name: 'Таблица'
        },
        {
          path: 'team',
          name: 'Команда'
        },
        {
          path: 'school',
          name: 'Школа'
        },
        {
          path: 'contacts',
          name: 'Контакты'
        }
      ]
    };
  }
}
</script>

<style lang="scss" scoped>
@import '@/js/sass/variables.scss';

// ul {
//   padding: 0;
// }
// li {
//   list-style: none;
// }
// .nav {
//   padding: 15px;
//   position: absolute;
//   top: 100px;
//   left: 0;
//   width: 100%;
//   height: calc(100vh - 100px);
//   background: #fff;
//   transform: translateX(0%);
//   &__item {
//     border-bottom: 1px solid rgba($basecolor, .4);
//     a {
//       font-size: 18px;
//       font-weight: 600;
//       letter-spacing: .2px;
//       color: $basecolor;
//       text-decoration: none;
//       display: block;
//       padding: 15px 0;
//     }
//   }
// }
</style>
