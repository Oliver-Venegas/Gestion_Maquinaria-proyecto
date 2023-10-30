<?php 

include ('conect_BD.php');

$rut_chang = $_POST['chang_rut'];
$tipemant_chang = $_POST['type_mantenchang'];


if(!empty($rut_chang)){

    $update_tipemant = "UPDATE usuario_mantenedor SET mant_type = '$tipemant_chang' WHERE Rut = '$rut_chang' LIMIT 1";
    $update_tipemant_run = mysqli_query($conexion, $update_tipemant);

    if($update_tipemant_run){
        header("Location: ../view_Manten.php?suscces_reg=Se cambio el Tipo de Mantenedor Exitosamente");
        exit();


    }else{
        header("Location: ../view_Manten.php?error_reg=Ocurrio un Error");
        exit();

    }



}else{
    header("Location: ../view_Manten.php?error_reg=Hubo un Error en el RUT");
    exit();

}

?>