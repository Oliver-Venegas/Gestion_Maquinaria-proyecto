<?php

include ('conect_BD.php');

if(isset($_GET['clientefall_id']))
{

    $clientefall_id = mysqli_real_escape_string($conexion, $_GET['clientefall_id']);

    $query_clifallasID = "SELECT * FROM inform_fallas WHERE ID_infor_fallas='$clientefall_id'";
    $query_clifallasID_run = mysqli_query($conexion, $query_clifallasID);


    if(mysqli_num_rows($query_clifallasID_run) == 1){

        $inforfallas_clifind = mysqli_fetch_array($query_clifallasID_run);

        $res = 
    ['status' => 200, 
    'message' => 'Se Encontro la Seccion de Falas',
    'data' => $inforfallas_clifind];
    echo json_encode($res);
    return false;

    }else{

        $res = 
        ['status' => 404, 
        'message' => 'No se encontro la Maquina'];
        echo json_encode($res);
        return false;
    
    }
}


?>