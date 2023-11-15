<?php
  session_start();
include ('conect_BD.php');


    $valrow_query = "SELECT * FROM tipo_mantenedor";
    $valrow_query_run = mysqli_query($conexion, $valrow_query);
    $count_valrow = mysqli_num_rows($valrow_query_run);

    if($count_valrow > 1){

    $type_mantendelet = mysqli_real_escape_string($conexion, $_POST['type_mantendelet']);

    $query_delmanttype = "DELETE FROM tipo_mantenedor WHERE ID_Tipo_Mantenedor= '$type_mantendelet'";
    $query_delmanttype_run = mysqli_query($conexion, $query_delmanttype);



    if($query_delmanttype_run)
    {
        header("Location: ../view_Manten.php");

    }else{
        $_SESSION['del_tipno'] = "Error al intentar Eliminar el Tipo de Mantenedor";
        header("Location: ../view_Manten.php");

    }


    }else{
        $_SESSION['del_tipno'] = "No puede borrar mas Tipos de Mantenedor";
        header("Location: ../view_Manten.php");

    }

    
    
?>