<template>
    <div id="our-service">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-sm-12"><br>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">แก้ไขบริการของเรา</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form">
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="col-lg-12 col-sm-12">
                                        <label for="newTitle">หัวข้อที่ 1</label>
                                        <input type="text" class="form-control" id="newTitle" v-model="form.title1" name="title1" :class="{ 'is-invalid': form.errors.has('title1') }">
                                        <has-error :form="form" field="title1"></has-error>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-12 col-sm-12">
                                        <label for="">รายละเอียด</label>
                                        <textarea v-model="form.description1" cols="100" :class="{ 'is-invalid': form.errors.has('description1') }" class="form-control" rows="5" name="description1"></textarea>
                                        <has-error :form="form" field="description1"></has-error>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-12 col-sm-12">
                                        <label for="newTitle">หัวข้อที่ 2</label>
                                        <input type="text" class="form-control" id="newTitle" v-model="form.title2" name="title2" :class="{ 'is-invalid': form.errors.has('title2') }">
                                        <has-error :form="form" field="title2"></has-error>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-12 col-sm-12">
                                        <label for="">รายละเอียด</label>
                                        <textarea v-model="form.description2" name="description2" cols="100" :class="{ 'is-invalid': form.errors.has('description2') }" class="form-control" rows="5"></textarea>
                                        <has-error :form="form" field="description2"></has-error>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-12 col-sm-12">
                                        <label for="newTitle">หัวข้อที่ 3</label>
                                        <input type="text" class="form-control" id="newTitle" v-model="form.title3" name="title3" :class="{ 'is-invalid': form.errors.has('title3') }">
                                        <has-error :form="form" field="title3"></has-error>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-12 col-sm-12">
                                        <label for="">รายละเอียด</label>
                                        <textarea v-model="form.description3" name="description3" cols="100" :class="{ 'is-invalid': form.errors.has('description3') }" class="form-control" rows="5"></textarea>
                                        <has-error :form="form" field="description3"></has-error>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-12 col-sm-12">
                                        <label for="newTitle">หัวข้อที่ 4</label>
                                        <input type="text" class="form-control" id="newTitle" v-model="form.title4" name="title4" :class="{ 'is-invalid': form.errors.has('title4') }">
                                        <has-error :form="form" field="title4"></has-error>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-12 col-sm-12">
                                        <label for="">รายละเอียด</label>
                                        <textarea v-model="form.description4" cols="100" name="description4" :class="{ 'is-invalid': form.errors.has('description4') }" class="form-control" rows="5"></textarea>
                                        <has-error :form="form" field="description4"></has-error>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <div class="col-lg-6 col-sm-12">
                                    <button @click.prevent="updateOurservice()" type="submit" class="btn btn-primary">บันทึก</button>
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
        name: "OurService",

        data() {
            return {
                form: new Form({
                    title1: '',
                    title2: '',
                    title3: '',
                    title4: '',
                    description1: '',
                    description2: '',
                    description3: '',
                    description4: '',
                })
            }
        },

        mounted() {
            this.getApiOurservice();
        },

        computed: {
        },

        methods: {
            getApiOurservice() {
                axios.get('/ourservice')
                    .then((respon)  =>  {
                        console.log(respon.data.ourservice)
                        this.form.fill(respon.data.ourservice)
                    })
            },

            updateOurservice() {
                axios.post('/update-ourservice', this.form)
                    .then(() => {
                        this.$router.push('/our-service')
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

    .card-body input, textarea {
        font-size: 1.2em;
    }
</style>
