<template>
    <div>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">Category Lists</h2>

                            <div class="card-tools">
                                <button class="btn btn-success btn-sm">
                                    <router-link to="/add-category" class="text-white" style="text-decoration: none;">
                                        Add category</router-link>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;">No.</th>
                                        <th>Category Name</th>
                                        <th>Date Create</th>
                                        <th class="text-center" style="width: 20%;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(category, index) in getAllCategory" :key="category.id">
                                        <td>{{ index+1 }}</td>
                                        <td>{{ category.cat_name }}</td>
                                        <td>{{ category.created_at | timeformat }}</td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-primary btn-sm">
                                                <router-link :to="`/edit-category/${category.id}`" class="text-white" style="text-decoration: none;">
                                                    Edit
                                                </router-link>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm"
                                                @click.prevent="deleteCategory(category.id)">Delete</button>
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
                            title: 'Delete category successfully'
                        })

                    })
                        .catch(() => {

                        })
            }
        }
    }

</script>

<style scoped>

</style>
