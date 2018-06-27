<template>
    <div class="col-sm-12 col-md-4 col-lg-3 d-flex row-eq-height">

        <div class="card mb-4 box-shadow d-flex-item">
            <img class="card-img-top" :src="`images/products/${item.SIFRA_PROIZVODA}-01.jpg`" alt="Card image cap">
            <div class="card-body">
                <a :href="route('show-product', {id: item.SIFRA_PROIZVODA})">
                    <p class="card-text">{{ item.ZIS_OZNAKA }}</p>
                </a>

            </div>
        </div>

    </div>
</template>

<script>
export default {
    props: ['item'],
    created() {
        console.log('item', this.item)
    }
}
</script>

<style>
</style>
