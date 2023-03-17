<?php
    class Index extends MainController {
        public function __construct(){
            parent::__construct();
        }

        public function home(){
            return $this->load->view('home');
        }

        public function catlist(){
            $category = $this->load->model('Category');
            $data = $category->category_list();
            return $this->load->view('catlist', $data);

        }

    }