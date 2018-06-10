<template>
    <div class="col-sm-12 col-md-4 col-lg-3">
        <div class="card mb-4 box-shadow">
            <img class="card-img-top" src="http://via.placeholder.com/350" alt="Card image cap">
            <div class="card-body">
                <p class="card-text">{{ item.name ? item.name : 'some item' }}</p>

            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['item']

}
</script>

<style>
</style>
