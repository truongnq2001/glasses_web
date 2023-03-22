<?php
include 'public/header.php';
?>
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Trang chủ</a>
                    <?php echo '<a class="breadcrumb-item text-dark" href="#">'.$product['category'].'</a>';?>
                    <span class="breadcrumb-item active">Chi tiết sản phẩm</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Shop Detail Start -->
    <div class="container-fluid pb-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 mb-30">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner bg-light">
                        <?php
                            echo '<div class="carousel-item active">
                                    <img class="w-100 h-100" src="'.$product['image'].'" alt="Image">
                                </div>'
                        ?>
                        <!-- <div class="carousel-item active">
                            <img class="w-100 h-100" src="./Views/frontend/assets_frontend/img/product-1.jpg" alt="Image">
                        </div>
                        <div class="carousel-item">
                            <img class="w-100 h-100" src="./Views/frontend/assets_frontend/img/product-2.jpg" alt="Image">
                        </div>
                        <div class="carousel-item">
                            <img class="w-100 h-100" src="./Views/frontend/assets_frontend/img/product-3.jpg" alt="Image">
                        </div>
                        <div class="carousel-item">
                            <img class="w-100 h-100" src="./Views/frontend/assets_frontend/img/product-4.jpg" alt="Image">
                        </div> -->
                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                        <i class="fa fa-2x fa-angle-left text-dark"></i>
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                        <i class="fa fa-2x fa-angle-right text-dark"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-7 h-auto mb-30">
                <div class="h-100 bg-light p-30">
                    <?php
                    echo'<h3>'.$product['name'].'</h3>
                        <h3 class="font-weight-semi-bold mb-4" style="color: #ff5c00;">'.number_format($product['price'], 0, '.', ',').' VNĐ</h3>';
                    ?>
                    <!-- <h3>Product Name Goes Here</h3>
                    <div class="d-flex mb-3">
                        <div class="text-primary mr-2">
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star-half-alt"></small>
                            <small class="far fa-star"></small>
                        </div>
                        <small class="pt-1">(99 Reviews)</small>
                    </div>
                    <h3 class="font-weight-semi-bold mb-4">$150.00</h3> -->
                    <p class="mb-4">Kính râm thời trang C7006 Blue mang đến trải nghiệm hoàn hảo qua gam màu xanh blue độc đáo cùng form dáng mắt vuông với kết cấu vững chắc. 
                        Ngoài ra, chất liệu nhựa cao cấp và kim loại tạo nên sự kết hợp ăn ý, giúp sản phẩm đạt độ bền và giá trị sử dụng lâu dài. 
                        Hai cầu kính là điểm nhấn ấn tượng, mang đến vẻ đẹp thời thượng cho tổng thể khuôn mặt.</p>
                    
                        <p class="mb-4">Tròng kính tích hợp đầy đủ chức năng: chống chói, chống loá, chống ánh sáng có hại, chống tia UV,… 
                            Có thể nói C7006 trở thành best choice dành tặng bất cứ ai.</p>
                    <!-- <div class="d-flex mb-3">
                        <strong class="text-dark mr-3">Sizes:</strong>
                        <form>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="size-1" name="size">
                                <label class="custom-control-label" for="size-1">XS</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="size-2" name="size">
                                <label class="custom-control-label" for="size-2">S</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="size-3" name="size">
                                <label class="custom-control-label" for="size-3">M</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="size-4" name="size">
                                <label class="custom-control-label" for="size-4">L</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="size-5" name="size">
                                <label class="custom-control-label" for="size-5">XL</label>
                            </div>
                        </form>
                    </div>
                    <div class="d-flex mb-4">
                        <strong class="text-dark mr-3">Colors:</strong>
                        <form>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="color-1" name="color">
                                <label class="custom-control-label" for="color-1">Black</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="color-2" name="color">
                                <label class="custom-control-label" for="color-2">White</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="color-3" name="color">
                                <label class="custom-control-label" for="color-3">Red</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="color-4" name="color">
                                <label class="custom-control-label" for="color-4">Blue</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="color-5" name="color">
                                <label class="custom-control-label" for="color-5">Green</label>
                            </div>
                        </form>
                    </div> -->
                    <div class="d-flex align-items-center mb-4 pt-2">
                        <div class="input-group quantity mr-3" style="width: 130px;">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-minus" onclick="minusProduct()">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <input id="myInput" type="text" class="form-control bg-secondary border-0 text-center" value="1">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-plus" onclick="plusProduct()">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <button class="btn btn-primary px-3" onclick="addToCart(<?=$product['id']?>, '<?=$product['name']?>', <?=$product['price']?>)">
                            <i class="fa fa-shopping-cart mr-1"></i> Thêm vào giỏ hàng
                        </button>
                    </div>
                    <script>
                        function plusProduct(){
                            var input = document.getElementById("myInput");
                            var currentValue = parseInt(input.value);
                            var newValue = currentValue + 1;
                            input.value = newValue;
                        }
                        function minusProduct(){
                            var input = document.getElementById("myInput");
                            var currentValue = parseInt(input.value);
                            if(currentValue > 1){
                                var newValue = currentValue - 1;
                            }else{
                                var newValue = 1;
                            }
                            input.value = newValue;
                        }
                        function addToCart(product_id, product_name, product_price){
                            var input = document.getElementById("myInput");
                            var inputValue = parseInt(input.value); 
                            $.post("?controller=cart&action=saveCart", { 
                                'product_quantity': inputValue,
                                'product_id': product_id,
                                'product_price': product_price,
                                'product_name': product_name,
                            }, function(data) {
                                alert('Thêm sản phẩm vào giỏ hàng thành công!');
                                location.reload();
                            });
                        }
                    </script>
                    <?php
                        echo'<a href="?controller=cart&action=saveCart&product_id='.$product['id'].'&product_name='.$product['name'].'&product_price='.$product['price'].'&product_quantity=1" class="btn btn-primary px-3" style="font-weight: bold; font-size: 22px; width: 46%;">MUA NGAY</a>';
                    ?>                    <div class="d-flex pt-2">
                        <strong class="text-dark mr-2">Chia sẻ:</strong>
                        <div class="d-inline-flex">
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-pinterest"></i>
                            </a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="bg-light p-30">
                    <div class="nav nav-tabs mb-4">
                        <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-3">BÌNH LUẬN</a>
                    </div>
                    <div class="row">
                                <div class="col-md-6">
                                    <h4 class="mb-4"><?=count($allComment)?> bình luận cho sản phẩm</h4>
                                    <?php
                                    foreach ($allComment as $item) {
                                        $date = new DateTime($item['updated_at']);
                                        echo'<div class="media mb-4">
                                                <img src="https://www.shareicon.net/data/512x512/2017/02/15/878685_user_512x512.png" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                                <div class="media-body">
                                                    <h6>'.$item['name'].'<small> - <i>'.$date->format('d \t\h\á\n\g m \n\ă\m Y').'</i></small></h6>
                                                    <p>'.$item['content'].'</p>
                                                </div>
                                            </div>';
                                    }
                                    ?>
                                </div>
                                <div class="col-md-6">
                                    <h4 class="mb-4">Để lại bình luận</h4>
                                    <small>Email của bạn sẽ không được công khai. Vui lòng điền đầy đủ vào các trường thông tin có dấu *</small>
        
                                    <form id="comment-form" action="?controller=comment" method="POST">
                                        <div class="form-group">
                                            <label for="message">Nội dung bình luận *</label>
                                            <textarea name="contentComment" id="message" cols="30" rows="5" class="form-control" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Tên của bạn *</label>
                                            <input name="nameUserComment" type="text" class="form-control" id="name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email *</label>
                                            <input name="emailUserComment" type="email" class="form-control" id="email" required>
                                        </div>
                                        <input name="productId" value="<?=$product['id']?>" type="text" class="form-control" id="email" hidden>
                                        <div class="form-group mb-0">
                                            <button type="submit" class="btn btn-primary px-3">Bình luận</button>
                                        </div>
                                    </form>
                                    
                                </div>
                            </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->


    <!-- Products Start -->
    <!-- Products End -->
    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Bạn có thể thích</span></h2>
        <div class="row px-xl-5">
        <?php
            foreach ($listProduct as $item){
                echo'<div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                        <div class="product-item bg-light mb-4">
                            <div class="product-img position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="'.$item['image'].'" alt="">
                                <div class="product-action">
                                    <a class="btn btn-outline-dark btn-square" href="?controller=cart&action=saveCart&product_id='.$item['id'].'&product_name='.$item['name'].'&product_price='.$item['price'].'&product_quantity=1">
                                        <i class="fa fa-shopping-cart"></i>
                                    </a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="text-center py-4">
                                <a class="h6 text-decoration-none text-truncate" href="?controller=product&action=show&id='.$item['id'].'" style="white-space: normal; font-size: 15px;">'.$item['name'].'</a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5 style="font-size: 15px; color: #ff5c00;">'.number_format($item['price'], 0, '.', ',').' VNĐ</h5><h6 class="text-muted ml-2" style="font-size: 15px;"><del>'.number_format($item['price'], 0, '.', ',').' VNĐ</del></h6>
                                </div>
                                
                            </div>
                        </div>
                    </div>';
            }
            ?>
        </div>
    </div>

<?php
include 'public/footer.php';
?>