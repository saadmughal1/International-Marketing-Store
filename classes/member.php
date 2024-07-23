<?php

include_once "db.php";

class Member
{

    private $id, $username, $password, $email, $referral, $status, $myreferral;
    public $connection;

    public function __construct($connection = null, $id = null, $username = null, $password = null, $email = null, $referral = null, $status = null, $myreferral = null)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->referral = $referral;
        $this->status = $status;
        $this->myreferral = $myreferral;
        $this->connection = $connection;
    }

    public function login()
    {
        $sql = "SELECT *  FROM `member` WHERE `username` ='$this->username' AND `password` = '$this->password';";
        $result = $this->connection->query($sql);
        if ($result) {
            return $result;
        }
        die("Select Query Failed: " . $this->connection->error);
    }

    public function signup()
    {
        echo $sql = "INSERT INTO `member`(`email`, `username`, `password`, `referral`, `status`, `my_referral`) VALUES ('$this->email','$this->username','$this->password','$this->referral','$this->status','$this->myreferral');";
        $result = $this->connection->query($sql);
        if ($result) {
            return $result;
        }
        die("Select Query Failed: " . $this->connection->error);
    }

    public function isValidReferral()
    {
        $sql = "SELECT *  FROM `member` WHERE `my_referral` = '$this->referral';";
        $result = $this->connection->query($sql);
        if ($result) {
            return $result;
        }
        die("Select Query Failed: " . $this->connection->error);
    }

    public function myPoints()
    {
        $sql = "SELECT `points` FROM `member` WHERE `id`= $this->id;";
        $result = $this->connection->query($sql);
        if ($result) {
            return $result;
        }
        die("Select Query Failed: " . $this->connection->error);
    }

    public function updateMyReward($income, $id)
    {
        $sql = "UPDATE `member` SET `rewardIncome` = `rewardIncome` + $income WHERE `id`= $id;";
        $result = $this->connection->query($sql);
        if ($result) {
            return $result;
        }
        die("Select Query Failed: " . $this->connection->error);
    }

    public function myRewardBit($id)
    {
        $sql = "SELECT `isReward` FROM `member` WHERE `id` = $id";
        $result = $this->connection->query($sql);
        if ($result) {
            return $result;
        }
        die("Update Query Failed: " . $this->connection->error);
    }

    public function updateMyRewardBit($id)
    {
        $sql = "UPDATE `member` SET `isReward` = 0  WHERE `id` = $id";
        $result = $this->connection->query($sql);
        if ($result) {
            return $result;
        }
        die("Update Query Failed: " . $this->connection->error);
    }

    public function myReward($points)
    {
        if ($points >= 350  && $points <= 700) {
            return 5000;
        } else if ($points >= 701  && $points <= 1750) {
            return 12000;
        } else if ($points >= 1751  && $points <= 3600) {
            return 20000;
        } else if ($points >= 3601  && $points <= 7200) {
            return 40000;
        } else if ($points >= 7201  && $points <= 14400) {
            return 90000;
        } else if ($points >= 14401  && $points <= 28850) {
            return 180000;
        } else if ($points >= 28851  && $points <= 57750) {
            return 300000;
        } else if ($points >= 57751  && $points <= 115350) {
            return 500000;
        } else if ($points >= 115351  && $points <= 240150) {
            return 1000000;
        } else if ($points >= 240150) {
            return 2000000;
        } else {
            return 0;
        }
    }
}
