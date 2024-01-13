<?php include "includes/header.php"; ?>

    <section id="cart-page_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="heading text-center py-4 pb-5">
                        <h3>Cart Page</h3>
                    </div>
                </div>
                <?php 
                    if (isset($_COOKIE['cart_product'])) {
                ?>
                <div class="col-lg-7">
                    <div class="cart_table_wrapper">

                        <table class="table">
                            <thead class="text-center">
                                <tr>
                                    <th class="text-secondary">
                                        Product
                                    </th>
                                    <th class="text-secondary">
                                        Qty
                                    </th>
                                    <th class="text-secondary">SubTotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    
                                    $data = json_decode($_COOKIE['cart_product'],true);
                                    
                                    $total_product_price = 0;

                                    foreach ($data as $value) {
                                        $db->select("product","*","category ON product.cat = category.c_id","p_id = '{$value['p_id']}'");
                                        $row = $db->getResult();
                                        $total_product_price = $total_product_price + ($row[0]["subtotal"] * $value['qty']);
                                ?>
                                <tr>
                                    <td>
                                        <div class="product_img_desc d-flex align-items-center gap-4">
                                            <img width="100px" class="d-none d-md-block" src="admin/dist/img/products/<?php echo $row[0]["p_image"] ?>" alt="Product Image" />
                                            <div class="product_desc">
                                                <div class="product_name">
                                                    <p class="mb-0"><?php echo "<b>".$value['ref'] ."</b> ". $row[0]["name"] ?></p>
                                                </div>
                                                <div class="product_size_color_wrapper">
                                                    <p class="mb-0">Size: <b><?php echo $value['size'] ?></b></p>
                                                    <p class="mb-0">Color: <b><?php echo $value['color'] ?></b></p>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="price_wrapper_table d-none d-md-block">
                                                <p id="sub_cost_text">Price: $<?php echo $db->formatPrice($row[0]["subtotal"]) ?></p>
                                                <input type="hidden" value="<?php echo $row[0]["subtotal"] ?>" id="product_cost_product<?php echo $value['p_id'] ?>" />
                                            </div>
                                            <div class="d-flex gap-2 ms-2">
                                            <button class='btn btn-sm btn-primary product_cart-decrease cart-decrease' data-product_id='<?php echo $value['p_id'] ?>'>
                                                <i class='fa-solid fa-minus'></i>
                                            </button>
                                            <input type='number' readonly value='<?php echo $value['qty'] ?>' class='text-center form-control product_cart<?php echo $value['p_id'] ?>_input' />
                                            <button class='btn btn-sm btn-primary product_cart-increase cart-increase' data-product_id='<?php echo $value['p_id'] ?>'>
                                                <i class='fa-solid fa-plus'></i>
                                            </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <p class="mb-0 me-3 total_cost_text" id="total_cost_text<?php echo $value['p_id'] ?>">SubTotal: $<?php echo $db->formatPrice($row[0]["subtotal"] * $value['qty']) ?> </p>
                                            <input type="hidden" id="total_cost_product<?php echo $value['p_id'] ?>"/>
                                            <a class="btn btn-sm btn-danger delete_cart" href="includes/remove-cart.php?p_id=<?php echo $value['p_id'] ?>">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <div class="col-lg-12 text-end">
                            <a href="includes/clear-all.php" class="btn btn-secondary px-5 py-1">Clear All</a>
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
                                    <p class="mb-0 text-end fw-bold text-secondary sub_cost_total">$<?php echo $db->formatPrice($total_product_price) ?></p>
                                    <input type="hidden" value="<?php echo $total_product_price ?>" id="sub_cost_total" />
                                </div>
                                <div class="col-6">
                                    <h5 class="mt-4">Total</h5>
                                </div>
                                <div class="col-6">
                                    <h5 class="fw-bold text-end mt-4 cost_total">$<?php echo $db->formatPrice($total_product_price) ?></h5>
                                    <input type="hidden" value="<?php echo $total_product_price ?>" id="cost_total" />
                                </div>
                                <div class="col-12 mt-3 mt-lg-5">
                                    <a href="checkout.php" class="btn btn-primary w-100">Proceed To Checkout</a>
                                </div>
                                <div class="col-12">
                                    <a href="index.php" class="btn btn-outline-primary mt-3 w-100">Continue Shopping</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
                    }else{
                        echo "<h5>Your cart list is empty. Click for <a href='index.php'>shopping</a></h5>";
                    }
                ?>
            </div>
        </div>
    </section>


<?php include "includes/footer.php" ?>