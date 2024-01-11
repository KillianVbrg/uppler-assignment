<template>
  <Header />
  <router-view/>
</template>

<script>
  import Header from "./components/Header"
export default {
  components: { Header },
  setup(){

  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}
body{
  margin: 0px;
  background: #F5F5F5;
}
</style>
