<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-sm-12"><br>
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">เพิ่ม Blog Post ใหม่</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form">
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
                                    <label for="">รายละเอียดบทความ</label>
                                    <markdown-editor toolbar="bold italic heading | image link | numlist bullist code quote | preview fullscreen" v-model="form.description"></markdown-editor>                                    <has-error :form="form" field="description"></has-error>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-12 col-sm-12">
                                    <label for="newSelectCatId">เลือกประเภท</label>
                                    <select class="form-control" v-model="form.cat_id" :class="{ 'is-invalid': form.errors.has('cat_id') }">
                                        <option disabled value="">--select one--</option>
                                        <option :value="category.id" v-for="category in getAllCategory" :key="category.id">{{ category.cat_name }}</option>
                                    </select>
                                    <has-error :form="form" field="cat_id"></has-error>
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
                                <button @click.prevent="addPost()" type="submit" class="btn btn-primary">บันทึก</button>
                                <button type="button" class="btn btn-secondary">
                                    <router-link to="/post-list" class="text-white" style="text-decoration: none;">กลับไปหน้าแสดง Post</router-link>
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
                    description: '',
                    cat_id: '',
                    photo: '',
                })
            }
        },

        mounted() {
            this.$store.dispatch("allCategory")
        },

        computed:{
            getAllCategory() {
                return this.$store.getters.getCategory
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

            addPost() {
                this.form.post('savepost').then(() =>{
                    this.$router.push('/post-list')
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        });

                            Toast.fire({
                            type: 'success',
                            title: 'เพิ่ม Blog post เรียบร้อยแล้ว'
                        })
                })
                .catch(()=>{
                })
            },
        }
    }

</script>

<style scoped>
    .card-footer {
        padding-bottom: 70px;
    }
</style>

