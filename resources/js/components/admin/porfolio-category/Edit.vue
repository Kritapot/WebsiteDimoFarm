<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-sm-12"><br>
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">แก้ไข Porfolio ใหม่</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" @keydown="form.onKeydown($event)">
                        <div class="card-body">
                            <div class="form-group">
                                <div class="col-lg-6 col-sm-12">
                                    <label for="newCategory">ชื่อประเภท</label>
                                    <input v-model="form.cat_name" type="text" data-msg-required="กรุณากรอกรายละเอียด" class="form-control" id="newCategory" name="cat_name" placeholder="ชื่อประเภท" :class="{ 'is-invalid': form.errors.has('cat_name') }">
                                    <has-error :form="form" field="cat_name"></has-error>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <div class="col-lg-6 col-sm-12">
                                <button @click.prevent="updatePortfolioCategory()" type="submit" class="btn btn-primary btn-sm">บันทึก</button>
                                <button type="button" class="btn btn-secondary btn-sm">
                                    <router-link to="/portfolio-cat-list" class="text-white" style="text-decoration: none;">กลับสู่หน้าแสดงประเภท Porfolio</router-link>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Edit',

        data() {
            return{
                form: new Form({
                    cat_name: '',
                })
            }
        },

        mounted() {
            this.getPortfolioCategoryById()
        },

        methods:{

            getPortfolioCategoryById() {
                axios.get(`/portfolio-category/${this.$route.params.id}`)
                    .then((respon) => {
                        this.form.fill(respon.data.portfolioCategory)
                    })
            },

            updatePortfolioCategory() {
                this.form.post(`/update-portfolio-category/${this.$route.params.id}`)
                    .then(() => {
                        this.$router.push('/portfolio-cat-list')
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        });
                            Toast.fire({
                            type: 'success',
                            title: 'แก้ไขประเภทเรียบร้อยแล้ว'
                        })
                    }).catch((e) => {
                        console.log(e)
                    })
            },
        }
    }

</script>
