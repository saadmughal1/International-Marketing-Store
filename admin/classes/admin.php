<?php

include_once "db.php";

class Admin
{

    private $id, $username, $password;
    public $connection;

    public function __construct($connection = null, $id = null, $username = null, $password = null)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->connection = $connection;
    }

    public function login()
    {
        $sql = "SELECT * FROM `admin` WHERE  `username` = '$this->username' AND `password` = '$this->password'";
        
        $result = $this->connection->query($sql);
        if ($result) {
            return $result;
        }
        die("Select Query Failed: " . $this->connection->error);
    }
    
    public function update_password($newPassword)
    {
        $sql = "UPDATE `admin` SET `password`='$newPassword' WHERE `id`= $this->id;";
        $result = $this->connection->query($sql);
        if ($result) {
            return $result;
        }
        die("Select Query Failed: " . $this->connection->error);
    }
    
      public function getAdminById()
    {
        $sql = "SELECT * FROM `admin` WHERE `id`= $this->id;";
        $result = $this->connection->query($sql);
        if ($result) {
            return $result;
        }
        die("Select Query Failed: " . $this->connection->error);
    }
}
