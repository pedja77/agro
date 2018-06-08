<template>

    <div class="card card-default">
        <div class="card-header">Select Category</div>

        <div class="card-body">
            <a class="btn btn-primary" :href="route('home')">Click</a>
        </div>
    </div>

</template>

<script>
    export default {
        props: ['categories'],
        methods: {
            emit(event) {
                this.$emit('comp-clicked', event)
            }
        },
        mounted() {
            console.log('Component mounted.', this.categories)
        }
    }
</script>
