<template>
  <div class="table-responsive">
    <table class="table">
      <thead>
        <th v-for="(column, index) in columns" :key="index">
          {{ column }}
        </th>
        <th v-if="editable || removeable || watchable">
            Actions
        </th>
      </thead>
      <tbody>
        <tr v-for="(item, index) in data" :key="index">
          <td v-for="(column, index) in columns" :key="index">
            {{ item[column] }}
          </td>
          <td v-if="editable || removeable || watchable">
            <a v-if="editable" :href="urlPrefix + 'edit/' + item[id]" class="mr-2 text-warning">
              <i class="bi bi-pen"></i>
            </a>
            <a v-if="watchable" :href="urlPrefix + '/' + item[id]" class="mr-2">
              <i class="bi bi-eye-fill"></i>
            </a>
            <a href="javascript:void(0)" v-if="removeable" @click="deleteItem(item[id])" class="text-danger">
                <i class="bi bi-x"></i>
            </a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import axios from "axios";

export default {
  props: {
    editable: {
      type: Boolean,
      default: true
    },
    removeable: {
      type: Boolean,
      default: true
    },
    watchable: {
      type: Boolean,
      default: true
    },
    columns: {
      type: Array,
    },
    data: {
      type: Array,
    },
    urlPrefix: {
      type: String,
      default: '/'
    },
    id: {
      type: String,
      default: 'id'
    }
  },

  methods: {
    deleteItem (itemId) {
      if (confirm("Do you want to remove this item ?")) {
        axios.delete("/api" + this.urlPrefix + itemId).then(res => {
          const deleteIndex = this.data.findIndex(item => item[this.id] === itemId);
          this.data.splice(deleteIndex, 1);
        })
      }
    } 
  }
};
</script>