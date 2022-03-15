const VueSelect = window.VueSelect;

Vue.component('v-select', VueSelect.VueSelect)

new Vue({
  el: '#app',
  data: {
    selected: '',
    options: [
        {id:1, label:'住まいLOVE不動産株式会社'},
        {id:2, label:'株式会社チュウチク'},
        {id:3, label:'社会福祉法人豊橋市福祉事業会'},
        {id:4, label:'社会福祉法人和敬会'},
        {id:5, label:'社会福祉法人昭徳会'},
        {id:6, label:'株式会社オリジン'},
    ]
  }
})