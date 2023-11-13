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


if($rut_empresa == NULL || $nombrempr_Clien == NULL || $dateempr_Clien == NULL){
    $res = 
    ['status' => 422, 
    'message' => 'Campos vacios deben ser Rellenados'];
    echo json_encode($res);
    return false;

}else{


    // Verifica que no esté vacio y que el string sea de tamaño mayor a 3 carácteres(1-9)        
    if ((empty($rut_empresa)) || strlen($rut_empresa) < 3) {
        $res = 
            ['status' => 422, 
            'message' => 'RUT vacio o con menos de 3 caracteres'];
            echo json_encode($res);
            return false;

    }

    // Quitar los últimos 2 valores (el guión y el dígito verificador) y luego verificar que sólo sea
    // numérico
    $parteNumerica = str_replace(substr($rut_empresa, -2, 2), '', $rut_empresa);

    if (!preg_match("/^[0-9]*$/", $parteNumerica)) {
        $res = 
            ['status' => 422, 
            'message' => 'El RUT sólo debe contener números'];
            echo json_encode($res);
            return false;
    }

    $guionYVerificador = substr($rut_empresa, -2, 2);
    // Verifica que el guion y dígito verificador tengan un largo de 2.
    if (strlen($guionYVerificador) != 2) {
        $res = 
            ['status' => 422, 
            'message' => 'Error en el largo del digito verificador'];
            echo json_encode($res);
            return false;
    }

    // obliga a que el dígito verificador tenga la forma -[0-9] o -[kK]
    if (!preg_match('/(^[-]{1}+[0-9kK]).{0}$/', $guionYVerificador)) {
        $res = 
            ['status' => 422, 
            'message' => 'El dígito verificador no cuenta con el patrón requerido'];
            echo json_encode($res);
            return false;


    }

    // Valida que sólo sean números, excepto el último dígito que pueda ser k
    if (!preg_match("/^[0-9.]+[-]?+[0-9kK]{1}/", $rut_empresa)) {
        $res = 
            ['status' => 422, 
            'message' => 'Error al ingresar el Rut'];
            echo json_encode($res);
            return false;
    }

    $rutV = preg_replace('/[\.\-]/i', '', $rut_empresa);
    $dv = substr($rutV, -1);
    $numero = substr($rutV, 0, strlen($rutV) - 1);
    $i = 2;
    $suma = 0;
    foreach (array_reverse(str_split($numero)) as $v) {
        if ($i == 8) {
            $i = 2;
        }
        $suma += $v * $i;
        ++$i;
    }
    $dvr = 11 - ($suma % 11);
    if ($dvr == 11) {
        $dvr = 0;
    }
    if ($dvr == 10) {
        $dvr = 'K';
    }
    if ($dvr == strtoupper($dv)) {

    if($id_bol == NULL){

        $query_creclient = "UPDATE cliente_mantened SET Rut_empresa= '$rut_empresa', Nombre_empresa= '$nombrempr_Clien', Nombre_contacto= '$nombrcont_Clien', Hora_trabaj_empresa= '$hrsempr_Clien', Fecha_del_trabajo= '$dateempr_Clien'
                                WHERE ID_Cliente= '$Cliente_id'";
                    
        $query_creclient_run = mysqli_query($conexion, $query_creclient);
        
        if($query_creclient_run){

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
    
    
    }else{

        $carpeta_destino = "../files/";

        $data_bol =  basename($_FILES['data_boledi']['name']);
        $bol_text = strtolower(pathinfo($data_bol, PATHINFO_EXTENSION));

        if($bol_text == "pdf" || $bol_text == "doc" || $bol_text == "docx"){

            if(move_uploaded_file($_FILES['data_boledi']['tmp_name'], $carpeta_destino . $data_bol)){

                    $query_creclient_bol = "UPDATE cliente_mantened SET Rut_empresa= '$rut_empresa', Nombre_empresa= '$nombrempr_Clien', Nombre_contacto= '$nombrcont_Clien', Hora_trabaj_empresa= '$hrsempr_Clien', Fecha_del_trabajo= '$dateempr_Clien', Codigo_boleta= '$id_bol', Datos_boleta= '$data_bol'
                                WHERE ID_Cliente= '$Cliente_id'";

                                
                    $query_creclientbol_run = mysqli_query($conexion, $query_creclient_bol);
                    
                    if($query_creclientbol_run){
            
                        $res = [
                            'status' => 200, 
                            'message' => 'Se Actualizo el Cliente junto a su Boleta'
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
            
                    }else{
            
                        $res = 
                        ['status' => 422, 
                        'message' => 'No se pudo guardar el Archivo'];
                        echo json_encode($res);
                        return false;
                    
                    }


        }else{
            $res = 
            ['status' => 422, 
            'message' => 'El Archivo ingresado no es de tipo PDF o WORD'];
            echo json_encode($res);
            return false;

        }
                
                    

        
        


    }

    

    }else {
            $res = 
                ['status' => 422, 
                'message' => 'El Rut no es Valido'];
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
    

$torutuserLoad = mysqli_real_escape_string($conexion, $_POST['torutuserLoad']);

$rut_empresa = mysqli_real_escape_string($conexion, $_POST['rutempr_Clien']);
$nombrempr_Clien = mysqli_real_escape_string($conexion, $_POST['nombrempr_Clien']);
$nombrcont_Clien = mysqli_real_escape_string($conexion, $_POST['nombrcont_Clien']);
$hrsempr_Clien = mysqli_real_escape_string($conexion, $_POST['hrsempr_Clien']);

$dateempr_Clien = date('Y-m-d', strtotime($_POST['dateempr_Clien']));

$id_bol = mysqli_real_escape_string($conexion, $_POST['id_bol']);

if($rut_empresa == NULL || $nombrempr_Clien == NULL || $dateempr_Clien == NULL){
    $res = 
    ['status' => 422, 
    'message' => 'Campos vacios deben ser Rellenados'];
    echo json_encode($res);
    return false;

}else{

        // Verifica que no esté vacio y que el string sea de tamaño mayor a 3 carácteres(1-9)        
        if ((empty($rut_empresa)) || strlen($rut_empresa) < 3) {
            $res = 
                ['status' => 422, 
                'message' => 'RUT vacio o con menos de 3 caracteres'];
                echo json_encode($res);
                return false;

        }

        // Quitar los últimos 2 valores (el guión y el dígito verificador) y luego verificar que sólo sea
        // numérico
        $parteNumerica = str_replace(substr($rut_empresa, -2, 2), '', $rut_empresa);

        if (!preg_match("/^[0-9]*$/", $parteNumerica)) {
            $res = 
                ['status' => 422, 
                'message' => 'El RUT sólo debe contener números'];
                echo json_encode($res);
                return false;
        }

        $guionYVerificador = substr($rut_empresa, -2, 2);
        // Verifica que el guion y dígito verificador tengan un largo de 2.
        if (strlen($guionYVerificador) != 2) {
            $res = 
                ['status' => 422, 
                'message' => 'Error en el largo del digito verificador'];
                echo json_encode($res);
                return false;
        }

        // obliga a que el dígito verificador tenga la forma -[0-9] o -[kK]
        if (!preg_match('/(^[-]{1}+[0-9kK]).{0}$/', $guionYVerificador)) {
            $res = 
                ['status' => 422, 
                'message' => 'El dígito verificador no cuenta con el patrón requerido'];
                echo json_encode($res);
                return false;


        }

        // Valida que sólo sean números, excepto el último dígito que pueda ser k
        if (!preg_match("/^[0-9.]+[-]?+[0-9kK]{1}/", $rut_empresa)) {
            $res = 
                ['status' => 422, 
                'message' => 'Error al ingresar el Rut'];
                echo json_encode($res);
                return false;
        }

        $rutV = preg_replace('/[\.\-]/i', '', $rut_empresa);
        $dv = substr($rutV, -1);
        $numero = substr($rutV, 0, strlen($rutV) - 1);
        $i = 2;
        $suma = 0;
        foreach (array_reverse(str_split($numero)) as $v) {
            if ($i == 8) {
                $i = 2;
            }
            $suma += $v * $i;
            ++$i;
        }
        $dvr = 11 - ($suma % 11);
        if ($dvr == 11) {
            $dvr = 0;
        }
        if ($dvr == 10) {
            $dvr = 'K';
        }
        if ($dvr == strtoupper($dv)) {


    if($id_bol == NULL){

        $query_creclient = "INSERT INTO cliente_mantened (Rut_empresa, Nombre_empresa, 	Nombre_contacto, Hora_trabaj_empresa, Fecha_del_trabajo, rut_LogUser_Clint)
        VALUES ('$rut_empresa', '$nombrempr_Clien', '$nombrcont_Clien', '$hrsempr_Clien', '$dateempr_Clien', '$torutuserLoad')";
                
        $query_creclient_run = mysqli_query($conexion, $query_creclient);

        if($query_creclient_run){

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


    }else{

        $carpeta_destino = "../files/";

        $data_bol =  basename($_FILES['data_bol']['name']);
        $bol_text = strtolower(pathinfo($data_bol, PATHINFO_EXTENSION));

        if($bol_text == "pdf" || $bol_text == "doc" || $bol_text == "docx"){


            if(move_uploaded_file($_FILES['data_bol']['tmp_name'], $carpeta_destino . $data_bol)){

            $query_creclient_bol = "INSERT INTO cliente_mantened (Rut_empresa, Nombre_empresa, 	Nombre_contacto, Hora_trabaj_empresa, Fecha_del_trabajo, Codigo_boleta, Datos_boleta, rut_LogUser_Clint)
                    VALUES ('$rut_empresa', '$nombrempr_Clien', '$nombrcont_Clien', '$hrsempr_Clien', '$dateempr_Clien', '$id_bol', '$data_bol', '$torutuserLoad')";
                    
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

        }else{

            $res = 
            ['status' => 422, 
            'message' => 'No se pudo guardar el Archivo'];
            echo json_encode($res);
            return false;
        
        }



        }else{
            $res = 
            ['status' => 422, 
            'message' => 'El Archivo ingresado no es de tipo PDF o WORD'];
            echo json_encode($res);
            return false;

        }

         



    }



    
        } else {
            $res = 
                ['status' => 422, 
                'message' => 'El Rut no es Valido'];
                echo json_encode($res);
                return false;

        }
    






        

        


    }   

    


    





}




?>