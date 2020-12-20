<template>
    <div>
        <h1>WinnerList</h1>
        <hr />
        <table-component
            :columns="columns"
            :data="data"
            url-prefix="/winners/"
            :removeable="false"
            :editable="false"
            :watchable="false"
        />
    </div>
</template>

<script>
import moduleWinner from "../store/winner/moduleWinner";
import TableComponent from "../objects/Table";

export default {
    data () {
        return {
            columns: [
                'mobile',
                'event',
                'code',
                'win',
                'created_at',
            ]
        }
    },
    components : {
        TableComponent,
    },
    computed: {
        data () {
            return this.$store.state.moduleWinner.winners
        }
    },
    created() {
        if (!moduleWinner.isRegistered) {
            this.$store.registerModule("moduleWinner", moduleWinner);
            moduleWinner.isRegistered = true;
        }
        this.$store.dispatch("moduleWinner/get");
    }
};
</script>
