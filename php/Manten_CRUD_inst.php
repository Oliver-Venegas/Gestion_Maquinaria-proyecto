<?php

include ('conect_BD.php');

if(isset($_POST['field']) && isset($_POST['value']) && isset($_POST['id'])){

    $field = $_POST['field'];
    $value = $_POST['value'];
    $editid = $_POST['id'];

    $query_cellupdt = "UPDATE inform_fallas SET ".$field."='".$value."' WHERE ID_infor_fallas = '$editid'";
    $query_cellupdt_run = mysqli_query($conexion, $query_cellupdt);

    echo 1;
}


if(isset($_POST['delet_MantenMod']))
{
    $manten_iddel = mysqli_real_escape_string($conexion, $_POST['manten_iddel']);

    $query_delmant = "DELETE FROM inform_fallas WHERE ID_infor_fallas = '$manten_iddel'";
    $query_delmant_run = mysqli_query($conexion, $query_delmant);

    if($query_delmant_run)
    {
        $res = [
            'status' => 200, 
            'message' => 'Se Elimino la Seccion de Fallas'
            ];
            echo json_encode($res);
            return false;

    }else{
        $res = [
            'status' => 500, 
            'message' => 'No se pudo Eliminar la Seccion de Fallas'
            ];
            echo json_encode($res);
            return false;

    }

}


if(isset($_POST['updat_MantenMod']))
{

$mantenfall_id = mysqli_real_escape_string($conexion, $_POST['mantenfall_id']);

$order_Mantenedi = mysqli_real_escape_string($conexion, $_POST['order_Mantenedi']);
$hors_Mantenedi = mysqli_real_escape_string($conexion, $_POST['hors_Mantenedi']);
$avis_Mantenedi = mysqli_real_escape_string($conexion, $_POST['avis_Mantenedi']);
$obtitul_Mantenedi = mysqli_real_escape_string($conexion, $_POST['obtitul_Mantenedi']);
$obser_Mantenedi = mysqli_real_escape_string($conexion, $_POST['obser_Mantenedi']);


if($obtitul_Mantenedi == NULL || $hors_Mantenedi == NULL){
    $res = 
    ['status' => 422, 
    'message' => 'Campos vacios deben ser Rellenados'];
    echo json_encode($res);
    return false;

}else{

        $query_updtmanten = "UPDATE inform_fallas SET Orden= '$order_Mantenedi', HorasdelTrabajo= '$hors_Mantenedi', Aviso= '$avis_Mantenedi', Titul_observ= '$obtitul_Mantenedi', Observacion_data= '$obser_Mantenedi'
                                WHERE ID_infor_fallas= '$mantenfall_id'";

                
        $query_updtmanten_run = mysqli_query($conexion, $query_updtmanten);

        if($query_updtmanten_run){

        $res = [
            'status' => 200, 
            'message' => 'Se Actualizo la Seccion de Fallas'
            ];
            echo json_encode($res);
            return false;

        }else{
        $res = [
            'status' => 422, 
            'message' => 'No se pudo Actualizar la Seccion de Fallas'
            ];
            echo json_encode($res);
            return false;

}
    

    }


    
       


    

}



if(isset($_GET['mantenfall_id']))
{

    $mantenfall_id = mysqli_real_escape_string($conexion, $_GET['mantenfall_id']);

    $query_fallasID = "SELECT * FROM inform_fallas WHERE ID_infor_fallas='$mantenfall_id'";
    $query_fallasID_run = mysqli_query($conexion, $query_fallasID);


    if(mysqli_num_rows($query_fallasID_run) == 1){

        $inforfallas_mantfind = mysqli_fetch_array($query_fallasID_run);

        $res = 
    ['status' => 200, 
    'message' => 'Se Encontro la Seccion de Falas',
    'data' => $inforfallas_mantfind];
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



if(isset($_POST['crear_MantenMod']))
{
    

$torutuserLoad_manten = mysqli_real_escape_string($conexion, $_POST['torutuserLoad_manten']);

$order_Manten = mysqli_real_escape_string($conexion, $_POST['order_Manten']);
$avis_Manten = mysqli_real_escape_string($conexion, $_POST['avis_Manten']);
$obtitul_Manten = mysqli_real_escape_string($conexion, $_POST['obtitul_Manten']);
$obser_Manten = mysqli_real_escape_string($conexion, $_POST['obser_Manten']);


if($obtitul_Manten == NULL){
    $res = 
    ['status' => 422, 
    'message' => 'El Titulo debe ser Ingresado'];
    echo json_encode($res);
    return false;

}else{

                $query_cremanten = "INSERT INTO inform_fallas (Orden, HorasdelTrabajo, Aviso, Titul_observ, Observacion_data, Estadomanten, rut_LogUser_Manten)
                            VALUES ('$order_Manten','00:00:00', '$avis_Manten', '$obtitul_Manten', '$obser_Manten', 'Pendiente', '$torutuserLoad_manten')";
                            
                $query_cremanten_run = mysqli_query($conexion, $query_cremanten);
                
                if($query_cremanten_run){

                    $res = [
                        'status' => 200, 
                        'message' => 'Se Creo la Session de Fallas'
                        ];
                    echo json_encode($res);
                    return false;

                }else{
                    $res = [
                        'status' => 422, 
                        'message' => 'No se pudo Crear la Seccion de Fallas'
                        ];
                    echo json_encode($res);
                    return false;

                }

                
}


}   





?>