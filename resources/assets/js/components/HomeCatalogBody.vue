<template>
    <div class="container mt-5 pt-5">
        <div class="row mt-4">
            <div class="col-md-3">
                <div class="row">
                    <filters @filter-input="handleFilterInput" />
                </div>
                <div class="row">
                    <sidebar-menu :categories="categories" />
                </div>

            </div>
            <div class="col-md-9">
                <main-content :items="currentItems" />
            </div>
        </div>
    </div>

</template>

<script>
import MainContent from './MainContent.vue'
import Filters from './Filters.vue'
import SidebarMenu from './SidebarMenu.vue'
import { FilterService } from '../services/FilterService.js'

export default {
    props: ['categories', 'items'],
    components: {
        MainContent,
        Filters,
        SidebarMenu
    },
    data() {
        return {
            //queryParams: {},
            currentItems:{}
        }
    },
    methods: {
        handleFilterInput(payload) {
            FilterService.getFilteredProducts(payload)
                .then(response => {
                    this.currentItems = response.data.products
                    console.log('response', response)
                })
        }
    },
    computed: {
        params() {
            return this.currentItems
        }
    },
    created() {
        this.currentItems = this.items
    }

}
</script>

<style>
</style>
