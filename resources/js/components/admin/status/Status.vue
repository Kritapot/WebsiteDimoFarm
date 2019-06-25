<template>
    <div>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">ตั้งค่าสถานะ เปิด-ปิด ฟาร์ม</h2>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form @keydown="form.onKeydown($event)">
                                <div class="col-lg-12 col-sm-12">
                                    <div class="form-group">
                                        <label>เลือกสถานะของฟาร์ม</label>
                                        <select v-model="form.status" class="form-control" style="width: 50%" name="status" :class="{ 'is-invalid': form.errors.has('status') }">
                                            <option disabled value="">-เลือก-</option>
                                            <option :selected="form.status == 1" value="1">เปิดฟาร์ม</option>
                                            <option :selected="form.status == 2" value="2">ปิดฟาร์ม</option>
                                        </select>
                                        <has-error :form="form" field="status"></has-error>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-12 col-sm-12">
                                        <label for="">ข้อความ</label>
                                        <textarea v-model="form.description" name="description" cols="100" class="form-control" rows="3" :class="{ 'is-invalid': form.errors.has('description') }"></textarea>
                                        <has-error :form="form" field="description"></has-error>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="col-lg-6 col-sm-12">
                                        <button @click.prevent="updateStatus()" type="submit" class="btn btn-primary">บันทึก</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
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
        name: 'Status',

        data() {
            return {
                form: new Form({
                    status: '',
                    description: '',
                })
            }
        },
        mounted() {
            this.getApiStatus()
        },
        computed: {

        },
        methods: {
            getApiStatus() {
                axios.get('/status').then((respon)  =>  {
                    console.log(respon.data.status)
                    this.form.fill(respon.data.status)
                })
            },

            updateStatus() {
                this.form.post('/update-status').then(() => {
                    this.$router.push('/status')
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
                })
            }
        }
    }

</script>

<style scoped>
    .content {
        padding-bottom: 40px;
    }
</style>
