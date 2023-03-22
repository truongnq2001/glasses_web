<?php

class ContactController extends BaseController{

    public function index()
    {
        return $this->view('frontend.contact');
    }

}

?>