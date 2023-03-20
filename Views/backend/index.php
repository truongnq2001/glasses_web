<?php
include 'public/header.php';
include 'public/dashboard.php';
?>

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Dashboard</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Upcube</a></li>
                                            <li class="breadcrumb-item active">Dashboard</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown float-end">
                                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                            </div>
                                        </div>
    
                                        <h4 class="card-title mb-4">Danh sách sản phẩm đã đăng</h4>
    
                                        <div class="table-responsive">
                                            <table class="table-product table table-centered mb-0 align-middle table-hover table-nowrap">
                                                <style>
                                                .table-product td{
                                                    white-space: normal;
                                                }
                                                .date-product{
                                                    font-size: 13px;
                                                }
                                                #product-selected input{
                                                    height: 40px;
                                                }
                                                </style>
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>STT</th>
                                                        <th>Tên</th>
                                                        <th>Ảnh</th>
                                                        <th>Giá</th>
                                                        <th>Loại</th>
                                                        <th>Ngày tạo</th>
                                                        <th>Cập nhật</th>
                                                        <th>Chỉnh sửa</th>
                                                        <th>Xóa</th>
                                                    </tr>
                                                </thead><!-- end thead -->
                                                <tbody>
                                                    <?php
                                                        if(!isset($_GET['page']) || $_GET['page'] == ''){
                                                            $_GET['page'] = '1';
                                                        }
                                                        if (isset($_GET['id'])){
                                                            $idCurrent = $_GET['id'];
                                                        }
                                                        $index = 1 + ($_GET['page']-1)*3;
                                                        foreach($limitProducts as $item) {
                                                            if (isset($_GET['id'])){
                                                                if($item['id'] == $idCurrent){
                                                                    echo ' <tr id="product-selected">
                                                                            <td><h6 class="mb-0">'.($index++).'</h6></td>
                                                                            <form action="admin.php?controller=dashboard&page='.$_GET['page'].'&action=updateProduct&id='.$item['id'].'" method="POST">
                                                                                <td><input name = "productName" style="width: 325px;" type="text" value = "'.$item['name'].'"> </td>
                                                                                <td><input name = "productImg" style="width: 125px;" type="text" value = "'.$item['image'].'"> </td>
                                                                                <td><input name = "productPrice" style="width: 80px;" type="text" value = "'.$item['price'].'"> </td>                      
                                                                                <td>
                                                                                    <select class="form-select" style="width: 120px;" name="productCategory" aria-label="Default select example">';
                                                                                        $optionArr = [
                                                                                            1 => 'Kính râm',
                                                                                            2 => 'Kính cận nửa viền',
                                                                                            3 => 'Kính cận cả viền',
                                                                                            4 => 'Kính râm cận',
                                                                                            5 => 'Tròng kính',
                                                                                        ];
                                                                                        foreach ($optionArr as $key => $value) {
                                                                                            if( $value == $item['category']){
                                                                                                echo'<option selected="" value="'.$key.'">'.$value.'</option>';
                                                                                            }else{
                                                                                                echo'<option value="'.$key.'">'.$value.'</option>';
                                                                                            }
                                                                                        }
                                                                                       
                                                                                    echo'</select>
                                                                                </td>
                                                                                <td class="date-product">'.$item['create_at'].'</td>
                                                                                <td class="date-product">'.$item['update_at'].'</td>
                                                                                <td>
                                                                                    <button type="submit" class="btn btn-success">Lưu</button>
                                                                                </td>
                                                                            </form>
                                                                            <td>
                                                                                <button class="btn btn-danger" onclick="confirmDelete('.$item['id'].')" type="submit" style="width: 100%;">Xóa</button>
                                                                            </td>
                                                                        </tr>';
                                                                } else{
                                                                    echo ' <tr>
                                                                            <td><h6 class="mb-0">'.($index++).'</h6></td>
                                                                            <td>'.$item['name'].'</td>
                                                                            <td style="width: 150px;">
                                                                                <img src="'.$item['image'].'" alt="'.$item['name'].'" style="width:100%;">
                                                                            </td>
                                                                            <td>'.$item['price'].'</td>
                                                                            <td>'.$item['category'].'</td>
                                                                            <td class="date-product">'.$item['create_at'].'</td>
                                                                            <td class="date-product">'.$item['update_at'].'</td>
                                                                            <td>
                                                                                <a href = "admin.php?controller=dashboard&page='.$_GET['page'].'&action=edit&id='.$item['id'].'">
                                                                                    <button class = "btn btn-warning">Sửa</button>
                                                                                </a>
                                                                            </td>
                                                                            <td>
                                                                                <button class="btn btn-danger" onclick="confirmDelete('.$item['id'].')" type="submit" style="width: 100%;">Xóa</button>
                                                                            </td>
                                                                        </tr>';
                                                                    }
                                                                }else{
                                                                    echo ' <tr>
                                                                                <td><h6 class="mb-0">'.($index++).'</h6></td>
                                                                                <td>'.$item['name'].'</td>
                                                                                <td style="width: 150px;">
                                                                                    <img src="'.$item['image'].'" alt="'.$item['name'].'" style="width:100%;">
                                                                                </td>
                                                                                <td>'.$item['price'].'</td>
                                                                                <td>'.$item['category'].'</td>
                                                                                <td class="date-product">'.$item['create_at'].'</td>
                                                                                <td class="date-product">'.$item['update_at'].'</td>
                                                                                <td>
                                                                                    <a href = "admin.php?controller=dashboard&page='.$_GET['page'].'&action=edit&id='.$item['id'].'">
                                                                                        <button class = "btn btn-warning">Sửa</button>
                                                                                    </a>
                                                                                </td>
                                                                                <td>
                                                                                    <button class="btn btn-danger" onclick="confirmDelete('.$item['id'].')" type="submit" style="width: 100%;">Xóa</button>
                                                                                </td>
                                                                            </tr>';
                                                            }
                                                    }
                                                    ?>
                                                </tbody><!-- end tbody -->
                                                <script>
                                                    function confirmDelete(productId) {
                                                    if (confirm("Bạn có chắc chắn muốn xóa sản phẩm này không?")) {
                                                        var xmlhttp = new XMLHttpRequest();
                                                        xmlhttp.onreadystatechange = function() {
                                                            if (this.readyState == 4 && this.status == 200) {
                                                                alert("Xóa sản phẩm thành công!");
                                                                location.reload();
                                                            }
                                                        };
                                                        xmlhttp.open("GET", "admin.php?controller=dashboard&action=deleteProductData&id=" + productId, true);
                                                        xmlhttp.send();
                                                    }
                                                    }
                                                </script>
                                            </table> <!-- end table -->
                                        </div>
                                    </div><!-- end card -->
                                </div><!-- end card -->
                            </div>
                            <!-- end col -->
                            
                        </div>
                        <!-- end row -->
                        <ul class="pagination pagination-rounded">
                            <?php
                                $prePage = $_GET['page']-1;
                                if($_GET['page'] == 1){
                                    echo'<li class="page-item disabled">
                                            <a class="page-link" >Trước</a>
                                        </li>';
                                } else{
                                    echo'<li class="page-item">
                                            <a class="page-link" href="?controller=dashboard&page='.$prePage.'">Trước</a>
                                        </li>';
                                }
                            ?>
                            <?php
                            for ($i = 1; $i <= $pages; $i++){
                                if($i == $_GET['page']){
                                    echo '<li class="page-item active">
                                            <a class="page-link" href="?controller=dashboard&page='.$i.'">'.$i.'</a>
                                        </li>';
                                } else{
                                    echo '<li class="page-item">
                                            <a class="page-link" href="?controller=dashboard&page='.$i.'">'.$i.'</a>
                                        </li>';
                                }
                            }
                            ?>
                            <?php
                                $nextPage = $_GET['page']+1;
                                if($_GET['page'] == $pages){
                                    echo'<li class="page-item disabled">
                                            <a class="page-link" >Sau</a>
                                        </li>';
                                } else{
                                    echo'<li class="page-item">
                                            <a class="page-link" href="?controller=dashboard&page='.$nextPage.'">Sau</a>
                                        </li>';
                                }
                            ?>
                        </ul>
                    </div>
                    
                </div>
                <!-- End Page-content -->
               
<?php
include 'public/footer.php';
?>
<script>
const productDiv = document.getElementById('product-selected');
productDiv.scrollIntoView();
</script>