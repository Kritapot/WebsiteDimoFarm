<template>
    <div>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">แสดงรูปภาพ Portfolio ทั้งหมด</h2>
                            <div class="card-tools">
                                <button class="btn btn-success">
                                    <router-link to="/portfolio-add" class="text-white" style="text-decoration: none;">
                                        เพิ่มรูปภาพ Portfolio</router-link>
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
                                            <th style="width: 30%">หัวข้อ</th>
                                            <th style="width: 20%">ประเภท</th>
                                            <th style="width: 15%">ชนิด</th>
                                            <th class="text-center" style="width: 20%">รูปภาพ</th>
                                            <th style="width: 20%">วันที่สร้าง</th>
                                            <th class="text-center" style="width: 30%">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(portfolio, index) in portfolioData.data" :key="portfolio.id">
                                            <td>{{index+1}}</td>
                                            <td>{{portfolio.title | sortlength(100,"....")}}</td>
                                            <td>{{portfolio.portfolio_category.cat_name}}</td>
                                            <td v-if="portfolio.type==1">ปกติ</td>
                                            <td v-if="portfolio.type==2">พ่อพันธ์ุ แม่พันธุ์</td>
                                            <td class="text-center"><img :src="ourImage(portfolio.photo)" alt="" width="100" height="100"></td>
                                            <td>{{portfolio.created_at | timeformat}}</td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-success btn-sm btn-category">
                                                    <router-link :to="`/portfolio-edit/${portfolio.id}`" class="text-white" style="text-decoration: none;">
                                                        แก้ไข
                                                    </router-link>
                                                </button>
                                                <button @click.prevent="deletePortfolio(portfolio.id)" type="button" class="btn btn-danger btn-sm btn-category">ลบ</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <pagination :data="portfolioData" @pagination-change-page="getApiPortfolio"></pagination>
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
    export default {
        name: 'List',

        data() {
            return {
                portfolioData:  {}
            }
        },
        mounted() {
            this.$Progress.start()
            this.getApiPortfolio()
            this.$Progress.finish()
        },
        computed: {
            getAllPortfolio(){
                return this.portfolioData
            }
        },
        methods: {
            getApiPortfolio(page = 1) {
			axios.get('/portfolio?page=' + page)
				.then(response => {
                    console.log(response.data.portfolio)
					this.portfolioData = response.data.portfolio;
				});
            },

            ourImage(img) {
                return 'uploadimage-portfolio/'+img;
            },


            deletePortfolio(id) {
                axios.delete('/delete-portfolio/'+id).then(() => {
                    this.getApiPortfolio()
                    const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        });
                            Toast.fire({
                            type: 'success',
                            title: 'ลบเรียบร้อยแล้ว'
                        })
                }).catch((e) => {
                        console.log(e)
                    })
            }
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
