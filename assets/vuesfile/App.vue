<template>
    <div class="">
        <Home/>
    </div>
</template>

<script>
    import Home from './components/Home'
    export default {
        name: "App",
        components : {
            Home : Home
        },
        data : () =>({
            counter : 0
        }),
        mounted() {

        }
    }
</script>

<style scoped>

</style>