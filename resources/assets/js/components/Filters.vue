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
                        <option value="duck">Duck</option>
                        <option value="fish">Fish</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="group" class="col-5 col-form-label">Group:</label>
                <div class="col-7">
                    <select id="group" name="group" class="custom-select" v-model="queryParams.group" @change="handleInput">
                        <option value="">All</option>
                        <option value="duck">Duck</option>
                        <option value="fish">Fish</option>
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
                        <option value="duck">Duck</option>
                        <option value="fish">Fish</option>
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
            <!-- <div class="form-group row">
            <div class="offset-4 col-8">
                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div> -->
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
            }
        }
    },
    methods: {
        handleInput(event) {
            console.log('input', event.target.value)
            console.log('param', this.queryParams)
            sessionStorage.setItem('queryParams', JSON.stringify(this.queryParams))
            if (route().current() == 'home') {
                console.log('We are at home.')
                document.querySelector('#catalog-link').click()
            }
            FilterService.getFilteredProducts(this.queryParams)
                .then(response => {
                    console.log(response)
                })

            //console.log('tip', typeof FilterService.getFilteredProducts)
        }
    },
    computed: {
        isRoundBore() {
            return this.queryParams.bore === 'round' || this.queryParams.bore === ''
        }
    }

}
</script>

<style>
form {
  margin: 0 auto !important;
}
</style>
