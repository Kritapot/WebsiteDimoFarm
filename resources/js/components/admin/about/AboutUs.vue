<template>
    <div id="about-us-admin">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-sm-12"><br>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">แก้ไขหน้าเกี่ยวกับเรา</h3>
                        </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                        <form role="form">
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="col-lg-12 col-sm-12">
                                        <label for="newTitle">หัวข้อ</label>
                                        <input type="text" class="form-control" id="newTitle" v-model="form.title"
                                            name="title" :class="{ 'is-invalid': form.errors.has('title') }">
                                            <has-error :form="form" field="title"></has-error>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-12 col-sm-12">
                                        <label for="">รายละเอียดบทความ</label>
                                        <textarea cols="100" rows="10" v-model="form.description" :class="{ 'is-invalid': form.errors.has('description') }"></textarea>
                                        <has-error :form="form" field="description"></has-error>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-12 col-sm-12">
                                        <input @change = "changePhoto($event)" type="file" name="photo" :class="{ 'is-invalid': form.errors.has('photo') }">
                                        <img :src="updateImage()" alt="" width="200" height="200">
                                        <has-error :form="form" field="photo"></has-error>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <div class="col-lg-6 col-sm-12">
                                    <button @click.prevent="updateAboutUs()" type="submit" class="btn btn-primary">บันทึก</button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>

    </div>
</template>

<script>
    export default {
        name: "AboutUs",

        data() {
            return {
                form: new Form({
                    title: '',
                    description: '',
                    photo: '',
                }),
            }
        },

        mounted() {
            this.getAboutUs();
        },

        computed: {

        },

        methods: {
            getAboutUs() {
                axios.get('/about-us').then((respon) => {
                    this.form.fill(respon.data.aboutUs)
                })
            },

            changePhoto(event) {
                let file = event.target.files[0];
                 if(file.size>1048576){
                     Swal.fire({
                        type: 'error',
                        title: 'Oops...',
                        text: 'File size is over',
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

            updateImage(){
                let img = this.form.photo;
                if(img.length>100){
                    return  this.form.photo
                }else{
                    return `uploadimage-about/${this.form.photo}`
                }
            },

            updateAboutUs() {
                axios.post('/update-about-us', this.form).then(() => {
                    this.$router.push('/about-us-admin')
                    const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        });
                        Toast.fire({
                            type: 'success',
                            title: 'แก้ไขเรียบร้อยแล้ว'
                        })

                }).catch((e) => {
                    console.log(e)
                })
            },



        },

    }
</script>

<style scoped>
    .card-footer {
        padding-bottom: 70px;
    }
</style>
