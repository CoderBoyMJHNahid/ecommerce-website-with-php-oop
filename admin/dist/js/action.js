$(document).ready(function(){

    // initial tags input code
    $('#size-tags-input').tagsinput();
    $('#color-tags-input').tagsinput();
    $('#pref').tagsinput();


    // add product form submit functionality
    $("#addProductForm").submit(function (e) {
        e.preventDefault();

        const pname = $("#pname").val();
        const pref = $("#pref").val();
        const pdesc = $("#pdesc").val();
        const p_image = $("#p_image").val();
        const meanuni = $("#meanuni").val();
        const mater = $("#mater").val();
        const pbrand = $("#pbrand").val();
        const size= $("#size-tags-input").val();
        const color= $("#color-tags-input").val();
        const pcat= $("#pcat").val();
        const pcost= $("#pcost").val();
        const ptvaper= $("#ptvaper").val();
        const ptva= $("#ptva").val();
        const subtotal= $("#subtotal").val();

        if (pname != "" && pref != "" && pdesc != "" && p_image != "" && meanuni != "" && mater != "" && pbrand != "" && size != "" && color != "" && pcat != "" && pcost != "" && ptvaper != "" && ptva != "" && subtotal != "") {
            
        const formdata = new FormData(this);

        // call ajax to save the form data
        $.ajax({
            url:"././includes/add_product_cor.php",
            type:"POST",
            dataType:"JSON",
            data: formdata,
            contentType:false,
            processData: false,
            success:function(res){
                console.log(res);
                if (res.status) {

                    $("#addProductForm").trigger('reset');
                    
                    $("#notification_wrapper").html(`
                        <div class="alert alert-success">
                        <p>${res.massage}</p>
                        </div>`
                        );
                    setTimeout(()=>{
                        $("#notification_wrapper").html("");
                        window.location = "products.php";
                    },3000)
                
                }else if(res.status == "error"){
                    $("#notification_wrapper").html(`
                        <div class="alert alert-danger">
                        <p>${res.massage}</p>
                        </div>`
                        );
                    setTimeout(()=>{
                        $("#notification_wrapper").html("");
                    },3000);
                }else{
                    $("#notification_wrapper").html(`
                        <div class="alert alert-danger">
                        <p>${res.massage}</p>
                        </div>`
                        );
                    setTimeout(()=>{
                        $("#notification_wrapper").html("");
                    },3000);
                }
                
            }
        })

        }else{
            $("#notification_wrapper").html(`
            <div class="alert alert-danger">
            <p>All field are mandatory. Please fill up all field and try again!!</p>
            </div>`);
            setTimeout(()=>{
                $("#notification_wrapper").html("");
            },3000)
        }


    })

    // add product form submit functionality
    $("#updateProduct").submit(function (e) {
        e.preventDefault();

        const pname = $("#ol_pname").val();
        const pref = $("#pref").val();
        const pdesc = $("#ol_pdesc").val();
        const meanuni = $("#ol_meanuni").val();
        const mater = $("#ol_mater").val();
        const pbrand = $("#ol_pbrand").val();
        const size= $("#size-tags-input").val();
        const color= $("#color-tags-input").val();
        const pcat= $("#ol_pcat").val();
        const pcost= $("#ol_pcost").val();
        const ptvaper= $("#ol_ptvaper").val();
        const ptva= $("#ol_ptva").val();
        const subtotal= $("ol_#subtotal").val();

        if (pname != "" && pref != "" && pdesc != "" && p_image != "" && meanuni != "" && mater != "" && pbrand != "" && size != "" && color != "" && pcat != "" && pcost != "" && ptvaper != "" && ptva != "" && subtotal != "") {
            
        const formdata = new FormData(this);

        
        //call ajax to update the form data
        $.ajax({
            url:"././includes/edit_product_cor.php",
            type:"POST",
            dataType:"JSON",
            data: formdata,
            contentType:false,
            processData: false,
            success:function(res){
                console.log(res);
                if (res.status) {

                    $("#addProductForm").trigger('reset');
                    
                    $("#notification_wrapper").html(`
                        <div class="alert alert-success">
                        <p>${res.massage}</p>
                        </div>`
                        );
                    setTimeout(()=>{
                        $("#notification_wrapper").html("");
                        window.location = "products.php";
                    },3000)
                
                }else if(res.status == "error"){
                    $("#notification_wrapper").html(`
                        <div class="alert alert-danger">
                        <p>${res.massage}</p>
                        </div>`
                        );
                    setTimeout(()=>{
                        $("#notification_wrapper").html("");
                    },3000);
                }else{
                    $("#notification_wrapper").html(`
                        <div class="alert alert-danger">
                        <p>${res.massage}</p>
                        </div>`
                        );
                    setTimeout(()=>{
                        $("#notification_wrapper").html("");
                    },3000);
                }
                
            }
        })

        }else{
            $("#notification_wrapper").html(`
            <div class="alert alert-danger">
            <p>All field are mandatory. Please fill up all field and try again!!</p>
            </div>`);
            setTimeout(()=>{
                $("#notification_wrapper").html("");
            },3000)
        }


    })


});