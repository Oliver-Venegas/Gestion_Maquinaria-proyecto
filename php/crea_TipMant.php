<?php

include ('conect_BD.php');

$crea_mantentipe = $_POST['creat_newmantenTipe'];

if(empty($crea_mantentipe)){
    header("Location: ../view_Manten.php?error_reg=Debe ingresar un Tipo de Mantenedor");
    exit();
}


$query_creatipe = "INSERT INTO tipo_mantenedor (Nombre_Tipo ) VALUES ('$crea_mantentipe')";


$ejectura_creatipe = mysqli_query($conexion, $query_creatipe);

if($ejectura_creatipe){

    header("Location: ../view_Manten.php?suscces_reg=Se Creo el Tipo de Mantenedor");


}else{

    header("Location: ../view_Manten.php?error_reg=Intentelo de nuevo, no se pudo crear el Tipo de Mantenedor");

    exit();
}


mysqli_close($conexion);

?>
