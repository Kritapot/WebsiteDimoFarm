<template>
    <div>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">แสดงประเภท Portfolio ทั้งหมด</h2>
                            <div class="input-group input-group-sm col-lg-6 col-sm-12" style="width: 350px;">
                                <input type="text" class="form-control float-right" placeholder="ค้นหาจากชื่อประเภท">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                            <div class="card-tools">
                                <button class="btn btn-success">
                                    <router-link to="/portfolio-cat-add" class="text-white" style="text-decoration: none;">
                                        เพิ่มประเภท Portfolio</router-link>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example2" class="table table-responsive table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th style="width: 30%">ชื่อประเภท</th>
                                            <th style="width: 50%">วันที่สร้าง</th>
                                            <th class="text-center" style="width: 30%">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(portfolioCategory, index) in portfolioCategoryData.data" :key="portfolioCategory.id">
                                            <td>{{index+1}}</td>
                                            <td>{{portfolioCategory.cat_name}}</td>
                                            <td>{{portfolioCategory.created_at | timeformat}}</td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-success btn-sm btn-category">
                                                    <router-link :to="`/portfolio-cat-edit/${portfolioCategory.id}`" class="text-white" style="text-decoration: none;">
                                                        แก้ไข
                                                    </router-link>
                                                </button>
                                                <button @click.prevent="deletePorfolioCategory(portfolioCategory.id)" type="button" class="btn btn-danger btn-sm btn-category">ลบ</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <pagination :data="portfolioCategoryData" @pagination-change-page="getApiPortfolioCategory"></pagination>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
    </div>
</template>

<script>
import _ from 'lodash'

    export default {
        name: 'List',

        data() {
            return {
                portfolioCategoryData: {},
            }
        },
        mounted() {
            this.$Progress.start()
            this.getApiPortfolioCategory()
            this.$Progress.finish()
        },
        computed: {

        },
        methods: {
            getApiPortfolioCategory(page = 1) {
                axios.get('/portfolio-category?page=' + page)
				.then(response => {
					this.portfolioCategoryData = response.data.portfolioCategory;
				});
            },

            deletePorfolioCategory(id) {
                axios.delete('/delete-portfolio-category/'+id)
                    .then(() => {
                        this.getApiPortfolioCategory()
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        });

                            Toast.fire({
                            type: 'success',
                            title: 'ลบประเภทเรียบร้อย'
                        })
                    }).catch((e) => {
                        console.log(e)
                    })
            },
        }
    }

</script>

<style scoped>
    .content {
        padding-bottom: 40px;
    }

    .btn-category{
        width: 60px;
        margin: 5px 0px;
    }
</style>
