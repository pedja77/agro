/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap")

window.Vue = require("vue")

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Vue.component("sidebar-menu", require("./components/SidebarMenu.vue"))
import SidebarMenu from "./components/SidebarMenu.vue"
import MainContent from "./components/MainContent.vue"
import PriceList from "./components/PriceList.vue"
import Filters from "./components/Filters.vue"

Vue.mixin({
    methods: {
        route: route
    }
})

const app = new Vue({
    el: "#app",
    components: {
        SidebarMenu,
        MainContent,
        PriceList,
        Filters
    }
})
