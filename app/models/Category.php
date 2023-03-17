<?php


class Category extends Model
{

    public function category_list(){

        $sql = "select * from tbl_student order by id desc";
        $query = $this->db->query($sql);
        $result = $query->fetchAll();
        return $result;

    }

}