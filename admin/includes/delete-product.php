<?php 

    include "database.php";

    $db = new Database();

    if(isset($_GET['p_id'])){
        $db->delete("product","p_id = '{$_GET['p_id']}'");
        $result = $db->getResult();
        if (!empty($result)) {
            header("Location:{$db->hostname}admin/products.php");
        }
    }else{
        header("Location:{$db->hostname}admin/products.php");
    }


?>