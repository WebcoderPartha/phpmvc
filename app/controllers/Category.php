<?php
    class Category extends MainController {

        public function __construct(){
            parent::__construct();
        }
        public function catlist(){

            $table = 'tbl_student';
            $category = $this->load->model('CategoryModel');
            $data = $category->category_list($table);
            return $this->load->view('catlist', $data);

        }

        public function catbyid(){
            $table = 'tbl_student';
            $id = 6;
            $category= $this->load->model('CategoryModel');
            $data['cat'] = $category->catById($table, $id);
            return $this->load->view('catbyid', $data['cat'][0]);
        }

//        public function insertCategory(){
//            $table = 'tbl_student';
//            $data = [
//              'name' => 'Mitu Rani',
//              'email' => 'mitu@gmail.com',
//              'phone' => '01713423',
//              'address' => 'Madaripur'
//            ];
//
//            $insert = $this->load->model('Category');
//            $insert->insertCat($table, $data);
//            return $insert;
//
//        }

        public function create(){

            return $this->load->view('create');

        }

        public function store(){
            $table  = 'tbl_student';

            $name   = $_POST['name'];
            $email  = $_POST['email'];
            $phone  = $_POST['phone'];
            $address= $_POST['address'];
            $data   = [
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'address' => $address
            ];
            $insert = $this->load->model('CategoryModel');
            $result =  $insert->storeData($table, $data);

            $msg = [];
            if ($result == 1){
                $msg['msg'] = "Data stored successfully...!";
            }else{
                $msg['msg'] = "Data not stored successfully...!";
            }
            return $this->load->view('create', $msg);

        }

        public function catedit($id){
            $table = 'tbl_student';

            $category = $this->load->model('CategoryModel');
            $data = $category->catById($table, $id);

            return $this->load->view('catedit', $data[0]);

        }

        public function updateCat($id){
            $table = 'tbl_student';
            $name   = $_POST['name'];
            $email  = $_POST['email'];
            $phone  = $_POST['phone'];
            $address= $_POST['address'];
            $data   = [
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'address' => $address
            ];

            $update = $this->load->model('CategoryModel');
            $result = $update->updateCat($table, $data, $id);
            $msg = [];
            if ($result == 1){
                $msg['msg'] = "Data updated successfully...!";
            }else{
                $msg['msg'] = "Data not updated successfully...!";
            }
            header("Location: http://localhost/mvc/category/catedit/$id");

//            return $this->load->view('catedit', $msg);

        }

        public function catDestroy($id){
            $table = 'tbl_student';
            $delCat = $this->load->model('CategoryModel');
            $result = $delCat->deleteCat($table, $id);

            if ($result == 1){
                $msg['msg'] = "Data updated successfully...!";
            }else{
                $msg['msg'] = "Data not updated successfully...!";
            }
            header("Location: http://localhost/mvc/category/catlist");


        }


    }