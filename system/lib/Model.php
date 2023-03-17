<?php
//    include 'system/lib/Config.php';
class Model
{
    protected $db = [];

    public function __construct(){

        $dsn = "mysql:host=".DB_HOST.';dbname='.DB_NAME;
        $user = DB_USER;
        $pass = DB_PASS;

        $this->db = new Database($dsn, $user, $pass);

    }

}