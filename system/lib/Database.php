<?php

class Database extends PDO {

    public function __construct($dsn, $user, $pass)
    {
        parent::__construct($dsn, $user, $pass);
    }

    /*
     * public function select($table, $orderBy){
        $sql = "SELECT * FROM $table ORDER BY id $orderBy";
        $query = $this->prepare($sql);
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }
    */
    public function select($sql, $data=array(), $fetchStyle = PDO::FETCH_ASSOC){
        $query = $this->prepare($sql);
        foreach ($data as $key => $value){
            $query->bindParam($key, $value);
        }
        $query->execute();
        return $query->fetchAll($fetchStyle);
    }


    public function selectByID($tableName, $id){

        $sql = "SELECT * FROM $tableName WHERE id = :id";
        $query = $this->prepare($sql);
        $query->bindValue(':id', $id);
        $query->execute();
        $result = $query->fetch();
        return $result;

    }

//    public function selects($tableName, $id){
//        $sql = "SELECT * FROM $tableName WHERE id = :id";
//        $query = $this->prepare($sql);
//        $query->bindValue(':id', $id);
//        $query->execute();
//        return $query->fetch();
//
//    }


}