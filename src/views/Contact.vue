<template>
  <!-- Start reinfo_breadcrumb section -->
  <BreadCrumb PageName="お問い合わせ" ImageUrl="/static/images/breadcrumb_bg4.jpg" :PageLink="'/Contact'" :SubName="SubName"/>
  <!-- End reinfo_breadcrumb section -->
  <!-- Start reinfo_contact section -->
  <section class="reinfo_contact box-padding">
    <div class="container">
      <div class="row">
        <div class="section_title contact_form row col-lg-12 col-md-12 col-sm-12" data-aos="fade-right"
             :data-aos-duration="500">
          <h3 class="item_center_v1">
            <i class="fa fa-comments"></i>
            お問い合わせ
            <p>Contact</p>
          </h3>
          <div v-for="(item,index) in tabList" :id="'contactTab'+index" :key="index"
               :class="{ active: index === currentIndex }" :data-aos-duration="500"
               class="item_center_v2 col-lg-2 single_experience" data-aos="fade-right"
               @click="clickChange(item.name,index)">
            <div class="icon">
              <i :class="`${item.icon}`"></i>
            </div>
            <span>{{ item.key }}</span>
          </div>
        </div>
      </div>
      <component :is="currentTab" class="cantact_box_margin_top"></component>
    </div>
  </section>
  <!-- End reinfo_contact section -->
</template>

<script>
import {onMounted, ref} from "vue";
import MailFrom from "../components/MailFrom";
import Agency from "../components/Agency";
import Contractor from "../components/Contractor";
import BreadCrumb from "../components/BreadCrumb";

export default {
  name: "Contact",
  components: {MailFrom, Agency, Contractor, BreadCrumb},
  setup() {
    const tabList = [
      {name: 'MailFrom', key: 'お問い合わせ', icon: 'fas fa-envelope fa-3'},
      {name: 'Agency', key: '代理店', icon: 'fas fa-address-card fa-3'},
      {name: 'Contractor', key: '工事業者', icon: 'fas fa-users fa-3'}
    ]
    const currentTab = ref('MailFrom')
    const currentIndex = ref(0)
    const SubName = ref('')

    function clickChange(key, index) {
      currentTab.value = key;
      currentIndex.value = index;
      SubName.value = tabList[index].key;
      document.title = SubName.value + ' - REイニシアチブ';
    }

    onMounted(() => {
      document.title = 'お問い合わせ - REイニシアチブ';
    })

    return {currentTab, tabList, currentIndex, SubName, clickChange}
  },
}
</script>
