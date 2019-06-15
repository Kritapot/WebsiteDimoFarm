<template>
    <div>
        <section class="content">
            <div class="row justify-content-around" >
                <div class="col-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">แสดง Blog Post</h2>

                            <div class="card-tools">
                                <button class="btn btn-primary btn-add-post">
                                    <router-link to="/add-post" style="color:#fff;" class="btn-add-post"> เพิ่ม Blog Post</router-link>
                                </button>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-responsive table-bordered table-hover">
                                <thead>
                                <tr>

                                    <th>No</th>
                                    <th>ผู้สร้าง</th>
                                    <th>ประเภท</th>
                                    <th>หัวข้อ</th>
                                    <th>รายละเอียด</th>
                                    <th style="width: 20%;">รูปภาพ</th>
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
                                    <td>{{post.description | sortlength(40,"....")}}</td>
                                    <td class="text-center"><img :src="ourImage(post.photo)" alt="" width="100" height="100"></td>
                                    <td>
                                        <button type="submit" class="btn btn-success btn-sm btn-list-post">
                                            <router-link :to="`/edit-post/${post.id}`" class="text-white">
                                                    แก้ไข
                                            </router-link>
                                        </button>
                                        <button @click.prevent="deletePost(post.id)" type="button" class="btn btn-danger btn-sm btn-list-post">ลบ</button>
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
            },

            deletePost(id) {
                axios.delete('/delete-post/'+id).then(() => {
                    this.$store.dispatch('allPost')
                    const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        });
                        Toast.fire({
                            type: 'success',
                            title: 'Delete post successfully'
                        })
                })
                .catch((e) => {
                    console.log(e)
                })

            },
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

    button {
        text-decoration: none;
    }

</style>
