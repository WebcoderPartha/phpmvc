<?php

class Admin extends MainController
{
    public function __construct(){
        parent::__construct();
        Session::checkAuth();
    }

    public function Index(){
        $this->load->view('Admin/inc/header');
        $this->load->view('Admin/dashboard');
        $this->load->view('Admin/inc/footer');
    }

    public function category(){
        $table = 'tbl_student';

        $catModel = $this->load->model('CategoryModel');
        $data = $catModel->category_list($table);
        $this->load->view('Admin/inc/header');
        $this->load->view('Admin/Category/index', $data);
        $this->load->view('Admin/inc/footer');
    }

    public function editCategory($id){
        $table = 'tbl_student';

        $catModel = $this->load->model('CategoryModel');
        $data = $catModel->catById($table, $id);
        $this->load->view('Admin/inc/header');
        $this->load->view('Admin/Category/editcategory', $data);
        $this->load->view('Admin/inc/footer');
    }

    public function updateCategory($id){
        $table = 'tbl_student';
        $data = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'phone' => $_POST['address'],
            'address' => $_POST['address']
        ];
        $catModel = $this->load->model('CategoryModel');
        $update = $catModel->updateCat($table, $data, $id);
        if ($update == 1){
            Session::init();
            Session::set('msg', $_POST['name'].' student updated successfully.');
            header('Location:'.BASE_URL.'/admin/category');
        }

    }

    public function delCategory($id){
        $table = 'tbl_student';
        $catModel = $this->load->model('CategoryModel');
        $delete = $catModel->deleteCat($table, $id);
        if ($delete == 1){
            Session::init();
            Session::set('msg', $_POST['name'].' student updated successfully.');
            header('Location:'.BASE_URL.'/admin/category');
        }


    }

    public function myProfile(){

        $table = 'tbl_user';
        Session::init();
        $authUserID = Session::get('userid');
        $userModel = $this->load->model('AuthModel');
        $data = $userModel->getAuthUser($table, $authUserID);

        $this->load->view('Admin/inc/header');
        $this->load->view('Admin/myprofile', $data);
        $this->load->view('Admin/inc/footer');

    }

    public function updatePassword(){

        $table = 'tbl_user';
        $userID= $_POST['userid'];
        $oldPassword = md5($_POST['oldPassword']);
        $newPassword = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];

        $userModel = $this->load->model('AuthModel');
        $userData = $userModel->getUserByID($table, $userID);
        $checkOldPassword = $userData['password'];

        if ($checkOldPassword == $oldPassword){
            if ($newPassword == $confirmPassword){
                if ($_POST['oldPassword'] !== $newPassword){
                    $updatePass = md5($newPassword);
                    $updateData = [
                        'username' => $userData['username'],
                        'password' => $updatePass,
                        'level' => $userData['level']
                    ];
                    $updated = $userModel->updatePassword($table, $updateData, $userID);
                    if ($updated == 1){
                        Session::init();
                        Session::destroy();
                        header('Location:'. BASE_URL.'/login');
                    }
                }else{
                    echo 'Sad! old and new same not allowed';
                }
            }else{
                echo 'new and confirm not match';
            }
        }else{
            echo 'oldPassword not match';
        }






    }





}