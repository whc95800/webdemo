<template>
  <Banner/>
  <Timeline/>
  <section class="reinfo_about">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-5">
          <div class="reinfo_img_box wow fadeInLeft">
            <img src="/static/images/about.png" class="img-fluid" alt=""/>
          </div>
        </div>
        <div class="col-lg-7">
          <div class="reinfo_content_box wow fadeInRight">
            <h3 data-aos="fade-right" :data-aos-duration="500">
              <i class="fa fa-thumbs-up"></i>
              当社ができること
            </h3>
            <p data-aos="fade-right" :data-aos-duration="500">
              カーボンニュートラルの実現のために、供給を制御する動きが、需要逼迫をまねき価格高騰の流れを作る中、コロナ禍からの経済再開により、石油需要増加による、発電コストも増加、電気代の高騰。
            </p>
            <p data-aos="fade-right" :data-aos-duration="500">
              2050年カーボンニュートラルZEROを目標に、燃料価格の上昇が伴い電気価格の上昇が見込め、電気が高額で、販売が行われると市場予想がされます。
            </p>
            <p data-aos="fade-right" :data-aos-duration="500">
              当社蓄電池は、気象データをもとに明日の太陽光発電量を予測します。
            </p>
            <p data-aos="fade-right" :data-aos-duration="500">
              天候が悪く発電量が少なく、電力が不足する場合は、電気代の安い深夜電力で充電いたします。これにより悪天候の日でも確実に電力のピークカットが可能となります。
            </p>
            <p :data-aos-duration="500" data-aos="fade-right">
              毎日の電力使用量と発電量をAIによる機械学習を行い、精度を高めていきます。
            </p>
            <p :data-aos-duration="500" data-aos="fade-right">
              お客様の電力使用状況はお客様ごとに大きく異なり、設置スペース、停電時対策のご要望、
            </p>
            <p :data-aos-duration="500" data-aos="fade-right">
              ご予算など様々なニーズにお応えする為に、お客様ごとの専用設計になってしまい高額になってしまいます。当社は、蓄電池、蓄電池パワコン、太陽光パワコン、停電用インバータをそれぞれパッケージ化して組み合わせや増設により、お客様ごとの要望を低コストでご提供いたします。
            </p>
            <div class="btn_center" data-aos="fade-right" :data-aos-duration="500">
              <router-link class="reinfo_btn" to="/about">もっと見る</router-link>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="reinfo_news">
    <div class="container text-center">
      <div class="row">
        <div class="col-lg-12" data-aos="fade-right" :data-aos-duration="500">
          <div class="section_title text-center">
            <h3>
              <i class="fa fa-bell icon-float"></i>
              お知らせ
            </h3>
            <h4>News</h4>
          </div>
        </div>
      </div>
      <div class="row" data-aos="fade-right" :data-aos-duration="500">
        <div id="news"
             class="col-lg-4 col-md-6 col-sm-12 news_list_item"
             v-for="(item, index) in newsList"
             :key="index"
        >
          <router-link :to="`/news/${item.id}`">
            <div class="grid_item wow fadeInUp">
              <div class="reinfo_img news_list_imggit">
                <img :src="item.img" class="img-fluid"/>
              </div>
              <div class="reinfo_info">
                <span class="date">{{ item.time }}</span>
                <h3 class="news_list_title">
                  <span>{{ item.title }}</span>
                </h3>
              </div>
            </div>
          </router-link>
        </div>
      </div>
      <br/>
      <router-link to="/news" class="reinfo_btn" data-aos="fade-right" :data-aos-duration="500">もっと見る</router-link>
    </div>
  </section>
  <section class="reinfo_cta">
    <div class="container">
      <div class="cta_wrapper">
        <div class="row align-items-center">
          <div class="col-lg-7">
            <div class="cta_content" data-aos="fade-right" :data-aos-duration="500">
              <h3>ご相談はこちらから</h3>
              <p>
                商品カタログ、注文に関する質問などご遠慮なく連絡してください。
              </p>
            </div>
          </div>
          <div class="col-lg-5" data-aos="fade-right" :data-aos-duration="500">
            <div class="button_box">
              <router-link to="/contact" class="reinfo_btn">お問合せ</router-link>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <Footer/>
</template>

<script>
import Banner from "@/components/Banner";
import Timeline from "@/components/Timeline";
import Footer from "@/components/Footer";
import {ref, onMounted} from "vue";

export default {
  name: 'Home',
  components: {
    Footer,
    Timeline,
    Banner
  },
  setup() {
    const newsList = ref([]);
    onMounted(() => {
    });
    return {newsList}
  }
}
</script>
