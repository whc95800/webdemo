<template>
  <Header/>
  <router-view v-if="isRouterAlive"/>
  <Footer/>
</template>
<script>
import Header from "@/components/Header";
import Footer from "@/components/Footer";
import {nextTick, ref, provide} from "vue";

export default {
  components: {Footer, Header},
  setup() {
    const isRouterAlive = ref(true)

    function reload() {
      isRouterAlive.value = false
      nextTick(function () {
        isRouterAlive.value = true
      })
    }

    provide('reload', reload)
    return {reload, isRouterAlive}
  },
}
</script>


