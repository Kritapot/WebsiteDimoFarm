<template>
    <div id="about-us-admin">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-sm-12"><br>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">แก้ไขหน้าเกี่ยวกับเรา</h3>
                        </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                        <form role="form">
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="col-lg-12 col-sm-12">
                                        <label for="newTitle">หัวข้อ</label>
                                        <input type="text" class="form-control" id="newTitle"
                                            name="title" placeholder="Title" :class="{ 'is-invalid': form.errors.has('title') }">
                                        <has-error :form="form" field="title"></has-error>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-12 col-sm-12">
                                        <label for="">รายละเอียดบทความ</label>
                                        <textarea cols="100" rows="10" placeholder="รายละเอียดบทความ"></textarea>
                                        <has-error :form="form" field="description"></has-error>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-12 col-sm-12">
                                        <input type="file" name="photo" :class="{ 'is-invalid': form.errors.has('photo') }">
                                        <img>
                                        <has-error :form="form" field="photo"></has-error>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <div class="col-lg-6 col-sm-12">
                                    <button type="submit" class="btn btn-primary">บันทึก</button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>

    </div>
</template>

<script>

</script>

<style scoped>

</style>
