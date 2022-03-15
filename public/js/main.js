const VueSelect = window.VueSelect;

Vue.component('v-select', VueSelect.VueSelect)

new Vue({
  el: '#app',
  data: {
    selected: '',
    options: [
      'foo',
      'bar',
      'baz'
    ]
  }
})