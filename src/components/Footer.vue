<template>
  <footer class="reinfo_footer ">
    <div class="widget_wrapper">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-12">
            <div class="widget widegt_about">
              <div class="widget_title">
                <router-link to="/" data-aos="fade-right" :data-aos-duration="500"><img alt=""
                                                                                        class="img-fluid footerlogo"
                                                                                        src="/static/images/footer_logo.png">
                </router-link>
              </div>
              <p data-aos="fade-right" :data-aos-duration="500">
                REイニシアチブ株式会社は蓄電システム、風力発電、太陽光発電を通じ地球環境に貢献する会社です。
              </p>
              <ul class="social" data-aos="fade-right" :data-aos-duration="500">
                <li>
                  <router-link to="#"><i class="fab fa-facebook-f"></i></router-link>
                </li>
                <li>
                  <router-link to="#"><i class="fab fa-twitter"></i></router-link>
                </li>
                <li>
                  <router-link to="#"><i class="fab fa-instagram"></i></router-link>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12 footer-box">
            <div class="widget widget_link">
              <div class="widget_title" data-aos="fade-right" :data-aos-duration="500">
                <h4>リンク</h4>
              </div>
              <ul>
                <li data-aos="fade-right" :data-aos-duration="500">
                  <router-link to="/about">会社概要</router-link>
                </li>
                <li data-aos="fade-right" :data-aos-duration="500">
                  <router-link to="/service">事業内容</router-link>
                </li>
                <li data-aos="fade-right" :data-aos-duration="500">
                  <router-link to="/access">アクセス</router-link>
                </li>
                <li data-aos="fade-right" :data-aos-duration="500">
                  <router-link to="/contact">お問い合わせ</router-link>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12 footer-box">
            <div class="widget widget_contact">
              <div class="widget_title" data-aos="fade-right" :data-aos-duration="500">
                <h4 style="padding-left: 0">お問い合わせ</h4>
              </div>
              <div class="contact_info">
                <div class="single_info" data-aos="fade-right" :data-aos-duration="500">
                  <div class="icon">
                    <i class="fas fa-phone-alt fa-1-5"></i>
                  </div>
                  <div class="info">
                    <p>TEL: <a :href="'tel:'+HomeInfo.Tel">{{ HomeInfo.Tel }}</a></p>
                  </div>
                </div>
                <div class="single_info" data-aos="fade-right" :data-aos-duration="500">
                  <div class="icon">
                    <i class="fas fa-envelope fa-1-5"></i>
                  </div>
                  <div class="info">
                    <p>E-mail: <a :href="'mailto:'+HomeInfo.Email">{{ HomeInfo.Email }}</a></p>
                  </div>
                </div>
                <div class="single_info" data-aos="fade-right" :data-aos-duration="500">
                  <div class="icon">
                    <i class="fas fa-map-marker-alt fa-1-5  icon-style"></i>
                  </div>
                  <div>
                    <p>〒{{ HomeInfo.PostCode }} 東京Office</p>
                    <p>{{ HomeInfo.Address }}</p>
                    <p>{{ HomeInfo.Building }}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="copyright_area">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="copyright_text">
              <p data-aos="fade-right" :data-aos-duration="500">Copyright &copy;
                {{ (new Date().getFullYear()) }}
                RE Initiative Co., Ltd. All rights reserved.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div>
      <el-backtop></el-backtop>
    </div>
  </footer>
</template>

<script>
import {ref} from "vue";
import {useStore} from "vuex";

export default {
  name: "Footer",
  setup() {
    const showItems = ref(true)
    const store = useStore()
    const HomeInfo = store.state.HomeInfo

    return {showItems, HomeInfo}
  }
}
</script>

<style scoped>

</style>
