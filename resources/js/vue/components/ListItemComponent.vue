<template>
  <div class="list-group d-flex justify-content-between align-items-center border-0">
    <ItemComponent :item="item" v-for="(item,index) in finalPageTodoList" :key="index" />
  </div>
</template>

<script>

import ItemComponent from "./ItemComponent";

export default {
  name: "ListItemComponent",
  props: ["pageTodoList"],
  components:{
    ItemComponent
  },
  computed:{
    finalPageTodoList(){
      return this.pageTodoList;
    }
  }
}
</script>

<style scoped>

</style>