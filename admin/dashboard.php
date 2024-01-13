<?php include "includes/header.php"; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <?php 
              $db = new Database();
            ?>
            <div class="small-box bg-info">
              <div class="inner">
              <?php 
                  $db->select('orders','COUNT(or_id) as or_count',null,"status = 0",null);
                  $or_order = $db->getResult();
                ?>
                <h3><?php echo $or_order[0]['or_count'] ?></h3>

                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              <?php 
                  $db->select('orders','COUNT(or_id) as cor_count',null,"status = 1",null);
                  $com_order = $db->getResult();
                ?>
                <h3><?php echo $com_order[0]['cor_count'] ?></h3>

                <p>Order Complete</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <?php 
                  $db->select('product','COUNT(p_id) as p_count',null,null,null,0);
                  $products = $db->getResult();
                ?>
                <h3><?php echo $products[0]['p_count'] ?></h3>

                <p>Total Product</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-cart-outline"></i>
              </div>
              <a href="products.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <?php 
                  $db->select('category','COUNT(c_id) as c_count',null,null,null,0);
                  $category = $db->getResult();
                ?>
                <h3><?php echo $category[0]['c_count'] ?></h3>

                <p>Category</p>
              </div>
              <div class="icon">
                <i class="fas fa-box-open"></i>
              </div>
              <a href="category.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


</div>
<!-- ./wrapper -->
<?php include "includes/footer.php"; ?>