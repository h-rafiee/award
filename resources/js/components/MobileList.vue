<template>
    <div>
        <h1>MobileList</h1>
        <hr>
        <table-component
            :columns="columns"
            :data="data"
            url-prefix="/mobiles/"
            :removeable="false"
            :editable="false"
            :watchable="false"
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
                "mobile",
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
        axios.get('/api/mobiles').then(res => {
            this.data = res.data.data;
            this.paginate = res.data.links;
            this.currentPage = res.data.current_page;
        });
    },
}
</script>