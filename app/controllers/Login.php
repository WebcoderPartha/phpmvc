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
        $table      = 'tbl_user';

        $username   = $_POST['username'];
        $password   = md5($_POST['password']);
        $loginModel = $this->load->model('LoginModel');
        $count      = $loginModel->userControl($table, $username, $password);
        $message    = [];
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

            $message['msg'] = 'Hurray! Logged in successful!';
            $url = BASE_URL.'/admin?msg='.urlencode(serialize($message));
            header('Location:'.$url);
        }else{
            $msg = "Invalid username or password!";
            $url = BASE_URL.'/login?errmsg='.urlencode(serialize($msg));
            header('Location:'.$url);
        }

    }

    public function Logout(){
        $msg = "Logged out successful!";
        $url = BASE_URL.'/login?msg='.urlencode(serialize($msg));
        Session::init();
        if (Session::get('login') == true){
            Session::destroy();
            header('Location: '.$url);
        }

    }

}