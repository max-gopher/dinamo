Nova.booting((Vue, router, store) => {
  Vue.component('index-rte', require('./components/IndexField'))
  Vue.component('detail-rte', require('./components/DetailField'))
  Vue.component('form-rte', require('./components/FormField'))
})
