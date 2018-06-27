<template>
    <div id="discounts" class="p-md-4 mb-4 mt-4">
        <div>
            <h4>{{ product.TIP_EN }} {{ product.ZIS_OZNAKA }}</h4>
            <!-- <h5>{{ product.PODTIP_EN }}</h5> -->
        </div>

        <table class="table table-sm">
            <thead>
                <tr>
                    <th scope="col">From pcs</th>
                    <th scope="col">Price* &euro;</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(discountItem, index) in discounts" :key="index">
                    <td>{{ discountItem.qty }}</td>
                    <td>{{ (product.CENA_EURO - product.CENA_EURO * parseFloat('0.' + discountItem.rate)).toFixed(2) }}</td>
                </tr>
            </tbody>
        </table>
        <p class="text-right">
            <small>* Excluding VAT</small>
        </p>
        <hr>

        <div>
            <form>
                <div class="d-flex justify-content-around">
                    <input type="number" class="form-control mx-sm-2 d-flex-item" id="qty" v-model="quantity" @input="calculatePrices" min="0">
                    <!-- <label class="" for="qty">Pcs</label> -->

                    <button type="submit" class="btn btn-outline-success mx-sm-2 d-flex-item">Add to cart</button>
                </div>

            </form>
        </div>

        <hr>
        <div v-if="hasQty">
            <p class="text-right">Price: {{ itemPrice }} &euro;</p>
            <p class="text-right">VAT: {{ vat }} &euro;</p>
            <p class="text-right">Your price: {{ total }} &euro;</p>
        </div>

    </div>
</template>

<script>
export default {
    props: ['product'],
    data() {
        return {
            discountString:  '',
            discounts: [],
            quantity: 0,
            itemPrice: 0,
            vat: 0,
            total: 0
        }
    },
    computed: {
        hasQty() {
            return this.quantity > 0
        }

    },
    methods: {
        parseDiscounts(discountString) {
            let temp = discountString.split(';')
            let discountRates = []
            temp.pop()
            for (let i = 0; i <= temp.length - 2; i += 2) {
                discountRates.push({
                    qty: parseInt(temp[i]),
                    rate: parseInt(temp[i + 1])
                })
            }

            return discountRates
        },
        getDiscountRate(quantity) {
            let q = parseInt(quantity)
            for (let i = this.discounts.length - 1; i >= 0; i--) {
                if ( q >= this.discounts[i].qty) {
                    return this.discounts[i].rate
                }
            }
            //return 0
        },
        calculatePrices() {
            // console.log('prices', typeof this.product.CENA_EURO)
            // return
            let discount = this.getDiscountRate(this.quantity)
            let price = parseFloat(this.product.CENA_EURO)
            this.itemPrice = (price - (price * parseFloat('0.' + discount))).toFixed(2)
            this.vat =(this.itemPrice * 0.2).toFixed(2)
            this.total = (parseFloat(this.itemPrice) + parseFloat(this.vat)).toFixed(2)
        }
    },
    created() {
        //this.discountString = '0;0;10;10;20;20;100;30;1000;40;'
        this.discounts = this.parseDiscounts('0;0;10;10;20;20;100;30;1000;40;')
    },
    mounted() {

        console.log('discounts' ,this.product)
    }

}
</script>

<style>
#discounts {
  background-color: #e9f1f7 !important;
}
/* input[type="number"] {
  width: 7rem !important;
} */
</style>
