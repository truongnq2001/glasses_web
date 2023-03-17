<?php

class DashboardController extends BaseController{
    private $productModel;
    private $listProduct;
    private $total;
    private $pages;
    private $current_page;
    private $index;
    private $limitProducts;
    public function __construct(){
        $this->loadModel('ProductModel');
        $this->productModel = new ProductModel;

        $this->listProduct = $this->productModel->getAll();
        $this->total = $this->productModel->getTotal();

        $this->pages = ceil($this->total / 3);
        $this->current_page = 1;
        if(isset($_GET['page'])){
            $this->current_page = $_GET['page'];
        }
        $this->index = ($this->current_page - 1)*3;

        $this->limitProducts = $this->productModel->getLimit($this->index);
    }
    public function index(){
        return $this->view('backend.index', [
            'limitProducts' => $this->limitProducts,
            'pages' => $this->pages,
        ]);
    }

    public function edit(){
        return $this->view('backend.index', [
            'limitProducts' => $this->limitProducts,
            'pages' => $this->pages,
        ]);
    }

    public function updateProduct(){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $currentTime = date('Y-m-d H:i:s');
        $data = [
            'name' => $_POST['productName'],
            'price' => $_POST['productPrice'],
            'image' => $_POST['productImg'],
            'category_id' => $_POST['productCategory'],
            'update_at' => $currentTime
        ];
        header('Location: ?controller=dashboard&page='.$_GET['page'].'');
        return $this->productModel->updateData($_GET['id'], $data);
    }

    public function addProduct(){
        return $this->view('backend.addProduct');
    }
    public function createProduct(){
        $data = [
            'name' => $_POST['productName'],
            'price' => $_POST['productPrice'],
            'image' => $_POST['productImg'],
            'category_id' => $_POST['productCategory'],
        ];

        header('Location: ?controller=dashboard');

        return $this->productModel->createData($data);
    }

}

?>