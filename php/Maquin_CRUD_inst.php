<?php

include ('conect_BD.php');


if(isset($_POST['delet_MaquintMod']))
{
    $maqui_iddel = mysqli_real_escape_string($conexion, $_POST['maqui_iddel']);


    $query_renewClient = "UPDATE cliente_mantened SET seri_ConnMaqui= 0
                          WHERE seri_ConnMaqui= '$maqui_iddel'";
                                        
    $query_renewClient_run = mysqli_query($conexion, $query_renewClient);

    if($query_renewClient_run){

        $query_creamanten_connect = "UPDATE mantencion_maquin SET  Nomb_maquin_cone= NULL, seri_LogMaqui_cone= NULL
                                WHERE seri_LogMaqui_cone= '$maqui_iddel'";
                                        
    $query_creamanten_connect_run = mysqli_query($conexion, $query_creamanten_connect);

    if($query_creamanten_connect_run){
        $query_del = "DELETE FROM maquina_mantened WHERE Numer_Serie= '$maqui_iddel'";
    $query_del_run = mysqli_query($conexion, $query_del);

    if($query_del_run)
    {
        $res = [
            'status' => 200, 
            'message' => 'Se Elimino la Maquina'
            ];
            echo json_encode($res);
            return false;

    }else{
        $res = [
            'status' => 500, 
            'message' => 'No se pudo Eliminar la Maquina'
            ];
            echo json_encode($res);
            return false;

    }

    }else{
        $query_del = "DELETE FROM maquina_mantened WHERE Numer_Serie= '$maqui_iddel'";
        $query_del_run = mysqli_query($conexion, $query_del);

    if($query_del_run)
    {
        $res = [
            'status' => 200, 
            'message' => 'Se Elimino la Maquina'
            ];
            echo json_encode($res);
            return false;

    }else{
        $res = [
            'status' => 500, 
            'message' => 'No se pudo Eliminar la Maquina'
            ];
            echo json_encode($res);
            return false;

    }

    }


    

    }else{

    $query_creamanten_connect = "UPDATE mantencion_maquin SET  Nomb_maquin_cone= NULL, seri_LogMaqui_cone= 0
                                WHERE seri_LogMaqui_cone= '$maqui_iddel'";
                                        
    $query_creamanten_connect_run = mysqli_query($conexion, $query_creamanten_connect);


    $query_del = "DELETE FROM maquina_mantened WHERE Numer_Serie= '$maqui_iddel'";
    $query_del_run = mysqli_query($conexion, $query_del);

    if($query_del_run)
    {
        $res = [
            'status' => 200, 
            'message' => 'Se Elimino la Maquina'
            ];
            echo json_encode($res);
            return false;

    }else{
        $res = [
            'status' => 500, 
            'message' => 'No se pudo Eliminar la Maquina'
            ];
            echo json_encode($res);
            return false;

    }


    }


    


}


if(isset($_POST['updat_MaquinMod']))
{

$maqui_id = mysqli_real_escape_string($conexion, $_POST['maqui_id']);

$numser_Maqui = mysqli_real_escape_string($conexion, $_POST['numser_Maquiedi']);
$nombr_Maqui = mysqli_real_escape_string($conexion, $_POST['nombr_Maquiedi']);
$rutEmpr_Maqui = mysqli_real_escape_string($conexion, $_POST['rutEmpr_Maquiedi']);


$seri_repu = mysqli_real_escape_string($conexion, $_POST['seri_repuedi']);
$nombr_repu = mysqli_real_escape_string($conexion, $_POST['nombr_repuedi']);
$cant_repu = mysqli_real_escape_string($conexion, $_POST['cant_repuedi']);

$rad_maquedi= mysqli_real_escape_string($conexion, $_POST['rad_maquedi']);


if($numser_Maqui == NULL || $nombr_Maqui == NULL || $rutEmpr_Maqui == NULL){
    $res = 
    ['status' => 422, 
    'message' => 'Campos vacios deben ser Rellenados'];
    echo json_encode($res);
    return false;

}else{

    $obtdatosconnect_sql = "SELECT Rut_empresa, Nombre_empresa, Fecha_del_trabajo, seri_ConnMaqui  FROM cliente_mantened WHERE ID_Cliente = '$rutEmpr_Maqui'";
  $resultconnect_tolog = $conexion->query($obtdatosconnect_sql);

  while($dataconn_oflog = $resultconnect_tolog->fetch_assoc()){

    $rutempresa_dMaquina = $dataconn_oflog['Rut_empresa'];

    $NombrEmpr_connect = $dataconn_oflog['Nombre_empresa'];
    $FechaTrab_connect = $dataconn_oflog['Fecha_del_trabajo'];

    $connect_changMaqui = $dataconn_oflog['seri_ConnMaqui'];


  }

    if($rad_maquedi == 'hide_maquedi'){

        $query_cremaquin = "UPDATE maquina_mantened SET Numer_Serie= '$numser_Maqui', Nombr_Maquina= '$nombr_Maqui', Rut_Empresa= '$rutempresa_dMaquina', Num_SerRepuest= NULL, Nombre_Repuest= NULL, Cant_Repuest= NULL
                                WHERE Numer_Serie= '$maqui_id'";

                
        $query_cremaquin_run = mysqli_query($conexion, $query_cremaquin);

        if($query_cremaquin_run){

            if($connect_changMaqui == $maqui_id){

                                    $query_renewClient = "UPDATE cliente_mantened SET seri_ConnMaqui= '$maqui_id'
                                        WHERE ID_Cliente= '$rutEmpr_Maqui'";
                                        
                                    $query_renewClient_run = mysqli_query($conexion, $query_renewClient);


                                    $query_creamanten_connect = "UPDATE mantencion_maquin SET Nomb_empre_cone= '$NombrEmpr_connect',
                                                                                                Nomb_maquin_cone= '$nombr_Maqui',
                                                                                                Fecha_trab_cone= '$FechaTrab_connect',
                                                                                                id_LogClien_cone= '$rutEmpr_Maqui',
                                                                                                seri_LogMaqui_cone= '$numser_Maqui'
                                        WHERE id_LogClien_cone= '$rutEmpr_Maqui'";
                                        
                                $query_creamanten_connect_run = mysqli_query($conexion, $query_creamanten_connect);

                                if($query_creamanten_connect_run){
                                    $res = [
                                    'status' => 200, 
                                    'message' => 'Se Actualizo la Maquina y el Informe de Mantencion'
                                    ];
                                    echo json_encode($res);
                                    return false;

                                }else{
                                    $res = [
                                        'status' => 422, 
                                        'message' => 'No se pudo Actualizar el Informe de Mantencion'
                                        ];
                                        echo json_encode($res);
                                        return false;

                                }
                                    

                                

                
            }else{

                                $query_coorectClient = "UPDATE cliente_mantened SET seri_ConnMaqui= 0
                                        WHERE seri_ConnMaqui= '$maqui_id'";
                                        
                                $query_coorectClient_run = mysqli_query($conexion, $query_coorectClient);

                                if($query_coorectClient_run){

                                    $query_renewClient = "UPDATE cliente_mantened SET seri_ConnMaqui= '$maqui_id'
                                        WHERE ID_Cliente= '$rutEmpr_Maqui'";
                                        
                                    $query_renewClient_run = mysqli_query($conexion, $query_renewClient);

                                    $query_rereite_connect = "UPDATE mantencion_maquin SET Nomb_maquin_cone= NULL, seri_LogMaqui_cone= NULL
                                        WHERE seri_LogMaqui_cone= '$maqui_id'";
                                        
                                    $query_rereite_connect_run = mysqli_query($conexion, $query_rereite_connect);

               $query_creamanten_connect = "UPDATE mantencion_maquin SET Nomb_empre_cone= '$NombrEmpr_connect', Nomb_maquin_cone= '$nombr_Maqui', 	Fecha_trab_cone= '$FechaTrab_connect', seri_LogMaqui_cone= '$numser_Maqui'
                                        WHERE id_LogClien_cone= '$rutEmpr_Maqui'";
                                        
                                $query_creamanten_connect_run = mysqli_query($conexion, $query_creamanten_connect);

                                if($query_creamanten_connect_run){
                                    $res = [
                                    'status' => 200, 
                                    'message' => 'Se Actualizo la Maquina y el Informe de Mantencion'
                                    ];
                                    echo json_encode($res);
                                    return false;

                                }else{
                                    $res = [
                                        'status' => 422, 
                                        'message' => 'No se pudo Actualizar el Informe de Mantencion'
                                        ];
                                        echo json_encode($res);
                                        return false;

                                } 


                            }else{
                                $res = [
                                    'status' => 422, 
                                    'message' => 'No se pudo Actualizar la relacion con el Cliente'
                                    ];
                                    echo json_encode($res);
                                    return false;

                            }


            }

            


        }else{
        $res = [
            'status' => 422, 
            'message' => 'No se pudo Actualizar la Maquina'
            ];
        echo json_encode($res);
        return false;

}

    }else if($rad_maquedi == 'show_maquedi'){

     if($seri_repu == NULL){
        $res = 
                ['status' => 422, 
                'message' => 'Debe ingresar el Numero de Serie del Repuesto'];
                echo json_encode($res);
                return false;  

    }else{

        if($nombr_repu == NULL){
            $res = 
                ['status' => 422, 
                'message' => 'Debe ingresar el Nombre del Repuesto'];
                echo json_encode($res);
                return false;
        }
        else if($cant_repu == NULL){
            $res = 
                ['status' => 422, 
                'message' => 'Debe ingresar la cantidad del Repuesto'];
                echo json_encode($res);
                return false;
        
        }else{

            
    $query_cremaquin_rep = "UPDATE maquina_mantened SET Numer_Serie= '$numser_Maqui', Nombr_Maquina= '$nombr_Maqui', Rut_Empresa= '$rutempresa_dMaquina', Num_SerRepuest= '$seri_repu', Nombre_Repuest= '$nombr_repu', Cant_Repuest= '$cant_repu'
                                WHERE Numer_Serie= '$maqui_id'";
                    
        $query_cremaquinrep_run = mysqli_query($conexion, $query_cremaquin_rep);
        
        if($query_cremaquinrep_run){

            if($connect_changMaqui == $maqui_id){

                $query_renewClient = "UPDATE cliente_mantened SET seri_ConnMaqui= '$maqui_id'
                    WHERE ID_Cliente= '$rutEmpr_Maqui'";
                    
                $query_renewClient_run = mysqli_query($conexion, $query_renewClient);


                $query_creamanten_connect = "UPDATE mantencion_maquin SET Nomb_empre_cone= '$NombrEmpr_connect', Nomb_maquin_cone= '$nombr_Maqui', 	Fecha_trab_cone= '$FechaTrab_connect', id_LogClien_cone= '$rutEmpr_Maqui', seri_LogMaqui_cone= '$numser_Maqui'
                    WHERE seri_LogMaqui_cone= '$maqui_id'";
                    
            $query_creamanten_connect_run = mysqli_query($conexion, $query_creamanten_connect);

            if($query_creamanten_connect_run){
                $res = [
                'status' => 200, 
                'message' => 'Se Actualizo la Maquina y el Informe de Mantencion'
                ];
                echo json_encode($res);
                return false;

            }else{
                $res = [
                    'status' => 422, 
                    'message' => 'No se pudo Actualizar el Informe de Mantencion'
                    ];
                    echo json_encode($res);
                    return false;

            }
                

            


}else{

            $query_coorectClient = "UPDATE cliente_mantened SET seri_ConnMaqui= 0
                    WHERE seri_ConnMaqui= '$maqui_id'";
                    
            $query_coorectClient_run = mysqli_query($conexion, $query_coorectClient);

            if($query_coorectClient_run){

                $query_renewClient = "UPDATE cliente_mantened SET seri_ConnMaqui= '$maqui_id'
                    WHERE ID_Cliente= '$rutEmpr_Maqui'";
                    
                $query_renewClient_run = mysqli_query($conexion, $query_renewClient);

$query_creamanten_connect = "UPDATE mantencion_maquin SET Nomb_empre_cone= '$NombrEmpr_connect', Nomb_maquin_cone= '$nombr_Maqui', 	Fecha_trab_cone= '$FechaTrab_connect', seri_LogMaqui_cone= '$numser_Maqui'
                    WHERE seri_LogMaqui_cone= '$maqui_id'";
                    
            $query_creamanten_connect_run = mysqli_query($conexion, $query_creamanten_connect);

            if($query_creamanten_connect_run){
                $res = [
                'status' => 200, 
                'message' => 'Se Actualizo la Maquina y el Informe de Mantencion'
                ];
                echo json_encode($res);
                return false;

            }else{
                $res = [
                    'status' => 422, 
                    'message' => 'No se pudo Actualizar el Informe de Mantencion'
                    ];
                    echo json_encode($res);
                    return false;

            } 


        }else{
            $res = [
                'status' => 422, 
                'message' => 'No se pudo Actualizar la relacion con el Cliente'
                ];
                echo json_encode($res);
                return false;

        }


}

        }else{
            $res = [
                'status' => 500, 
                'message' => 'No se pudo Crear Actualizar la Maquina'
                ];
            echo json_encode($res);
            return false;

        }

        }


    }   

    }else{

        $res = 
                ['status' => 422, 
                'message' => 'Debe Seleccionar Si tiene Repuestos o No la Maquina'];
                echo json_encode($res);
                return false;

    }


    



    }


    
       


    

}



if(isset($_GET['maqui_id']))
{

    $maqui_id = mysqli_real_escape_string($conexion, $_GET['maqui_id']);

    $query_maquiID = "SELECT * FROM maquina_mantened WHERE Numer_Serie='$maqui_id'";
    $query_maquiID_run = mysqli_query($conexion, $query_maquiID);


    if(mysqli_num_rows($query_maquiID_run) == 1){

        $maqui_mantfind = mysqli_fetch_array($query_maquiID_run);

        $res = 
    ['status' => 200, 
    'message' => 'Se Encontro la Maquina',
    'data' => $maqui_mantfind];
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



if(isset($_POST['crear_MaquinMod']))
{
    

$torutuserLoad = mysqli_real_escape_string($conexion, $_POST['torutuserLoad']);

$numser_Maqui = mysqli_real_escape_string($conexion, $_POST['numser_Maqui']);
$nombr_Maqui = mysqli_real_escape_string($conexion, $_POST['nombr_Maqui']);
$rutEmpr_Maqui = mysqli_real_escape_string($conexion, $_POST['rutEmpr_Maqui']);


$seri_repu = mysqli_real_escape_string($conexion, $_POST['seri_repu']);
$nombr_repu = mysqli_real_escape_string($conexion, $_POST['nombr_repu']);
$cant_repu = mysqli_real_escape_string($conexion, $_POST['cant_repu']);


$rad_maqu= mysqli_real_escape_string($conexion, $_POST['rad_maqu']);



if($numser_Maqui == NULL || $nombr_Maqui == NULL || $rutEmpr_Maqui == NULL){
    $res = 
    ['status' => 422, 
    'message' => 'Campos vacios deben ser Rellenados'];
    echo json_encode($res);
    return false;

}else{

    $obtdatosconnect_sql = "SELECT Rut_empresa, Nombre_empresa, Fecha_del_trabajo  FROM cliente_mantened WHERE ID_Cliente = '$rutEmpr_Maqui'";
  $resultconnect_tolog = $conexion->query($obtdatosconnect_sql);

  while($dataconn_oflog = $resultconnect_tolog->fetch_assoc()){

    $rutempresa_dMaquina = $dataconn_oflog['Rut_empresa'];

    $NombrEmpr_connect = $dataconn_oflog['Nombre_empresa'];
    $FechaTrab_connect = $dataconn_oflog['Fecha_del_trabajo'];


  }

    if($rad_maqu == 'show_maqu'){

    
    if($seri_repu == NULL){

                    $res = 
                    ['status' => 422, 
                    'message' => 'Debe ingresar un Numero de Serie'];
                    echo json_encode($res);
                    return false;    

            }else{

                if($nombr_repu == NULL){
                    $res = 
                        ['status' => 422, 
                        'message' => 'Debe ingresar un Nombre del Repuesto'];
                        echo json_encode($res);
                        return false;
                }
                else if($cant_repu == NULL){
                    $res = 
                        ['status' => 422, 
                        'message' => 'Debe ingresar Cantidad de Repuestos'];
                        echo json_encode($res);
                        return false;
                
                }else{

                    $query_cremaquin_rep = "INSERT INTO maquina_mantened (Numer_Serie, Nombr_Maquina, 	Rut_Empresa, Num_SerRepuest, Nombre_Repuest, Cant_Repuest, rut_LogUser_Maqui)
                            VALUES ('$numser_Maqui', '$nombr_Maqui', '$rutempresa_dMaquina', '$seri_repu', '$nombr_repu', '$cant_repu', '$torutuserLoad')";
                            
                    $query_cremaquinrep_run = mysqli_query($conexion, $query_cremaquin_rep);
                
                if($query_cremaquinrep_run){

                    $query_connMaquiTo_client = "UPDATE cliente_mantened SET seri_ConnMaqui= '$numser_Maqui'
                    WHERE ID_Cliente= '$rutEmpr_Maqui'";

                    $query_connMaquiTo_client_run = mysqli_query($conexion, $query_connMaquiTo_client);

                    if($query_connMaquiTo_client_run){

                        $query_creamanten_connect = "UPDATE mantencion_maquin SET Nomb_empre_cone= '$NombrEmpr_connect', Nomb_maquin_cone= '$nombr_Maqui', 	Fecha_trab_cone= '$FechaTrab_connect', seri_LogMaqui_cone= '$numser_Maqui'
                                        WHERE id_LogClien_cone= '$rutEmpr_Maqui'";
                                        
                                $query_creamanten_connect_run = mysqli_query($conexion, $query_creamanten_connect);

                                if($query_creamanten_connect_run){
                                    $res = [
                                    'status' => 200, 
                                    'message' => 'Se Creo la Maquina y el Informe de Mantencion'
                                    ];
                                    echo json_encode($res);
                                    return false;

                                }else{
                                    $res = [
                                        'status' => 422, 
                                        'message' => 'No se pudo Crear el Informe de Mantencion'
                                        ];
                                        echo json_encode($res);
                                        return false;

                                }
                        }else{

                        $res = [
                            'status' => 422, 
                            'message' => 'No se pudo Actualizar la relacion de la Maquina con el Cliente '
                            ];
                            echo json_encode($res);
                            return false;

                    }
                    
                                

                    

                }else{
                    $res = [
                        'status' => 422, 
                        'message' => 'No se pudo Crear la Maquina'
                        ];
                    echo json_encode($res);
                    return false;

                }

                }

                    


            }

    }else if($rad_maqu == 'hide_maqu'){

        $query_cremaquin = "INSERT INTO maquina_mantened (Numer_Serie, Nombr_Maquina, Rut_Empresa, Num_SerRepuest, Nombre_Repuest, Cant_Repuest, rut_LogUser_Maqui)
        VALUES ('$numser_Maqui', '$nombr_Maqui', '$rutempresa_dMaquina', NULL, NULL, NULL, '$torutuserLoad')";
                
        $query_cremaquin_run = mysqli_query($conexion, $query_cremaquin);

        if($query_cremaquin_run){

            $query_connMaquiTo_client = "UPDATE cliente_mantened SET seri_ConnMaqui= '$numser_Maqui'
                    WHERE ID_Cliente= '$rutEmpr_Maqui'";

                    $query_connMaquiTo_client_run = mysqli_query($conexion, $query_connMaquiTo_client);

                    if($query_connMaquiTo_client_run){

                        $query_creamanten_connect = "UPDATE mantencion_maquin SET Nomb_empre_cone= '$NombrEmpr_connect', Nomb_maquin_cone= '$nombr_Maqui', 	Fecha_trab_cone= '$FechaTrab_connect', seri_LogMaqui_cone= '$numser_Maqui'
                                        WHERE id_LogClien_cone= '$rutEmpr_Maqui'";
                                        
                                $query_creamanten_connect_run = mysqli_query($conexion, $query_creamanten_connect);

                                if($query_creamanten_connect_run){
                                    $res = [
                                    'status' => 200, 
                                    'message' => 'Se Creo la Maquina y el Informe de Mantencion'
                                    ];
                                    echo json_encode($res);
                                    return false;

                                }else{
                                    $res = [
                                        'status' => 422, 
                                        'message' => 'No se pudo Crear el Informe de Mantencion'
                                        ];
                                        echo json_encode($res);
                                        return false;

                                }
                        }else{

                        $res = [
                            'status' => 422, 
                            'message' => 'No se pudo Actualizar la relacion de la Maquina con el Cliente '
                            ];
                            echo json_encode($res);
                            return false;

                    }

        }else{
        $res = [
            'status' => 500, 
            'message' => 'No se pudo Crear la Maquina'
            ];
        echo json_encode($res);
        return false;

}


    }else{
       
            $res = 
        ['status' => 422, 
        'message' => 'Debe Seleccionar Si tiene Repuestos o No la Maquina'];
        echo json_encode($res);
        return false;
        

}

    
        


    }   




}




?>