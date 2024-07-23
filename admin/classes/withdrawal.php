<?php

include_once "db.php";

class Withdrawal
{
    private $id, $amount, $accno, $comment;
    public $connection;

    public function __construct($connection = null, $id = null, $amount = null, $accno = null, $comment = null)
    {
        $this->id = $id;
        $this->amount = $amount;
        $this->accno = $accno;
        $this->comment = $comment;
        $this->connection = $connection;
    }

    public function getWithdrawal()
    {
        $sql = "SELECT * FROM `withdrawal`;";
        $result = $this->connection->query($sql);
        if ($result) {
            return $result;
        }
        die("SELECT Query Failed: " . $this->connection->error);
    }


    public function deleteWithdrawal()
    {
        $sql = "DELETE FROM `withdrawal` where `id` = $this->id;";
        $result = $this->connection->query($sql);
        if ($result) {
            return $result;
        }
        die("DELETE Query Failed: " . $this->connection->error);
    }
}
