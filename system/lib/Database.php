<?php
include 'system/lib/Config.php';
class Database extends PDO {
    protected $db = [];

    public function __construct()
    {
        $dsn = "mysql:host=".DB_HOST.';dbname='.DB_NAME;
        $user = DB_USER;
        $pass = DB_PASS;

        $connection = parent::__construct($dsn, $user, $pass);

        $this->db = $connection;

    }


}