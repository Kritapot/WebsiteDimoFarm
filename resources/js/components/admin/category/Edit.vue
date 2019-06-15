<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-sm-12"><br>
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Category Blog</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form">
                        <div class="card-body">
                            <div class="form-group">
                                <div class="col-lg-6 col-sm-12">
                                    <label for="newCategory">Category Name</label>
                                    <input v-model="form.cat_name" type="text" class="form-control" id="newCategory"
                                        name="cat_name" placeholder="Category Name" :class="{ 'is-invalid': form.errors.has('cat_name') }">
                                    <has-error :form="form" field="cat_name"></has-error>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <div class="col-lg-6 col-sm-12">
                                <button @click.prevent="updateCategory()" type="submit" class="btn btn-primary btn-sm">Update</button>
                                <button type="button" class="btn btn-secondary btn-sm">
                                    <router-link to="/category-list" class="text-white" style="text-decoration: none;">lists Category</router-link>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Edit',

        mounted() {
            axios.get(`/categories/${this.$route.params.id}`).then((respon) => {
                this.form.fill(respon.data.category)
            })
        },

        data() {
            return{
                form: new Form({
                    cat_name: '',
                })
            }
        },
        methods:{
            updateCategory() {
                this.form.post(`/categories/${this.$route.params.id}`)
                    .then((response) => {
                            this.$router.push('/category-list')
                            const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        });

                            Toast.fire({
                            type: 'success',
                            title: 'Update category successfully'
                        })
                    })
                    .catch(() => {

                    })
            }
        }
    }

</script>
