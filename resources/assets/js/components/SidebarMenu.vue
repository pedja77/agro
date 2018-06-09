<template>

    <div>

        <h4>Categories</h4>

        <ul class="list-group list-group-flush">
            <li class="list-group-item" v-for="(category, index) in Object.keys(categories)" :key="index">
                <button class="btn btn-link" @click="toggleSubCategories(index)">
                    <i class="fa" :class="visibleSubCategories.indexOf(index) > -1 ? 'fa-chevron-down' : 'fa-chevron-right'" aria-hidden="true"></i>
                </button>
                <a href="#">
                    {{ category }}
                </a>
                <span class="badge badge-pill badge-success">{{ categories[category].length }}</span>
                <div v-if="visibleSubCategories.indexOf(index) > -1">
                    <ul>
                        <li class="list-item" v-for="(subCategory, index) in categories[category]" :key="index">
                            <a href="#">{{ subCategory }}</a>
                        </li>
                    </ul>
                </div>
            </li>

        </ul>

    </div>

</template>

<script>
    export default {
        props: ['categories'],
        data() {
            return {
                visibleSubCategories: []
            }
        },
        methods: {
            toggleSubCategories(index) {
                if(this.visibleSubCategories.indexOf(index) > -1) {
                    this.visibleSubCategories.splice(this.visibleSubCategories.indexOf(index), 1)
                } else {
                    this.visibleSubCategories.push(index)
                }
            }
        },
    }
</script>
