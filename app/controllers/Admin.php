<?php

class Admin extends MainController
{
    public function __construct(){
        parent::__construct();
        Session::checkAuth();
    }

    public function Index(){
        return $this->load->view('Admin/admin');
    }



}