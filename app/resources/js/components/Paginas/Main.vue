<template>
    <div>
        <h1>Vue Router Demo App</h1>

        <p>
            <router-link :to="{ name: 'home' }">Home</router-link> |
            <router-link :to="{ name: 'hello' }">Hello World</router-link>
        </p>

        <div class="container">
fsdfs dfsdf
        </div>
    </div>
</template>

<script>
    export default {
        name: "Main"
    }
</script>

<style scoped>

</style>