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

//    public function insert($table, $data){
//        $keys = implode(',', array_keys($data));
//        $values = ':'.implode(', :', array_keys($data));
//
//        $sql = "INSERT INTO $table($keys) VALUES($values)";
//        $query = $this->prepare($sql);
//        foreach ($data as $key => $value) {
//            $query->bindValue(':'.$key, $value);
//        }
//        $query->execute();
//    }

    public function storeData($table, $data){

        $keys = implode(',', array_keys($data));
        $values = ":".implode(', :', array_keys($data));
        $sql = "INSERT INTO $table($keys) VALUES($values)";
        $query = $this->prepare($sql);

        foreach ($data as $key => $value) {
            $query->bindValue(":".$key, $value);
        }

        $query->execute();

    }

    public function update($table, $data, $id){
        $updateKey = NULL;
        foreach ($data as $key => $val) {
            $updateKey .= "$key = :$key,";
      }
        $updateKey = rtrim($updateKey, ',');

        $sql = "UPDATE $table SET $updateKey WHERE id = $id";
        $query = $this->prepare($sql);
        foreach ($data as $key => $value){
            $query->bindValue(":$key", $value);
        }

        return $query->execute();

    }

    public function delete($table, $id){

        $sql = "DELETE FROM $table WHERE id = :id";
//        return $this->exec($sql);
        $query = $this->prepare($sql);
        $query->bindValue(':id', $id);
        return $query->execute();


    }

    public function affectedRows($sql, $username, $password){

        $statement = $this->prepare($sql);
        $statement->execute(array($username, $password));
        return $statement->rowCount();

    }

    public function selectAuthUser($sql, $username, $password){

        $statement = $this->prepare($sql);
        $statement->execute(array($username,$password));
        return $statement->fetchAll(PDO::FETCH_ASSOC);

    }


}