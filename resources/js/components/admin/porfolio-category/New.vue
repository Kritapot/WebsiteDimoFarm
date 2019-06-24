<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-sm-12"><br>
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">เพิ่มประเภท Porfolio ใหม่</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form">
                        <div class="card-body">
                            <div class="form-group">
                                <div class="col-lg-6 col-sm-12">
                                    <label for="newCategory">ชื่อประเภท</label>
                                    <input type="text" class="form-control" id="newCategory" name="cat_name" placeholder="ชื่อประเภท">
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <div class="col-lg-6 col-sm-12">
                                <button type="submit" class="btn btn-primary btn-sm">บันทึก</button>
                                <button type="button" class="btn btn-secondary btn-sm">
                                    <router-link to="/portfolio-cat-list" class="text-white" style="text-decoration: none;">กลับสู่หน้าแสดงประเภท Porfolio</router-link>
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

            }
        },
        methods:{
        }
    }

</script>
