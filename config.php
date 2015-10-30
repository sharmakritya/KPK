<?php

/**
 * Created by PhpStorm.
 * User: sharmakritya
 * Date: 26-07-2015
 * Time: 22:49
 */
class DB_config
{
    private $mysql_host;
    private $mysql_database;
    private $mysql_user;
    private $mysql_password;
    private $db;

    function __construct()
    {
        $this->mysql_host = "localhost";
        $this->mysql_database = "kpk";
        $this->mysql_user = "root";
        $this->mysql_password = "";
    }

    public function connect(){
        $this->db = new mysqli($this->mysql_host, $this->mysql_user, $this->mysql_password, $this->mysql_database);

        if($this->db->connect_errno > 0){
            die('Unable to connect to database [' . $this->db->connect_error . ']');
        }
        return $this->db;
    }

    function __destruct()
    {
    }

}