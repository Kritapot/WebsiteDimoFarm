<template>
    <div id="portfolio">
        <section id="inner-headline">
        <div class="container">
            <div class="row">
            <div class="span4">
                <div class="inner-heading">
                <h2>ผลงานของดีโม่ฟาร์ม</h2>
                </div>
            </div>
            <div class="span8">
                <ul class="breadcrumb">
                <li><a href="#"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
                <li><a href="#">Portfolio</a><i class="icon-angle-right"></i></li>
                <li class="active">Portfolio</li>
                </ul>
            </div>
            </div>
        </div>
        </section>
        <section id="content">
        <div class="container">
            <div class="row">
            <div class="span12">
                <div class="clearfix">
                </div>
                <div class="row">
                <section id="projects">
                    <ul id="thumbs" class="portfolio" v-for="portfolio in getPortfolioData" :key="portfolio.id">
                        <li class="item-thumbs span4 design" data-id="id-0" data-type="web">
                            <a class="hover-wrap fancybox" data-fancybox-group="gallery" :title="`${portfolio.portfolio_category.cat_name}`" :href="`uploadimage-portfolio/${portfolio.photo}`">
                                <span class="overlay-img"></span>
                                <span class="overlay-img-thumb font-icon-plus"></span>
                                </a>
                            <img :src="`uploadimage-portfolio/${portfolio.photo}`" :alt="`${portfolio.title}`">
                        </li>
                    </ul>
                </section>
                </div>
            </div>
            </div>
        </div>
        </section>
    </div>
</template>

<script>
    export default {
        name: "Portfolio",

        mounted() {
            this.$store.dispatch('getApiPortfolio')
        },

        computed: {
            getPortfolioData() {
                return this.$store.getters.allPortfolio
            }
        },

        methods: {

        },
    }

</script>

<style scoped>

</style>
