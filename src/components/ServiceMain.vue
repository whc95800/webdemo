<template>
  <section class="category box-padding">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section_title text-center" data-aos="fade-right" :data-aos-duration="500">
            <h3>
              <i class="fa fa-leaf icon-float"></i>
              サービス内容
            </h3>
            <h4>Service</h4>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="category-box">
            <div class="icon" data-aos="fade-right" :data-aos-duration="500">
              <img src="/static/images/icon_4.png" class="img-fluid" alt="">
            </div>
            <div class="title" data-aos="fade-right" :data-aos-duration="500">
              <h3>蓄電システム</h3>
            </div>
            <div class="list" data-aos="fade-right" :data-aos-duration="500">
              <ul>
                <li class="service_li">
                  不安定な自然エネルギーを効率よく利用する為に、蓄電システムは不可欠な存在です。蓄電システムに求められるものは、コスト・安全性・耐久性です。求められる全てを満足できるレベルで達成した、REイニシアチブの産業用蓄電システムは、当社独自のAIを搭載し、最適なシステムで運用最大限のコストパフォーマンスを実現します。蓄電池容量は最大１MWまで拡張でき、産業用蓄電システムの構築に最適です。
                </li>
              </ul>
            </div>
            <div class="button_box" data-aos="fade-right" :data-aos-duration="500">
              <router-link to="/service/Battery" class="all-btn">もっと見る</router-link>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="category-box">
            <div class="icon" data-aos="fade-right" :data-aos-duration="500">
              <img alt="" class="img-fluid" src="/static/images/icon_5.png">
            </div>
            <div class="title" data-aos="fade-right" :data-aos-duration="500">
              <h3>風力発電</h3>
            </div>
            <div class="list" data-aos="fade-right" :data-aos-duration="500">
              <ul>
                <li class="service_li">
                  風力発電は世界で最も活用されている自然エネルギーです。我が国では、一定の安定風速が得られる沿岸部に設置されていますが、今後は洋上や山の尾根など、より風速が得られ、また環境にも配慮した設置方法が求められています。REイニシアチブでは、パフォーマンスに優れ、環境にやさしい風力発電機の研究を行い、日本の自然環境に適した風力発電機の設置をご提案します。
                </li>
              </ul>
            </div>
            <div class="button_box" data-aos="fade-right" :data-aos-duration="500">
              <router-link to="/service/Wind" class="all-btn">もっと見る</router-link>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="category-box">
            <div class="icon" data-aos="fade-right" :data-aos-duration="500">
              <img alt="" class="img-fluid" src="/static/images/icon_6.png">
            </div>
            <div class="title" data-aos="fade-right" :data-aos-duration="500">
              <h3>太陽光発電</h3>
            </div>
            <div class="list" data-aos="fade-right" :data-aos-duration="500">
              <ul>
                <li class="service_li">
                  海外製品が主流となった太陽光発電ですが、日本の研究と技術開発によって生まれた自然エネルギーです。太陽光で発電を行い、海外生産により現在ではコストパフォーマンスに優れた再生可能エネルギーとして活用されています。昼間の発電に限り、雨天や積雪では発電出来ない為、需要と供給に差異が生じます。REイニシアチブの蓄電システムと組み合わせることにより、安定した自然エネルギーの供給が可能となります。
                </li>
              </ul>
            </div>
            <div class="button_box" data-aos="fade-right" :data-aos-duration="500">
              <router-link to="/service/Solar" class="all-btn">もっと見る</router-link>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: "ServiceMain"
}
</script>

<style scoped>

</style>
