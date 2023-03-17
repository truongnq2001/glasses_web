<?php
include 'public/header.php';
include 'public/dashboard.php';
?>
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">
            <div class="col-12">
                <form class="card" action="?controller=dashboard&action=createProduct" method="POST">
                    <div class="card-body" style="padding-top: 100px;">
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Tên</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="productName" type="text" placeholder="Tên sản phẩm" id="example-text-input" required>
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="example-search-input" class="col-sm-2 col-form-label">Giá</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="productPrice" type="text" placeholder="Giá sản phẩm" id="example-search-input" required>
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="example-search-input" class="col-sm-2 col-form-label">Ảnh</label>
                            <div class="col-sm-10" style="display: flex;">
                                <input class="form-control" name="productImg" style="width: 30%; margin-right: 20px;" type="text" placeholder="Link ảnh của sản phẩm" id="image-url" required>
                                <button class="btn btn-primary" type="button" onclick="displayImage()">Xem ảnh</button>
                            </div>
                            <img id="preview" src="#" alt="Xem trước ảnh" hidden>
                            <style>
                            #preview{
                                width: 170px;
                                height: 150px;
                                object-fit: cover;
                            }
                            </style>
                            <script>
                                function displayImage() {
                                var imageUrl = document.getElementById("image-url").value;
                                var preview = document.getElementById("preview");
                                preview.src = imageUrl;
                                preview.removeAttribute("hidden");
                                }
                            </script>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Loại</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="productCategory" aria-label="Default select example" required>
                                    <option selected="">Chọn loại kính</option>
                                    <option value="1">Kính râm</option>
                                    <option value="2">Kính cận nửa viền</option>
                                    <option value="3">Kính cận cả viền</option>
                                    <option value="4">Kính râm cận</option>
                                    <option value="5">Tròng kính</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <button class="btn btn-primary" type="submit" style="width: 12%; margin: 0 auto;">Thêm sản phẩm</button>
                        </div>
                        <!-- end row -->
                    </div>
                </form>
            </div>
                <!-- End Page-content -->
               
<?php
include 'public/footer.php';
?>