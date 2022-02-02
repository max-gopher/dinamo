<template>
  <div class="page">
    <div class="page__container">
      <div class="page__content">

        <ul class="breadcrumbs">
          <li><router-link to="/">Главная</router-link></li>
          <li><router-link to="/">Матч-центр</router-link></li>
          <li><span>Календарь</span></li>
        </ul>

        <div class="page__head">
          <h1>Календарь</h1>
        </div>

        <div class="list">
          <div class="date">
            Июль 2022
          </div>
          <div class="card">
            <div class="card__head">
              <span class="card__day">11</span>
              <div>
                <div class="card__month">июля</div>
                <div class="card__weekday">Вс, 18:00</div>
              </div>
            </div>
            <div class="card__body">
              <div class="card__league">
                <div class="card__league-name">
                  ФНЛ 2
                </div>
                <div class="card__league-tour">
                  1 тур
                </div>
              </div>
              <div class="card__result">
                <div class="card__team">
                  <div class="card__team-name">
                    Динамо
                  </div>
                  <div class="card__team-icon">
                    <img :src="require(`@/assets/img/icon-1.svg`).default" alt="">
                  </div>
                </div>
                <div class="card__value">
                  4:0
                </div>
                <div class="card__team">
                  <div class="card__team-icon">
                    <img :src="require(`@/assets/img/icon-2.svg`).default" alt="">
                  </div>
                  <div class="card__team-name">
                    Балашиха
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</template>

<script>
// import { getGames } from '@/js/services';

export default {
  name: 'Games'
}
</script>

<style lang="scss" scoped>
.list {
  display: flex;
  flex-wrap: wrap;
}

.card {
  display: flex;
  align-items: center;
  width: 100%;
  margin-bottom: 30px;
  &__head {
    padding: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 10em;
    min-height: 120px;
    background-color: #0959a1;
    color: #fff;
    border-top-left-radius: 4px;
    border-bottom-left-radius: 4px;
  }
  &__day {
    font-size: 42px;
    font-weight: 700;
    line-height: 1;
    margin-right: 8px;
  }
  &__month {
    font-size: 14px;
    font-weight: 700;
    letter-spacing: .5px;
    line-height: 1;
    margin-bottom: 4px;
  }
  &__weekday {
    font-size: 14px;
    line-height: 1;
    opacity: .8;
  }
  &__body {
    background-color: #edf2f5;
    padding: 15px;
    width: calc(100% - 10em);
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    min-height: 120px;
    border-top-right-radius: 4px;
    border-bottom-right-radius: 4px;
  }
  &__league {
    position: absolute;
    left: 15px;
    font-size: 14px;
  }
  &__result {
    display: flex;
    align-items: center;
  }
  &__team {
    display: flex;
    align-items: center;
    &-icon {
      width: 40px;
      margin: 0 15px;
    }
    &-name {
      font-size: 18px;
      font-weight: 600;
    }
  }
  &__value {
    font-size: 18px;
    font-weight: 600;
  }
}
</style>