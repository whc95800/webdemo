<template>
  <!-- Start reinfo_breadcrumb section -->
  <BreadCrumb PageName="ニュース" ImageUrl="/static/images/breadcrumb_bg5.jpg"/>
  <!-- End reinfo_breadcrumb section -->
  <!-- Start reinfo_blog section -->
  <section class="blog_wrapper reinfo_blog blog_v1 section_padding all-page-padding">
    <div class="container">
      <div class="row" data-aos="fade-right" :data-aos-duration="500">
        <div class="col-lg-12">
          <div class="section_title text-center">
            <h3>
              <i aria-hidden="true" class="fa fa-bell icon-hidde_v1"></i>
              ニュース
            </h3>
            <h4><i aria-hidden="true" class="fa fa-bell icon-hidde icon-hidde"></i>News</h4>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12 news_list_item" v-for="(item,index) in newsList" :key="index"
             data-aos="fade-right" :data-aos-duration="500">
          <a :href="`/news/${item.id}`">
            <div class="grid_item wow fadeInUp">
              <div class="reinfo_img news_list_img">
                <img :src="item.img" class="img-fluid">
              </div>
              <div class="reinfo_info">
                <span class="date">{{ item.time }}</span>
                <h3 class="news_list_title"><span>{{ item.title }}</span></h3>
              </div>
            </div>
          </a>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="reinfo_pagination text-center" data-aos="fade-right" :data-aos-duration="500">
            <ul>
              <li class="prev" v-if="page>1"><a href="javascript:;" @click="prev">Prev</a></li>
              <li class="next" v-if="count/(pageSize*page)>1"><a href="javascript:;" @click="next">Next</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End reinfo_blog section -->
</template>

<script>
import {onMounted, ref} from "vue"
import BreadCrumb from "../components/BreadCrumb";

export default {
  name: "News",
  components: {BreadCrumb},
  setup() {
    const newsList = ref([])
    const page = ref(1)
    const pageSize = ref(10)
    const count = ref(0)
    let loading = ref(false)
    const getNewsList = () => {
      loading.value = true
      $.ajax({
        type: "GET",
        url: "/api/news.php",
        dataType: "json",
        data: {
          page: page.value
        },
        success: (res) => {
          console.log(res)
          newsList.value = res.list
          count.value = res.count
          loading.value = false
          console.log(newsList.value)
        }
      })
    }
    const prev = () => {
      if (!loading.value) {
        page.value--
        getNewsList()
      }
    }
    const next = () => {
      if (!loading.value) {
        page.value++
        getNewsList()
      }
    }
    onMounted(() => {
      getNewsList()
    })
    return {newsList, page, pageSize, count, prev, next}
  }
}
</script>

<style scoped>

</style>
