<template>
  <Banner/>
  <Timeline/>
</template>

<script>
import Banner from "@/components/Banner";
import Timeline from "@/components/Timeline";

export default {
  name: 'Home',
  components: {
    Timeline,
    Banner
  }
}
</script>
