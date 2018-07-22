<template>
    <div class="col-sm-12 col-md-4 col-lg-3 d-flex row-eq-height">

        <div class="card mb-4 box-shadow d-flex-item">
            <div>
                <img class="card-img-top" :src="imgUrl" :alt="item.podtip_en" @error="setPlaceholderImgUrl">
            </div>
            <!-- <div v-else>
                <img class="card-img-top" :src="`images/no_photo.jpeg`" alt="No photo">
            </div> -->
            <div class="card-body">
                <a :href="route('show-product', {id: item.SIFRA_PROIZVODA})">
                    <p class="card-text">{{ item.ZIS_OZNAKA }}</p>
                </a>

            </div>
        </div>

    </div>
</template>

<script>
import axios from 'axios'

export default {
    props: ['item'],
    data() {
        return  {
            imgUrl: `images/products/${this.item.SIFRA_PROIZVODA}-01.jpg`
        }
    },
    created() {
        //this.getImgUrl(this.item.SIFRA_PROIZVODA)
    },
    computed: {

    },
    methods: {
        setPlaceholderImgUrl() {

                // axios.get(`images/products/${itemId}-01.jpg`)
                //     .then((res) => {
                //         console.log('then')
                //         if(res.statusText === 'OK')
                //         return true
                //     })
                //     .catch( err => {
                //         console.log('catch')
                //         return false
                //     })
            this.imgUrl = 'images/no_photo.jpeg'
        }
    }
}
</script>

<style>
</style>
