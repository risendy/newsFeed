window.Vue = require('vue');

import ReplyButton from './components/ReplyButton.vue'
import ReplyForm from './components/ReplyForm.vue'

const app = new Vue({
    el: '#app',
    components: {
        'reply-button': ReplyButton,
        'reply-form': ReplyForm,
    }
});
