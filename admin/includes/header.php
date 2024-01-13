<?php
  session_start();
  if (!isset($_SESSION['user_info'])) {
    header("Location:index.php");
  }
  include "database.php";

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>

    <?php 
        switch (basename($_SERVER['PHP_SELF'])) {
            case 'category.php':
                echo "Category Of products";
                break;
            case 'products.php':
                echo "All Products";
                break;
            
            case 'setting.php':
                echo "Setting";
                break;

            case 'orders.php':
                echo "All Orders";
                break;
            
            default:
                echo "Dashboard";
                break;
        }
    
    ?>

    </title>

    <!-- Google Font: Source Sans Pro -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"
    />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css" />
    <!-- Ionicons -->
    <link
      rel="stylesheet"
      href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"
    />
    <!-- tagsinput link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css"  />
      <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css" />
    <!--  -->
    <link rel="stylesheet" href="dist/css/custom.css" />
  </head>
  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"
              ><i class="fas fa-bars"></i
            ></a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Log Out</a>
          </li>
        </ul>
      </nav>
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index.php" class="brand-link">
          <img
            src="dist/img/AdminLTELogo.png"
            alt="Admin"
            class="brand-image img-circle elevation-3"
            style="opacity: 0.8"
          />
          <span class="brand-text font-weight-light">Admin</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul
              class="nav nav-pills nav-sidebar flex-column"
              data-widget="treeview"
              role="menu"
              data-accordion="false"
            >
              <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
              <li class="nav-item">
                <a href="dashboard.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF'])) == "index.php" ? "active" : "" ?>">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="category.php" class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == "category.php" or basename($_SERVER['PHP_SELF']) == "add-category.php" or basename($_SERVER['PHP_SELF']) == "edit-category.php"){ echo "active";}; ?>">
                  <i class="nav-icon fas fa-th"></i>
                  <p>Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="products.php" class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == "products.php" or basename($_SERVER['PHP_SELF']) == "add-product.php" or basename($_SERVER['PHP_SELF']) == "edit-product.php"){ echo "active";}; ?>">
                  <i class="nav-icon fas fa-box-open"></i>
                  <p>Products</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="orders.php" class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == "orders.php"){ echo "active";}; ?>">
                  <i class="nav-icon fas fa-money-bill"></i>
                  <p>Orders</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="setting.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF'])) == "setting.php" ? "active" : "" ?>">
                  <i class="nav-icon fas fa-cog"></i>
                  <p>Settings</p>
                </a>
              </li>
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>
