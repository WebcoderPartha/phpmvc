<?php
    class Index extends MainController {
        public function __construct(){
            parent::__construct();
        }

        public function home(){
            return $this->load->view('home');
        }

        public function catlist(){

            $table = 'tbl_student';
            $category = $this->load->model('Category');
            $data = $category->category_list($table);
            return $this->load->view('catlist', $data);

        }

        public function catbyid(){
            $table = 'tbl_student';
            $id = 6;
            $category= $this->load->model('Category');
            $data['cat'] = $category->catById($table, $id);
            return $this->load->view('catbyid', $data['cat'][0]);
        }

    }