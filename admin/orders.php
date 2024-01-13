<?php include "includes/header.php"; ?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">All Orders</h1>
              </div>
              <!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item active">Orders</li>
                </ol>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <table
                      id="categoryTable"
                      class="table table-bordered table-striped"
                    >
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Order Details</th>
                          <th>Name</th>
                          <th>Representative</th>
                          <th>NIT</th>
                          <th>Mail</th>
                          <th>Contact</th>
                          <th>Phone</th>
                          <th>Address</th>
                          <th>Department</th>
                          <th>Amount</th>
                          <th>Payment Status</th>
                          <th>Status</th>
                          <th>Time</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 

                          $db = new Database();
                          $db->select("orders","*",null,null,"or_id DESC");
                          $result = $db->getResult();
                          $i = 0;
                          foreach ($result as $row) {
                            $i++;
                        ?>
                        <tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $row['desc_order'] ?></td>
                          <td><?php echo $row['f_name'] ?></td>
                          <td><?php echo $row['representative'] ?></td>
                          <td><?php echo $row['nit'] ?></td>
                          <td><?php echo $row['mail_address'] ?></td>
                          <td><?php echo $row['contact'] ?></td>
                          <td><?php echo $row['phone'] ?></td>
                          <td><?php echo $row['address'] ." City:". $row['city'];  ?></td>
                          <td><?php echo $row['department'] ?></td>
                          <td><?php echo $row['amount'] ?></td>
                          <td>
                            <?php echo $row['payment_status'] == 0 ? "<span class='text-warning'><i class='fa fa-times-circle' aria-hidden='true'></i></span>"  : "<span class='text-success'><i class='fa fa-check-square' aria-hidden='true'></i></span>";  ?>
                          </td>
                          <td>
                          <?php echo $row['status'] == 0 ? "<span class='text-warning'><i class='fa fa-times-circle' aria-hidden='true'></i></span>"  : "<span class='text-success'><i class='fa fa-check-square' aria-hidden='true'></i></span>";  ?>
                          </td>
                          <td>
                            <?php
                                $date=date_create($row['order_time']);
                                echo date_format($date,"d-m-Y"); 
                              ?>
                          </td>
                          <td>
                            <a onclick="return confirm('Are you sure to change order payment status?')" href="includes/change_payment.php?or_id=<?php echo $row['or_id'] ?>" class="btn btn-sm btn-success my-1 <?php echo $row['payment_status'] == 1? "disabled": ""; ?>">Payment</a>
                            <a onclick="return confirm('Are you sure to change order status?')" href="includes/change_order.php?or_id=<?php echo $row['or_id'] ?>" class="btn btn-sm btn-danger my-1 <?php echo $row['status'] == 1? "disabled": ""; ?> ">Complete</a>
                          </td>
                        </tr>
                        <?php } ?>
                        
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
              </div>
            </div>
          </div>
          <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
      </div>
    </div>
    <!-- ./wrapper -->
<?php include "includes/footer.php"; ?>