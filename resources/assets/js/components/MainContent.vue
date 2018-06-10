<template>
    <div class="container">
        <div class="row">
            <content-item v-for="(item, index) in items" :item="item" :key="index" />
        </div>
    </div>
</template>

<script>
import ContentItem from './ContentItem.vue'

export default {
    components: {
        ContentItem
    },
    props: ['items'],
    created() {
        console.log('Items:', this.items)
    }

}
</script>

<style>
</style>
