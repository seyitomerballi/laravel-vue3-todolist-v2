<template>
    <div class="input-group mb-1">
      <label class="list-group-item col-11">
        <div class="row">
          <div class="col col-1"><input class="form-check-input me-1" type="checkbox" value=""></div>
          <div class="col col-11 ps-0"><span class="text-break">{{ item }}</span></div>
        </div>
      </label>
      <DeleteItemComponent class="col-1"/>
    </div>
</template>

<script>
import DeleteItemComponent from "./DeleteItemComponent";

export default {
  name: "ItemComponent",
  props: {
    item: {
      title: String,
      completed: Boolean,
    }
  },
  components: {DeleteItemComponent}
}
</script>

<style scoped>

</style>