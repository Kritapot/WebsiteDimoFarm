<template>
    <div>
        <span id="about-us">
            <section id="inner-headline">
            <div class="container">
                <div class="row">
                <div class="span4">
                    <div class="inner-heading">
                    <h2>เกี่ยวกับเรา</h2>
                    </div>
                </div>
                <div class="span8">
                    <ul class="breadcrumb">
                    <li><a href="#"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
                    <li><a href="#">หน้า</a><i class="icon-angle-right"></i></li>
                    <li class="active">เกี่ยวกับเรา</li>
                    </ul>
                </div>
                </div>
            </div>
            </section>
            <section id="content">
            <div class="container">
                <div class="row">
                <div class="span6">
                    <h2>{{ getAboutUsData.title }}</h2>
                    <p class="t-p">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    {{ getAboutUsData.description }}
                    </p>
                </div>
                <div class="span6">
                    <!-- start flexslider -->
                    <div class="col-sm-4 show-picture-about">
                    <ul class="slides">
                        <li>
                        <img v-if="getAboutUsData.photo" :src="`uploadimage-about/${getAboutUsData.photo}`" alt=""/>
                        </li>
                    </ul>
                    </div>
                    <!-- end flexslider -->
                </div>
                </div>
                <!-- divider -->
                <!-- end divider -->
                <!-- divider -->
                <div class="row">
                <div class="span12">
                    <div class="solidline">
                    </div>
                </div>
                </div>
                <!-- end divider -->
            </div>
            </section>
        </span>
    </div>
</template>

<script>
export default {
    name: "AboutUs",

    data() {
        return {
        }
    },

    computed: {
        getAboutUsData() {
            return this.$store.getters.aboutUsData
        }
    },

    mounted() {
        this.$Progress.start()
        this.$store.dispatch('getApiAboutUs')
        this.$Progress.finish()
    },

    methods: {

    },

}
</script>

<style scoped>
    .btn-theme {
        border: 1px solid #F03C02;
        background: #F03C02;
    }

    .btn-theme:hover {
        border: 1px solid #333333;
        background: #333333;
    }

    .t-p {
        font-size: 1.7em;
        line-height: 1.5em;
    }

    .span6 h2 {
        font-family: 'Mali', cursive;
        font-weight:600
    }

    .span6 p {
        font-family: 'Mali', cursive;
        font-size: 2.2em;
    }

    .span6 .show-picture-about {
        width: 500px;
        height: 500px;
    }
</style>
