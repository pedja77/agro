<template>
    <div class="col-sm-12 col-md-4 col-lg-3 d-flex row-eq-height">

        <div class="card mb-4 box-shadow d-flex-item">
            <div>
                <img class="card-img-top" :src="`images/products/${this.item.SIFRA_PROIZVODA}-01.jpg`" :alt="item.podtip_en" @error="setPlaceholderImgUrl" />
            </div>
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
    methods: {
        setPlaceholderImgUrl(e) {

           e.target.src = 'images/no_photo.jpeg'
        }
    }
}
</script>

<style>
</style>
