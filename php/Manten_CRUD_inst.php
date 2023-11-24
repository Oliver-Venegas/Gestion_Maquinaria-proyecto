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

if(isset($_POST['delet_infromfallasMod']))
{
    $informfall_iddel = mysqli_real_escape_string($conexion, $_POST['informfall_iddel']);
    $informfall_clientdel = mysqli_real_escape_string($conexion, $_POST['informfall_clientdel']);

    $query_delmantseccfalla = "DELETE FROM inform_fallas WHERE ID_InformFallas_cone = '$informfall_iddel'";
    $query_delmantseccfalla_run = mysqli_query($conexion, $query_delmantseccfalla);

    if($query_delmantseccfalla_run)
    {

        $query_delmantcliente = "DELETE FROM cliente_mantened WHERE ID_Cliente = '$informfall_clientdel'";
        $query_delmantcliente_run = mysqli_query($conexion, $query_delmantcliente);

        $query_delmantfalla = "DELETE FROM mantencion_maquin WHERE ID_con_mantencion = '$informfall_iddel'";
        $query_delmantfalla_run = mysqli_query($conexion, $query_delmantfalla);
    
        if($query_delmantfalla_run)
        {
            $res = [
                'status' => 200, 
                'message' => 'Se Elimino el Informe de Fallas'
                ];
                echo json_encode($res);
                return false;
    
        }else{
            $res = [
                'status' => 422, 
                'message' => 'No se pudo Eliminar el Informe de Fallas'
                ];
                echo json_encode($res);
                return false;
    
        } 

    }else{

        $query_delmantcliente = "DELETE FROM cliente_mantened WHERE ID_Cliente = '$informfall_clientdel'";
        $query_delmantcliente_run = mysqli_query($conexion, $query_delmantcliente);

        $query_delmantfalla = "DELETE FROM mantencion_maquin WHERE ID_con_mantencion = '$informfall_iddel'";
    $query_delmantfalla_run = mysqli_query($conexion, $query_delmantfalla);

    if($query_delmantfalla_run)
    {
        $res = [
            'status' => 200, 
            'message' => 'Se Elimino el Informe de Fallas'
            ];
            echo json_encode($res);
            return false;

    }else{
        $res = [
            'status' => 422, 
            'message' => 'No se pudo Eliminar el Informe de Fallas'
            ];
            echo json_encode($res);
            return false;

    }

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

if(isset($_GET['informfall_id']))
{

    $informfall_id = mysqli_real_escape_string($conexion, $_GET['informfall_id']);

    $query_informfallasID = "SELECT * FROM mantencion_maquin WHERE ID_con_mantencion='$informfall_id'";
    $query_informfallasID_run = mysqli_query($conexion, $query_informfallasID);


    if(mysqli_num_rows($query_informfallasID_run) == 1){

        $inforfallas_mantencionfind = mysqli_fetch_array($query_informfallasID_run);

        $res = 
    ['status' => 200, 
    'message' => 'Se Encontro la Seccion de Falas',
    'data' => $inforfallas_mantencionfind];
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


$informfall_id = mysqli_real_escape_string($conexion, $_POST['informfall_id']);    

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

    if($order_Manten == NULL){

        if($avis_Manten == NULL){

            $query_cremanten = "INSERT INTO inform_fallas (Orden, HorasdelTrabajo, Aviso, Titul_observ, Observacion_data, Estadomanten, rut_LogUser_Manten, ID_InformFallas_cone)
                            VALUES ('0','00:00:00', '0', '$obtitul_Manten', '$obser_Manten', 'Pendiente', '$torutuserLoad_manten', '$informfall_id')";
                            
                $query_cremanten_run = mysqli_query($conexion, $query_cremanten);
                
                if($query_cremanten_run){

                    $res = [
                        'status' => 200, 
                        'message' => 'Se Creo la Seccion de Fallas'
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

        }else{

            $query_cremanten = "INSERT INTO inform_fallas (Orden, HorasdelTrabajo, Aviso, Titul_observ, Observacion_data, Estadomanten, rut_LogUser_Manten, ID_InformFallas_cone)
                            VALUES ('0','00:00:00', '$avis_Manten', '$obtitul_Manten', '$obser_Manten', 'Pendiente', '$torutuserLoad_manten', '$informfall_id')";
                            
                $query_cremanten_run = mysqli_query($conexion, $query_cremanten);
                
                if($query_cremanten_run){

                    $res = [
                        'status' => 200, 
                        'message' => 'Se Creo la Seccion de Fallas'
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

    }else if($avis_Manten == NULL){

        if($order_Manten == NULL){

            $query_cremanten = "INSERT INTO inform_fallas (Orden, HorasdelTrabajo, Aviso, Titul_observ, Observacion_data, Estadomanten, rut_LogUser_Manten, ID_InformFallas_cone)
                            VALUES ('0','00:00:00', '0', '$obtitul_Manten', '$obser_Manten', 'Pendiente', '$torutuserLoad_manten', '$informfall_id')";
                            
                $query_cremanten_run = mysqli_query($conexion, $query_cremanten);
                
                if($query_cremanten_run){

                    $res = [
                        'status' => 200, 
                        'message' => 'Se Creo la Seccion de Fallas'
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

        }else{

            $query_cremanten = "INSERT INTO inform_fallas (Orden, HorasdelTrabajo, Aviso, Titul_observ, Observacion_data, Estadomanten, rut_LogUser_Manten, ID_InformFallas_cone)
                            VALUES ('$order_Manten','00:00:00', '0', '$obtitul_Manten', '$obser_Manten', 'Pendiente', '$torutuserLoad_manten', '$informfall_id')";
                            
                $query_cremanten_run = mysqli_query($conexion, $query_cremanten);
                
                if($query_cremanten_run){

                    $res = [
                        'status' => 200, 
                        'message' => 'Se Creo la Seccion de Fallas'
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

    }else{

        $query_cremanten = "INSERT INTO inform_fallas (Orden, HorasdelTrabajo, Aviso, Titul_observ, Observacion_data, Estadomanten, rut_LogUser_Manten, ID_InformFallas_cone)
                            VALUES ('$order_Manten','00:00:00', '$avis_Manten', '$obtitul_Manten', '$obser_Manten', 'Pendiente', '$torutuserLoad_manten', '$informfall_id')";
                            
                $query_cremanten_run = mysqli_query($conexion, $query_cremanten);
                
                if($query_cremanten_run){

                    $res = [
                        'status' => 200, 
                        'message' => 'Se Creo la Seccion de Fallas'
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


}   





?>