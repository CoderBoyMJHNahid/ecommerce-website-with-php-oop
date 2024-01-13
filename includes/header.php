<?php
    include "admin/includes/database.php";
    $db = new Database();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PURA+</title>

  <!-- css link wrapper -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
  <link rel="stylesheet" href="./css/style.css">

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
  <header class="py-1">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-2">
          <div class="d-flex align-items-center justify-content-between">
            <div class="logo">
              <a href="index.php"><img src="./image/logo-pura.png" alt="logo" /></a>
            </div>
            <div class="mobile_menu_icon d-lg-none d-flex align-items-center gap-2">
              <div class="cart-icon d-lg-none text-end fs-4">
                
                <a href="cart-page.php" class="position-relative">
                    <span class="position-absolute text-white cart_count"></span>
                    <i class="fa-sharp fa-solid fa-cart-shopping"></i>
                </a>
              </div>
              <i class="fa-solid fa-bars mobile_open_icon fs-3"></i>
              <i class="fa-solid fa-xmark mobile_close_icon d-none fs-3"></i>
            </div>
          </div>
        </div>
        <div class="col-lg-10 d-none d-lg-block">
          <div class="row align-items-center">
            <div class="col-lg-11">
              <form action="search.php" class="form form-search">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" name="search_query" placeholder=" What are you looking for...">
              </form>
            </div>
            <div class="col-lg-1">
              <div class="cart-icon d-none d-lg-block text-end">
              
                <a href="cart-page.php" class="position-relative">
                <span class="position-absolute text-white cart_count"></span>
                    <i class="fa-sharp fa-solid fa-cart-shopping"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>

<!-- mobile menu -->
<div class="category_menu_wrapper d-lg-none">
    <div class="heading ms-3 ms-lg-0 pt-4">
        <h6>PRODUCT CATEGORIES</h6>
    </div>
    <div class="categori-item">
        <ul id="name-of-item">
        <li><a href='index.php'>All Products</a></li>
        <?php 
            $db->select("category");
            $result = $db->getResult();
            if (count($result) > 0) {
                foreach($result as $row){
                    echo "<li><a href='category.php?c_id={$row['c_id']}'>{$row['c_name']}</a></li>";
                }
            }
        ?>
        
        </ul>
    </div>
    <div class="search_bar_mobile d-lg-none">
        <form action="search.php" class="form form-search border">
          <i class="fa-solid fa-magnifying-glass"></i>
          <input type="text" name="search_query" placeholder=" What are you looking for...">
        </form>
        
    </div>
    <div class="cart_wrapper d-lg-none">
        <a href="cart-page.php" class="btn btn-primary w-100 mt-3">Cart</a>
    </div>
</div>