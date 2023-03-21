<?php

class CartController extends BaseController{

    public function __construct()
    {
        if(!isset($_SESSION['userLogin']) || $_SESSION['userLogin'] != true){
            header('Location: ?controller=login');
            exit();
        }
    }

    public function index()
    {
        return $this->view('frontend.cart');
    }

    public function saveCart()
    {
        if (isset($_GET['product_id'])) {
            // Khai báo $_SESSION['cart'] = [] trong LoginController
            // lấy thông tin sản phẩm
            $productId = $_GET['product_id'];
            $productName = $_GET['product_name'];
            $productPrice = $_GET['product_price'];
            $productQuantity = $_GET['product_quantity'];
        
            // kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
            $productIndex = -1;
            if(isset($_SESSION['cart']) && $_SESSION['cart'] != []){
                for ($i = 0; $i < count($_SESSION['cart']); $i++) {
                    if ($_SESSION['cart'][$i]['product_id'] == $productId) {
                        $productIndex = $i;
                        break;
                    }
                }
            }
        
            // nếu sản phẩm đã tồn tại trong giỏ hàng, hãy tăng số lượng sản phẩm lên
            if ($productIndex != -1) {
                $_SESSION['cart'][$productIndex]['product_quantity'] += $productQuantity;
            } else {
                // nếu sản phẩm chưa tồn tại trong giỏ hàng, hãy thêm sản phẩm vào mảng cartItems
                array_push( $_SESSION['cart'], 
                            array(
                                'product_id' => $productId,
                                'product_name' => $productName,
                                'product_price' => $productPrice,
                                'product_quantity' => $productQuantity
                            )
                );
            }    
            header('Location: ?controller=cart'); 
            exit();  
        }
    }
    public function deleteItemCart()
    {
        if(!empty($_POST['product_id'])){
            $productId = $_POST['product_id'];
            for ($i = 0; $i < count($_SESSION['cart']); $i++) {
                if ($_SESSION['cart'][$i]['product_id'] == $productId) {
                    unset($_SESSION['cart'][$i]);
                    $_SESSION['cart'] = array_values($_SESSION['cart']);
                    break;
                }
            }
        }
    }

    public function plusQuantityItem()
    {
        if(!empty($_POST['product_id'])){
            $productId = $_POST['product_id'];
            for ($i = 0; $i < count($_SESSION['cart']); $i++) {
                if ($_SESSION['cart'][$i]['product_id'] == $productId) {
                    $_SESSION['cart'][$i]['product_quantity']++;
                    break;
                }
            }
        }
    }

    public function minusQuantityItem()
    {
        if(!empty($_POST['product_id'])){
            $productId = $_POST['product_id'];
            for ($i = 0; $i < count($_SESSION['cart']); $i++) {
                if ($_SESSION['cart'][$i]['product_id'] == $productId) {
                    $_SESSION['cart'][$i]['product_quantity']--;
                    break;
                }
            }
        }
    }

    public function paySuccess()
    {
        if(!empty($_POST['check_pay'])){
            if($_POST['check_pay'] == true){
                $_SESSION['cart'] = [];
            }
        }
    }

}

?>