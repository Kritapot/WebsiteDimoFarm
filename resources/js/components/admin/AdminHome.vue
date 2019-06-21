<template>
    <div>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>ยินดีต้อนรับสู่ระบบจัดการเว็บไซต์</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner text-center">
                                <h3>{{ countCategoryTotal }}</h3>
                                <h4>ประเภทบทความ</h4>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <router-link to="/category-list" class="small-box-footer">ดูทั้งหมด <i class="fa fa-arrow-circle-right"></i></router-link>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-6 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner text-center">
                                <h3>{{countPostTotal}}</h3>
                                <h4>บทความ</h4>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <router-link to="/post-list" class="small-box-footer">ดูทั้งหมด <i class="fa fa-arrow-circle-right"></i></router-link>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">

        </section>
    </div>
</template>

<script>
    export default {
    name: "AdminHome",

    mounted() {
        this.$store.dispatch('ApicountCategory')
        this.$store.dispatch('ApicountPost')
    },

    computed: {
        countCategoryTotal() {
            return this.$store.getters.getCountCategory
        },

        countPostTotal() {
            return this.$store.getters.getCountPost
        },
    },

    methods: {

    },

    }
</script>
