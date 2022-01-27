<template>
  <!-- Start reinfo_breadcrumb section -->
  <BreadCrumb PageName="事業内容" ImageUrl="/static/images/breadcrumb_bg3.jpg" :PageLink="pageLink" :SubName="pageSubName"/>
  <!-- End reinfo_breadcrumb section -->
  <router-view></router-view>
</template>

<script>
import BreadCrumb from "@/components/BreadCrumb";
import {ref, onMounted, watch} from "vue";
import {useRoute} from "vue-router";

export default {
  name: "Service",
  components: {BreadCrumb},
  setup() {
    const pageSubName = ref('');
    const route = useRoute();
    const pageLink = ref('/service');
    const nameList = {
      battery: '蓄電システム',
      wind: '風力発電',
      solar: '太陽光発電'
    };
    watch(
        () => route.meta.pathType,
        newPathType => {
          pageSubName.value = nameList[newPathType];
        }
    );
    onMounted(() => {
      pageSubName.value = nameList[route.meta.pathType];
    })
    return {pageSubName, pageLink}
  }
}
</script>

<style scoped>

</style>
