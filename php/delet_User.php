<?php
session_start();
include ('conect_BD.php');


    $delet_rut = mysqli_real_escape_string($conexion, $_POST['delet_rut']);

    $query_delmaquinatotal = "DELETE FROM maquina_mantened WHERE rut_LogUser_Maqui= '$delet_rut'";
    $query_delmaquinatotal_run = mysqli_query($conexion, $query_delmaquinatotal);

    $query_delsecfallatotal = "DELETE FROM inform_fallas WHERE rut_LogUser_Manten= '$delet_rut'";
    $query_delsecfallatotal_run = mysqli_query($conexion, $query_delsecfallatotal);

    $query_delmantentotal = "DELETE FROM mantencion_maquin WHERE rut_LogUser_cone= '$delet_rut'";
    $query_delmantentotal_run = mysqli_query($conexion, $query_delmantentotal);

    $query_delclienttotal = "DELETE FROM cliente_mantened WHERE rut_LogUser_Clint= '$delet_rut'";
    $query_delclienttotal_run = mysqli_query($conexion, $query_delclienttotal);


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