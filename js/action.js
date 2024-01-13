$(document).ready(function(){

    // price format function
    function formatPrice(price) {
        return new Intl.NumberFormat('en-US', {
            style: 'currency',
            currency: 'USD',
            minimumFractionDigits: 0,
            maximumFractionDigits: 0
        }).format(price);
    };
    
    // update cart number
    function updateCartNumber(){
        $.get("./includes/cart_number_cor.php",function (data) {
                $(".cart_count").html("");
                $(".cart_count").html(data);
            },
        );
    }
    updateCartNumber();

    // mobile menu cire functionality
    $(".mobile_open_icon").click(function(){
        $(this).addClass("d-none");
        $(".mobile_close_icon").removeClass("d-none");
        $(".category_menu_wrapper").addClass("active");
        $("body").css("overflow-y","hidden");
    })
    $(".mobile_close_icon").click(function(){
        $(this).addClass("d-none");
        $(".mobile_open_icon").removeClass("d-none");
        $(".category_menu_wrapper").removeClass("active");
        $("body").css("overflow-y","scroll");
    })

    // product details functionality
    $(document).on("click",".btn-checkout",function(){
        
        const id = $(this).data("product_id");
        
        if (id !== "") {
            $.ajax({
                url: "./includes/fetch_product.php",
                type: "POST",
                data: {id},
                dataType: "JSON",
                success: function (res) {
                    $("#modal_product_img").attr("src", `admin/dist/img/products/${res.p_image}`);
                    $("#modal_product_name").html(`
                        <p class="mb-0">Product Name: ${res.name}</p>
                        <input type="hidden" name="product_id" value="${res.p_id}"/>
                        <p class="mb-0 text-secondary">Product Category: ${res.c_name}</p>
                    `)
                    $(".modal_uni_wrapper").html(`
                        <p class="mb-0"><b>Unit</b>: ${res.measure_unit}</p>
                    `)
                    $(".modal_metarial_wrapper").html(`
                        <p class="mb-0"><b>Material</b>: ${res.material}</p>
                    `)
                    $(".modal_vat_wrapper").html(`
                        <p class="mb-0"><b>Vat</b>: ${res.ivaPercent}% - ${formatPrice(res.iva)}</p>
                    `)
                    $(".modal_cost_wrapper").html(`
                        <p class="mb-0"><b>Cost</b>: ${formatPrice(res.cost)}</p>
                    `)
                    $(".modal_total_price").html(`
                        <p class="mb-0"><b>Total Price: ${formatPrice(res.subtotal)}</b></p>
                    `)

                    // for size
                    const sizeArray = res.size.split(',');
                    const referenceArray = res.reference.split(',');

                    let sizeHtml = `<label for="" class="form-label"><b>Size</b>: </label> `;

                    
                    if (sizeArray.length === referenceArray.length) {
                        
                        for (let i = 0; i < sizeArray.length; i++) {
                            const value = sizeArray[i] + ',' + referenceArray[i];

                            sizeHtml += `<input type="radio" class="modal_size" name="size" value="${value}" class="me-2" /> <span class="me-2">${sizeArray[i]}</span>`;
                        }

                    } else {
                        sizeArray.forEach(size => sizeHtml += `<input type="radio" checked class="modal_size" name="size" value="${size}" class="me-2" /> <span class="me-2">${size}</span>`)
                    }


                    $(".modal_size_wrapper").html(sizeHtml);

                    // color
                    const colorArray = res.color.split(',');

                    let colorHtml = `<label for="" class="form-label"><b>Color</b>: </label> `;

                    if (colorArray.length === referenceArray.length) {
                        
                        let colorHtml = '';
                    
                        for (let i = 0; i < colorArray.length; i++) {
                            const value = colorArray[i] + ',' + referenceArray[i];
                            colorHtml += `<input type="radio" class="modal_color" name="color" value="${value}" class="me-2" /> <span class="me-2">${colorArray[i]}</span>`;
                        }

                    } else {
                        colorArray.forEach(color => colorHtml += `<input type="radio" checked class="modal_color" name="color" value="${color}" class="me-2" /> <span class="me-2">${color}</span>`)
                    }

                    $(".modal_color_wrapper").html(colorHtml);

                    $(".modal_cart_btn_wrapper").html(`
                        <div class='btn_qty_product_wrapper'>
                        <button class='btn btn-checkout-modal btn-sm btn-primary' data-product_id='${res.p_id}'>
                        Add To Cart
                        </button>
                        <div class='d-none increase_decrease_cart_modalwrapper d-flex align-items-center gap-1 '>
                        <button class='btn btn-sm btn-primary product_cart-decrease' data-product_id='${res.p_id}'>
                        <i class='fa-solid fa-minus'></i>
                        </button>
                        <input type='number' readonly value='1' class='text-center w-25 product_cart${res.p_id}_input' />
                        <button class='btn btn-sm btn-primary product_cart-increase' data-product_id='${res.p_id}'>
                            <i class='fa-solid fa-plus'></i>
                        </button>
                        </div>
                    </div>
                    `);
                }
            });
                
        }else{
            console.log("Invalid product");
        }

    })

    // add to cart core functionality
    $(document).on("click",".btn-checkout-modal",function(e){
        e.preventDefault();
        if ($(".modal_color").is(":checked") && $(".modal_size").is(":checked") ) {
           
            const color = $(".modal_color:checked").val();
            
            const size = $(".modal_size:checked").val();

            const product_id = $(this).data("product_id");

            const data = {product_id,color,size};
            
            $.ajax({
                url:"./includes/add_cart_cor.php",
                type:"POST",
                dataType:"JSON",
                data:data,
                success:function(data){
                    
                    if (data.status) {
                        $(".modal_notify_wrapper").html(`
                            <p class="text-success">${data.massage}</p>
                        `);
                        updateCartNumber();
                        $(".btn-checkout-modal").addClass("d-none");
                        $(".increase_decrease_cart_modalwrapper").removeClass("d-none");
                        setTimeout(()=>{$(".modal_notify_wrapper").html("")},1000);
                    }else{
                        $(".modal_notify_wrapper").html(`<p class="text-danger">${data.massage}</p>`);
                        setTimeout(()=>{$(".modal_notify_wrapper").html("")},3000);
                    }


                }

            })

        }else{
            $(".modal_notify_wrapper").html(`
                <p class="text-danger">All are Required!! Please select Size and Color..</p>
            `);
            setTimeout(()=>{$(".modal_notify_wrapper").html("")},3000)
        }

        

    });

    $(document).on("click",".btn-checkout-direct",function(){

        const product_id = $(this).data("product_id");
        const ref = $(this).data("ref");

        if(product_id != ""){
            $.ajax({
                url: "./includes/fetch_product.php",
                type: "POST",
                data: {id:product_id},
                dataType: "JSON",
                success: function (res) {
                    if (res.p_id != "") {
                        
                    const data = {
                        product_id:res.p_id,
                        color:res.color,
                        size:res.size,
                        ref:res.reference
                    }

                        $.ajax({
                            url:"./includes/add_cart_direct_cor.php",
                            type:"POST",
                            dataType:"JSON",
                            data:data,
                            success:function (res) { 
                                updateCartNumber();
                                $(`.increase_decrease_cart${res.p_id}_wrapper`).removeClass("d-none");
                                $(`.product${res.p_id}_add_cart_init`).addClass("d-none");
                            }
                        })

                    }
                }
            });
        }else{
            console.log("Something is wrong");
        }


    });


    // increase qty of product
    $(document).on('click','.product_cart-increase',function(){

        const id = $(this).data('product_id');

        if (id != "") {
            $.ajax({
                url:"./includes/add_cart_product.php",
                type:"POST",
                dataType:"JSON",
                data: {id},
                success:function (data){
                    if (data.status) {
                        updateCartNumber();
                        let qty_number = $(`.product_cart${id}_input`).val();
                        $(`.product_cart${id}_input`).val(Number(qty_number) + 1);
                    
                    }


                }
            })
        }


    });


    // decrease qty of product
    $(document).on('click','.product_cart-decrease',function(){

        const id = $(this).data('product_id');
        let qty_number = $(`.product_cart${id}_input`).val();

        if (id != "" && qty_number > 1) {
            $.ajax({
                url:"./includes/decrease_cart_product.php",
                type:"POST",
                dataType:"JSON",
                data: {id},
                success:function (data){
                    if (data.status) {
                        updateCartNumber();
                        
                        $(`.product_cart${id}_input`).val(Number(qty_number) - 1);
                    
                    }

                }
            })
        }


    });


    // increase the qty of cart product
    $(document).on("click",".cart-increase",function(){

        const p_id = $(this).data("product_id");
        const qty = $(`.product_cart${p_id}_input`).val();
        const new_qty = Number(qty) + 1;


        const cost_product = Number($(`#product_cost_product${p_id}`).val());
        const subTotal = cost_product * new_qty;
        
        $(`#total_cost_product${p_id}`).val(subTotal);
        $(`#total_cost_text${p_id}`).html(`SubTotal: ${formatPrice(subTotal)}`);

        const cost_total_number = Number($("#cost_total").val());
        const cost_total_val = cost_total_number + cost_product;;
        $("#cost_total").val(cost_total_val)
        $("#sub_cost_total").val(cost_total_val);
        $(".cost_total").html(formatPrice(cost_total_val))
        $(".sub_cost_total").html(formatPrice(cost_total_val));


    });

    // decrease the quantity of cart product
    $(document).on("click",".cart-decrease",function(){

        const p_id = $(this).data("product_id");
        const qty = $(`.product_cart${p_id}_input`).val();
        
        if (qty != 1) {
            const new_qty = Number(qty) - 1;
            const cost_product = Number($(`#product_cost_product${p_id}`).val());
            const subTotal = cost_product * new_qty;

            $(`#total_cost_product${p_id}`).val(subTotal);
            $(`#total_cost_text${p_id}`).html(`SubTotal: ${formatPrice(subTotal)}`);


            const cost_total_number = Number($("#cost_total").val());
            const cost_total_val = cost_total_number - cost_product;
            $("#cost_total").val(cost_total_val);
            $("#sub_cost_total").val(cost_total_val);
            $(".cost_total").html(formatPrice(cost_total_val))
            $(".sub_cost_total").html(formatPrice(cost_total_val));

        }
        

    });

    // order processing information function code
    $("#productOrder").submit(function(e){
        e.preventDefault();

        const representative = $("#representative").val();
        const order_name = $("#order_name").val();
        const nit = $("#nit").val();
        const mail = $("#mail").val();
        const contact = $("#contact").val();
        const phone = $("#phone").val();
        const address = $("#address").val();
        const city = $("#city").val();
        const department = $("#department").val();

        if (representative != "" && order_name != "" && nit != "" && mail != "" && contact != "" && phone != "" && address != "" && city != "" && department != "") {
            
            const formdata = new FormData(this);

            $.ajax({
                url:"./includes/order_product_cor.php",
                type:"POST",
                dataType:"JSON",
                processData:false,
                contentType:false,
                data:formdata,
                success:function(res){
                    console.log(res);
                    if(res.status){
                        $("#total_payment_amount").html(formatPrice(res.amount));
                        $(".notification_wrapper_order").html(`
                            <p class="alert alert-success">${res.massage}</p>
                        `);
                        setTimeout(()=>{
                            $(".notification_wrapper_order").html(``);
                            window.location = "payment.php";
                        },3000)
                    }else{
                        $(".notification_wrapper_order").html(`
                            <p class="alert alert-danger">${res.massage}</p>
                        `);
                        setTimeout(()=>{
                            $(".notification_wrapper_order").html(``);
                        },3000)
                    }
                }
            })


        }else{
            $(".notification_wrapper_order").html(`
                <p class="alert alert-danger">Please fill up all information!!</p>
            `);
            setTimeout(()=>{
                $(".notification_wrapper_order").html(``);
            },3000)
        }



    })


})