<?php

class Login extends MainController
{
    public function __construct(){
        parent::__construct();
    }

    public function Index(){
        return $this->login();
    }

    public function login(){
        Session::init();
        if (Session::get('login') == true){
            header('Location:'.BASE_URL.'/admin');
        }
        return $this->load->view('Login/login');
    }

    public function loginAuth(){
        $table = 'tbl_user';

        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $loginModel = $this->load->model('LoginModel');
        $count = $loginModel->userControl($table, $username, $password);

        if ($count > 0){
            $getUserData = $loginModel->getAuthUserData($table, $username, $password);
            $username = $getUserData[0]['username'];
            $userid = $getUserData[0]['id'];
            $level = $getUserData[0]['level'];
            Session::init();
            Session::set('login', true);
            Session::set('username', $username);
            Session::set('level', $level);
            Session::set('userid', $userid);
            header('Location:'.BASE_URL.'/Admin');
        }else{
            header('Location:'.BASE_URL.'/login');
        }

    }

    public function Logout(){
        Session::init();
        if (Session::get('login') == true){
            Session::destroy();
            header('Location: '.BASE_URL.'/login');
        }
    }

}