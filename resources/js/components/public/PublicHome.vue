<template>
    <div id="public-home">
        <Slide></Slide>
        <section id="content">
            <div class="container">
                <!-- สุนัขใหม่ประจำเดือน -->
                <div class="row">
                    <div class="span12">
                        <h4 class="heading" style="font-family: 'Mali', cursive; font-weight:600">ลูกสุนัขพันธ์ุเล็กของฟาร์มประจำเดือน</h4>
                        <div class="row">
                        <section id="projects">
                            <ul id="thumbs" class="portfolio" v-for="(portfolio, index) in getPortfolioData" v-show="portfolio.type != 2 && index<5" :key="portfolio.id">
                            <li class="item-thumbs span3 design" data-id="id-0" data-type="web">
                                <a class="hover-wrap fancybox" data-fancybox-group="gallery" :title="`${portfolio.portfolio_category.cat_name}`" :href="`uploadimage-portfolio/${portfolio.photo}`">
                                    <span class="overlay-img"></span>
                                    <span class="overlay-img-thumb font-icon-plus"></span>
                                    </a>
                                <img :src="`uploadimage-portfolio/${portfolio.photo}`"  :alt="`${portfolio.title}`">
                            </li>
                            </ul>
                        </section>
                        </div>
                    </div>
                </div>
                <!-- บริการของเรา -->
                <div class="row">
                    <div class="span12">
                        <div class="row">
                            <div class="span3">
                                <div class="box aligncenter">
                                    <div class="aligncenter icon">
                                        <i class="icon-heart icon-circled icon-64 active"></i>
                                    </div>
                                    <div class="text service">
                                        <h6>{{ourserviceData.title1}}</h6>
                                        <p>
                                            {{ourserviceData.description1}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="span3">
                                <div class="box aligncenter">
                                    <div class="aligncenter icon">
                                        <i class="icon-plane icon-circled icon-64 active"></i>
                                    </div>
                                    <div class="text">
                                        <h6>{{ourserviceData.title2}}</h6>
                                        <p>
                                            {{ourserviceData.description2}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="span3">
                                <div class="box aligncenter">
                                    <div class="aligncenter icon">
                                        <i class="icon-truck icon-circled icon-64 active"></i>
                                    </div>
                                    <div class="text">
                                        <h6>{{ourserviceData.title3}}</h6>
                                        <p>
                                            {{ourserviceData.description3}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="span3">
                                <div class="box aligncenter">
                                    <div class="aligncenter icon">
                                        <i class=" icon-ok-sign icon-circled icon-64 active"></i>
                                    </div>
                                    <div class="text">
                                        <h6>{{ourserviceData.title4}}</h6>
                                        <p>
                                            {{ourserviceData.description4}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
import Slide from './Slide.vue'
    export default {
        name: "PublicHome",

        components: {
            Slide
        },

        mounted() {
            this.$store.dispatch('getApiOurservice')
            this.$store.dispatch('getApiPortfolio')
        },

        computed: {
            ourserviceData() {
                return this.$store.getters.ourService
            },

            getPortfolioData() {
                return this.$store.getters.allPortfolio
            }
        },

        methods: {

        },
    }

</script>

<style scoped>

    .text h6 {
        font-family: 'Mali', cursive;
        font-weight:600
    }

    .text p {
        font-family: 'Mali', cursive;
        font-size: 1.4em;
    }

</style>
