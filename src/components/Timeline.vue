<template>
  <section class="timeline box-padding">
    <div class="container">
      <div :data-aos-duration="500" class="row" data-aos="fade-right">
        <div class="col-lg-12">
          <div class="section_title text-center">
            <h3>
              <i class="fa fa-american-sign-language-interpreting icon-float"></i>
              企業理念
            </h3>
            <h4>Company Philosophy</h4>
          </div>
        </div>
      </div>
      <div class="single_timeline" v-for="(item,index) in text" :key="index">
        <div :data-aos-duration="500" class="row align-items-center" data-aos="fade-right">
          <div class="col-lg-2 col-md-2 num-mid">
            <div class="icon text-center">
              <h3>{{ index + 1 }}</h3>
            </div>
          </div>
          <div class="time-line-text">
            <div class="col-lg-5 col-md-5" :class="{'c1':index%2 === 0}">
              <div class="info_box">
                <h4>{{ item.h4 }}</h4>
                <h5>{{ item.h5 }}</h5>
                <h6>{{ item.h6 }}</h6>
              </div>
            </div>
            <div class="col-lg-5 col-md-5" :class="{'c2':index%2 === 0}">
              <div class="text_box">
                <p v-html="item.p"/>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: "Timeline",
  setup() {
    const text = [
      {
        h4: "絶え間ない研究と経験に基づいて",
        h5: "リアルタイムな情報分析",
        h6: "お客さまへの継続的なサービスを提供します",
        p: " 私たちは<br/>自然エネルギーの普及に努め、自然環境を守り続けること。<br/>私たちに出来ることは<br/>自然エネルギーを求める人と共に、日本人の誠意と誠実をもって出来うる全てを行うこと。 より良い未来を求める心が、世界の全ての人と繋がり、希望に満ちた明日を創ることを 企業理念とします。"
      },
      {
        h4: "経営理念",
        h5: "未来のために",
        h6: "お客さまから信頼される企業をめざして",
        p: "経験豊富なスタッフと、常に向上し続けるためのチームワークを形成し、活力のある企業グループを目指します。経営理念に基づいた企業活動を行い、優れた商品開発と安定したサービスを提供し続け、社会に貢献出来ることを喜びとします。私たちREイニシアチブは、リニューアブルエナジーの発展を率先して行う企業です。"
      },
      {
        h4: "企業行動指針",
        h5: "誠意・誠実・安心",
        h6: "お客さまに信頼されるサービスと、優れた製品とコストパフォーマンスを提供します。",
        p: "理念に基づいた事業を行い、発展させていく中で、透明性を大切に、信頼される会社経営を行います。個人情報、会社情報等の情報を保護し、法令の遵守はもちろんのこと社会的倫理規範を尊重し、公正な企業活動を行うと共に、反社会的勢力との関係は一切持ちません。私たちREイニシアチブは優れた製品を厳正し、お客さまにご提案し続けます。"
      },
    ]

    return {text}
  }
}
</script>

<style scoped>

</style>
