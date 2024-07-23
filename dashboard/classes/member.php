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

    public function getMemberByReferral()
    {
        $sql = "SELECT * FROM `member` WHERE `my_referral`='$this->myreferral';";

        $result = $this->connection->query($sql);
        if ($result) {
            return $result;
        }
        die("Select Query Failed: " . $this->connection->error);
    }


    public function getMemberByReferralInFunction($reff)
    {
        $sql = "SELECT * FROM `member` WHERE `my_referral`='$reff';";

        $result = $this->connection->query($sql);
        if ($result) {
            return $result;
        }
        die("Select Query Failed: " . $this->connection->error);
    }

    public function getMemberById()
    {
        $sql = "SELECT * FROM `member` WHERE `id`= $this->id;";
        $result = $this->connection->query($sql);
        if ($result) {
            return $result;
        }
        die("Select Query Failed: " . $this->connection->error);
    }

    public function insertKYC($full_name, $father_name, $gender, $cnic, $address, $city, $country, $mid)
    {
        $sql = "INSERT INTO `kyc`(`full_name`, `father_name`, `gender`, `cnic`, `address`, `city`, `country`,`mid`) VALUES ('$full_name','$father_name','$gender','$cnic','$address','$city','$country',$mid);";
        $result = $this->connection->query($sql);
        if ($result) {
            return $result;
        }
        die("Select Query Failed: " . $this->connection->error);
    }

    public function updateKYC($full_name, $father_name, $gender, $cnic, $address, $city, $country, $mid)
    {
        $sql = "UPDATE `kyc` SET `full_name`='$full_name', `father_name`='$father_name', `gender`='$gender', `address`='$address', `city`='$city', `country`='$country' , `cnic`='$cnic' WHERE `mid`=$mid";
        $result = $this->connection->query($sql);
        if ($result) {
            return $result;
        }
        die("Update Query Failed: " . $this->connection->error);
    }


    public function isKycAvailable($mid)
    {
        $sql = "SELECT * FROM `kyc` where `mid` = $mid";
        $result = $this->connection->query($sql);
        if ($result) {
            return $result;
        }
        die("Update Query Failed: " . $this->connection->error);
    }

    public function updateKYCstatusTo0($id)
    {
        $sql = "UPDATE `member` SET `kyc_status` = 0 WHERE `id` = $id";
        $result = $this->connection->query($sql);
        if ($result) {
            return $result;
        }
        die("SELECT Query Failed: " . $this->connection->error);
    }

    public function update_password($newPassword)
    {
        $sql = "UPDATE `member` SET `password`='$newPassword' WHERE `id`= $this->id;";
        $result = $this->connection->query($sql);
        if ($result) {
            return $result;
        }
        die("Select Query Failed: " . $this->connection->error);
    }

    public function accountStatus()
    {
        $sql = "SELECT `status` FROM `member` WHERE `id`= $this->id;";
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

    public function myReferral()
    {
        $sql = "SELECT `referral` FROM `member` WHERE `id`= $this->id;";
        $result = $this->connection->query($sql);
        if ($result) {
            return $result;
        }
        die("Select Query Failed: " . $this->connection->error);
    }

    public function myDirectIncome()
    {
        $sql = "SELECT `directIncome` FROM `member` WHERE `id`= $this->id;";
        $result = $this->connection->query($sql);
        if ($result) {
            return $result;
        }
        die("Select Query Failed: " . $this->connection->error);
    }

    public function myIndirectIncome()
    {
        $sql = "SELECT `indirectIncome` FROM `member` WHERE `id`= $this->id;";
        $result = $this->connection->query($sql);
        if ($result) {
            return $result;
        }
        die("Select Query Failed: " . $this->connection->error);
    }

    public function myRewardIncome()
    {
        $sql = "SELECT `rewardIncome` FROM `member` WHERE `id`= $this->id;";
        $result = $this->connection->query($sql);
        if ($result) {
            return $result;
        }
        die("Select Query Failed: " . $this->connection->error);
    }

    public function usernameWithReferral($referral)
    {
        $sql = "SELECT `username` FROM `member` WHERE `my_referral`= '$referral';";
        $result = $this->connection->query($sql);
        if ($result) {
            return $result;
        }
        die("Select Query Failed: " . $this->connection->error);
    }

    public function currentPackage()
    {
        $sql = "SELECT `currentPackage` FROM `member` WHERE `id`= $this->id;";
        $result = $this->connection->query($sql);
        if ($result) {
            return $result;
        }
        die("Select Query Failed: " . $this->connection->error);
    }

    public function getDirectIncomeByReff($source)
    {
        $sql = "SELECT * FROM `transactions` WHERE `source` = '$source' AND `description` = 'Direct Referral';";
        $result = $this->connection->query($sql);
        if ($result) {
            return $result;
        }
        die("Select Query Failed: " . $this->connection->error);
    }


    public function getInDirectIncomeByReff($source)
    {
        $sql = "SELECT * FROM `transactions` WHERE `source` = '$source' AND `description` = 'Indirect Referral';";
        $result = $this->connection->query($sql);
        if ($result) {
            return $result;
        }
        die("Select Query Failed: " . $this->connection->error);
    }

    public function myRank($points)
    {
        if ($points >= 350  && $points <= 700) {
            return "Bronze";
        } else if ($points >= 701  && $points <= 1750) {
            return "Silver";
        } else if ($points >= 1751  && $points <= 3600) {
            return "Gold";
        } else if ($points >= 3601  && $points <= 7200) {
            return "Dimond";
        } else if ($points >= 7201  && $points <= 14400) {
            return "Crystal";
        } else if ($points >= 14401  && $points <= 28850) {
            return "Ruby";
        } else if ($points >= 28851  && $points <= 57750) {
            return "Ambussder";
        } else if ($points >= 57751  && $points <= 115350) {
            return "Crystal Ambussder";
        } else if ($points >= 115351  && $points <= 240150) {
            return "Ruby Ambussder";
        } else if ($points > 240150) {
            return "Director";
        }
        else{
            return "MEMBER";
        }
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
        }
    }
}
