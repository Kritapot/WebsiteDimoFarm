<template>
    <div>
        <section class="content">
            <div class="row justify-content-around">
                <div class="col-lg-12 col-xs-12">
                    <div class="card" v-for="contact in contactFindId" :key="contact.id">
                            <div class="card-header">
                                <h2 class="card-title">รายละเอียดข้อความ</h2>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">ชื่อผู้ติดต่อ:</label>
                                        <div class="col-sm-10">
                                            <p>{{ contact.contact_name }}</p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">อีเมล์:</label>
                                        <div class="col-sm-10">
                                            <p>{{ contact.contact_email }}</p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">วันที่ส่ง:</label>
                                        <div class="col-sm-10">
                                            <p>{{ contact.created_at }}</p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">หัวข้อ:</label>
                                        <div class="col-sm-10">
                                            <p>{{ contact.contact_subject }}</p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">ข้อความ:</label>
                                        <div class="col-sm-10">
                                            <p>{{ contact.contact_message }}</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <router-link to="/contact-admin" class="btn btn-primary">กลับไป</router-link>
                                    <button @click.prevent="deleteContact(contact.id)" type="button" class="btn btn-danger">ลบ</button>
                                </div>
                                <!-- /.card-footer -->
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
    </div>
</template>

<script>
    export default {
        name: "Single",

        mounted() {
            this.$store.dispatch('ApiFindContact', this.$route.params.id);
        },

        computed: {
            contactFindId() {
                return this.$store.getters.getFindContact
            }
        },

        methods: {
            deleteContact(id) {
                axios.delete('/delete-contact/'+id).then(() => {
                    this.$router.push('/contact-admin')
                    const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        });

                        Toast.fire({
                            type: 'success',
                            title: 'ลบข้อความเรียบร้อยแล้ว'
                        })
                }).catch((e) => {
                    console.log(e)
                })
            },
        },
    }

</script>
