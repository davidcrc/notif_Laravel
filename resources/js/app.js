require('./bootstrap');


window.Vue = require('vue');
// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('notifications-component', require('./components/Notifications.vue').default);

const app = new Vue({
  el: '#app',
});