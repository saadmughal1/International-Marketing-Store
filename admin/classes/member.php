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

    public function getTransactions($source)
    {
        $sql = "SELECT * FROM `transactions` WHERE `source` = '$source';";
        $result = $this->connection->query($sql);
        if ($result) {
            return $result;
        }
        die("Select Query Failed: " . $this->connection->error);
    }


    public function selectMembers()
    {
        $sql = "SELECT * FROM `member`;";
        $result = $this->connection->query($sql);
        if ($result) {
            return $result;
        }
        die("Select Query Failed: " . $this->connection->error);
    }

    public function deleteMember()
    {
        $sql = "DELETE FROM `member` WHERE `id` = $this->id;";
        $result = $this->connection->query($sql);
        if ($result) {
            return $result;
        }
        die("DELETE Query Failed: " . $this->connection->error);
    }

    public function updatePackage($newamount, $referral)
    {
        $sql = "UPDATE `member` set `currentPackage` = $newamount WHERE `my_referral`= '$referral';";
        $result = $this->connection->query($sql);
        if ($result) {
            return $result;
        }
        die("UPDATE Query Failed: " . $this->connection->error);
    }

    public function displayPackageInfo($referral)
    {
        $sql = "SELECT * FROM `package_info` WHERE `referral` = '$referral';";
        $result = $this->connection->query($sql);
        if ($result) {
            return $result;
        }
        die("Select Query Failed: " . $this->connection->error);
    }

    public function selectNotActivatedAccounts()
    {
        $sql = "SELECT *  FROM `member` WHERE `status` = 0;";
        $result = $this->connection->query($sql);
        if ($result) {
            return $result;
        }
        die("Select Query Failed: " . $this->connection->error);
    }

    public function activateAccount()
    {
        $sql = "UPDATE `member` SET `status`= 1 WHERE `id`= $this->id;";
        $result = $this->connection->query($sql);
        if ($result) {
            return $result;
        }
        die("Update Query Failed: " . $this->connection->error);
    }


    public function getMemberByReferral($referral)
    {
        $sql = "SELECT * FROM `member` WHERE `my_referral` = '$referral'";
        $result = $this->connection->query($sql);
        if ($result) {
            return $result;
        }
        die("Update Query Failed: " . $this->connection->error);
    }


    public function displayAllKYC()
    {
        $sql = "SELECT k.*,m.my_referral,m.username FROM `kyc` k join `member` m on k.mid = m.id WHERE m.kyc_status = 0";
        $result = $this->connection->query($sql);
        if ($result) {
            return $result;
        }
        die("SELECT Query Failed: " . $this->connection->error);
    }


    public function displayAllApprovedKYC()
    {
        $sql = "SELECT k.*,m.my_referral,m.username FROM `kyc` k join `member` m on k.mid = m.id WHERE m.kyc_status = 1";
        $result = $this->connection->query($sql);
        if ($result) {
            return $result;
        }
        die("SELECT Query Failed: " . $this->connection->error);
    }


    public function updateKYCstatus($id)
    {
        $sql = "UPDATE `member` SET `kyc_status` = 1 WHERE `id` = $id";
        $result = $this->connection->query($sql);
        if ($result) {
            return $result;
        }
        die("SELECT Query Failed: " . $this->connection->error);
    }

    public function updateBalance($currentDirectIncome, $currentIndirectIncome, $currentReward, $id)
    {
        $sql = "UPDATE `member` SET directIncome = $currentDirectIncome, indirectIncome = $currentIndirectIncome, rewardIncome = $currentReward WHERE id = $id";
        $result = $this->connection->query($sql);
        if ($result) {
            return $result;
        }
        die("Update Query Failed: " . $this->connection->error);
    }


    public function updateDirectIncome($directIncome, $referral)
    {
        $sql = "UPDATE `member` SET `directIncome` = `directIncome` + $directIncome WHERE `my_referral` = '$referral'";
        $result = $this->connection->query($sql);
        if ($result) {
            return $result;
        }
        die("Update Query Failed: " . $this->connection->error);
    }


    public function updateInDirectIncome($inDirectIncome, $referral)
    {
        $sql = "UPDATE `member` SET `indirectIncome` = `indirectIncome` + $inDirectIncome WHERE `my_referral` = '$referral'";
        $result = $this->connection->query($sql);
        if ($result) {
            return $result;
        }
        die("Update Query Failed: " . $this->connection->error);
    }

    public function updateMyRewardBit($referral)
    {
        $sql = "UPDATE `member` SET `isReward` = 1 WHERE `my_referral` = '$referral'";
        $result = $this->connection->query($sql);
        if ($result) {
            return $result;
        }
        die("Update Query Failed: " . $this->connection->error);
    }

    public function updateMyPoints($points, $referral)
    {
        $sql = "UPDATE `member` SET `points` = `points` + $points WHERE `my_referral` = '$referral'";
        $result = $this->connection->query($sql);
        if ($result) {
            return $result;
        }
        die("Update Query Failed: " . $this->connection->error);
    }

    public function directIncome($price)
    {
        if ($price >= 1000  && $price <= 3000) {
            return 195;
        } else if ($price >= 3001  && $price <= 6000) {
            return 585;
        } else if ($price >= 6001  && $price <= 10000) {
            return 1170;
        } else if ($price >= 10001  && $price <= 16000) {
            return 1950;
        } else if ($price >= 16001 && $price <= 20000) {
            return 3110;
        } else if ($price >= 20000) {
            return 3900;
        }
        return 0;
    }

    public function inDirectIncome($price)
    {
        if ($price >= 1000  && $price <= 3000) {
            return 40;
        } else if ($price >= 3001  && $price <= 6000) {
            return 80;
        } else if ($price >= 6001  && $price <= 10000) {
            return 170;
        } else if ($price >= 10001  && $price <= 16000) {
            return 290;
        } else if ($price >= 16001 && $price <= 20000) {
            return 480;
        } else if ($price >= 20000) {
            return 650;
        }
        return 0;
    }

    public function myPoints($price)
    {
        if ($price == 1000) {
            return 10;
        } else if ($price == 3000) {
            return 25;
        } else if ($price == 6000) {
            return 40;
        } else if ($price == 10000) {
            return 70;
        } else if ($price == 16000) {
            return 120;
        } else if ($price == 20000) {
            return 170;
        }
        return 0;
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
    }
}
