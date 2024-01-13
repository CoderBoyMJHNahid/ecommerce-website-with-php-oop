<?php 
    include "../admin/includes/database.php";

    $db = new Database();
    $id = $db->escapeString($_POST['product_id']);
    $color = $db->escapeString($_POST['color']);
    $size = $db->escapeString($_POST['size']);
    $ref = $db->escapeString($_POST['ref']);

    if (!empty($color) && !empty($size)) {
        
        
        if (isset($_COOKIE['cart_product'])) {
            
            $array_products = json_decode($_COOKIE['cart_product'],true);


            $new_product = [
                "p_id"=> $id,
                "size"=>$size,
                "color"=>$color,
                "ref" => $ref,
                "qty" => 1
            ];
            

            if (!in_array($new_product,$array_products)) {
                array_push($array_products,$new_product);
            }
            $data = json_encode($array_products);
            

            if (setcookie("cart_product",$data,time() + (86400 * 10),"/","","",TRUE)) {
                echo json_encode(["massage" => "Your product have been added in your cart list.","p_id" => $id,"status"=>true]);
            }else{
                echo json_encode(["massage" => "Something is wrong!","status"=>false]);
            }



        }else{

            $product = [
                [
                "p_id"=> $id,
                "size"=>$size,
                "color"=>$color,
                "ref" => $ref,
                "qty" => 1
                ]
            ];

            $data = json_encode($product);
            if (setcookie("cart_product",$data,time() + (86400 * 10),"/","","",TRUE)) {
                
                echo json_encode(["massage" => "Your product have been added in your cart list.","p_id" => $id,"status"=>true]);

            
            }else{
                
                echo json_encode(["massage" => "Something is wrong!","status"=>false]);
            
            }
        }
    }else{
        echo json_encode(["massage" => "All fields are required!!","status"=>false]);
    }





?>