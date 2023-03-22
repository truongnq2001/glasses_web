<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Đăng ký - Glasses Shop</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="https://groupgiamgia.com/wp-content/uploads/2021/12/logo.png">

        <!-- Bootstrap Css -->
        <link href="./Views/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="./Views/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="./Views/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body class="auth-body-bg">
        <div class="bg-overlay"></div>
        <div class="wrapper-page">
            <div class="container-fluid p-0">
                <div class="card">
                    <div class="card-body">
    
                        <h4 class="text-muted text-center font-size-18" style="margin-top: 20px;"><b>GLASSES SHOP</b></h4>
    
                        <div class="p-3">
                            <form class="form-horizontal mt-3" action="?controller=register&action=registerAccount" method="POST">
    
                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <input name="email" class="form-control" type="email" required="" placeholder="Email">
                                    </div>
                                </div>
    
                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <input name="username" class="form-control" type="text" required="" placeholder="Username">
                                    </div>
                                </div>
    
                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <input name="password" class="form-control" type="password" required="" placeholder="Password">
                                    </div>
                                </div>
    
                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                            <label class="form-label ms-1 fw-normal" for="customCheck1">I accept <a href="#" class="text-muted">Terms and Conditions</a></label>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="form-group text-center row mt-3 pt-1">
                                    <div class="col-12">
                                        <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Đăng kí</button>
                                    </div>
                                </div>
    
                                <div class="form-group mt-2 mb-0 row">
                                    <div class="col-12 mt-3 text-center">
                                        <a href="?controller=login" class="text-muted">Đã có tài khoản?</a>
                                    </div>
                                </div>
                                <div class="col-12 mt-3 text-center">
                                    <img src="https://pt.seaicons.com/wp-content/uploads/2015/06/Home-icon.png" alt="" style="width: 10%;">
                                    <a href="index.php" class="text-muted">Về trang chủ</a>
                                </div>
                            </form>
                            <!-- end form -->
                        </div>
                    </div>
                    <!-- end cardbody -->
                </div>
                <!-- end card -->
            </div>
            <!-- end container -->
        </div>
        <!-- end -->
        

        <!-- JAVASCRIPT -->
        <script src="./Views/assets/libs/jquery/jquery.min.js"></script>
        <script src="./Views/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="./Views/assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="./Views/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="./Views/assets/libs/node-waves/waves.min.js"></script>

        <script src="./Views/assets/js/app.js"></script>

    </body>
</html>
