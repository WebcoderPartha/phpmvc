<?php

    class PostModel extends Model{

        protected $table = 'posts';

        public function allPost($postTable, $studentTable){
           $sql = "SELECT $postTable.*, $studentTable.name FROM $postTable INNER JOIN $studentTable ON $postTable.studentid = $studentTable.id";
           return $this->db->select($sql);


        }


        public function getSinglePost($id){
            $sql = "SELECT * FROM $this->table WHERE id = $id";
            return $this->db->select($sql);
        }

        public function getDetailPost($postTable, $studentTable, $id){
            $sql = "SELECT $postTable.*, $studentTable.name FROM $postTable INNER JOIN $studentTable ON $postTable.studentid = $studentTable.id WHERE $postTable.id = $id";
            return $this->db->select($sql);

        }

        public function getAuthorByPost($postTable, $studentTable, $authorID){

            $sql = "SELECT $postTable.*, $studentTable.name FROM $postTable INNER JOIN $studentTable ON $postTable.studentid = $studentTable.id WHERE $postTable.studentid = $authorID";
            return $this->db->select($sql);

        }

        public function searchPost($postTable, $keyword, $authorId){

            if ($keyword == NULL && $authorId == 0){
                header('Location: '.BASE_URL.'/index/home');
            }

            if (isset($keyword) && !empty($keyword)){
                $sql = "SELECT * FROM $postTable WHERE title LIKE '%$keyword%' OR content LIKE '%$keyword%'";
                return $this->db->select($sql);
            }elseif(isset($authorId)){
                $sql = "SELECT * FROM $postTable WHERE studentid = $authorId";
                return $this->db->select($sql);
            }


        }

    }
