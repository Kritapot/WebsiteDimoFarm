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
                            <div class="col-lg-12 col-sm-12">
                                <div class="form-group">
                                    <label>เลือกสถานะของฟาร์ม</label>
                                    <select class="form-control" style="width: 50%">
                                        <option disabled value="">-เลือก-</option>
                                        <option value="1">เปิดฟาร์ม</option>
                                        <option value="2">ปิดฟาร์ม</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-12 col-sm-12">
                                    <label for="">รายละเอียด</label>
                                    <textarea name="description" cols="100" class="form-control" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
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
        name: 'Status',

        data() {
            return {

            }
        },
        mounted() {

        },
        computed: {

        },
        methods: {

        }
    }

</script>

<style scoped>
    .content {
        padding-bottom: 40px;
    }
</style>
