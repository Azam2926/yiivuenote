<template>
    <div id="main-layout">
        <navbar/>
        <router-view/>
    </div>
</template>

<script>
    import Navbar from "./Navbar";

    export default {
        name: "Main",
        components: {
            Navbar
        }
    }
</script>

<style>
    body {
        background-color: #202124 !important;
    }
</style>