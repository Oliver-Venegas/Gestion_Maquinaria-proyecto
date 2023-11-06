<?php

include ('conect_BD.php');

if(isset($_POST['delet_ClientMod']))
{
    $client_iddel = mysqli_real_escape_string($conexion, $_POST['client_iddel']);

    $query_del = "DELETE FROM cliente_mantened WHERE ID_Cliente= '$client_iddel'";
    $query_del_run = mysqli_query($conexion, $query_del);

    if($query_del_run)
    {
        $res = [
            'status' => 200, 
            'message' => 'Se Elimino el Cliente'
            ];
echo json_encode($res);
return false;

    }else{
        $res = [
            'status' => 500, 
            'message' => 'No se pudo Eliminar el Cliente'
            ];
echo json_encode($res);
return false;

    }

}


if(isset($_POST['updat_ClientMod']))
{

$Cliente_id = mysqli_real_escape_string($conexion, $_POST['client_id']);

$rut_empresa = mysqli_real_escape_string($conexion, $_POST['rutempr_Clienedi']);
$nombrempr_Clien = mysqli_real_escape_string($conexion, $_POST['nombrempr_Clienedi']);
$nombrcont_Clien = mysqli_real_escape_string($conexion, $_POST['nombrcont_Clienedi']);
$hrsempr_Clien = mysqli_real_escape_string($conexion, $_POST['hrsempr_Clienedi']);

$dateempr_Clien = date('Y-m-d', strtotime($_POST['dateempr_Clienedi']));

$id_bol = mysqli_real_escape_string($conexion, $_POST['id_boledi']);

/*
$data_bol = mysqli_real_escape_string($conexion, $_POST['data_bol']);
*/

if($rut_empresa == NULL || $nombrempr_Clien == NULL || $dateempr_Clien == NULL){
    $res = 
    ['status' => 422, 
    'message' => 'Campos vacios deben ser Rellenados'];
    echo json_encode($res);
    return false;

}else{

    
        $query_creclient_bol = "UPDATE cliente_mantened SET Rut_empresa= '$rut_empresa', Nombre_empresa= '$nombrempr_Clien', Nombre_contacto= '$nombrcont_Clien', Hora_trabaj_empresa= '$hrsempr_Clien', Fecha_del_trabajo= '$dateempr_Clien', Codigo_boleta= '$id_bol'
                                WHERE ID_Cliente= '$Cliente_id'";
                    
        $query_creclientbol_run = mysqli_query($conexion, $query_creclient_bol);
        
        if($query_creclientbol_run){

            $res = [
                'status' => 200, 
                'message' => 'Se Actualizaron los datos del Cliente'
                ];
    echo json_encode($res);
    return false;

        }else{
            $res = [
                'status' => 500, 
                'message' => 'No se pudo Actualizar el Cliente'
                ];
    echo json_encode($res);
    return false;

        }


    

}



}



if(isset($_GET['client_id']))
{

    $client_id = mysqli_real_escape_string($conexion, $_GET['client_id']);

    $query_clientID = "SELECT * FROM cliente_mantened WHERE ID_Cliente='$client_id'";
    $query_clientID_run = mysqli_query($conexion, $query_clientID);


    if(mysqli_num_rows($query_clientID_run) == 1){

        $client_mantfind = mysqli_fetch_array($query_clientID_run);

        $res = 
    ['status' => 200, 
    'message' => 'Se Encontro el Cliente',
    'data' => $client_mantfind];
    echo json_encode($res);
    return false;

    }else{

        $res = 
        ['status' => 404, 
        'message' => 'No se encontro al Cliente'];
        echo json_encode($res);
        return false;
    
    }
}



if(isset($_POST['crear_ClientMod']))
{

$rut_empresa = mysqli_real_escape_string($conexion, $_POST['rutempr_Clien']);
$nombrempr_Clien = mysqli_real_escape_string($conexion, $_POST['nombrempr_Clien']);
$nombrcont_Clien = mysqli_real_escape_string($conexion, $_POST['nombrcont_Clien']);
$hrsempr_Clien = mysqli_real_escape_string($conexion, $_POST['hrsempr_Clien']);

$dateempr_Clien = date('Y-m-d', strtotime($_POST['dateempr_Clien']));

$id_bol = mysqli_real_escape_string($conexion, $_POST['id_bol']);

/*
$data_bol = mysqli_real_escape_string($conexion, $_POST['data_bol']);
*/

if($rut_empresa == NULL || $nombrempr_Clien == NULL || $dateempr_Clien == NULL){
    $res = 
    ['status' => 422, 
    'message' => 'Campos vacios deben ser Rellenados'];
    echo json_encode($res);
    return false;

}else{

    
        $query_creclient_bol = "INSERT INTO cliente_mantened (Rut_empresa, Nombre_empresa, 	Nombre_contacto, Hora_trabaj_empresa, Fecha_del_trabajo, Codigo_boleta)
                    VALUES ('$rut_empresa', '$nombrempr_Clien', '$nombrcont_Clien', '$hrsempr_Clien', '$dateempr_Clien', '$id_bol')";
                    
        $query_creclientbol_run = mysqli_query($conexion, $query_creclient_bol);
        
        if($query_creclientbol_run){

            $res = [
                'status' => 200, 
                'message' => 'Se Creo el Cliente'
                ];
    echo json_encode($res);
    return false;

        }else{
            $res = [
                'status' => 500, 
                'message' => 'No se pudo Crear el Cliente'
                ];
    echo json_encode($res);
    return false;

        }


    

}



}




?>