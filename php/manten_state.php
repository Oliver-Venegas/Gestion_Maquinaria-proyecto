<?php 
session_start();
include ('conect_BD.php');

$rad_tipe = mysqli_real_escape_string($conexion, $_POST['rad_tipe']);

if($rad_tipe == 'hide_Estd'){

    $crea_estdmanten = mysqli_real_escape_string($conexion, $_POST['crea_estdmanten']);

    $query_estdmanten = "INSERT INTO estad_manten (Nombre_estado)
        VALUES ('$crea_estdmanten')";
                
        $query_estdmanten_run = mysqli_query($conexion, $query_estdmanten);

        if($query_estdmanten_run){

            $_SESSION['estd_succe'] = "Se creo el Estado de Mantencion";
            header("Location: ../chang_Mant.php");
    
            }else{
                $_SESSION['estd_no'] = "No se pudo Crear el Estado de Mantencion";
                header("Location: ../chang_Mant.php");
            
        }
    
 

}else if($rad_tipe == 'show_Estd'){

    $valrow_query = "SELECT * FROM estad_manten";
    $valrow_query_run = mysqli_query($conexion, $valrow_query);
    $count_valrow = mysqli_num_rows($valrow_query_run);

    if($count_valrow > 1){

       $estd_mantencion = mysqli_real_escape_string($conexion, $_POST['estd_mantencion']);

    $query_delestado = "DELETE FROM estad_manten WHERE 	id_estd_mantenc= '$estd_mantencion'";
    $query_delestado_run = mysqli_query($conexion, $query_delestado);


        if($query_delestado_run){

            $_SESSION['estd_succe'] = "Se Elimino el Estado de Mantencion";
            header("Location: ../chang_Mant.php");
    
            }else{
                $_SESSION['estd_no'] = "No se pudo Eliminar el Estado de Mantencion";
                header("Location: ../chang_Mant.php");
            
        } 


    }else{

                $_SESSION['estd_no'] = "No se pudo Eliminar mas Estados de Mantencion";
                header("Location: ../chang_Mant.php");

    }

    

}else{
    $_SESSION['estd_no'] = "Debe Seleccionar si Crear O Eliminar Estado de Mantencion ";
                header("Location: ../chang_Mant.php");
}

?>