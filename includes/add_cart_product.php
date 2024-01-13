<?php 

    $id = $_POST['id'];

    if (isset($_COOKIE['cart_product'])) {
        
        $data = json_decode($_COOKIE['cart_product'], true);

        foreach ($data as $key => $value) {
            if ($value['p_id'] === $id) {
                $data[$key]['qty']++;
                break;
            }
        }
        $json_data = json_encode($data);
        
        if (setcookie("cart_product",$json_data,time() + (86400 * 10),"/","","",TRUE)) {
            echo json_encode(["massage" => "Your product have been updated in your cart list.","p_id" => $id,"status"=>true]);
        }else{
            echo json_encode(["massage" => "Something is wrong!","status"=>false]);
        }

    }else{
        echo json_encode(['massage' => "Something is wrong", "status" => false]);
    }


