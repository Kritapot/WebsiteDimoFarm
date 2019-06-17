<template>
    <span id="blog-post">
        <section id="inner-headline">
      <div class="container">
        <div class="row">
          <div class="span4">
            <div class="inner-heading">
              <h2>บทความ</h2>
            </div>
          </div>
          <div class="span8">
            <ul class="breadcrumb">
              <li><a href="#"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
              <li><a href="#">บทความ</a><i class="icon-angle-right"></i></li>
              <li class="active">บทความ</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <section id="content">
      <div class="container">
        <div class="row">
          <div class="span8">
            <article v-for="blogpost in getAllBlogPost" :key="blogpost.id">
              <div class="row">
                <div class="span8">
                  <div class="post-image">
                    <div class="post-heading">
                      <h3>{{ blogpost.title }}</h3>
                    </div>
                    <img :src="`uploadimage/${blogpost.photo}`" alt="" />
                  </div>
                  <p>
                    {{ blogpost.description | sortlength(100, '........') }}
                  </p>
                  <div class="bottom-article">
                    <ul class="meta-post">
                      <li><i class="icon-calendar"></i>{{ blogpost.created_at | timeformat }}</li>
                      <template v-if="blogpost.user_id == 1">
                            <li><i class="icon-user"></i>เจ้าของฟาร์ม</li>
                      </template>
                      <template v-else>
                            <li v-if="blogpost.user"><i class="icon-user"></i>{{ blogpost.user.name }}</li>
                      </template>
                      <li v-if="blogpost.category"><i class="icon-folder-open"></i>{{ blogpost.category.cat_name }}</li>
                      <li><i class="icon-comments"></i><a href="#">4 Comments</a></li>
                    </ul>
                    <a href="#" class="pull-right">Continue reading <i class="icon-angle-right"></i></a>
                  </div>
                </div>
              </div>
            </article>
            <div id="pagination">
              <span class="all">Page 1 of 3</span>
              <span class="current">1</span>
              <a href="#" class="inactive">2</a>
              <a href="#" class="inactive">3</a>
            </div>
          </div>
          <BlogSideBar></BlogSideBar>
        </div>
      </div>
    </section>
    </span>
</template>

<script>
import BlogSideBar from "./BlogSideBar.vue"

export default {
    name: "BlogPost",

    components: {
        BlogSideBar,
    },

    mounted() {
        this.$store.dispatch('allBlogPost')
    },

    computed: {
        getAllBlogPost() {
            return this.$store.getters.getBlogPost
        },
    },

    methods: {

    }
}
</script>

<style scoped>

</style>
