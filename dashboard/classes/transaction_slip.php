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

    public function insertTransactionSlip()
    {
        $sql = "INSERT INTO `transaction_slip`(`amount`, `tid`, `accno`, `comment`, `screenshot`,`referral`) 
                VALUES ($this->amount, '$this->tid', '$this->accno', '$this->comment', '$this->screenshot','$this->referral')";
        $result = $this->connection->query($sql);
        if ($result) {
            return $result;
        }
        die("Insert Query Failed: " . $this->connection->error);
    }
}
