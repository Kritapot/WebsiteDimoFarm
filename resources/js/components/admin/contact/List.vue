<template>
    <div id="list-contact">
        <section class="content">
            <div class="row justify-content-around" >
                <div class="col-lg-12 col-xs-12">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">แสดงกล่องข้อความ Contact ทั้งหมด</h2>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th style="width: 5%">No</th>
                                    <th style="width: 25%">วันที่ส่ง</th>
                                    <th style="width: 25%">ชื่อผู้ติดต่อ</th>
                                    <th style="width: 20%">อีเมล์</th>
                                    <th style="width: 15%">หัวข้อ</th>
                                    <th style="width: 30%">ข้อความ</th>
                                    <th style="width: 5%">Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                <tr v-for="(contact, index) in getAllContact" :key="contact.id">
                                    <td>{{ index+1 }}</td>
                                    <td>{{ contact.created_at | timeformat }}</td>
                                    <td>{{ contact.contact_name }}</td>
                                    <td>{{ contact.contact_email }}</td>
                                    <td>{{ contact.contact_subject }}</td>
                                    <td>{{ contact.contact_message | sortlength(40, '.....') }}</td>
                                    <td>
                                        <router-link :to="`contact-admin/${contact.id}`" class="btn btn-primary btn-sm btn-list-contact">ดูรายละเอียด</router-link>
                                        <button @click.prevent="deleteContact(contact.id)" type="button" class="btn btn-danger btn-sm btn-list-contact">ลบ</button>
                                    </td>

                                </tr>
                                </tbody>
                            </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                        </div>
                    </div>

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
</template>

<script>
    export default {
        name: "List",

        mounted(){
                this.$Progress.start()
                this.paginationContact()
                this.$Progress.finish()
        },

        computed:{
            getAllContact() {
                return this.$store.getters.getListContact
            },
        },

        methods:{
            deleteContact(id) {
                axios.delete('/delete-contact/'+id).then(() => {
                    this.$store.dispatch('allContact')
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

            paginationContact() {
                this.$store.dispatch('allContact')
            }
        },
    }
</script>

<style scoped>
    .btn-add-contact {
        text-decoration: none;
    }


    .content {
        padding-bottom: 40px;
    }

    .btn-list-contact {
        width: 90px;
        margin: 5px 0px;
    }

</style>
