<?php 

if (isset($_COOKIE['cart_product']) && isset($_GET['p_id'])) {

    $data = json_decode($_COOKIE['cart_product'], true);
    
    if(empty($data)){
        header("Location:../index.php");
    }

    if(count($data) == 1){
        foreach($data as $val){
            if($val['p_id'] == $_GET['p_id']){

                setcookie("cart_product","",time() - (86400 * 20),"/","","",TRUE);
    
                header("Location:../index.php");
            }
        }
        
    }else{
        foreach ($data as $key => $value) {
            if ($value['p_id'] === $_GET['p_id']) {
                unset($data[$key]); // Remove the element with the specified p_id
                break; // Exit the loop once the element is deleted
            }
        }
        $data_json = json_encode($data);
        
        setcookie("cart_product",$data_json,time() + (86400 * 10),"/","","",TRUE);

        header("Location:../cart-page.php");
    }
    
}else{
    header("Location:../index.php");
}



?>