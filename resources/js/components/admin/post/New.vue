<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-sm-12"><br>
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add New Post</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form">
                        <div class="card-body">
                            <div class="form-group">
                                <div class="col-lg-12 col-sm-12">
                                    <label for="newTitle">Title</label>
                                    <input v-model="form.title" type="text" class="form-control" id="newTitle"
                                        name="title" placeholder="Title" :class="{ 'is-invalid': form.errors.has('title') }">
                                    <has-error :form="form" field="title"></has-error>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-12 col-sm-12">
                                    <label for="newDescription">Description</label>
                                    <textarea v-model="form.description" type="text" class="form-control" id="newDescription"
                                        name="description" placeholder="Description" :class="{ 'is-invalid': form.errors.has('description') }"></textarea>
                                    <has-error :form="form" field="description"></has-error>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-12 col-sm-12">
                                    <label for="newSelectCatId">Select Category</label>
                                    <select class="form-control" v-model="form.cat_id" :class="{ 'is-invalid': form.errors.has('cat_id') }">
                                        <option disabled value="">--select one--</option>
                                        <option v-for="category in getAllCategory" :key="category.id">{{ category.cat_name }}</option>
                                    </select>
                                    <has-error :form="form" field="cat_id"></has-error>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-12 col-sm-12">
                                    <input type="file" name="photo" :class="{ 'is-invalid': form.errors.has('photo') }">
                                    <has-error :form="form" field="photo"></has-error>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <div class="col-lg-6 col-sm-12">
                                <button @click.prevent="addPost()" type="submit" class="btn btn-primary btn-sm">Save</button>
                                <button type="button" class="btn btn-secondary btn-sm">
                                    <router-link to="/post-list" class="text-white" style="text-decoration: none;">lists post</router-link>
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
        name: 'New',

        data() {
            return{
                form: new Form({
                    title: '',
                    description: '',
                    cat_id: '',
                    photo: '',

                })
            }
        },

        mounted() {
            this.$store.dispatch("allCategory")
        },

        computed:{
            getAllCategory() {
                return this.$store.getters.getCategory
            }
        },

        methods:{

        }
    }

</script>
