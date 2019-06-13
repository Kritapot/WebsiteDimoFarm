<template>
    <div>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">Post Lists</h2>

                            <div class="card-tools">
                                <button class="btn btn-success btn-sm">
                                    <router-link to="/add-post" class="text-white" style="text-decoration: none;">Add post</router-link>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;">No.</th>
                                        <th>User</th>
                                        <th>Category</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Photo</th>
                                        <th class="text-center" style="width: 15%;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(post, index) in getAllPost" :key="post.id">
                                        <td>{{ index+1 }}</td>
                                        <td v-if="post.user">{{ post.user.name }}</td>
                                        <td v-if="post.category">{{ post.category.cat_name }}</td>
                                        <td>{{ post.title | sortlength(20,"....") }}</td>
                                        <td>{{ post.description | sortlength(40,"....")}}</td>
                                        <td><img :src="post.photo" alt="" style="width: 80px;"></td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-primary btn-sm">
                                                <router-link to="/edit-post" class="text-white" style="text-decoration: none;">Edit</router-link>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm">Delete</button>
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
            this.$store.dispatch("allPost")
        },
        computed: {
            getAllPost() {
                return this.$store.getters.getPost
            }
        },
        methods: {

        }
    }

</script>

<style scoped>

</style>
