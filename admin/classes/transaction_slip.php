<?php

include_once "db.php";

class Transaction_slip
{
    private $id, $amount, $tid, $accno, $comment, $screenshot, $referral;
    public $connection;

    public function __construct($connection = null, $id = null, $amount = null, $tid = null, $accno = null, $comment = null, $screenshot = null, $referral = null)
    {
        $this->id = $id;
        $this->amount = $amount;
        $this->tid = $tid;
        $this->accno = $accno;
        $this->comment = $comment;
        $this->screenshot = $screenshot;
        $this->referral = $referral;
        $this->connection = $connection;
    }

    public function getAllSlips()
    {
        $sql = "SELECT * FROM `transaction_slip`";
        $result = $this->connection->query($sql);
        if ($result) {
            return $result;
        }
        die("SELECT Query Failed: " . $this->connection->error);
    }

    public function selectById()
    {
        $sql = "SELECT * FROM `transaction_slip` where `id` = $this->id";
        $result = $this->connection->query($sql);
        if ($result) {
            return $result;
        }
        die("SELECT Query Failed: " . $this->connection->error);
    }

    public function delete()
    {
        $sql = "DELETE FROM `transaction_slip` WHERE `id` = $this->id";
        $result = $this->connection->query($sql);
        if ($result) {
            return $result;
        }
        die("SELECT Query Failed: " . $this->connection->error);
    }
}
