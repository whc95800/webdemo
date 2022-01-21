<template>
  <!-- Start reinfo_breadcrumb section -->
  <div v-if="!news.data" class="blank"></div>
  <section
      class="reinfo_breadcrumb bg_image"
      :style="{ 'background-image': `url(${news.data.img})` }"
      v-if="news.data"
  >
    <div class="white-mask"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="breadcrumb_content">
            <h3>{{ news.data.title }}</h3>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="banner-hidden">
    <div class="banner-background-01"></div>
    <div class="banner-background-02"></div>
  </div>
  <!-- End reinfo_breadcrumb section -->
  <!-- Start reinfo_single_blog section -->
  <section class="reinfo_single_blog section_padding" v-if="news.data">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="single_blog_wrapper" data-aos="fade-right" :data-aos-duration="500">
            <div class="post_content" v-html="news.data.content"></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End reinfo_single_blog section -->
</template>
<script>
import {onMounted, reactive, ref} from 'vue'
import {useRoute, useRouter} from 'vue-router'

export default {
  setup() {
    const route = useRoute()
    const router = useRouter()

    const news = reactive({
      data: null,
    })
    const loading = ref(false)
    const getNews = () => {
      loading.value = true
      $.ajax({
        type: 'GET',
        url: '/api/get_news.php',
        dataType: 'json',
        data: {
          id: route.params.id,
        },
        success: (res) => {
          console.log(res)
          news.data = res.news
          document.title = res.news.title
          loading.value = false
        },
      })
    }
    onMounted(() => {
      getNews()
    })
    return {news}
  },
}
</script>
<style lang=""></style>
