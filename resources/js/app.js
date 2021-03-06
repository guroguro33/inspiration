/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./script');
import VueI18n from 'vue-i18n';
var Paginate = require('vuejs-paginate')

window.Vue = require('vue');

// 多言語化
Vue.use(VueI18n);
const i18n = new VueI18n({
  locale: 'ja',
  messages: {
    ja: require('../../resources/lang/ja.json')
  },
})

Vue.component('paginate', Paginate)
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('likes-component', require('./components/LikesComponent.vue').default);
Vue.component('purchases-component', require('./components/PurchasesComponent.vue').default);
Vue.component('lists-component', require('./components/listsComponent.vue').default);
Vue.component('reviews-component', require('./components/ReviewsComponent.vue').default);
Vue.component('idea-info-component', require('./components/IdeaInfoComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
  el: '#app',
  i18n: i18n
});
