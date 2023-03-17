<?php

class HomeController extends BaseController{
    private $productModel;
    public function __construct(){
        $this->loadModel('ProductModel');
        $this->productModel = new ProductModel;
    }

    public function index(){
        $listProduct = $this->productModel->getAll();
        return $this->view('frontend.index',[
            'listProduct' => $listProduct,
        ]);
    }
    
}

?>