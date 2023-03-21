<?php
    class Index extends MainController {
        public function __construct(){
            parent::__construct();
        }

        public function Index(){
            $this->home();
        }

        public function home(){
            $postTable      = 'posts';
            $studentTable   = 'tbl_student';
            $posts = $this->load->model('PostModel');
            $student = $this->load->model('CategoryModel');
            $data['students'] = $student->category_list($studentTable);
            $data['allpost'] = $posts->allPost($postTable, $studentTable);

            $this->load->view('inc/header', $data['students']);
            $this->load->view('content', $data['allpost']);

            $this->load->view('inc/sidebar', $data);
            $this->load->view('inc/footer');


        }
        public function post($id){

            $postTable = 'posts';
            $studentTable = 'tbl_student';

            $post = $this->load->model('PostModel');
//            $data = $post->getSinglePost($id);
            $data['singlepost'] = $post->getDetailPost($postTable, $studentTable, $id);
            $this->load->view('inc/header');
            $this->load->view('singlepost', $data['singlepost']);

            $data['allpost'] = $post->allPost($postTable, $studentTable);
            $student = $this->load->model('CategoryModel');
            $data['students'] = $student->category_list($studentTable);

            $this->load->view('inc/sidebar', $data);
            $this->load->view('inc/footer');

        }

        public function author($id){
            $postTbl = "posts";
            $stdTbl = 'tbl_student';

            $post = $this->load->model('PostModel');
            $data['authorpost'] = $post->getAuthorByPost($postTbl, $stdTbl, $id);
            $data['allpost'] = $post->allPost($postTbl, $stdTbl);

            $student = $this->load->model('CategoryModel');
            $data['students'] = $student->category_list($stdTbl);

            $this->load->view('inc/header');
            $this->load->view('authorbypost', $data['authorpost'] );
            $this->load->view('inc/sidebar', $data);
            $this->load->view('inc/footer');

        }

        public function search(){
            $postTable = "posts";
            $studentTable = 'tbl_student';

            $keyword = $_REQUEST['keyword'];
            $authorId = $_POST['author'];

            $post = $this->load->model('PostModel');
            $student = $this->load->model('CategoryModel');

            $data['sresult'] = $post->searchPost($postTable, $keyword, $authorId);

            $data['students'] = $student->category_list($studentTable);
            $data['allpost'] = $post->allPost($postTable, $studentTable);

            $this->load->view('inc/header', $data['students']);
            $this->load->view('searchpage', $data['sresult']);

            $this->load->view('inc/sidebar', $data);
            $this->load->view('inc/footer');



        }






    }