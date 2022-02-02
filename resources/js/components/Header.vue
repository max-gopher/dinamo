<template>
  <header class="header">
    <div class="header__container">
      <div class="header__logo">
        <router-link to="/">
          <img src="@/assets/img/icon-2.svg" alt="logo" class="logo">
        </router-link>
      </div>
      <div id="nav">
        <router-link to="/news">Новости</router-link>
        <router-link to="/games">Игры</router-link>
        <router-link to="/table">Таблица</router-link>
        <router-link to="/team">Команда</router-link>
        <router-link to="/school">Школа</router-link>
        <router-link to="/contacts">Контакты</router-link>
      </div>
      <div class="social">
        <div class="social__container">
          <a href="https://www.instagram.com/dynamovologda/" target="_blank" class="social__item">
            <img src="@/assets/img/instagram.svg" alt="instagram">
          </a>
          <a href="https://t.me/dynamovologda" target="_blank" class="social__item">
            <img src="@/assets/img/telegram.svg" alt="telegram">
          </a>
          <a href="https://www.youtube.com/channel/UCKTA89P6oAb1pqTKEgRqE9w/" target="_blank" class="social__item">
            <img src="@/assets/img/youtube.svg" alt="youtube">
          </a>
        </div>
      </div>
      <!-- <button id="hamburger" :class="['hamburger', {'is-active': isActive}]" @click.prevent="isActive = !isActive">
        <span />
        <span />
        <span />
      </button> -->
    </div>
  </header>
</template>

<script>
export default {
  name: 'Header',
  data () {
    return {
      isActive: false
    }
  }
}
</script>

<style lang="scss" scoped>
.header {
  max-width: 1140px;
  margin: 0 auto;
  padding: 15px;
  &__container {
    display: flex;
    align-items: center;
    justify-content: space-between;
    position: relative;
    min-height: 70px;
  }
  &__logo {
    a {
      font-size: 0;
      display: inline-block;
    }
  }
  .social {
    &__container {
      font-size: 0;
      margin: 0 -8px;
    }
    &__item {
      font-size: 0;
      display: inline-block;
      margin: 0 8px;
      img {
        width: 24px;
        height: 24px;
        object-fit: contain;
        opacity: .4;
      }
    }
  }
}

.logo {
  width: 40px;
}

#nav {
  margin: 0 -15px;
  a {
    font-size: 16px;
    font-weight: 600;
    letter-spacing: .2px;
    color: #191919;
    text-decoration: none;
    margin: 0 15px;
    &.router-link-exact-active {
      color: #0959a1;
    }
  }
}

.hamburger {
  span {
    width: 40px;
    height: 4px;
    background-color: rgba(#0959a1, .8);
    display: block;
    margin: 8px auto;
    -webkit-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
  }
  &.is-active {
    span:nth-child(1) {
      opacity: 0;
      -webkit-transform: translateX(-100%);
      -ms-transform: translateX(-100%);
      -o-transform: translateX(-100%);
      transform: translateX(-100%);
    }
    span:nth-child(3) {
      opacity: 0;
      -webkit-transform: translateX(100%);
      -ms-transform: translateX(100%);
      -o-transform: translateX(100%);
      transform: translateX(100%);
    }
  }
}
</style>