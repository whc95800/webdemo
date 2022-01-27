<template>
  <div class="battery-img-center">
    <div :data-aos-duration="500" data-aos="fade-right" class="first-img-pc">
      <img v-if="isMobie" src="/static/images/100k-4.png" style="width:50%"/>
      <img src="/static/images/100k-4.png" height="150" v-else/>
    </div>
    <h5 :data-aos-duration="500" data-aos="fade-right" class="series-normal">
      REI- AI storage battery System-100K
      <span :class="isMobie ? 'series-mobie': 'series-pc'">
            シリーズ
       </span>
    </h5>
    <p :data-aos-duration="500" data-aos="fade-right" class="word-series">
      REI- AI storage battery System-300K <br/>
      REI- AI storage battery System-400K
    </p>
    <div :data-aos-duration="500" data-aos="fade-right">
      <img src="/static/images/100k-5.png" style="width:100%" v-if="isMobie"/>
      <img src="/static/images/100k-5.png" height="90" v-else/>
    </div>
    <p :data-aos-duration="500" data-aos="fade-right" class="margin-top">
      お客様の用途に応じて組み合わせ、増設、増量が可能です。
    </p>
  </div>
</template>

<script>
export default {
  name: "battery-el",
  props: {
    isMobie: {
      type: Boolean
    }
  }
}
</script>
<style scoped>
.first-img-pc {
  margin-top: 210px
}

.margin-top {
  margin-top: 30px;
}

.series-mobie {
  font-size: 14px;
  background-color: #189a36;
  color: #fff;
  padding: 5px 5px;
}

.series-pc {
  font-size: 14px;
  background-color: #189a36;
  color: #fff;
  padding: 5px 5px;
  margin-left: 15px;
}

.word-series {
  padding-bottom: 30px;
  line-height: 30px;
}

.series-normal {
  padding: 20px 0;
  line-height: normal;
}
</style>
