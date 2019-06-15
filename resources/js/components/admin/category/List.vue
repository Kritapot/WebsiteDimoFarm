<template>
    <div>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">แสดงประเภท Blog ทั้งหมด</h2>

                            <div class="card-tools">
                                <button class="btn btn-success">
                                    <router-link to="/add-category" class="text-white" style="text-decoration: none;">
                                        เพิ่มประเภท Blog</router-link>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-responsive table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;">No.</th>
                                        <th>ชื่อประเภท</th>
                                        <th>วันที่สร้าง</th>
                                        <th class="text-center" style="width: 20%;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(category, index) in getAllCategory" :key="category.id">
                                        <td>{{ index+1 }}</td>
                                        <td>{{ category.cat_name }}</td>
                                        <td>{{ category.created_at | timeformat }}</td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-success btn-sm btn-category">
                                                <router-link :to="`/edit-category/${category.id}`" class="text-white" style="text-decoration: none;">
                                                    แก้ไข
                                                </router-link>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm btn-category"
                                                @click.prevent="deleteCategory(category.id)">ลบ</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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
    export default {
        name: 'List',
        mounted() {
            this.$store.dispatch("allCategory")
        },
        computed: {
            getAllCategory() {
                return this.$store.getters.getCategory
            }
        },
        methods: {
            deleteCategory(id) {
                axios.delete('/categories/' + id).then(() => {
                        this.$store.dispatch("allCategory")
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        });

                        Toast.fire({
                            type: 'success',
                            title: 'ลบประเภทเรียบร้อยแล้ว'
                        })

                    })
                        .catch(() => {

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
