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
        $data = [];
        $catModel = $this->load->model('CategoryModel');
        $data['student'] = $catModel->catById($table, $id);
        $this->load->view('Admin/inc/header');
        $this->load->view('Admin/Category/editcategory', $data);
        $this->load->view('Admin/inc/footer');
    }

    public function updateCategory($id){


        $input = $this->load->validation('Form');
        $input->post('name')->isEmpty()->length(3, 50);
        $input->post('email')->isEmpty();
        $input->post('phone')->isEmpty()->length(11, 20);
        $input->post('address')->isEmpty();

        if ($input->submit()){

            $table = 'tbl_student';
            $name = $input->values['name'];
            $email = $input->values['email'];
            $phone = $input->values['phone'];
            $address = $input->values['address'];
            $data = [
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'address' => $address
            ];

            $catModel = $this->load->model('CategoryModel');
            $update = $catModel->updateCat($table, $data, $id);

            if ($update == 1){
                $message = [];
                $message['msg'] = 'Updated successfully!';
                $url = BASE_URL."/admin/category?msg=".urlencode(serialize($message));
                header('Location:'.$url);
            }

        }else{
            $data = [];
            $data['postErrors'] = $input->errors;

            $table = 'tbl_student';
            $catModel = $this->load->model('CategoryModel');
            $data['student'] = $catModel->catById($table, $id);
            $this->load->view('Admin/inc/header');
            $this->load->view('Admin/Category/editcategory', $data);
            $this->load->view('Admin/inc/footer');
        }



//        $message = [];
//        if ($name == ''){
//
//            $message['msg'] = 'Name must field must not be empty!';
//            $url = BASE_URL."/Admin/editCategory/".$id."?msg=".urlencode(serialize($message));
//            header('Location:'.$url);
//
//        }else if($email == ''){
//
//            $message['msg'] = 'Email must field must not be empty!';
//            $url = BASE_URL."/Admin/editCategory/".$id."?msg=".urlencode(serialize($message));
//            header('Location:'.$url);
//
//        }else if ($phone == ''){
//
//            $message['msg'] = 'Phone must field must not be empty!';
//            $url = BASE_URL."/Admin/editCategory/".$id."?msg=".urlencode(serialize($message));
//            header('Location:'.$url);
//
//        }elseif($address == ''){
//
//            $message['msg'] = 'Address must field must not be empty!';
//            $url = BASE_URL."/Admin/editCategory/".$id."?msg=".urlencode(serialize($message));
//            header('Location:'.$url);
//
//        }else{
//
//            $catModel = $this->load->model('CategoryModel');
//            $update = $catModel->updateCat($table, $data, $id);
//
//            if ($update == 1){
//                $message['msg'] = 'Updated successfully!';
//                $url = BASE_URL."/admin/category?msg=".urlencode(serialize($message));
//                header('Location:'.$url);
//            }
//        }


    }

    public function delCategory($id){
        $table = 'tbl_student';

        $input = $table->

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
        $message = [];


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
                        $message['msg'] = 'Password updated successfully..';
                        $url = BASE_URL.'/login?msg='.urlencode(serialize($message));
                        header('Location:'.$url);
                    }
                }else{
                    $message['msg'] = "Old password & new password must not be same!";
                    $url = BASE_URL.'/admin/myProfile/?msg='.urlencode(serialize($message));
                    header("Location: $url");
                }
            }else{
                $message['msg'] = "Confirm password did not match!";
                $url = BASE_URL.'/admin/myProfile/?msg='.urlencode(serialize($message));
                header("Location: $url");
            }
        }else {
            $message['msg'] = "Invalid old password!";
            $url = BASE_URL.'/admin/myProfile/?msg='.urlencode(serialize($message));
            header("Location: $url");
        }






    }





}