<?php 
    include "../admin/includes/database.php";

    $db = new Database();

    $representative = $db->escapeString($_POST['representative']);
    $order_name = $db->escapeString($_POST['order_name']);
    $nit = $db->escapeString($_POST['nit']);
    $mail = $db->escapeString($_POST['mail']);
    $contact = $db->escapeString($_POST['contact']);
    $phone = $db->escapeString($_POST['phone']);
    $address = $db->escapeString($_POST['address']);
    $city = $db->escapeString($_POST['city']);
    $department = $db->escapeString($_POST['department']);

    $data = json_decode($_COOKIE['cart_product'],true);

    $total_product_price = 0;

    $product_details = "";

    foreach ($data as $value) {
        $db->select("product","*","category ON product.cat = category.c_id","p_id = '{$value['p_id']}'");

        $row = $db->getResult();

        $total_product_price = $total_product_price + ($row[0]["subtotal"] * $value['qty']);

        $product_details .= "<b>{$value['qty']}</b> units <b>{$row[0]["reference"]}</b> <br/>";
    }

    $data = [
        "f_name" => $order_name,
        "representative" => $representative,
        "nit" => $nit,
        "mail_address" => $mail,
        "contact" => $contact,
        "phone" => $phone,
        "address" => $address,
        "city" => $city,
        "department" => $department,
        "desc_order" => $product_details,
        "amount" => $total_product_price,
    ];

    $db->insert("orders",$data);
    $res = $db->getResult();

    if (!empty($res)) {
        setcookie("cart_product","",time() - (86400 * 20),"/","","",TRUE);

        echo json_encode(['massage' => "Your Order has been submitted successfully", "amount" => $total_product_price, "status" => true]);
    }else{
        echo json_encode(['massage' => "Something went wrong!!", "status" => false]);
    }





?>