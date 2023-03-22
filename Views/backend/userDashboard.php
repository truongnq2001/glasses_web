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

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Danh sách các user trong hệ thống</h4>
                                        
                                        <div class="table-responsive">
                                            <table class="table table-dark mb-0">
        
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Username</th>
                                                        <th>Email</th>
                                                        <th>Ngày tạo</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    foreach ($listUser as $item) {
                                                        echo'<tr>
                                                                <th scope="row">'.$item['id'].'</th>
                                                                <td>'.$item['username'].'</td>
                                                                <td>'.$item['email'].'</td>
                                                                <td>'.$item['created_at'].'</td>
                                                            </tr>';
                                                    }
                                                    ?>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
        
                        
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
<?php
include 'public/footer.php';
?>