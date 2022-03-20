<template>
   <div>
      <input type="hidden" name="customer_id" v-model="selected">
      <v-select
         :options="options"
         label="customer_name"
         v-model="selected"
         :reduce="options => options.id"
      ></v-select>
   </div>
</template>

<script>
import VueSelectComponent from 'vue-select';
export default {
   components: {VueSelectComponent},
   data() {
      return {
         selected: null,
         options: [],
      }
   },
   created() {
      //インスタンス生成時にapiからタスク一覧を取得して変数に格納
      axios.get('/api/search_customer').then(response => {
            this.options = response.data
      })
   },
}
</script>
