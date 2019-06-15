<template>
    <div>
        <section class="content">
            <div class="row justify-content-around" >
                <div class="col-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Post List</h3>

                            <div class="card-tools">
                                <button class="btn btn-primary btn-add-post">
                                    <router-link to="/add-post" style="color:#fff;" class="btn-add-post"> Add New Post</router-link>
                                </button>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-responsive table-bordered table-hover">
                                <thead>
                                <tr>

                                    <th>No</th>
                                    <th>User</th>
                                    <th>Category</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th style="width: 20%;">Photo</th>
                                    <th style="width: 10%;">Action</th>

                                </tr>
                                </thead>
                                <tbody>

                                <tr v-for="(post,index) in getAllPost" :key="post.id">
                                    <td>{{index+1}}</td>
                                    <template v-if="post.user_id == 1">
                                        <td>SuperAdmin</td>
                                    </template>
                                    <template v-else>
                                        <td v-if="post.user">{{post.user.name}}</td>
                                    </template>
                                    <td v-if="post.category">{{post.category.cat_name}}</td>
                                    <td>{{post.title | sortlength(20,"---")}}</td>
                                    <td>{{post.description | sortlength(100,"....")}}</td>
                                    <td class="text-center"><img :src="ourImage(post.photo)" alt="" width="100" height="100"></td>
                                    <td>
                                        <button type="submit" class="btn btn-success btn-sm btn-list-post">Edit</button>
                                        <button type="button" class="btn btn-danger btn-sm btn-list-post">Delete</button>
                                    </td>

                                </tr>
                                </tbody>


                            </table>
                        </div>
                        <!-- /.card-body -->
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
            this.$store.dispatch('allPost')
        },
        computed:{
            getAllPost(){
                return this.$store.getters.getPost
            }
        },
        methods:{
            ourImage(img) {
                return 'uploadimage/'+img;
            }
        },
    }
</script>

<style scoped>
    .btn-list-post {
        width: 60px;
        margin: 5px 0px;
    }

    .content {
        padding-bottom: 40px;
    }

    button .btn-add-post {
        text-decoration: none;
    }

</style>
