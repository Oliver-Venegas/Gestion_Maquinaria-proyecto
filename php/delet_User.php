<?php
session_start();
include ('conect_BD.php');


    $delet_rut = mysqli_real_escape_string($conexion, $_POST['delet_rut']);

    $query_delusuariototal = "DELETE FROM usuario_mantenedor WHERE Rut= '$delet_rut'";
    $query_delusuariototal_run = mysqli_query($conexion, $query_delusuariototal);

    

    if($query_delusuariototal_run)
    {
        
    
        session_destroy();
        header("Location: ../index.php");

    }else{
        header("Location: ../view_Manten.php?suscces_reg=Error al intentar Eliminar el Usuario");

    }
    
?>