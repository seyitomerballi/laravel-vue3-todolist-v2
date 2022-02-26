<template>
  <nav class="mt-2">
    <ul class="pagination justify-content-center">
      <li @click="setCurrentPage(firstPage)" class="page-item">
        <a class="page-link link-success" tabindex="-1">İlk</a>
      </li>
      <li @click="currentPage >= 2 && setCurrentPage(--currentPage)" class="page-item" :class="currentPage === 1 ?
      'disabled' : ''">
        <a class="page-link" tabindex="-1">Geri</a>
      </li>
      <li @click="setCurrentPage(index)" v-for="(index) in totalPageSize" :key="index"
          :class="currentPage === index ? 'active' : ''" class="page-item">
        <a class="page-link link-dark">{{ index }}</a>
      </li>
      <li @click="currentPage < totalPageSize && setCurrentPage(++currentPage)" class="page-item" :class="currentPage ===
      totalPageSize ?
      'disabled' : ''">
        <a class="page-link">İleri</a>
      </li>
      <li @click="setCurrentPage(finalLastPage)" class="page-item">
        <a class="page-link link-success">Son</a>
      </li>
    </ul>
  </nav>
</template>

<script>
export default {
  name: "ItemPaginationComponent",
  props: ["todoList","fCurrentPage"],
  data() {
    return {
      firstPage: 1,
      currentPage: 1,
      pageLength: 5,
      pageSize: 0,
      lastPage: null,
    }
  },
  emits: ['currentPage', 'pageSize'],
  methods: {
    calculatePageSize() {
      if (this.todoList.length !== 0) {
        this.pageSize = Math.ceil(this.todoList.length / this.pageLength);
      }
    },
    setCurrentPage(index) {
      this.currentPage = index;
      this.$emit('currentPage', this.currentPage);
    }
  },
  computed: {
    totalPageSize() {
      if (this.todoList.length !== 0) {
        return Math.ceil(this.todoList.length / this.pageLength);
      }
    },
    finalLastPage() {
      return this.pageSize;
    },
  },
  watch:{
    fCurrentPage(){
      this.currentPage = this.fCurrentPage;
      this.calculatePageSize();
    }
  }

}
</script>

<style scoped>

</style>