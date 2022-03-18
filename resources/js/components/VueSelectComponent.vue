<template>
   <div>
      <v-select v-model="selected" :options="options"></v-select>
   </div>
</template>

<script>
import VueSelectComponent from 'vue-select';
export default {
  components: {VueSelectComponent},
  data() {
     return {
        selected: null,
        options: ['ねこ','うし','いぬ','ぞう','とら','うま']
     }
  }
}
</script>
