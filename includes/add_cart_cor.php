<?php 
    include "../admin/includes/database.php";

    $db = new Database();
    $id = $db->escapeString($_POST['product_id']);
    $color_ref = $db->escapeString($_POST['color']);
    $size_ref = $db->escapeString($_POST['size']);

    if (!empty($color_ref) && !empty($size_ref)) {
        
        
        if (isset($_COOKIE['cart_product'])) {
            
            $array_products = json_decode($_COOKIE['cart_product'],true);

            $ref = "";

            $size_arr = explode(",",$size_ref);
            $color_arr = explode(",",$color_ref);

            if (!empty($size_arr[1]) && empty($color_arr[1])) {
                $ref = $size_arr[1];
            }elseif(empty($size_arr[1]) && !empty($color_arr[1])){
                $ref = $color_arr[1];
            }

            $new_product = [
                "p_id"=> $id,
                "size"=>$size_arr[0],
                "color"=>$color_arr[0],
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

            $ref = "";
            
            $size_arr = explode(",",$size_ref);

            $color_arr = explode(",",$color_ref);

            
            if (!empty($size_arr[1]) && empty($color_arr[1])) {
                $ref = $size_arr[1];
            }elseif(empty($size_arr[1]) && !empty($color_arr[1])){
                $ref = $color_arr[1];
            }
            
            $product = [
                [
                "p_id"=> $id,
                "size"=>$size_arr[0],
                "color"=>$color_arr[0],
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