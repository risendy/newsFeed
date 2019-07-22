<template>
    <div v-if="this.isVisible == this.commentId">
        <form class="form-inline" method="post" :action="urlForm">
            <div class="form-group">
                <input type="text" name="body" class="form-control"/>
                <input type="hidden" name="user_id" :value="userId" />
                <input type="hidden" name="news_id" :value="newsId " />
                <input type="hidden" name="parent_id" :value="parentId" />
                <input type="hidden" name="_token" :value="csrf">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-default" value="Reply" >
                    <i class="fa fa-reply"></i> Reply
                </button>
            </div>
        </form>
    </div>
</template>

<script>
    import store from './../store/store.js'

    export default {
        props: [
            'userId',
            'newsId',
            'parentId',
            'urlForm',
            'commentId',
            'csrf',
        ],
        data: function () {
            return {
                state: store.state
            }
        },
        computed: {
          isVisible(){
              return store.state.isVisible;
          }
        },
        mounted() {

        }
    }
</script>
