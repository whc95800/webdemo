<template>
  <section :style="SectionImageUrl" class="reinfo_breadcrumb bg_image  all-page-padding">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="breadcrumb_content">
            <h3 data-aos="fade-right" :data-aos-duration="500">{{ PageName }}</h3>
            <ul>
              <li :data-aos-duration="500" data-aos="fade-right">
                <i aria-hidden="true" class="fa fa-home fa-1"></i>
                <router-link to="/">ホーム</router-link>
              </li>
              <li data-aos="fade-right" :data-aos-duration="500">
                <template v-if="SubName!==''">
                  <router-link :to="PageLink" @click="$root.reload">{{ PageName }}</router-link>
                </template>
                <template v-else>
                  {{ PageName }}
                </template>
              </li>
              <li data-aos="fade-right" :data-aos-duration="500" v-if="SubName!==''">{{ SubName }}</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="banner-hidden">
    <div class="banner-background-01"></div>
    <div class="banner-background-02"></div>
  </div>
</template>

<script>
export default {
  name: "BreadCrumb",
  props: {
    PageName: {
      type: String,
      default: ''
    },
    PageLink: {
      type: String,
      default: ''
    },
    ImageUrl: {
      type: String,
      default: ''
    },
    SubName: {
      type: String,
      default: ''
    }
  },
  computed: {
    SectionImageUrl: function () {
      return 'background-image: url(' + this.ImageUrl + ');';
    }
  }
}
</script>
