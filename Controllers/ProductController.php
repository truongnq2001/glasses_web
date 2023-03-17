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
                $category_id = 1;
                break;
            
            case 'kinh-can-nua-vien':
                $category_id = 2;
                break;
            
            case 'kinh-can-ca-vien':
                $category_id = 3;
                break;

            case 'kinh-ram-can':
                $category_id = 4;
                break;

            case 'trong-kinh':
                $category_id = 5;
                break;
        }
        $listProduct = $this->productModel->getByCategory($category_id);
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