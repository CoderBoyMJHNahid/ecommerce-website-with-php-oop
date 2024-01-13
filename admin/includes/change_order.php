<?php 

    include "database.php";

    $db = new Database();

    if(isset($_GET['or_id'])){

        $db->update("orders",["status" => 1],"or_id = '{$_GET['or_id']}'");

        $result = $db->getResult();

        if (!empty($result)) {

            header("Location:{$db->hostname}admin/orders.php");
        }
    }else{
        header("Location:{$db->hostname}admin/orders.php");
    }


?>