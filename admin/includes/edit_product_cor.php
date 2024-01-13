<?php 
    include "database.php";

    $db = new Database();


    $pname = $db->escapeString($_POST['pname']);
    $pid = $db->escapeString($_POST['up_id']);
    $serial_num = $db->escapeString($_POST['serial_num']);
    $old_num = $db->escapeString($_POST['old_num']);
    $pref = $db->escapeString($_POST['pref']);
    $pdesc = $db->escapeString($_POST['pdesc']);
    $meanuni = $db->escapeString($_POST['meanuni']);
    $mater = $db->escapeString($_POST['mater']);
    $pbrand = $db->escapeString($_POST['pbrand']);
    $size = $db->escapeString($_POST['size-tags-input']);
    $color = $db->escapeString($_POST['color-tags-input']);
    $pcat = $db->escapeString($_POST['pcat']);
    $pcost = $db->escapeString($_POST['pcost']);
    $ptvaper = $db->escapeString($_POST['ptvaper']);
    $ptva = $db->escapeString($_POST['ptva']);
    $subtotal = $db->escapeString($_POST['subtotal']);

    

    if ($pname != "" and $old_num != "" and $serial_num != "" and $pref != "" and $pdesc != "" and $meanuni != "" and $mater != "" and $pbrand != "" and $size != "" and $color != "" and $pcat != "" and $pcost != "" and $ptvaper != "" and $ptva != "" and $subtotal != ""){

        
        
        if (!empty($_FILES['p_image']['name'])) {
            
            $file_name = $_FILES['p_image']['name'];

            $extension = pathinfo($file_name,PATHINFO_EXTENSION);

            $valid_ext = ['jpg', 'jpeg', 'png'];

        
            if (in_array($extension,$valid_ext)) {
                
                $file_new_name = uniqid() . "." . $extension;

                $folder_path = '../dist/img/products/'.$file_new_name;

                unlink("../dist/img/products/{$_POST['ol_p_image']}");
                
                if (move_uploaded_file($_FILES['p_image']['tmp_name'],$folder_path)) {

                    $val = [
                        "serial_num" => $serial_num,
                        "name" => $pname,
                        "reference" => $pref,
                        "description" => $pdesc,
                        "p_image" => $file_new_name,
                        "measure_unit" => $meanuni,
                        "material" => $mater,
                        "brand" => $pbrand,
                        "size" => $size,
                        "color" => $color,
                        "cat" => $pcat,
                        "cost" => $pcost,
                        "ivaPercent" => $ptvaper,
                        "iva" => $ptva,
                        "subtotal" => $subtotal
                    ];
                    $db->changePosition($serial_num,$old_num,$pid);

                    $db->update("product",$val,"p_id = {$pid}");
                    $response = $db->getResult();

                    if (!empty($response)) {
                        echo json_encode(['massage' => "Your Product has been updated in the database","status" => true]);
                    }else{
                        echo json_encode(['massage' => "Something is wrong!!. Please Try again!!","status" => false]);
                    }

                }else{
                    echo json_encode(['massage' => "Something is wrong. Please Try again!!","status" => false]);
                }
            }else{
                echo json_encode(['massage' => "Invalid Image Extension. Please Try again With jpg, png and jpeg!!","status" => false]);
            }

        } else {

            $file_new_name = $_POST['ol_p_image'];

            $val = [
                "serial_num" => $serial_num,
                "name" => $pname,
                "reference" => $pref,
                "description" => $pdesc,
                "p_image" => $file_new_name,
                "measure_unit" => $meanuni,
                "material" => $mater,
                "brand" => $pbrand,
                "size" => $size,
                "color" => $color,
                "cat" => $pcat,
                "cost" => $pcost,
                "ivaPercent" => $ptvaper,
                "iva" => $ptva,
                "subtotal" => $subtotal
            ];

            $db->changePosition($serial_num,$old_num,$pid);

            $db->update("product",$val,"p_id = {$pid}");
            $response = $db->getResult();

            if (!empty($response)) {
                echo json_encode(['massage' => "Your Product has been updated in the database","status" => true]);
            }else{
                echo json_encode(['massage' => "Something is wrong!!. Please Try again!!","status" => false]);
            }

        }
        
    }else{
        echo json_encode(['massage' => "All field are mandatory. Please fill up all field and try again!!","status" => "error"]);
    }
    

?>