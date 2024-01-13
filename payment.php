<?php 

include "includes/header.php";

?>
    <section id="checkout_wrapper">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="heading text-center py-4 pb-5">
              <h4>Your order is in process and was successfully submitted, please remember to make payment ...</h4>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="border-bottom mb-4">
                <h6 class="fw-bold">Details Payment</h6>
            </div>
            <div class="bank_wrapper">
                <p class="mb-3">Depositar el monto de : <span id="total_payment_amount"></span></p>

                <p><b>AVIMEX DE COLOMBIA S.A.S.</b></p>
                <ul>
                    <li>Nit: 900039881-6</li>
                    <li>Banco: Bancolombia</li>
                    <li>Cuenta Corriente: 088-235506-41</li>
                    <li>Codigo Swift: COLOCOBMXXX</li>
                </ul>
                <p>Si usas el código QR la transferencia es gratuita desde Bancolombia, Banco de Bogotá, Davivienda, BBVA, Banco Occidente, Scotiabank Colpatria, Nequi y muchos más</p>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="border-bottom mb-4">
                <h6 class="fw-bold">Código QR Pago Gratuito con:</h6>
            </div>
            <div class="qr_code_wrapper">
                <img src="image/cart-Image.jpg" alt="payment-image" />
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- custom script cdn -->
    <script src="js/action.js"></script>
  </body>
</html>
