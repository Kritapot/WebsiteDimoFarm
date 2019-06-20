<template>
    <div id="public-home">
        <Slide></Slide>
        <section id="content">
            <div class="container">
                <!-- สุนัขใหม่ประจำเดือน -->
                <div class="row">
                    <div class="span12">
                        <h4 class="heading">ลูกสุนัขพันธ์ุเล็กของฟาร์มประจำเดือน</h4>
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
                                    <div class="text">
                                        <h6>จำหน่ายสุนัขพันธ์เล็ก</h6>
                                        <p>
                                            ฟาร์มของเราจำหน่ายสุนัขพันธ์ุเล็ก มีทั้ง มิเนียเจอร์ ชิวาวา ปอมเมอเรเนียน สามารถเข้ามาเยี่ยมชมฟาร์มของเราได้
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
                                        <h6>บริการจัดส่งทางเครื่องบิน</h6>
                                        <p>
                                            ฟาร์มของเรามีบริการจัดส่งทางเครื่องบิน โดยคิดตามอัตราค่าบริการ + อุปกรณ์
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
                                        <h6>บริการจัดส่ง</h6>
                                        <p>
                                            ฟาร์มของเรามีบริการจัดส่งอำเภอใกล้เคียงในเชียงใหม่ฟรี หรือลูกค้าสามารถนัดรับได้
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
                                        <h6>รับผสมพันธุ์สุนัข</h6>
                                        <p>
                                            ฟาร์มของเรารับผสมพันธุ์สุนัข ปอมเมอเรเนียน ชิวาวา และมิเนเจอร์ โดยพ่อพันธุ์ที่สุขภาพดี สวยงาม
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
    }

</script>

<style scoped>

</style>
