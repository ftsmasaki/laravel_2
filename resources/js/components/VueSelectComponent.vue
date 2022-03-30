<template>
   <div>
      <div v-if="currentPath.match(/asset/)">
         <input type="hidden" name="customer_id" v-model="selected">
         <v-select
            :options="options"
            label="customer_name"
            v-model="selected"
            :reduce="options => options.id"
         ></v-select>
      </div>
      <div v-else="currentPath.match(/license/)">
         <input type="hidden" name="product_id" v-model="selected">
         <v-select
            :options="options"
            label="product_name"
            v-model="selected"
            :reduce="options => options.id"
         ></v-select>
      </div>
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
         currentPath: '',
      }
   },
   created() {

      //現在のURLを取得
      this.currentPath = location.pathname

      //新規作成時にエラーが出るので要対策
      if (this.currentPath.match(/asset/)) {
         //インスタンス生成時にapiからDBを取得して変数に格納
         axios.get('/api/vue_select/asset').then(response => {
               this.options = response.data
         })
         this.selected = this.laravelObjects.customer_id
      } else {
         //インスタンス生成時にapiからDBを取得して変数に格納
         axios.get('/api/vue_select/license').then(response => {
               this.options = response.data
         })
         this.selected = this.laravelObjects.product_id
      }
   },
}
</script>
