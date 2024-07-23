<?php

include_once "db.php";

class Withdrawal
{
    private $id, $amount, $accno, $comment, $referral;
    public $connection;

    public function __construct($connection = null, $id = null, $amount = null, $accno = null, $comment = null, $referral = null)
    {
        $this->id = $id;
        $this->amount = $amount;
        $this->accno = $accno;
        $this->comment = $comment;
        $this->referral = $referral;
        $this->connection = $connection;
    }

    public function insertWithdrawal($method)
    {
        $sql = "INSERT INTO `withdrawal`(`accno`, `amount`, `comment`,`referral`,`method`) 
                VALUES ('$this->accno', '$this->amount', '$this->comment','$this->referral','$method')";
        $result = $this->connection->query($sql);

        if ($result) {
            return $result;
        }
        die("Insert Query Failed: " . $this->connection->error);
    }
}
