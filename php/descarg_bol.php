<?php

include ('conect_BD.php');

    $client_id_bolet = $_POST['client_id_bolt'];

    $query_boldata = "SELECT * FROM cliente_mantened WHERE ID_Cliente = '$client_id_bolet'";
    $query_boldata_run = mysqli_query($conexion, $query_boldata);

    
    
    
    if(mysqli_num_rows($query_boldata_run) == 1)
    {

        

        $fila_boleta = mysqli_fetch_assoc($query_boldata_run);  
        $archivo = $fila_boleta['Datos_boleta'];

        if($archivo == NULL){
            header("Location: ../view_Client.php?error_reg=El Cliente no tiene un Archivo ingresado");

        }else{
            
        $ruta_archivo = "../files/" . $archivo;

        
        if(file_exists($ruta_archivo)){

            

            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . $archivo . '"');
            readfile($ruta_archivo);

            
        }else{
            header("Location: ../view_Client.php?error_reg=Debe ingresar un Nombre y Apellido");

        }  
        
        }
        

        

    }else{
        header("Location: ../view_Client.php?error_reg=Debe ingresar un Nombre y Apellido");

    }



?>