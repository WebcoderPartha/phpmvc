<?php

class Category extends Model
{

    public function category_list($tableName, $orderBy = 'DESC'){

//        $sql = "select * from tbl_student order by id desc";
//        $query = $this->db->query($sql);
//        $result = $query->fetchAll();
//        return $result;
        $sql = "SELECT * FROM $tableName";
        $catlist = $this->db->select($sql);
        return $catlist;


    }

    public function catById($tableName, $id){
        $sql = "SELECT * FROM $tableName WHERE id = :id";
        $data = array(":id" => $id);
        return $this->db->select($sql, $data);


    }

}