<?php 
    include "../admin/includes/database.php";

    $db  = new Database();

    $id = $db->escapeString($_POST['id']);

    $db->select("product","*","category ON product.cat = category.c_id","p_id = '{$id}'");

    $result = $db->getResult();

    if (!empty($result)) {
        echo json_encode($result[0]);
    }else{
        echo json_encode(["massage"=>"No products found!!","status" => false]);
    }



?>


