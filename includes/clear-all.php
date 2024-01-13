<?php 

if (isset($_COOKIE['cart_product'])) {
    
    setcookie("cart_product","",time() - (86400 * 20),"/","","",TRUE);

    header("Location:../index.php");
    
}else{
    header("Location:../index.php");
}



?>