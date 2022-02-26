<template>
  <div class="input-group mb-2">
    <input @keyup.enter="addItem($event)" v-model="item.title" type="text" class="form-control col-11"
           placeholder="Yapacağınız işi ekleyin...">
    <button @click="addItem($event,item.title)"
            :class="item.title == '' ? 'btn-dark disabled' : 'btn-primary' "
            class="btn opacity-75 col-1 d-flex justify-content-between align-items-center" type="button">
      <fai class="me-1" :icon="['fas','plus']" size="xs"/>
      <span class="small">Ekle</span>
    </button>
  </div>
</template>

<script>
export default {
  name: "AddItemComponent",
  props: ["todoList"],
  data() {
    return {
      item: {
        title: ""
      }
    }
  },
  methods: {
    addItem(event, title = "") {
      if (this.item.title == "") {
        return
      }
      if (title !== "") {
        this.todoList.push(title);
      } else {
        this.todoList.push(event.target.value);
      }
      event.target.value = "";
      this.item.title = "";
    },
  },
}
</script>

<style scoped>

</style>