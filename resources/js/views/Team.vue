<template>
  <div class="page">
    <div class="page__container">
      <div class="page__content">

        <ul class="breadcrumbs">
          <li><router-link to="/">Главная</router-link></li>
          <li><span>Команда</span></li>
        </ul>

        <div class="page__head">
          <h1>Команда</h1>
        </div>

        <div>
          players:
          <ul>
            <li v-for="player in team.players" :key="player.id">
              {{ player.first_name }}
            </li>
          </ul>
        </div>

        <div>
          stuff:
          <ul>
            <li v-for="item in team.stuff" :key="item.id">
              {{ item }}
            </li>
          </ul>
        </div>

        loading: {{ loading }}
        error: {{ error }}

        <div class="card">
          <span>12</span>
          <div class="card__head">
            <p>Николай Заболотный</p>
            <p>Вратарь</p>
          </div>
          <div class="card__body">
            <ul>
              <li>Гражданство: Россия</li>
              <li>Возраст: 31</li>
              <li>Дата рождения: 22.05.1994</li>
              <li>Рост: 175 см</li>
              <li>Вес: 70 кг</li>
            </ul>
          </div>
        </div>

      </div>
    </div>
  </div>
</template>

<script>
import { getTeam } from '@/js/services';

export default {
  name: 'Team',
  data () {
    return {
      team: [],
      error: false,
      loading: true,
    };
  },
  mounted () {
    this.fetch();
  },
  methods: {
    fetch () {
      getTeam ()
        .then(response => {
          this.team = response.data;
        })
        .catch(error => {
          console.log(error);
          this.error = true;
        })
        .finally(() => (this.loading = false));
    }
  }
}
</script>
