<?php

include_once "db.php";

class Order
{
    private $id, $full_name, $email, $address, $city, $total_amount, $order_date, $product_data, $status, $referral;
    public $connection;

    public function __construct($connection = null, $id = null, $full_name = null, $email = null, $address = null, $city = null, $total_amount = null, $order_date = null, $product_data = null, $status = null, $referral = null)
    {
        $this->id = $id;
        $this->full_name = $full_name;
        $this->email = $email;
        $this->address = $address;
        $this->city = $city;
        $this->total_amount = $total_amount;
        $this->order_date = $order_date;
        $this->product_data = $product_data;
        $this->status = $status;
        $this->referral = $referral;
        $this->connection = $connection;
    }


    public function addTransactionInfo($referral, $desc, $date, $cash, $source)
    {
        $sql = "INSERT INTO `transactions`(`referral`, `description`, `date`, `cash`, `source`) VALUES ('$referral','$desc','$date',$cash,'$source');";
        $result = $this->connection->query($sql);
        if ($result) {
            return $result;
        }
        die("Insert Query Failed: " . $this->connection->error);
    }


    public function addpackage_info($package, $referral)
    {
        $currentDate = date('Y-m-d');
        $sql = "INSERT INTO `package_info`(`package`, `referral`,`date`) VALUES ('$package','$referral ','$currentDate');";
        $result = $this->connection->query($sql);
        if ($result) {
            return $result;
        }
        die("Insert Query Failed: " . $this->connection->error);
    }


    public function getOrders()
    {
        $sql = "SELECT * FROM `orders` WHERE `status` = 0";

        $result = $this->connection->query($sql);
        if ($result) {
            return $result;
        }
        die("SELECT Query Failed: " . $this->connection->error);
    }

    public function getConfirmedOrders()
    {
        $sql = "SELECT * FROM `orders` WHERE `status` = 1";

        $result = $this->connection->query($sql);
        if ($result) {
            return $result;
        }
        die("SELECT Query Failed: " . $this->connection->error);
    }
    public function getConfirmedOrdersWithDate($start_date, $end_date)
    {
        $sql = "SELECT * FROM `orders` WHERE `date` BETWEEN ";

        if ($start_date && $end_date) {

            $sql .= "'$start_date' AND '$end_date'";
        } elseif ($start_date && !$end_date) {

            $sql .= "'$start_date' AND CURDATE()";
        } elseif (!$start_date && $end_date) {

            $sql .= "CURDATE() AND '$end_date'";
        } else {

            $sql .= "CURDATE()";
        }


        $result = $this->connection->query($sql);

        if ($result) {
            return $result;
        } else {
            die("SELECT Query Failed: " . $this->connection->error);
        }
    }


    public function deleteOrder()
    {
        $sql = "DELETE FROM `orders` WHERE `id` = $this->id";

        $result = $this->connection->query($sql);
        if ($result) {
            return $result;
        }
        die("DELETE Query Failed: " . $this->connection->error);
    }

    public function confirmOrder()
    {
        $sql = "UPDATE `orders` SET `status`= 1 WHERE `id`= $this->id";

        $result = $this->connection->query($sql);
        if ($result) {
            return $result;
        }
        die("UPDATE Query Failed: " . $this->connection->error);
    }
}
