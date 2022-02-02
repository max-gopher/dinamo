<template>
  <div id="app">
    <Header />
    <main>
      <router-view/>
    </main>
    <Footer />
    <!-- <Nav /> -->
  </div>
</template>

<script>
const Header = () => import('@/js/components/Header.vue');
const Footer = () => import('@/js/components/Footer.vue');
// const Nav = () => import('@/js/components/Nav.vue');

export default {
  name: 'App',
  components: {
    Header,
    Footer,
    // Nav
  }
}
</script>

<style lang="scss">
@import url('https://fonts.googleapis.com/css?family=Roboto:400,500,700,900');

*,
*::before,
*::after {
  box-sizing: border-box;
  -webkit-locale: auto;
  white-space: normal;
  margin: 0;
}

button {
  background: transparent;
  border: none;
  padding: 0;
  cursor: pointer;
}

body {
  width: 100%;
  height: 100%;
  word-break: normal;
  overflow-x: hidden;
  &.no-scroll {
    overflow: hidden;
  }   
}

#app {
  position: relative;
  font-family: 'Roboto', sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  line-height: 1.5;
}

h1 {
  font-size: 45px;
  letter-spacing: 1px;
}

a {
  font-size: 16px;
}

.page {
  max-width: 1140px;
  margin: 0 auto;
  &__container {
    display: flex;
    flex-wrap: wrap;
  }
  &__content {
    // flex: 1 0 calc(100% - 330px);
    // min-width: 700px;
    padding: 15px;
    width: 100%;
  }
  // &__sidebar {
  //   flex: 1 0 270px;
  //   padding: 15px;
  // }
  &__head {
    margin: 30px 0;
  }
}

.breadcrumbs {
  display: flex;
  align-items: center;
  margin: 0 -15px;
  padding: 0;
  li {
    list-style: none;
    position: relative;
    display: flex;
    align-items: center;
    padding: 0 15px;
    &:not(:last-child):after {
      content: '';
      position: absolute;
      right: -2.5px;
      width: 5px;
      height: 5px;
      background-color: rgba(#0959a1, .4);
      border-radius: 50%;
    }
    a {
      color: #0959a1;
      text-decoration: none;
      border-bottom: 1px solid transparent;
    }
    span {
      color: rgba(#0959a1, .4);
    }
    &:hover {
      a {
        border-color: #0959a1;
      }
    }
  }
}
</style>
