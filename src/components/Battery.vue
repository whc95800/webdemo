<template>
  <section class="reinfo_service box-padding">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div :data-aos-duration="500" class="section_title text-center" data-aos="fade-right">
            <h3>
              <i class="fa fa-battery-full icon-float"></i>
              蓄電システム
            </h3>
            <h4 :data-aos-duration="500" data-aos="fade-right">
              Storage Battery System
            </h4>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--REI- AI storage battery System-->
  <section class="reinfo_about  box-padding">
    <div class="container">
      <div class="row align-items-center"
           style="background: url(/static/images/battery_9_big.png) no-repeat right center;background-size:auto 100%;">
        <div class="col-lg-6 ">
          <div class="wow fadeInLeft">
            <div class="battery-left-item">
              <div :data-aos-duration="500" class="battery-left-item-h5" data-aos="fade-right">
                <h5 class="fs19">
                  REI- AI storage battery System
                </h5>
              </div>
              <p :data-aos-duration="500" class="battery-left-item-p" data-aos="fade-right">
                お客様の多様なニーズに低コストでお応えできるよう、<br/>
                主要パーツをパッケージ化、<br/>
                選択・組合せが多様なリン酸鉄リチウム電池の産業用蓄電システムです。<br/>
              </p>
              <div :data-aos-duration="500" class="battery-left-item-box" data-aos="fade-right">
                <img src="/static/images/battery_10.png"/>
              </div>
              <div :data-aos-duration="500" class="battery-left-item-box_v1" data-aos="fade-right">
                <img src="/static/images/battery_13.png"/>
              </div>
              <div :data-aos-duration="500" class="battery-left-item-box_v2" data-aos="fade-right">
                <img src="/static/images/battery_12.png"/>
                <img src="/static/images/battery_11.png"/>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--REI- AI storage battery System-200K-->
  <section class="reinfo_about box-padding">
    <div class="container">
      <div class="row align-items-center">
        <!--Title-->
        <div class="col-lg-12">
          <div class="battery-left-item-h5">
            <h5 :data-aos-duration="500" class="fs19" data-aos="fade-right">
              REI- AI storage battery System-200K
            </h5>
          </div>
        </div>
        <!--Image-->
        <div class="col-lg-6">
          <div class=" align-center">
            <img class="img-200K" src="/static/images/200K.png"/>
          </div>
          <div :data-aos-duration="500" class="img-content" data-aos="fade-right">
            *内部イメージ
          </div>
        </div>
        <!--Table-->
        <div class="col-lg-6 subbox">
          <Table_el :columns="columns_200k" :titles="titles"/>
        </div>
      </div>
    </div>
  </section>

  <!--REI- AI storage battery System-100K-->
  <section class="reinfo_about battery_v1 box-padding">
    <div class="container">
      <div class="row align-items-center">
        <!--Title-->
        <div class="col-lg-12">
          <div class="battery-left-item-h5">
            <h5 :data-aos-duration="500" class="fs19" data-aos="fade-right">
              REI- AI storage battery System-100K
            </h5>
          </div>
        </div>
        <!--image-->
        <div class="col-lg-6 align-center">
          <img src="/static/images/100k_1.png" width="60%"/>
        </div>
        <div class="col-lg-6 align-center">
          <img src="/static/images/100k-2.png" width="80%"/>
          <img src="/static/images/100k-3.png" style="
                        position: absolute;
                        z-index: 9;
                        top: 60%;
                        left: 60%;
                        height: 50%;"/>
        </div>
        <!--mobile-->
        <div class="container time-line-text">
          <div class="col-lg-6 c1 ">
            <Battery_el/>
          </div>
          <div class="col-lg-6 subbox c2">
            <Table_el :columns="columns_100k" :titles="titles"/>
          </div>
        </div>

      </div>
    </div>
  </section>
  <!--PDF View-->
  <section class="reinfo_blog battery_v1 box-padding">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div :data-aos-duration="500" class="section_title text-center" data-aos="fade-right">
            <h3>
              <i aria-hidden="true" class="fa fa-file-text"></i>
              蓄電システムパンフレット
            </h3>
            <h4 :data-aos-duration="500" data-aos="fade-right">
              Storage Battery System Pamphlet
            </h4>
          </div>
        </div>
      </div>
      <!--PDF View-->
      <div :data-aos-duration="500" class="row align-items-center pdf-View" data-aos="fade-right">
        <iframe :src="src" frameborder="0" height="100%" width="100%"></iframe>
      </div>
    </div>
  </section>
  <!--メンテナンス体制-->
  <section class="reinfo_blog box-padding">
    <div class="container text-center">
      <div class="row">
        <div class="col-lg-12">
          <div class="text-center">
            <h3 data-aos="fade-right" style="margin-top:15px;" :data-aos-duration="500">
              <i aria-hidden="true" class="fa fa-tools"></i>
              REI-AI storage battery system 管理体制
            </h3>
            <h5 :data-aos-duration="500" data-aos="fade-right" style="margin-top:15px;">
              ANDPADシステムを利用し受注契約から施工・メンテナンスまでを一元管理
            </h5>
            <div style="width:100%;height:auto">
              <a href="https://lp.andpad.jp/" target="_blank" :data-aos-duration="500" data-aos="fade-right">
                <img :data-aos-duration="500" class="ap_logo" data-aos="fade-right"
                     src="/static/images/ap_logo_h.jpg"/>
              </a>
              <h6 :data-aos-duration="500" data-aos="fade-right" style="color:#7a808d;font-size:14px;line-height:30px;">
                営業から施工担当者まで必要な情報をだけを共有し、<br/>
                各部署がスムーズに対応できるよう安全確実な管理体制を整えております。
              </h6>
              <img :data-aos-duration="500" class="management-img" data-aos="fade-right"
                   src="/static/images/management.png"/>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>
</template>

<script>
import Table_el from "../components/Table";
import Battery_el from "../components/Battery100k";
import {ref} from "vue";

export default {
  name: "Battery",
  components: {Table_el, Battery_el},
  setup() {
    const viewerUrl = '/static/pdfVeiw/web/viewer.html'
    const fileUrl = '/static/pdf/battery-word.pdf'
    const src = ref(`${viewerUrl}?file=${encodeURIComponent(fileUrl)}&zoom=page-width`)
    const titles = ['項目', '内容', '備考'];
// REI- AI storage battery System-200K
    const columns_200k = [
      {item: '蓄電容量', text: '200kWh', memo: '（214kWh）'},
      {item: '寸法（㎜）', text: 'W:1450×D:1100×H:2200×２', memo: '2箱'},
      {item: '重　量', text: '2t＋1.8t　合計3.8t', memo: ''},
      {item: '系統PCS', text: '200V　50/60Hz　３相３線　60kW', memo: '出力制限　可'},
      {item: '停電時出力', text: '最大60kW　', memo: '自動切換　オプション'},
      {item: '太陽光MPPT', text: 'DC/DC　60kW', memo: '直流のまま充電'},
      {item: '動作温度', text: '-20～60℃', memo: 'エアコン'},
      {item: '表　示', text: '10インチタッチパネル', memo: ''},
      {item: 'AI学習', text: '有', memo: ''},
      {item: '太陽光発電予測', text: '有', memo: ''},
      {item: '設　置', text: '屋内・屋外', memo: '塩害塗装はオプション'},
      {item: '火災検知装置', text: '煙、温度、ガス検出', memo: ''},
      {item: '消火設備', text: 'ヘプタフルオロプロパン', memo: 'オプション'},
      {item: '他装置連携', text: 'ディーゼル発電', memo: 'オプション'},
      {item: 'サイクル数', text: '7300サイクル', memo: '-'},
      {item: 'DOD', text: '80%', memo: '-'}
    ];
// REI- AI storage battery System-100K
    const columns_100k = [
      {item: '蓄電容量', text: '100kWh', memo: '（107kWh）'},
      {item: '寸法（㎜）', text: 'W:1450×D:1100×H:2200', memo: ''},
      {item: '重　量', text: '2t', memo: ''},
      {item: '系統PCS', text: '200V　50/60Hz　３相３線　60kW', memo: '出力制限　可'},
      {item: '停電時出力', text: '最大60kW　', memo: '自動切換　オプション'},
      {item: '太陽光MPPT', text: 'DC/DC　60kW', memo: 'オプション'},
      {item: '動作温度', text: '-20～60℃', memo: 'エアコン'},
      {item: '表　示', text: '10インチタッチパネル', memo: ''},
      {item: 'AI学習', text: '有', memo: ''},
      {item: '太陽光発電予測', text: '有', memo: 'オプション '},
      {item: '設　置', text: '屋内・屋外', memo: '塩害塗装はオプション'},
      {item: '火災検知装置', text: '煙、温度、ガス検出', memo: ''},
      {item: '消火設備', text: 'ヘプタフルオロプロパン', memo: 'オプション'},
      {item: '他装置連携', text: 'ディーゼル発電', memo: 'オプション'},
      {item: 'サイクル数', text: '7300サイクル', memo: '-'},
      {item: 'DOD', text: '80%', memo: '-'}
    ];


    return {viewerUrl, fileUrl, titles, columns_100k, columns_200k, src}

  },
}
</script>
