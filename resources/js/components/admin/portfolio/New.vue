<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-sm-12"><br>
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">เพิ่มรูปภาพ Portfolio</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" @keydown="form.onKeydown($event)">
                        <div class="card-body">
                            <div class="form-group">
                                <div class="col-lg-12 col-sm-12">
                                    <label for="newTitle">หัวข้อ</label>
                                    <input v-model="form.title" type="text" class="form-control" id="newTitle"
                                        name="title" placeholder="Title" :class="{ 'is-invalid': form.errors.has('title') }">
                                    <has-error :form="form" field="title"></has-error>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-12 col-sm-12">
                                    <label for="newSelectCatId">เลือกประเภท</label>
                                    <select class="form-control" v-model="form.cat_id" :class="{ 'is-invalid': form.errors.has('cat_id') }">
                                        <option disabled value="">--select one--</option>
                                        <option :value="portfolioCategory.id" v-for="portfolioCategory in portfolioCategory" :key="portfolioCategory.id">{{ portfolioCategory.cat_name }}</option>
                                    </select>
                                    <has-error :form="form" field="cat_id"></has-error>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-12 col-sm-12">
                                    <label for="newSelectCatId">เลือกชนิด</label>
                                    <select class="form-control" v-model="form.type" :class="{ 'is-invalid': form.errors.has('type') }">
                                        <option disabled value="">--select one--</option>
                                        <option :value="1" >ปกติ</option>
                                        <option :value="2" >พ่อพันธุ์ แม่พันธุ์</option>
                                    </select>
                                    <has-error :form="form" field="type"></has-error>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-12 col-sm-12">
                                    <input @change = "changePhoto($event)" type="file" name="photo" :class="{ 'is-invalid': form.errors.has('photo') }">
                                    <img :src="form.photo" alt="" width="80" height="80">
                                    <has-error :form="form" field="photo"></has-error>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <div class="col-lg-6 col-sm-12">
                                <button type="submit" class="btn btn-primary">บันทึก</button>
                                <button type="button" class="btn btn-secondary">
                                    <router-link to="/portfolio-list" class="text-white" style="text-decoration: none;">กลับไปหน้าแสดง Portfolio ทั้งหมด</router-link>
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
        name: 'New',

        data() {
            return{
                form: new Form({
                    title: '',
                    cat_id: '',
                    type: '',
                    photo: '',
                })
            }
        },

        mounted() {
            this.getApiPortfolioCategory()
        },

        computed:{
            portfolioCategory() {
                return this.$store.getters.portfolioCategory
            }
        },

        methods:{
            changePhoto(event) {
                let file = event.target.files[0];
                 if(file.size>1048576){
                     Swal.fire({
                        type: 'error',
                        title: 'Oops...',
                        text: 'File size เกินขนาด',
                        footer: '<a href>Why do I have this issue?</a>'
                    })
                 }else{
                     let reader = new FileReader();
                     reader.onload = event => {
                         this.form.photo = event.target.result
                         console.log(event.target.result)
                     };
                     reader.readAsDataURL(file);
                 }
            },

            getApiPortfolioCategory() {
                this.$store.dispatch('getPortfolioCategory')
            }
        }
    }

</script>

<style scoped>
    .card-footer {
        padding-bottom: 70px;
    }
</style>

