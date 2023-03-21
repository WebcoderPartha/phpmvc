<?php

class CategoryModel extends Model
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

    public function insertCat($tableName, $data){
        return $this->db->insert($tableName, $data);
    }

    public function storeData($tableName, $data){
        return $this->db->storeData($tableName, $data);
    }

    public function updateCat($tableName, $data, $id){

        return $this->db->update($tableName, $data, $id);

    }

    public function deleteCat($table, $id){

        return $this->db->delete($table, $id);

    }



}