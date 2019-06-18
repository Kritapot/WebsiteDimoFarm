<template>
    <span id="blog-sidebar">
        <div class="span4">
            <aside class="right-sidebar">
              <div class="widget">
                <form class="form-search">
                  <input placeholder="Type something" type="text" class="input-medium search-query">
                  <button type="submit" class="btn btn-square btn-theme">ค้นหา</button>
                </form>
              </div>
              <div class="widget">
                <h5 class="widgetheading">ประเภทบทความ</h5>
                <ul class="cat">
                  <li v-for="category in allCategoryToSideBar">
                    <i class="icon-angle-right"></i>
                    <a href="#">{{ category.cat_name }}</a>
                  </li>
                </ul>
              </div>
              <div class="widget">
                <h5 class="widgetheading">โพสล่าสุด</h5>
                <ul class="recent">
                  <li v-for="(blogPost, index) in getAllBlogPost" v-if="index<3">
                    <img :src="`uploadimage/${blogPost.photo}`" alt="" width="40" height="80" />
                    <h6>
                      <router-link :to="`/blogpost/${blogPost.id}`">{{ blogPost.title }}</router-link>
                    </h6>
                    <p>
                      {{ blogPost.description | sortlength(40,'....') }}
                    </p>
                  </li>
                </ul>
              </div>
            </aside>
          </div>
    </span>
</template>

<script>
export default {
    name: "BlogSideBar",

    mounted() {
      this.$store.dispatch('allCategorySideBar')
      this.$store.dispatch('allBlogPost')

    },

    computed: {
      allCategoryToSideBar() {
        return this.$store.getters.getCategorySideBar
      },

      getAllBlogPost() {
            return this.$store.getters.getBlogPost
      },
    },

    methods: {
      
    },
}
</script>

<style scoped>

</style>

