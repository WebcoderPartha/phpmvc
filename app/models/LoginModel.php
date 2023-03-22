<?php

class LoginModel extends Model
{

    public function userControl($table, $username, $password){

        $sql = "SELECT * FROM $table WHERE username = ? AND password = ?";
        return $this->db->affectedRows($sql, $username, $password);

    }

    public function getAuthUserData($table, $username, $password){
        $sql = "SELECT * FROM $table WHERE username = ? AND password = ?";
        return $this->db->selectAuthUser($sql, $username, $password);
    }

}