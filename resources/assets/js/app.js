require('./bootstrap')

window.Vue = require('vue')

Vue.component('example-component', require('./components/ExampleComponent.vue'))
Vue.component('project-add', require('./project/ProjectAdd.vue'))

const app = new Vue({
    el: '#app'
});
