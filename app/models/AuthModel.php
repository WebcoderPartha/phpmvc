<?php

class AuthModel extends Model
{
    public function getAuthUser($table, $authUserID){

        return $this->db->selectByID($table, $authUserID);

    }

    public function getUserByID($table, $userID){
        return $this->db->selectByID($table, $userID);
    }

    public function updatePassword($table, $updateData, $userID){
        return $this->db->update($table, $updateData, $userID);
    }

}