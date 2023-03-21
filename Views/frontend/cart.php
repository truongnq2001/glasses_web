<?php
include 'public/header.php';
?>

    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Shopping Cart</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Giá tiền</th>
                            <th>Số lượng</th>
                            <th>Tổng tiền</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        <?php
                        foreach ($_SESSION['cart'] as $item) {
                            echo '<tr style="font-size: 14px;">
                                    <td class="align-middle" style="width: 40%; text-align: left;">'.$item['product_name'].'</td>
                                    <td class="align-middle">'.number_format($item['product_price'], 0, '.', ',').' VNĐ</td>
                                    <td class="align-middle">
                                        <div class="input-group quantity mx-auto" style="width: 100px;">
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-primary btn-minus" onclick="minusProduct('.$item['product_id'].')">
                                                <i class="fa fa-minus"></i>
                                                </button>
                                            </div>
                                            <input id="quantity-'.$item['product_id'].'" type="text" class="form-control form-control-sm bg-secondary border-0 text-center" value="'.$item['product_quantity'].'">
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-primary btn-plus" onclick="plusProduct('.$item['product_id'].')">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle">'.number_format($item['product_price']*$item['product_quantity'], 0, '.', ',').' VNĐ</td>
                                    <td class="align-middle"><button class="btn btn-sm btn-danger" onclick="deleteCart('.$item['product_id'].')"><i class="fa fa-times"></i></button></td>
                                </tr>';
                        }
                        ?>
                    </tbody>
                    <script>
                        function deleteCart(product_id){
                            if (confirm("Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng không?")) {
                                $.post('?controller=cart&action=deleteItemCart', {
                                    'product_id': product_id,
                                }, function(data){
                                    location.reload()
                                })
                            }
                        }
                        function plusProduct(product_id){
                            $.post('?controller=cart&action=plusQuantityItem', {
                                'product_id': product_id,
                            }, function(data){
                                location.reload()
                            })
                        }
                        function minusProduct(product_id){
                            $.post('?controller=cart&action=minusQuantityItem', {
                                'product_id': product_id,
                            }, function(data){
                                location.reload()
                            })
                        }
                    </script>
                </table>
                <?php
                    if(!isset($_SESSION['cart']) || $_SESSION['cart'] == []){
                        echo'<p style="text-align: center;">Chưa có sản phẩm nào</p>';
                    }
                ?>
            </div>
            <div class="col-lg-4">
                <form class="mb-30" action="">
                    <div class="input-group">
                        <input type="text" class="form-control border-0 p-4" placeholder="Mã khuyến mãi">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Áp dụng</button>
                        </div>
                    </div>
                </form>
                <?php
                $totalMoney = 0;
                for ($i = 0; $i < count($_SESSION['cart']); $i++) {
                    $totalMoney = $totalMoney + $_SESSION['cart'][$i]['product_price']*$_SESSION['cart'][$i]['product_quantity'];
                }
                ?>
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Tính tiền</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Tổng tiền</h6>
                            <h6><?=number_format($totalMoney, 0, '.', ',')?> VNĐ</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Phí vận chuyển</h6>
                            <h6 class="font-weight-medium">20,000 VNĐ</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Thành tiền</h5>
                            <h5><?=number_format($totalMoney+20000, 0, '.', ',')?> VNĐ</h5>
                        </div>
                        <?php
                            if(!isset($_SESSION['cart']) || $_SESSION['cart'] == []){
                                echo'<button class="btn btn-block btn-primary font-weight-bold my-3 py-3" onclick="falseMessage()">Thanh toán</button>';
                            }else{
                                echo'<button class="btn btn-block btn-primary font-weight-bold my-3 py-3" onclick="confirmPaySuccess()">Thanh toán</button>';
                            }
                        ?>
                    </div>
                    <script>
                        function confirmPaySuccess(){
                            alert('Thanh toán thành công!');
                            $.post('?controller=cart&action=paySuccess', {
                                'check_pay': true,
                            }, function(data){
                                location.reload()
                            })
                        }
                        function falseMessage(){
                            alert("Vui lòng thêm sản phẩm vào giỏ hàng để tiến hành thanh toán!");
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->


<?php
include 'public/footer.php';
?>