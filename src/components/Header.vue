<template>
  <header class="header-area" id="nav">
    <div class="nav-body container">
      <div class="img-logo">
        <img src="../assets/logo.png" alt="" style="height: 100%">
      </div>
      <div class="nav-item">
        <ul class="main-menu">
          <li v-for="(item1,index1) in menuList" :key="index1">
            <router-link :to="{ path: `${item1.link}`}" active-class="active_link">
              {{ item1.mainMenu }}
              <ul class="sub-menu" v-show="item1.subMenu">
                <li v-show="item1.mainMenu === item2.mainMenu" v-for="(item2,index2) in subMenuList" :key="index2">
                  <router-link :to="{ path: `${item2.link}`}">{{ item2.subMenu }}</router-link>
                </li>
              </ul>
            </router-link>
          </li>
        </ul>
      </div>
      <div class="sp_menu" @click="menuClick();closeSub"><span :class="middleLine"></span></div>
    </div>
    <transition name="hidde-menu-transition">
      <div v-show="topBarIsShow" class="hidde-menu">
        <ul class="hidde-menu-main">
          <li v-for="(item1,index1) in menuList" :key="index1" class="hidde-menu-item"
              @click="item1.link !=='/service'?closeSub():openSub()">
            <router-link :to="{ path: `${item1.link}`}"
                         active-class="menu-item-link_active"
                         class="menu-item-link">
              {{ item1.mainMenu }}
            </router-link>
            <ul v-show="item1.subMenu" :class="hiddeSubMenu" @click="menuClick();openSub()">
              <li v-show="item1.mainMenu === item2.mainMenu" v-for="(item2,index2) in subMenuList" :key="index2">
                <router-link :to="{ path: `${item2.link}`}">{{ item2.subMenu }}</router-link>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </transition>
  </header>
</template>

<script>
import {ref, onMounted} from "vue";

export default {
  name: "Header",
  setup() {
    const menuList = [
      {mainMenu: "ホーム", subMenu: false, link: "/"},
      {mainMenu: "会社概要", subMenu: false, link: "/about"},
      {mainMenu: "事業内容", subMenu: true, link: "/service"},
      {mainMenu: "アクセス", subMenu: false, link: "/access"},
      {mainMenu: "お問い合わせ", subMenu: false, link: "/contact"},]

    const subMenuList = [
      {mainMenu: "事業内容", subMenu: "蓄電システム", link: "/service/battery"},
      {mainMenu: "事業内容", subMenu: "風力発電", link: "/service/wind"},
      {mainMenu: "事業内容", subMenu: "太陽光発電", link: "/service/solar"},]

    const middleLine = ref("middle-line-close")
    const topBarIsShow = ref(false)
    const showBanner = ref(true)
    const hiddeSubMenu = ref("hidde-sub-menu")

    function openSub() {
      if (hiddeSubMenu.value === "hidde-sub-menu") {
        hiddeSubMenu.value = "hidde-sub-menu open"
      } else {
        hiddeSubMenu.value = "hidde-sub-menu"
      }
    }

    function closeSub() {
      if (hiddeSubMenu.value === "hidde-sub-menu open") {
        hiddeSubMenu.value = "hidde-sub-menu"
      }
      menuClick();
    }

    function menuClick() {
      if (middleLine.value === "middle-line-close") {
        middleLine.value = "middle-line-close open"
      } else {
        middleLine.value = "middle-line-close"
      }
      topBarIsShow.value = !topBarIsShow.value
    }

    function hiddeSideBar() {
      if (topBarIsShow.value === true) {
        menuClick();
      }
    }

    function handleScroll() {
      let headerMain = document.getElementById('nav');
      if (window.pageYOffset > 10) {
        headerMain.classList.add('headerMain-bg');
      } else {
        headerMain.classList.remove('headerMain-bg')
      }
    }

    onMounted(() => {
      window.addEventListener('resize', hiddeSideBar)
      window.addEventListener('scroll', handleScroll)
    })

    return {menuList, subMenuList, middleLine, showBanner, topBarIsShow, hiddeSubMenu, menuClick, openSub, closeSub}
  }
}
</script>

<style lang="less">
/*メニューブロック*/
.sp_menu {
  display: none; /*PC端末の場合表示させない*/
  width: 50px; /*メニューブロックの幅*/
  height: 50px; /*メニューブロックの高さ*/
  float: right; /*右に回り込み*/
  margin: 5px 0; /*ブロックの上下にあける余白。上下のバランスをここで調整して下さい。*/
  z-index: 100;
}

/*メニューブロック構成*/
.middle-line-close { /*真中のライン*/
  display: block;
  width: 35px; /*ラインの幅*/
  height: 4px; /*ライン太さ*/
  top: 22px; /*メニューブロックの配置、上下の移動はここで調整してください*/
  border-radius: 4px;
  background-color: #011a3e; /*ラインの色*/
  position: relative;
  transition: all 0.5s ease; /*動画実行に必要の時間*/
  margin: auto; /*ラインをセンタリング*/
  z-index: 100;

  &::before { /*上のライン*/
    content: "";
    position: absolute;
    width: 35px;
    height: 4px;
    bottom: 14px;
    border-radius: 4px;
    background-color: #011a3e;
    transition: all 0.5s ease;
  }

  &::after { /*下のライン*/
    content: "";
    position: absolute;
    width: 35px;
    height: 4px;
    top: 14px;
    border-radius: 4px;
    background-color: #011a3e;
    transition: all 0.5s ease;
  }
}

.open {
  background-color: transparent; //中间的线变透明

  &::before {
    transform: translateY(14px) rotate(-45deg); //上方的线向下移动9并且逆时针旋转45°
  }

  &::after {
    transform: translateY(-14px) rotate(45deg); //下方的线向上移动9并且顺时针旋转45°
  }
}

.hidde-menu-transition {
  &-enter-from {
    transform: translateX(-100%); //整体划入之前隐藏在最左侧
  }

  &-enter-active {
    transition: all 0.4s ease-in; //划入过渡，用 0.5s
  }

  &-leave-to {
    transform: translateX(-100%); //整体划出之后隐藏在最左侧
  }

  &-leave-active {
    transition: all 0.4s ease-out; //划出过渡，用 0.5s
  }
}

.hidde-menu {
  position: fixed;
  left: 0;
  top: 0;
  width: 80%;
  height: 100%;
  background-color: #222d32;
  opacity: 0.9;
  user-select: none;
  z-index: 10;
  font-size: 20px;

  .hidde-menu-main {
    margin-top: 50px;
    color: rgba(214, 214, 215, 1);
    text-align: left;

    .hidde-menu-item {
      width: auto;
      padding: 0 30px;

      .menu-item-link {
        display: block;
        padding: 12px 15px;
        line-height: 40px;
        margin: auto;
        font-size: 16px;
        font-weight: 500;
        text-decoration: none;
        color: white;
        border-left: 3px solid transparent;
        transition: all 0.5s ease;
      }

      .menu-item-link:hover {
        border-left: 3px solid #eb9a01;
        color: #189a36;
        background-color: #1e282c;
      }

      .menu-item-link_active {
        border-left: 3px solid #eb9a01;
        color: #189a36;
        background-color: #1e282c;
      }

      .hidde-sub-menu {
        max-height: 0px;
        width: 100%;
        overflow: hidden;
        transition: all 0.5s ease;

        li {
          display: inline-block;
          width: 100%;
          margin: auto auto auto 2px;
          border-left: 3px solid transparent;
          background-color: #2c3b41;

          a {
            display: block;
            width: 100%;
            line-height: 50px;
            font-size: 16px;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.5s ease;
            padding: 0 13px;
            color: white;
          }
        }

        li:hover {
          border-left: 3px solid #eb9a01;

          a {
            color: #189a36;
          }
        }
      }

      .open {
        max-height: 200px;
      }

    }
  }
}


@media (max-width: 980px) {

  .sp_menu {
    display: block;
    margin: 0;
  }
}
</style>
