<template>
    <div class="container">
        <div class="row">
            <content-item v-for="item in items" :item="item" />
        </div>
    </div>
</template>

<script>
import ContentItem from './ContentItem.vue'

export default {
    components: {
        ContentItem
    },
    props: ['items']

}
</script>

<style>
</style>
