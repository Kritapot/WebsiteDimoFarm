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
                            <ul id="thumbs" class="portfolio">
                            <li class="item-thumbs span3 design" data-id="id-0" data-type="web">
                                <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="The City" :href="`assets/public/assets/img/works/full/image-01-full.jpg`">
                                    <span class="overlay-img"></span>
                                    <span class="overlay-img-thumb font-icon-plus"></span>
                                    </a>
                                <img :src="`assets/public/assets/img/works/full/image-01-full.jpg`" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                            </li>
                            <li class="item-thumbs span3 design" data-id="id-1" data-type="icon">
                                <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="The Office" :href="`assets/public/assets/img/works/thumbs/image-02.jpg`">
                                    <span class="overlay-img"></span>
                                    <span class="overlay-img-thumb font-icon-plus"></span>
                                    </a>
                                <img :src="`assets/public/assets/img/works/thumbs/image-02.jpg`" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis." />
                            </li>
                            <li class="item-thumbs span3 photography" data-id="id-2" data-type="illustrator">
                                <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="The Mountains" :href="`assets/public/assets/img/works/full/image-03-full.jpg`">
                                    <span class="overlay-img"></span>
                                    <span class="overlay-img-thumb font-icon-plus"></span>
                                    </a>
                                <img :src="`assets/public/assets/img/works/full/image-03-full.jpg`" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                            </li>
                            <li class="item-thumbs span3 photography" data-id="id-2" data-type="illustrator">
                                <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="The Mountains" :href="`assets/public/assets/img/works/full/image-04-full.jpg`">
                                    <span class="overlay-img"></span>
                                    <span class="overlay-img-thumb font-icon-plus"></span>
                                    </a>
                                <img :src="`assets/public/assets/img/works/full/image-04-full.jpg`" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
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
        },

        computed: {
            ourserviceData() {
                return this.$store.getters.ourService
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
