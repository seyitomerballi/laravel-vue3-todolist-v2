<template>
  <!--  <div class="container w-50">
      <div class="card mt-5 p-2">
        /* AddItemComponent */
        <div class="input-group mb-2">
          <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username"
                 aria-describedby="button-addon2">
          <button class="btn btn-outline-secondary" type="button" id="button-addon2">Ekle</button>
        </div>
        /* ListItemComponent */
        <div class="list-group">
          /* ItemComponent */
          <label class="list-group-item d-flex justify-content-between">
            <input class="form-check-input me-1" type="checkbox" value="">
            /* DeleteItemComponent */
            <button class="btn btn-outline-secondary" type="button" id="button-addon3">Sil</button>
          </label>
          <label class="list-group-item d-flex justify-content-between">
            <input class="form-check-input me-1" type="checkbox" value="">
            <button class="btn btn-outline-secondary" type="button" id="button-addon4">Sil</button>
          </label>
        </div>
      </div>
    </div>-->
  <div class="container w-50 mt-5">
    <div class="card bg-primary bg-opacity-10 d-flex justify-content-center align-items-center w-100">
      <h1 class="bg-opacity-10  mt-2 p-2">Yapılacaklar Listesi</h1>
    </div>
    <div class="card bg-primary bg-opacity-10 mt-2 p-2">
      <AddItemComponent :todoList="todoList"/>
      <ItemPaginationComponent :fCurrentPage ="finalCurrentPage" @currentPage="updateCurrentPage($event)" ref="pagination"
                               :todoList="todoList"/>
      <ListItemComponent :pageTodoList="pageTodoList"/>
      <ItemPaginationComponent :fCurrentPage ="finalCurrentPage" @currentPage="updateCurrentPage($event)" ref="pagination"
                               :todoList="todoList"/>
    </div>
  </div>
</template>

<script>

import AddItemComponent from "./components/AddItemComponent";
import ListItemComponent from "./components/ListItemComponent";
import ItemPaginationComponent from "./components/ItemPaginationComponent";

export default {
  data() {
    return {
      todoList: [
        "Alışveriş", "Kitap", "İş", "Spor", "Alışveriş",
        "Kitap", "İş", "Spor", "Alışveriş", "Kitap",
        "İş", "Spor", "Alışveriş", "Kitap", "İş",
        "Spor", "Alışveriş", "Kitap", "İş", "Spor",
        "Alışveriş", "Kitap", "İş", "Spor", "Alışveriş",
        "Kitap", "İş", "Spor",],
      currentPage: 1,
      pageLength: 5,
      pageTodoList: [],
    }
  },
  components: {
    ListItemComponent,
    AddItemComponent,
    ItemPaginationComponent,
  },
  created() {
    this.updateTodoList();
  },
  methods: {
    updateCurrentPage(val) {
      this.currentPage = val;
      this.updateTodoList();
    },
    updateTodoList(data) {
      let list = this.todoList;
      if (data) {
        list = data;
      }
      this.pageTodoList = list.slice((this.currentPage - 1) * this.pageLength, this.currentPage * this.pageLength)
    },
  },
  computed: {
    finalTodoList() {
      return this.todoList;
    },
    finalCurrentPage(){
      return this.currentPage;
    }
  },
  watch: {
    todoList: {
      deep: true,
      handler() {
          this.updateTodoList();
      }
    },
  }
}
</script>