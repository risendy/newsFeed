<template>
   <button v-on:click='toggleIsVisible(commentId)'>
       Reply
   </button>
</template>

<script>
    import store from './../store/store.js'

    export default {
        props: [
            'commentId'
        ],
        data: function () {
            return {
                state: store.state
            }
        },
        methods: {
            toggleIsVisible: function (commentId) {
                store.toggleIsVisible(commentId);
            }
        },
        mounted() {

        }
    }
</script>
