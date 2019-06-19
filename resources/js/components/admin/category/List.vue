<template>
    <div>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">แสดงประเภท Blog ทั้งหมด</h2>
                            <div class="input-group input-group-sm col-lg-6 col-sm-12" style="width: 350px;">
                                <input @keyup="searchByCategoryName" type="text" v-model="keywordCategory" class="form-control float-right" placeholder="ค้นหาจากชื่อประเภท">
                                <div class="input-group-append">
                                    <button @click.prevent="searchByCategoryName" type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                            <div class="card-tools">
                                <button class="btn btn-success">
                                    <router-link to="/add-category" class="text-white" style="text-decoration: none;">
                                        เพิ่มประเภท Blog</router-link>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-responsive table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th style="width: 30%">ชื่อประเภท</th>
                                        <th style="width: 50%">วันที่สร้าง</th>
                                        <th class="text-center" style="width: 30%">Actions</th>
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
import _ from 'lodash'

    export default {
        name: 'List',

        data() {
            return {
                keywordCategory: ''
            }
        },
        mounted() {
            this.$Progress.start()
            this.$store.dispatch("allCategory")
            this.$Progress.finish()
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
            },

            searchByCategoryName:_.debounce(function () {
                this.$store.dispatch('searchByCatName', this.keywordCategory)
            }, 1000)
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
