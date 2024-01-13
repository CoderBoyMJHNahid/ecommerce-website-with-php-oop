<?php
    include "includes/header_slider.php";
?>
  <div class="col-lg-9">
          <div class="row py-5">
            <div class="heading mb-4">
              <h6>All PRODUCT</h6>
            </div>
            <?php 
              $db->select("product","*","category ON product.cat = category.c_id",null,"serial_num ASC","20");
              $result = $db->getResult();
              
              if (isset($_COOKIE['cart_product'])) {
                $data = json_decode($_COOKIE['cart_product'],true);
                $p_id_arr = [];
                foreach ($data as $p_id) {
                  array_push($p_id_arr,$p_id['p_id']);
                }
              } else {
                $p_id_arr = [];
              }
              

              if (count($result) > 0) {
                foreach ($result as $row) {
                  
                  $sizeArray = explode(",",$row['size']);
                  $colorArray = explode(",",$row['color']);
                  
                ?>

              <div class="col-lg-3 col-4 mb-4">
                <div class="card card_product position-relative">
                  <img src="admin/dist/img/products/<?php echo $row['p_image'] ?>" class="card-img-top" alt="product-photo">
                  <div class="card-body">
                    <p class="product_cat"><?php echo $row['c_name'] ?></p>
                    <p class="card-title"><?php echo $row['name'] ?></p>
                    <p class="product-price">$<?php echo $db->formatPrice($row['subtotal']) ?></p>

                    <div class="cart_wrapper_product position-absolute text-center">

                    <?php 

                      if(count($sizeArray) > 1 OR count($sizeArray) > 1 ){
                        echo "<button class='btn btn-checkout btn-sm btn-primary'  data-bs-toggle='modal' data-product_id='{$row['p_id']}' data-bs-target='#productModal'>Add To Cart</button>";
                      }else if(in_array($row['p_id'],$p_id_arr)){
                        $quantity = array_column($data, 'qty', 'p_id')[$row['p_id']] ?? 1;
                        echo "
                            <div class='increase_decrease_cart{$row['p_id']}_wrapper d-flex align-items-center gap-1 justify-content-center'>
                              <button class='btn btn-sm btn-primary product_cart-decrease' data-product_id='{$row['p_id']}'>
                              <i class='fa-solid fa-minus'></i>
                              </button>
                              <input type='number' readonly value='{$quantity}' class='text-center w-25 product_cart{$row['p_id']}_input' />
                              <button class='btn btn-sm btn-primary product_cart-increase' data-product_id='{$row['p_id']}'>
                                  <i class='fa-solid fa-plus'></i>
                              </button>
                            </div>
                        ";
                      }else{
                        echo "<div class='btn_qty_product_wrapper'>
                          <button class='btn btn-checkout-direct product{$row['p_id']}_add_cart_init btn-sm btn-primary' data-product_id='{$row['p_id']}'>
                          Add To Cart
                          </button>
                          <div class='d-none increase_decrease_cart{$row['p_id']}_wrapper d-flex align-items-center gap-1 justify-content-center'>
                            <button class='btn btn-sm btn-primary product_cart-decrease' data-product_id='{$row['p_id']}'>
                            <i class='fa-solid fa-minus'></i>
                            </button>
                            <input type='number' readonly value='1' class='text-center w-25 product_cart{$row['p_id']}_input' />
                            <button class='btn btn-sm btn-primary product_cart-increase' data-product_id='{$row['p_id']}'>
                                <i class='fa-solid fa-plus'></i>
                            </button>
                          </div>
                        </div>";
                      }
                    
                    ?>

                      
                    </div>

                  </div>
                </div>
              </div>
              
            <?php 
              }
            }else{
              echo "<div class='col-12 text-center'><p>No Product Found</p></div>";
            }
            ?>
            <div class="pagination_wrapper">
                <?php echo $db->pagination("product","category ON product.cat = category.c_id",null,"20") ?>
              </div>
          </div>

        </div>

      </div>
    </div>
    </div>
    </div>
    </div>
  </section>


  <!-- modal wrapper -->
  <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered" style="max-width:700px;" >
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="productModalLabel">Product Details</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="modal-details">
            <div class="row">
              <div class="col-lg-5">
                <div class="product-img">
                  <img alt="product-img" id="modal_product_img"/>
                </div>
              </div>
              <div class="col-lg-7">
                <div class="product-desc">
                  <form id="product_modal_form" onsubmit="event.preventDefault(); return false;">
                    <div class="row">
                      <div class="col-lg-12">
                        <div id="modal_product_name"></div>
                      </div>
                      <div class="col-lg-6">
                        <div class="modal_uni_wrapper mt-2"></div>
                      </div>
                      <div class="col-lg-6">
                        <div class="modal_metarial_wrapper mt-2"></div>
                      </div>
                      <div class="col-lg-6">
                        <div class="modal_vat_wrapper mt-2"></div>
                      </div>
                      <div class="col-lg-6">
                        <div class="modal_cost_wrapper mt-2"></div>
                      </div>
                      <div class="col-lg-12">
                        <div class="modal_total_price mt-2"></div>
                      </div>
                      <div class="col-lg-12">
                        <div class="modal_size_wrapper mt-2"></div>
                      </div>
                      <div class="col-lg-12">
                        <div class="modal_color_wrapper mt-1"></div>
                      </div>
                      <div class="col-lg-12">
                        <div class="modal_notify_wrapper mt-1"></div>
                      </div>
                      <div class="col-lg-12">
                        <div class="modal_cart_btn_wrapper"></div>
                      </div>
                    </div>
                  </form>
                </div>
      
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </div>

  <?php include "includes/footer.php" ?>