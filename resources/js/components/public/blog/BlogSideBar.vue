<template>
    <span id="blog-sidebar">
        <div class="span4">
            <aside class="right-sidebar">
              <div class="widget">
                <form class="form-search">
                  <input @keyup="RealSearch" v-model="keyword" placeholder="ค้นหาข้อมุล" type="text" class="input-medium search-query">
                  <button @click.prevent="RealSearch" type="submit" class="btn btn-square btn-theme">ค้นหา</button>
                </form>
              </div>
              <div class="widget">
                <h5 class="widgetheading">โพสล่าสุด</h5>
                <ul class="recent">
                  <li v-for="(blogPost, index) in getAllBlogPost" v-if="index < 5" :key="blogPost.id">
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
import _ from 'lodash'
export default {
    name: "BlogSideBar",

    data() {
      return {
        keyword: ''
      }
    },

    mounted() {
      this.$store.dispatch('allLatePost')

    },

    computed: {
      getAllBlogPost() {
            return this.$store.getters.getLateBlogPost
      },
    },

    methods: {
      RealSearch:_.debounce(function () {
          this.$store.dispatch('SearchPost', this.keyword)
      }, 1000)
    },
}
</script>

<style scoped>

</style>

