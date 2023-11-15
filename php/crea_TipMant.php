<?php
 session_start();
include ('conect_BD.php');

$crea_mantentipe = $_POST['creat_newmantenTipe'];

if(empty($crea_mantentipe)){
    $_SESSION['del_tipno'] = "Debe ingresar un Tipo de Mantenedor";
    header("Location: ../view_Manten.php");
    exit();
}


$query_creatipe = "INSERT INTO tipo_mantenedor (Nombre_Tipo ) VALUES ('$crea_mantentipe')";


$ejectura_creatipe = mysqli_query($conexion, $query_creatipe);

if($ejectura_creatipe){

    $_SESSION['suss_cretip'] = "Se Creo el Tipo de Mantenedor";
    header("Location: ../view_Manten.php");


}else{

    $_SESSION['del_tipno'] = "Intentelo de nuevo, no se pudo crear el Tipo de Mantenedor";
    header("Location: ../view_Manten.php");

    exit();
}


mysqli_close($conexion);

?>
