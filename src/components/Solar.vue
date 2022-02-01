<template>

  <!-- Start reinfo_service section -->
  <section class="reinfo_service">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div :data-aos-duration="500" class="section_title text-center" data-aos="fade-right">
            <h3><i class="fa fa-sun icon-float"></i>
              太陽光発電</h3>
            <h4>Solar Power</h4>
          </div>
        </div>
      </div>
      <div class="row" style="height:400px">
      </div>
    </div>
  </section>
  <!-- End reinfo_service section -->
</template>

<script>
import {onMounted} from "vue";

export default {
  name: "Solar",
  setup() {
    onMounted(() => {
      document.title = '太陽光発電 - REイニシアチブ';
    })
  }
}
</script>

<style scoped>

</style>
