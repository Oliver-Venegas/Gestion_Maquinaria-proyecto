<?php

include ('conect_BD.php');


if(isset($_POST['delet_MaquintMod']))
{
    $maqui_iddel = mysqli_real_escape_string($conexion, $_POST['maqui_iddel']);

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


if(isset($_POST['updat_MaquinMod']))
{

$maqui_id = mysqli_real_escape_string($conexion, $_POST['maqui_id']);

$numser_Maqui = mysqli_real_escape_string($conexion, $_POST['numser_Maquiedi']);
$nombr_Maqui = mysqli_real_escape_string($conexion, $_POST['nombr_Maquiedi']);
$rutEmpr_Maqui = mysqli_real_escape_string($conexion, $_POST['rutEmpr_Maquiedi']);


$seri_repu = mysqli_real_escape_string($conexion, $_POST['seri_repuedi']);
$nombr_repu = mysqli_real_escape_string($conexion, $_POST['nombr_repuedi']);
$cant_repu = mysqli_real_escape_string($conexion, $_POST['cant_repuedi']);

if($numser_Maqui == NULL || $nombr_Maqui == NULL || $rutEmpr_Maqui == NULL){
    $res = 
    ['status' => 422, 
    'message' => 'Campos vacios deben ser Rellenados'];
    echo json_encode($res);
    return false;

}else{


    if($seri_repu == NULL){

        $query_cremaquin = "UPDATE maquina_mantened SET Numer_Serie= '$numser_Maqui', Nombr_Maquina= '$nombr_Maqui', Rut_Empresa= '$rutEmpr_Maqui', Num_SerRepuest= NULL, Nombre_Repuest= NULL, Cant_Repuest= NULL
                                WHERE Numer_Serie= '$maqui_id'";

                
        $query_cremaquin_run = mysqli_query($conexion, $query_cremaquin);

        if($query_cremaquin_run){

        $res = [
            'status' => 200, 
            'message' => 'Se Actualizo la Maquina'
            ];
        echo json_encode($res);
        return false;

        }else{
        $res = [
            'status' => 500, 
            'message' => 'No se pudo Actualizar la Maquina'
            ];
        echo json_encode($res);
        return false;

}


    }else{

        if($nombr_repu == NULL){
            $res = 
                ['status' => 422, 
                'message' => 'Nombre del Repuesto debe ser Rellenado'];
                echo json_encode($res);
                return false;
        }
        else if($cant_repu == NULL){
            $res = 
                ['status' => 422, 
                'message' => 'Cantidad del Repuesto debe ser Rellenado'];
                echo json_encode($res);
                return false;
        
        }else{

            
    $query_cremaquin_rep = "UPDATE maquina_mantened SET Numer_Serie= '$numser_Maqui', Nombr_Maquina= '$nombr_Maqui', Rut_Empresa= '$rutEmpr_Maqui', Num_SerRepuest= '$seri_repu', Nombre_Repuest= '$nombr_repu', Cant_Repuest= '$cant_repu'
                                WHERE Numer_Serie= '$maqui_id'";
                    
        $query_cremaquinrep_run = mysqli_query($conexion, $query_cremaquin_rep);
        
        if($query_cremaquinrep_run){

            $res = [
                'status' => 200, 
                'message' => 'Se Actualizo la Maquina'
                ];
            echo json_encode($res);
            return false;

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

if($numser_Maqui == NULL || $nombr_Maqui == NULL || $rutEmpr_Maqui == NULL){
    $res = 
    ['status' => 422, 
    'message' => 'Campos vacios deben ser Rellenados'];
    echo json_encode($res);
    return false;

}else{


    if($seri_repu == NULL){

        $query_cremaquin = "INSERT INTO maquina_mantened (Numer_Serie, Nombr_Maquina, Rut_Empresa, Num_SerRepuest, Nombre_Repuest, Cant_Repuest, rut_LogUser_Maqui)
        VALUES ('$numser_Maqui', '$nombr_Maqui', '$rutEmpr_Maqui', NULL, NULL, NULL, '$torutuserLoad')";
                
        $query_cremaquin_run = mysqli_query($conexion, $query_cremaquin);

        if($query_cremaquin_run){

        $res = [
            'status' => 200, 
            'message' => 'Se Creo la Maquina'
            ];
        echo json_encode($res);
        return false;

        }else{
        $res = [
            'status' => 500, 
            'message' => 'No se pudo Crear la Maquina'
            ];
        echo json_encode($res);
        return false;

}


    }else{

        if($nombr_repu == NULL){
            $res = 
                ['status' => 422, 
                'message' => 'Nombre del Repuesto debe ser Rellenado'];
                echo json_encode($res);
                return false;
        }
        else if($cant_repu == NULL){
            $res = 
                ['status' => 422, 
                'message' => 'Cantidad del Repuesto debe ser Rellenado'];
                echo json_encode($res);
                return false;
        
        }else{

            $query_cremaquin_rep = "INSERT INTO maquina_mantened (Numer_Serie, Nombr_Maquina, 	Rut_Empresa, Num_SerRepuest, Nombre_Repuest, Cant_Repuest, rut_LogUser_Maqui)
                    VALUES ('$numser_Maqui', '$nombr_Maqui', '$rutEmpr_Maqui', '$seri_repu', '$nombr_repu', '$cant_repu', '$torutuserLoad')";
                    
        $query_cremaquinrep_run = mysqli_query($conexion, $query_cremaquin_rep);
        
        if($query_cremaquinrep_run){

            $res = [
                'status' => 200, 
                'message' => 'Se Creo la Maquina'
                ];
            echo json_encode($res);
            return false;

        }else{
            $res = [
                'status' => 500, 
                'message' => 'No se pudo Crear la Maquina'
                ];
            echo json_encode($res);
            return false;

        }

        }

            


    }



    
        
    






        

        


    }   

    


    





}




?>