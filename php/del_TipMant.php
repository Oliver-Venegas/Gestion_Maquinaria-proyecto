<?php

include ('conect_BD.php');


    $type_mantendelet = mysqli_real_escape_string($conexion, $_POST['type_mantendelet']);

    $query_delmanttype = "DELETE FROM tipo_mantenedor WHERE ID_Tipo_Mantenedor= '$type_mantendelet'";
    $query_delmanttype_run = mysqli_query($conexion, $query_delmanttype);



    if($query_delmanttype_run)
    {
        header("Location: ../view_Manten.php");

    }else{
        header("Location: ../view_Manten.php?suscces_reg=Error al intentar Eliminar el Tipo de Cliente");

    }
    
?>