<template>
    <div id="single-blog-post">
        <section id="inner-headline">
            <div class="container">
                <div class="row">
                    <div class="span4">
                        <div class="inner-heading">
                            <h2>Post right sidebar</h2>
                        </div>
                    </div>
                    <div class="span8">
                        <ul class="breadcrumb">
                            <li><a href="#"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
                            <li><a href="#">Blog</a><i class="icon-angle-right"></i></li>
                            <li class="active">Blog post right sidebar</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section id="content">
            <div class="container">
                <div class="row">
                    <div class="span8">
                        <article>
                            <div class="row">
                                <div class="span8">
                                    <div class="post-image">
                                        <div class="post-heading">
                                            <h2>{{ singleAllPost.title }}</h2>

                                        </div>
                                        <img :src="`uploadimage/${singleAllPost.photo}`" alt="" />
                                    </div>
                                    <p class="text-p">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        {{ singleAllPost.description }}
                                    </p>
                                    <div class="bottom-article">
                                        <ul class="meta-post">
                                            <template v-if="singleAllPost.user_id == 1">
                                                    <li><i class="icon-user icon"></i>Dimo Farm</li>
                                            </template>
                                            <template v-else>
                                                    <li v-if="singleAllPost.user"><i class="icon-user icon"></i>{{ singleAllPost.user.name }}</li>
                                            </template>
                                            <li><i class="icon-calendar icon"></i>{{ singleAllPost.created_at | timeformat }}</li>
                                            <li v-if="singleAllPost.category"><i class="icon-folder-open icon"></i>{{ singleAllPost.category.cat_name }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    <BlogSideBar/>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
import BlogSideBar from "./BlogSideBar.vue"

export default {
    name: "BlogSingle",
    components: {
        BlogSideBar
    },

    computed: {
        singleAllPost() {
            return this.$store.getters.getBlogPostById
        }
    },

    methods: {
        blogPostSingle() {
            this.$store.dispatch('allBlogPostById', this.$route.params.blogpostId)
        }
    },

    mounted() {
        this.$Progress.start()
        this.blogPostSingle();
        this.$Progress.finish()
    },

    watch: {
        $route(to, from) {
            this.blogPostSingle();
        }
    },


}
</script>

<style scoped>
    .icon {
        font-size: 1.6em;
    }

    .text-p {
        font-size: 1.6em;
    }
</style>

