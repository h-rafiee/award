<template>
    <div>
        <h1>EventList</h1>
        <hr>
        <table-component
            :columns="columns"
            :data="data"
            url-prefix="/events/"
            id="slug"
        />
    </div>
</template>

<script>
import axios from "axios";
import TableComponent from '../objects/Table.vue';

export default {
    data () {
        return {
            columns: [
                "title",
                "created_at"
            ],
            data: [],
            paginate: [],
            currentPage: 1,
        }
    },
    components: {
        TableComponent,
    },
    created() {
        axios.get('/api/events').then(res => {
            this.data = res.data.data;
            this.paginate = res.data.links;
            this.currentPage = res.data.current_page;
        });
    },
}
</script>