<template>
  <div class="page">
    <div class="page__container">
      <div class="page__content">

        <ul class="breadcrumbs">
          <li><router-link to="/">Главная</router-link></li>
          <li><span>Таблица</span></li>
        </ul>

        <div class="page__head">
          <h1>Таблица</h1>
        </div>

        <table>
          <thead>
            <tr>
              <th>#</th>
              <th>Команда</th>
              <th>Игры</th>
              <th>В</th>
              <th>Н</th>
              <th>П</th>
              <th>ГЗ</th>
              <th>ГП</th>
              <th>Очки</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Динамо</td>
              <td>1</td>
              <td>1</td>
              <td>0</td>
              <td>0</td>
              <td>2</td>
              <td>0</td>
              <td>3</td>
            </tr>
          </tbody>
        </table>

      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Table'
}
</script>
