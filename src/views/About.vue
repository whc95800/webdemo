<template>
  <!-- Start reinfo_breadcrumb section -->
  <BreadCrumb ImageUrl="/static/images/breadcrumb_bg.jpg" PageName="会社概要"/>
  <!-- End reinfo_breadcrumb section -->

  <section class="introduce box-padding box-background1">
    <div class="container">
      <div class="row">
        <div class="col-lg-12" data-aos="fade-right" :data-aos-duration="500">
          <div class="section_title text-center">
            <h3>
              <i class="fa fa-lightbulb icon-float"></i>
              トピックス
            </h3>
            <h4>Topix</h4>
          </div>
        </div>
      </div>
      <div class="row align-items-center" data-aos="fade-right" :data-aos-duration="500">
        <div class="col-lg-12 col-md-12">
          <div class="text_box">
            <p>
              「REI- AI storage battery System」は、REイニシアチブのオリジナルブランドです。<br/>
              長年の研究技術をもとに、自由な発想で新製品を開発しました。<br/>
              新しいビジネススタイルをご提案します。<br/>
              2050年カーボンニュートラルZERO目標の達成に向けて、<br/>
              電力価格の上昇が見込まれます。<br/>
              FIT価格は年々下がり続ける中、FIPが始まり、<br/>
              蓄電の重要性が高まっています。<br/>
              再生可能エネルギーを有効に活用するために、<br/>
              REイニシアチブの蓄電システムをご提案します。<br/>
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="information box-padding box-background2">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section_title text-center" data-aos="fade-right" :data-aos-duration="500">
            <h3>
              <i class="fa fa-building icon-float"></i>
              企業情報
            </h3>
            <h4>Company</h4>
          </div>
        </div>
      </div>
      <div class="row align-items-center">
        <div class="col-lg-12 wow fadeInLeft">
          <div class="line" data-aos="fade-right" :data-aos-duration="500">
            <h4><i aria-hidden="true" class="fa fa-list-alt"></i>社名</h4>
            <p>{{ HomeInfo.CompanyName }}</p>
          </div>
          <div class="line" data-aos="fade-right" :data-aos-duration="500">
            <h4><i class="fa fa-user-circle" aria-hidden="true"></i>代表者</h4>
            <p>{{ HomeInfo.Representative }}</p>
          </div>
          <div class="line" data-aos="fade-right" :data-aos-duration="500">
            <h4><i class="fa fa-building" aria-hidden="true"></i>東京Office</h4>
            <p>
              〒{{ HomeInfo.PostCode }} {{ HomeInfo.Address }} {{ HomeInfo.Building }}<br/>TEL.
              <a :href="'tel:'+HomeInfo.Tel">{{ HomeInfo.Tel }}</a>
            </p>
          </div>
          <div class="line" data-aos="fade-right" :data-aos-duration="500">
            <h4><i class="fa fa-envelope-open" aria-hidden="true"></i>E-mail</h4>
            <p><a :href="'mailto:'+HomeInfo.Email">{{ HomeInfo.Email }}</a></p>
          </div>
          <div class="line" data-aos="fade-right" :data-aos-duration="500">
            <h4><i class="fa fa-jpy" aria-hidden="true"></i>資本</h4>
            <p>{{ HomeInfo.Capital }}万円</p>
          </div>
          <div class="line" data-aos="fade-right" :data-aos-duration="500">
            <h4><i class="fa fa-calendar-check-o" aria-hidden="true"></i>設立</h4>
            <p>{{ HomeInfo.CreateDate }}</p>
          </div>
          <div class="line" data-aos="fade-right" :data-aos-duration="500">
            <h4><i class="fa fa-users" aria-hidden="true"></i>役員</h4>
            <p>
              代表取締役&emsp;&emsp;原　　明緒<br/>
              取締役会長&emsp;&emsp;星野　光治<br/>
              常務取締役&emsp;&emsp;土居　清蔵
            </p>
          </div>
          <div class="line" data-aos="fade-right" :data-aos-duration="500">
            <h4><i class="fa fa-share-alt-square" aria-hidden="true"></i>事業内容</h4>
            <p>
              再生可能エネルギー事業<br/>
              環境負荷軽減推進事業
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="boss-message box-padding">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-5 col-md-6" data-aos="fade-right" :data-aos-duration="500">
          <div class="img_box">
            <img alt="" class="img-fluid" src="/static/images/boss.jpg"/>
          </div>
        </div>
        <div class="col-md-6 " data-aos="fade-right">
          <div class="wow fadeInRight">
            <h3 :data-aos-duration="500" data-aos="fade-right"><i aria-hidden="true"
                                                                  class="fa fa-pencil-square fa-1"></i>代表取締役メッセージ</h3>
            <p data-aos="fade-right" :data-aos-duration="500">
              生命溢れる豊かな母である地球、リーダー達はこの地球と人類と全ての生命を守る為に、2050年、二酸化炭素排出量の大幅削減を目指しての行動を開始しました。
            </p>
            <p data-aos="fade-right" :data-aos-duration="500">
              私たちは、未来の子ども達に、この青き美しい地球を守り続ける為に、
            </p>
            <p data-aos="fade-right" :data-aos-duration="500">
              ひとり、ひとりが、二酸化炭素削減のことを考え、自分が出来る事を行う。
            </p>
            <p :data-aos-duration="500" data-aos="fade-right">
              私もその、ひとり、になります。
            </p>
            <div class="award_box">
              <div class="award_info">
                <img alt="" class="sign-img" src="/static/images/sign.png">
                <h4>REInitiative Team</h4>
                <h5>Best Award {{ (new Date().getFullYear()) }}</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import BreadCrumb from "../components/BreadCrumb";
import {useStore} from "vuex";
import {onMounted} from "vue";

export default {
  name: "About",
  components: {BreadCrumb},
  setup() {
    const store = useStore()
    const HomeInfo = store.state.HomeInfo

    onMounted(() => {
      document.title = '会社概要 - REイニシアチブ';
    })

    return {HomeInfo}
  }
}
</script>
