<?php
class DashboardController extends BaseController
{
    private $productModel;

    public function __construct()
    {
        $this->loadModel('ProductModel');
        $this->productModel = new ProductModel;
        if(!isset($_SESSION['loginAdmin']) || $_SESSION['loginAdmin'] != true){
            header('Location: admin.php?controller=loginAdmin');
            exit();
        }
    }

    public function index()
    {
        return $this->view(
            data: [
                'limitProducts' => $this->getLimitProducts(),
                'pages' => $this->getPagesProducts(),
            ],
            viewPath: 'backend.index',
        );
    }

    public function edit()
    {
        return $this->view('backend.index', [
            'limitProducts' => $this->getLimitProducts(),
            'pages' => $this->getPagesProducts(),
        ]);
    }

    public function updateProduct()
    {
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

    public function addProduct()
    {
        return $this->view('backend.addProduct');
    }

    public function createProduct()
    {
        $data = [
            'name' => $_POST['productName'],
            'price' => $_POST['productPrice'],
            'image' => $_POST['productImg'],
            'category_id' => $_POST['productCategory'],
        ];

        header('Location: ?controller=dashboard');

        return $this->productModel->createData($data);
    }

    public function deleteProductData()
    {
        $id = $_GET['id'];
        return $this->productModel->deleteProduct($id);
    }

    private function getLimitProducts()
    {
        $currentPage = 1;
        if (isset($_GET['page'])){
            $currentPage = $_GET['page'];
        }
        $index = ($currentPage - 1)*3;

        $limitProducts = $this->productModel->getLimit($index, 3);
        return $limitProducts;
    }

    private function getPagesProducts()
    {
        $total = $this->productModel->getTotal();
        $pages = ceil($total / 3);
        return $pages;
    }

    public function user()
    {
        $this->loadModel('UserModel');
        $userModel = new UserModel;
        $listUser = $userModel->getLimitUser(0, 8);
        return $this->view(
            viewPath: 'backend.userDashboard',
            data: [
                'listUser' => $listUser,
            ]
        );
    }
}
