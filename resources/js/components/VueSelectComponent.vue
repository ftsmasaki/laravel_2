<template>
   <div>
      {{selected}}
      <v-select :value.sync="selected" :options="options" multiple ></v-select>
   </div>
</template>

<script>
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
