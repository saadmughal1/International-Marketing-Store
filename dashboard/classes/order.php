<?php

include_once "db.php";

class Order
{
    private $id, $product_data, $date, $status, $mid;
    public $connection;

    public function __construct($connection = null, $id = null, $product_data = null, $date = null, $mid = null, $status = null)
    {
        $this->id = $id;
        $this->product_data = $product_data;
        $this->date = $date;
        $this->mid = $mid;
        $this->status = $status;
        $this->connection = $connection;
    }

    public function orderProducts($product_data, $date, $status, $mid, $package, $referral)
    {
        $sql = "INSERT INTO `orders`(`product_data`, `date`, `status`, `mid`,`package`,`referral`) VALUES ('$product_data','$date',$status,$mid,'$package','$referral')";
        $result = $this->connection->query($sql);
        if ($result) {
            return $result;
        }
        die("Insert Query Failed: " . $this->connection->error);
    }

    public function product_price_to_qty($price)
    {
        if ($price == 1000) {
            return 1;
        } else if ($price == 3000) {
            return 2;
        } else if ($price == 6000) {
            return 4;
        } else if ($price == 10000) {
            return 7;
        } else if ($price == 16000) {
            return 12;
        } else if ($price == 20000) {
            return 16;
        } else {
            return 0;
        }
    }
}
