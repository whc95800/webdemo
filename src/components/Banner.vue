<template>
  <div class="m-banner-wrap" v-if="bannerData.length">
    <div class="m-banner-list">
      <div
          class="u-banner-item fade"
          v-for="(item, index) in bannerData"
          :key="index"
          v-show="index===activeIndex"
          :style="`background: url(${item.src})  no-repeat; background-position:center; background-size:${animation}; transition: all ${animationSpeed} linear;`"
          @mouseover="onOver()" @mouseout="onOut()">
        <div class="banner_content_text">
          <h1 class="banner_content_h1"><span>{{ item.text_h1 }}</span></h1>
          <p class="banner_content_p">{{ item.text_p }}</p>
          <router-link :to="item.link" class="all-btn">お問い合わせ</router-link>
        </div>
      </div>
    </div>
    <div class="m-dot-list" v-if="bannerData.length > 1">
      <div v-for="(item, index) in bannerData" :key="index" :class="['u-dot-item', {active: index===activeIndex}]"
           @click="onEnter(index)" @mouseleave="onLeave">
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Banner',
  data() {
    return {
      bannerData: [
        {
          link: '/contact',
          src: '/static/images/banner_1.jpg',
          text_h1: '蓄電システム',
          text_p: '不安定な自然エネルギーを効率よく利用する為に、蓄電システムは不可欠な存在です。蓄電システムに求められるものは、コスト・安全性・耐久性です。求められる全てを満足できるレベルで達成した、REイニシアチブの産業用蓄電システムは、当社独自のAIを搭載し、最適なシステムで運用最大限のコストパフォーマンスを実現します。蓄電池容量は最大１MWまで拡張でき、産業用蓄電システムの構築に最適です。'
        },
        {
          link: '/contact',
          src: '/static/images/banner_2.jpg',
          text_h1: '風力発電',
          text_p: '風力発電は世界で最も活用されている自然エネルギーです。我が国では、一定の安定風速が得られる沿岸部に設置されていますが、今後は洋上や山の尾根など、より風速が得られ、また環境にも配慮した設置方法が求められています。REイニシアチブでは、パフォーマンスに優れ、環境にやさしい風力発電機の研究を行い、日本の自然環境に適した風力発電機の設置をご提案します。'

        },
        {
          link: '/contact',
          src: '/static/images/banner_3.jpg',
          text_h1: '太陽光発電',
          text_p: '海外製品が主流となった太陽光発電ですが、日本の研究と技術開発によって生まれた自然エネルギーです。太陽光で発電を行い、海外生産により現在ではコストパフォーマンスに優れた再生可能エネルギーとして活用されています。昼間の発電に限り、雨天や積雪では発電出来ない為、需要と供給に差異が生じます。REイニシアチブの蓄電システムと組み合わせることにより、安定した自然エネルギーの供給が可能となります。'
        }
      ],
      animation: "auto 100%",
      animationSpeed: "6s",
      interval: 4000,
      activeIndex: 0,
      timer: null,
    }
  },
  mounted() {
    setTimeout(() => {
      this.startSlider()
    }, 100)
  },
  methods: {
    onOver() {
      clearInterval(this.timer)
    },
    onOut() {
      this.startSlider()
    },
    onEnter(index) {
      this.activeIndex = index
      clearInterval(this.timer)
      this.enlarge()
    },
    onLeave() {
      this.startSlider()
    },
    enlarge() {
      this.animation = "auto 100%"
      setTimeout(() => {
        this.animation = "auto 110%"
      }, 100);
    },
    startSlider() {
      clearInterval(this.timer)
      if (this.bannerData.length > 1) {
        this.animation = "auto 110%"
        this.timer = setInterval(this.onMove, this.interval)
      }
    },

    onMove() {
      if (this.activeIndex === this.bannerData.length - 1) {
        this.activeIndex = 0
      } else {
        this.activeIndex++
      }
      this.enlarge()
    }
  },
  beforeDestroy() {
    clearInterval(this.timer)
    this.timer = null
  }
}
</script>
<style lang="less" scoped>
@mainColor: #009438;
.m-banner-wrap {
  margin: 0 auto;
  padding-bottom: 20px;
  position: relative;

  .m-banner-list {
    height: auto;
    overflow: hidden;

    .u-banner-item {
      height: 720px;
      text-align: center;
      display: flex;
      align-items: center;

      .banner_content_text {
        margin: auto;
        z-index: 2;
        max-width: 75%;
        color: white;
        text-shadow: #1e1e1e 1px 0 10px;

        .banner_content_h1 {
          margin-bottom: 20px;
          color: white;
        }

        .banner_content_p {
          padding-bottom: 40px;
          margin-bottom: 20px;
        }
      }
    }

    .active {
      transform: scale(1.4);
    }

    .fade {
      opacity: 1;
      animation: fade 1s ease-in-out; // 切换banner时的过渡效果
    }

    @keyframes fade {
      0% {
        opacity: 0;
      }
      5% {
        opacity: 0.05;
      }
      10% {
        opacity: 0.1;
      }
      20% {
        opacity: 0.2;
      }
      35% {
        opacity: 0.35;
      }
      50% {
        opacity: 0.5;
      }
      65% {
        opacity: 0.65;
      }
      80% {
        opacity: 0.8;
      }
      90% {
        opacity: 0.9;
      }
      95% {
        opacity: 0.95;
      }
      100% {
        opacity: 1;
      }
    }
  }

  .m-dot-list {
    padding-top: 30px;
    margin: auto;
    text-align: center;

    .u-dot-item { // 圆点样式
      display: inline-block;
      width: 12px;
      height: 12px;
      margin: 0 6px;
      background: grey;
      cursor: pointer;
      border: 1px solid gray;
      border-radius: 50%;
      opacity: 0.8;
    }

    .active { // 圆点选中样式
      background: @mainColor;
      border: 1px solid @mainColor;
      border-radius: 12px;
      opacity: 1;
    }
  }
}

</style>
