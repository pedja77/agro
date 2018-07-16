<template>
    <div class="container" v-if="route().current() == 'show-product'">

        <div class="text-center">
            <h2>{{ items.TIP_EN }} {{ items.ZIS_OZNAKA }}</h2>
        </div>
        <div class="row d-flex">
            <div class="col-8 d-flex-item">
                <img :src="`/images/products/${items.SIFRA_PROIZVODA}-01.jpg`" alt="" width="80%" />
                <img :src="`/images/drawings/${items.CRTEZ_BROJ}.jpg`" alt="" width="80%" />
            </div>
            <div class="col-4 d-flex-item">
                <price-list :product="items" />
            </div>
        </div>

    </div>
    <div class="container" v-else>
        <div class="row" id="row">
            <content-item v-for="(item, index) in items.data" :item="item" :key="index" />
        </div>
    </div>
</template>

<script>
import ContentItem from './ContentItem.vue'
import PriceList from './PriceList.vue'

export default {
    components: {
        ContentItem,
        PriceList
    },
    props: ['items'],
    created() {
        console.log('Items(main):', this.items)
    }

}
</script>

<style>
/* #row {
  margin-top: 300px;
} */
</style>
