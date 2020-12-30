<template>
  <div class="home container">
      <cards />
  </div>
</template>

<script>
// @ is an alias to /src
import Cards from "../components/Cards";

export default {
  name: 'Home',
  components: {
    Cards
  }
}
</script>

<style>
  .home {
    margin-top: 20px;
  }
</style>