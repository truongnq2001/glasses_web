<?php

class ProductController extends BaseController{
    private $productModel;
    public function __construct(){
        $this->loadModel('ProductModel');
        $this->productModel = new ProductModel;
    }

    public function index()
    {
        $categoryId = $this->getCategoryIdName()['categoryId'];
        $categoryName = $this->getCategoryIdName()['categoryName'];
        $limitPrice = $this->getLimitPrice();
        $condition = "p.category_id = $categoryId";
        $listProduct = $this->getLimitProductsCondition($condition);
        $page = $this->getPagesProducts($this->productModel->getTotalByCategory($categoryId, $limitPrice));
        return $this->view('frontend.category',[
            'listProduct' => $listProduct,
            'categoryName' => $categoryName,
            'pages' => $page,
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
        $searchName = $_GET['searchName'];
        $condition = "p.name LIKE '%$searchName%'";
        $listProduct = $this->getLimitProductsCondition($condition);
        $page = $this->getPagesProducts(count($listProduct));
        return $this->view('frontend.category',[
            'listProduct' => $listProduct,
            'searchName' => $_GET['searchName'],
            'pages' => $page,
        ]);
    }

    private function getLimitProductsCondition(string $condition)
    {
        $currentPage = 1;
        if (isset($_GET['page'])){
            $currentPage = $_GET['page'];
        }
        $index = ($currentPage - 1)*9;
        $limitPrice = $this->getLimitPrice();
        $sortPrice = $this->getSortPrice();

        $limitProducts = $this->productModel->getLimitProduct($index, 9, $condition, $limitPrice, $sortPrice);
        return $limitProducts;
    }

    private function getPagesProducts(int $total)
    {
        $pages = ceil($total / 9);
        return $pages;
    }
    
    private function getLimitPrice()
    {
        $strLimitPrice = "";
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            if (isset($_REQUEST['checkboxPrice'])) {
                $checkboxPrice = $_REQUEST['checkboxPrice'];
                switch ($checkboxPrice) {
                    case 1:
                        $strLimitPrice = "AND price >300000 AND price < 500000";
                        break;
                    case 2:
                        $strLimitPrice = "AND price >500000 AND price < 700000";
                        break;
                    case 3:
                        $strLimitPrice = "AND price >700000 AND price < 1000000";
                        break;
                    case 4:
                        $strLimitPrice = "AND price > 1000000";
                        break;
                }
            }
        }
        return $strLimitPrice;
    }
    private function getSortPrice()
    {
        $strSortPrice = "";
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            if (isset($_REQUEST['optionSort'])) {
                $checkboxSort = $_REQUEST['optionSort'];
                switch ($checkboxSort) {
                    case 1:
                        $strSortPrice = "price ASC";
                        break;
                    case 2:
                        $strSortPrice = "price DESC ";
                        break;
                }
            }
        }
        return $strSortPrice;
    }

    private function getCategoryIdName(){
        $category = $_REQUEST['category'];
        switch ($category) {
            case 'kinh-ram':
                $categoryId = 1;
                $categoryName = 'Kính râm';
                break;
            
            case 'kinh-can-nua-vien':
                $categoryId = 2;
                $categoryName = 'Kính cận nửa viền';
                break;
            
            case 'kinh-can-ca-vien':
                $categoryId = 3;
                $categoryName = 'Kính cận cả viền';
                break;

            case 'kinh-ram-can':
                $categoryId = 4;
                $categoryName = 'Kính râm cận';
                break;

            case 'trong-kinh':
                $categoryId = 5;
                $categoryName = 'Tròng kính';
                break;
        }
        return array('categoryId' => $categoryId, 
        'categoryName' => $categoryName);
    }
}

?>