require('../../../Kuros/resources/js/bootstrap');

window.Vue = require('vue');

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

Vue.component('botman-tinker', require('../../../Kuros/resources/js/components/TinkerComponent.vue').default);

const app = new Vue({
    el: '#app',
});
