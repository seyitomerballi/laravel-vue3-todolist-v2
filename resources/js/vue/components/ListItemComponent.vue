<template>
  <div class="list-group d-flex justify-content-between align-items-center border-0">
    <ItemComponent :item="item" v-for="(item,index) in todoList" :key="index" />
  </div>
</template>

<script>

import ItemComponent from "./ItemComponent";

export default {
  name: "ListItemComponent",
  props: ["todoList"],
  components:{
    ItemComponent
  }
}
</script>

<style scoped>

</style>