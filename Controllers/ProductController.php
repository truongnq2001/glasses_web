<?php

class ProductController extends BaseController{
    private $productModel;
    public function __construct(){
        $this->loadModel('ProductModel');
        $this->productModel = new ProductModel;
    }

    public function index(){
        $category = $_GET['category'];
        switch ($category) {
            case 'kinh-ram':
                $categoryId = 1;
                break;
            
            case 'kinh-can-nua-vien':
                $categoryId = 2;
                break;
            
            case 'kinh-can-ca-vien':
                $categoryId = 3;
                break;

            case 'kinh-ram-can':
                $categoryId = 4;
                break;

            case 'trong-kinh':
                $categoryId = 5;
                break;
        }
        $listProduct = $this->productModel->getByCategory($categoryId);
        return $this->view('frontend.category',[
            'listProduct' => $listProduct,
        ]);
    }

    public function show(){
        $id = $_GET['id'];
        $product = $this->productModel->getById($id);
        return $this->view('frontend.detail',[
            'product' => $product,
        ]);
    }
    public function search(){
        $searchName = $_POST['searchName'];
        $listProduct = $this->productModel->getSearch($searchName);
        return $this->view('frontend.category',[
            'listProduct' => $listProduct,
            'searchName' => $searchName,
        ]);
    }
    
}

?>