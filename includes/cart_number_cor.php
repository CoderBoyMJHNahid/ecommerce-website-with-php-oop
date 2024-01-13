<?php 
    if (isset($_COOKIE['cart_product'])) {
        
        $data = json_decode($_COOKIE['cart_product'], true);
        $count = 0;
        foreach ($data as $key => $value) {
            $count += $value['qty'];
        }

        echo $count;

    }else{
        echo "0";
    }
