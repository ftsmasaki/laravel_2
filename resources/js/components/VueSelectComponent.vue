<template>
   <div>
      <p>{{ currentPath }}</p>
      <div v-if="currentPath.match(/asset/)">
         <input type="hidden" name="customer_id" v-model="selected">
         <v-select
            :options="options"
            label="customer_name"
            v-model="selected"
            :reduce="options => options.id"
         ></v-select>
      </div>
      <!-- 下記elseブロックが動作しない？ -->
      <div v-else>
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
      //インスタンス生成時にapiからDBを取得して変数に格納
      axios.get('/api/vue_select').then(response => {
            this.options = response.data
      })

      //現在のURLを取得
      this.currentPath = location.pathname

      //新規作成時にエラーが出るので要対策
      if (this.currentPath.match(/asset/)) {
         this.selected = this.laravelObjects.customer_id
      } else {
         this.selected = this.laravelObjects.product_id
      }
         

   },
}
</script>
