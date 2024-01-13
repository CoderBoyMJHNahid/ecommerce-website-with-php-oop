<?php 
  if (!isset($_COOKIE['cart_product'])) {
    header("Location:index.php");
  }
include "includes/header.php";

?>

    <section id="checkout_wrapper">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="heading text-center py-4 pb-5">
              <h3>Checkout Page</h3>
            </div>
          </div>
          <form id="productOrder" class="row">
            <div class="col-lg-7">
              <div class="checkout_form_wrapper">
                <div class="checkout_heading border-bottom mb-4">
                  <h6 class="fw-bold">Bil Details</h6>
                </div>
                <div class="row">
                  
                <div class="col-lg-6 mb-3">
                    <select name="representative" id="representative" class="form-select" required>
                      <option value="Sandra Chavarria">Sandra Chavarria</option>
                      <option selected value="Viviana Hernandez">
                        Viviana Hernandez
                      </option>
                      <option value="Claudia Cedeno">Claudia Cedeno</option>
                      <option value="Ingris Lopez">Ingris Lopez</option>
                      <option value="Carla Sanchez">Carla Sanchez</option>
                      <option value="Andrea Cortes">Andrea Cortes</option>
                    </select>
                  </div>
                  <div class="col-lg-6 mb-3">
                    <input type="text" id="order_name" name="order_name" class="form-control" placeholder="Full name / Company name" required>
                  </div>
                  <div class="col-lg-6 mb-3">
                    <input type="text" id="nit" name="nit" class="form-control" placeholder="NIT" required>
                  </div>
                  <div class="col-lg-6 mb-3">
                    <input type="text" id="mail" name="mail" class="form-control" placeholder="Mail" required>
                  </div>
                  <div class="col-lg-6 mb-3">
                    <input type="text" id="contact" name="contact" class="form-control" placeholder="Contact" required>
                  </div>
                  <div class="col-lg-6 mb-3">
                    <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone" required>
                  </div>
                  <div class="col-lg-12 mb-3">
                    <input type="text" id="address" name="address" class="form-control" placeholder="Address" required>
                  </div>
                  <div class="col-lg-6 mb-3">
                    <input type="text" id="city" name="city" class="form-control" placeholder="City" required>
                  </div>
                  <div class="col-lg-6 mb-3">
                    <input type="text" id="department" name="department" class="form-control" placeholder="Department" required>
                  </div>
                  <div class="col-12">
                    <div class="notification_wrapper_order"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-5">
              <div class="check_wrapper">
                <div class="checkout_heading border-bottom">
                  <h6 class="fw-bold">CART TOTAL</h6>
                </div>
                <div class="checkout_desc mt-4">
                  <div class="row">
                    <div class="col-6">
                      <p class="mb-0 text-secondary">Subtotal</p>
                    </div>
                    <div class="col-6">
                      <?php 

                        $data = json_decode($_COOKIE['cart_product'],true);
                        $total_product_price = 0;

                        foreach ($data as $value) {
                            $db->select("product","*","category ON product.cat = category.c_id","p_id = '{$value['p_id']}'");
                            $row = $db->getResult();
                            $total_product_price = $total_product_price + ($row[0]["subtotal"] * $value['qty']);
                        }
                      ?>
                      <p class="mb-0 text-end fw-bold text-secondary">$<?php echo $db->formatPrice($total_product_price) ?></p>
                    </div>
                    <div class="col-6">
                      <h5 class="mt-4">Total</h5>
                    </div>
                    <div class="col-6">
                      <h5 class="fw-bold text-end mt-4">$<?php echo $db->formatPrice($total_product_price) ?></h5>
                    </div>
                    <div class="col-12 mt-3 mt-lg-5">
                      <button type="submit" class="btn btn-primary w-100" id="order_now_btn">Order now</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>

        </div>
      </div>
    </section>

    <!-- custom script cdn -->
    <script src="js/action.js"></script>
  </body>
</html>
