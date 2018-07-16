<template>
    <div>
        <h4>Filter Products</h4>
        <form>
            <div class="form-group row">
                <label for="bore" class="col-5 col-form-label">Bore shape</label>
                <div class="col-7">
                    <select id="bore" name="bore" class="custom-select" v-model="queryParams.bore" @change="handleInput">
                        <option value="">All</option>
                        <option value="round">Round</option>
                        <option value="square">Square</option>
                        <option value="hex">Hexagonal</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="type" class="col-5 col-form-label">Type</label>
                <div class="col-7">
                    <select id="type" name="type" class="custom-select" v-model="queryParams.type" @change="handleInput">
                        <option value="">All</option>
                        <option v-for="(type, index) in productTypes" :key="index" :value="type">{{ type }}</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="group" class="col-5 col-form-label">Group:</label>
                <div class="col-7">
                    <select id="group" name="group" class="custom-select" v-model="queryParams.group" @change="handleInput">
                        <option value="">All</option>
                        <option v-for="(group, index) in productGroups" :key="index" :value="group">{{ group }}</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="d" class="col-5 col-form-label">Inner diameter:</label>
                <div class="col-7" v-if="isRoundBore">
                    <input id="d" name="d" placeholder="Inner diameter" type="number" class="form-control here" step="0.01" min="0" v-model="queryParams.innerDiameter" @input="handleInput">
                </div>
                <div class="col-7" v-else>
                    <select id="d" name="d" class="custom-select" v-model="queryParams.innerDiameter" @change="handleInput">
                        <option value="">All</option>
                        <option v-for="(diameter, key) in queryParams.bore == 'hex' ? boreDiameters.hex : boreDiameters.square" :key="key" :value="diameter">{{ diameter }}</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="D" class="col-5 col-form-label">Outer diameter:</label>
                <div class="col-7">
                    <input id="D" :disabled="!isRoundBore" name="D" placeholder="Outer diameter" type="number" class="form-control here" step="0.01" min="0" v-model="queryParams.outerDiameter" @input="handleInput">
                </div>
            </div>
            <div class="form-group row">
                <label for="length" class="col-5 col-form-label">Length:</label>
                <div class="col-7">
                    <input id="length" :disabled="!isRoundBore" name="length" placeholder="Length" type="number" class="form-control here" step="0.01" min="0" v-model="queryParams.length" @input="handleInput">
                </div>
            </div>
            <div class="form-group row">
                <div class=" col-8">
                    <button name="reset" type="reset" class="btn btn-outline-success mx-sm-2 d-flex-item" @click="resetForm">Reset</button>
                </div>
            </div>
        </form>
        <a :href="route('catalog')" id="catalog-link"></a>
    </div>
</template>

<script>
import { FilterService } from '../services/FilterService.js'

export default {
    params: ['selectOptions'],
    data() {
        return {
            queryParams: {
                bore: '',
                group: '',
                type: '',
                innerDiameter: '',
                outerDiameter: '',
                length: ''
            },
            productTypes: [],
            productGroups: [],
            boreDiameters: {}
        }
    },
    methods: {
        handleInput(event) {
            console.log('input', event.target.value)
            console.log('param', this.queryParams)

            if (route().current() != 'catalog') {
                /*
                * If the current page is home, persist form in session storage and go to catalog page
                */
                console.log('We are at home.')
                sessionStorage.setItem('queryParams', JSON.stringify(this.queryParams))
                document.querySelector('#catalog-link').click()
            }

            this.$emit('filter-input', this.queryParams)
            // FilterService.getFilteredProducts(this.queryParams)
            //     .then(response => {
            //         console.log(response)
            //     })

            //console.log('tip', typeof FilterService.getFilteredProducts)
        },
        resetForm() {
            this.queryParams = {
                bore: '',
                group: '',
                type: '',
                innerDiameter: '',
                outerDiameter: '',
                length: ''
            }
            this.$emit('filter-input', this.queryParams)
        }
    },
    computed: {
        isRoundBore() {
            return this.queryParams.bore === 'round' || this.queryParams.bore === ''
        }
    },
    created() {
        if (sessionStorage.getItem('queryParams')) {
            /*
            * If queryParams exists in session storage, restore the state of the filters and fire up event to request
            * new data from server
            */
            this.queryParams = JSON.parse(sessionStorage.getItem('queryParams'))
            sessionStorage.removeItem('queryParams')
            this.$emit('filter-input', this.queryParams)
        }

        if (sessionStorage.getItem('productTypes')) {
            this.productTypes = JSON.parse(sessionStorage.getItem('productTypes'))
        } else {
            FilterService.getTypes()
                .then(response => {
                    this.productTypes = response.data.types
                    sessionStorage.setItem('productTypes', JSON.stringify(this.productTypes))
                })
        }

        if (sessionStorage.getItem('productGroups')) {
            this.productGroups = JSON.parse(sessionStorage.getItem('productGroups'))
        } else {
            FilterService.getGroups()
                .then(response => {
                    this.productGroups = response.data.groups
                    sessionStorage.setItem('productGroups', JSON.stringify(this.productGroups))
                })
        }

        if (sessionStorage.getItem('boreDiameters')) {
            this.boreDiameters = JSON.parse(sessionStorage.getItem('boreDiameters'))
        } else {
            FilterService.getBoreDiameters()
                .then(response => {
                    //console.log(response)
                    this.boreDiameters = response.data
                    sessionStorage.setItem('boreDiameters', JSON.stringify(this.boreDiameters))
                })
        }

    }

}
</script>

<style>
form {
  margin: 0 auto !important;
}
</style>
