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
   props: {
      laravelObjects: {
         type:Object,
      },
   },
   data() {
      return {
         selected: null,
         options: [],
      }
   },
   created() {
      //インスタンス生成時にapiからCustomerを取得して変数に格納
      axios.get('/api/vue_select').then(response => {
            this.options = response.data
      })
      //新規作成時にエラーが出るので要対策
      this.selected = this.laravelObjects.customer_id
   },
}
</script>
