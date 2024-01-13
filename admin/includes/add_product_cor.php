<?php 
    include "database.php";

    $db = new Database();


    $pname = $db->escapeString($_POST['pname']);
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

    

    if ($pname != "" and $pref != "" and $pdesc != "" and $meanuni != "" and $mater != "" and $pbrand != "" and $size != "" and $color != "" and $pcat != "" and $pcost != "" and $ptvaper != "" and $ptva != "" and $subtotal != ""){

        
        $file_name = $_FILES['p_image']['name'];
        
        $extension = pathinfo($file_name,PATHINFO_EXTENSION);

        $valid_ext = ['jpg', 'jpeg', 'png'];

        
        if (in_array($extension,$valid_ext)) {
            
            $file_new_name = uniqid() . "." . $extension;

            $folder_path = '../dist/img/products/'.$file_new_name;
            
            if (move_uploaded_file($_FILES['p_image']['tmp_name'],$folder_path)) {

                $db->select("product","serial_num",null,null,"serial_num DESC",1);
                $fetch_num = $db->getResult();
                $newfetch_num = $fetch_num[0]['serial_num']+1;
                
                $val = [
                    "serial_num" =>$newfetch_num,
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

                $db->insert("product",$val);
                $response = $db->getResult();

                if (!empty($response)) {
                    echo json_encode(['massage' => "Your Product has been added in the database","status" => true]);
                }else{
                    echo json_encode(['massage' => "Something is wrong!!. Please Try again!!","status" => false]);
                }

            }else{
                echo json_encode(['massage' => "Something is wrong. Please Try again!!","status" => false]);
            }
        }else{
            echo json_encode(['massage' => "Invalid Image Extension. Please Try again With jpg, png and jpeg!!","status" => false]);
        }

    }else{
        echo json_encode(['massage' => "All field are mandatory. Please fill up all field and try again!!","status" => "error"]);
    }
    

?>