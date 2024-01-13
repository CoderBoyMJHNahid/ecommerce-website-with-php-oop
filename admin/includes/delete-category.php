<?php 

    include "database.php";

    $db = new Database();

    if(isset($_GET['cat_id'])){
        $db->delete("category","c_id = '{$_GET['cat_id']}'");
        $result = $db->getResult();
        if (!empty($result)) {
            header("Location:{$db->hostname}admin/category.php");
        }
    }else{
        header("Location:{$db->hostname}admin/category.php");
    }


?>