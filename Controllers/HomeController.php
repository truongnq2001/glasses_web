<?php

class HomeController extends BaseController{

    private $productModel;

    private $categoryModel;

    public function __construct(){
        $this->loadModel('ProductModel');
        $this->productModel = new ProductModel;

        $this->loadModel('CategoryModel');
        $this->categoryModel = new CategoryModel;
    }

    public function index(){
        $listProduct = $this->productModel->getNumberNewProduct(8);

        return $this->view('frontend.index',[
            'listProduct' => $listProduct,
            'totalKinhRam' => $this->getTotalCategory(1),
            'totalKinhCanNuaVien' => $this->getTotalCategory(2),
            'totalKinhCanCaVien' => $this->getTotalCategory(3),
            'totalKinhRamCan' => $this->getTotalCategory(4),
            'totalTrongKinh' => $this->getTotalCategory(5),
        ]);
    }

    private function getTotalCategory(int $id){
        $total = $this->categoryModel->totalCategory($id);
        return $total['COUNT(*)'];
    }
    
}

?>