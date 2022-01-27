<template>
  <!-- Start reinfo_breadcrumb section -->
  <BreadCrumb PageName="アクセス" ImageUrl="/static/images/breadcrumb_bg2.jpg"/>
  <!-- End reinfo_breadcrumb section -->

  <!-- Start reinfo_achivement section -->
  <section class="reinfo_achivement_V2 section_top box-padding">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-12  wow fadeInLeft access">
          <div class="reinfo_content_box access text-center  box-padding">
            <h3><i aria-hidden="true" class="fa fa-compass fa-1 icon-float"></i>アクセス</h3>
            <h4 class="map-marker">Access
            </h4>
          </div>
          <div class="reinfo_content_box">
            <h4 data-aos="fade-right" :data-aos-duration="500"><i class="fas fa-map-marker-alt"
                                                                  style="padding-right: 10px;color: #189a36;"></i>所在地
            </h4>
            <p :data-aos-duration="500" class="access_margin_v1" data-aos="fade-right">
              東京Office<br/>〒{{ HomeInfo.PostCode }} {{ HomeInfo.Address }} {{ HomeInfo.Building }}</p>
            <h4><i class="fa fa-car fa-1" data-aos="fade-right" :data-aos-duration="500"></i>アクセス方法</h4>
            <div>
              <p class="access_margin_v2" data-aos="fade-right" :data-aos-duration="500"><i
                  class="fa fa-subway i-color"></i>電車の場合<br>
                浜松町駅南口より　世界貿易センタービルディング南館通路経由　徒歩1分<br>
                …… ……<a class="hide-line"> …… …… ……</a> 浜松町乗り入れ路線 …… ……<a class="hide-line"> …… …… ……</a><br>
                JR山手線<br>
                JR京浜東北線<br>
                東京モノレール <br>
                ……<a class="hide-line"> …… …… ……</a> 浜松駅から主要駅へのアクセス ……<a class="hide-line"> …… …… ……</a><br>
                「東京」駅へ6分（JR山手線利用）<br>
                「羽田空港国際線ビル」駅へ13分（東京モノレール利用）<br>
                「羽田空港第2ビル」駅へ19分（東京モノレール利用）<br>
              </p>
              <p class="access_margin_v1 line" data-aos="fade-right" :data-aos-duration="500"><i
                  class="fa fa-car i-color" aria-hidden="true"></i>自動車の場合<br>
                …… …… …… ………… …… …… ………… <a class="hide-line"> …… …… …… …… ……</a><br>
                首都都心環状線　芝公園内回り出口　6分<br>
                駐車場はございませんので近隣の有料駐車場にとめてください。
              </p>
            </div>
            <h4><i class="fa fa-phone-square fa-1"></i>連絡先</h4>
            <p class="access_margin_v1">東京Office<br/>TEL. <a :href="'tel:'+HomeInfo.Tel">{{ HomeInfo.Tel }}</a></p>
          </div>
        </div>
        <div class="col-lg-12 text-center">
          <div class="reinfo_content_box access" data-aos="fade-right" :data-aos-duration="500">
            <h3><i aria-hidden="true" class="fa fa-map-marker-alt fa-1 icon-float"></i>{{ HomeInfo.CompanyName }}の所在地
            </h3>
            <h4 class="map-marker access_margin_v1">Map</h4>
          </div>
          <iframe id="map" allowfullscreen=""
                  class="map_size" loading="lazy"
                  data-aos="fade-right" :data-aos-duration="500"
                  :src="HomeInfo.MapUrl"></iframe>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import BreadCrumb from "../components/BreadCrumb";
import {useStore} from "vuex";

export default {
  name: "Access",
  components: {BreadCrumb},
  setup() {
    const store = useStore()
    const HomeInfo = store.state.HomeInfo

    return {HomeInfo}
  }
}
</script>

<style scoped>
.i-color {
  color: #7a808d;
}
</style>
