<?php
class CommentController extends BaseController{
    private $commentModel;

    public function __construct()
    {
        $this->loadModel('CommentModel');
        $this->commentModel = new CommentModel;
    }

    public function index()
    {
        $data = [
            'content' => $_POST['contentComment'],
            'name' => $_POST['nameUserComment'],
            'email' => $_POST['emailUserComment'],
            'product_id' => $_POST['productId'],
        ];
        header('Location: ?controller=product&action=show&id='.$_POST['productId'].'');
        return $this->commentModel->createComment($data);
    }
    
}

?>