<?php 
include ('conect_BD.php');

if (isset($_POST['send_emlpass'])) {

    $email_renew = mysqli_real_escape_string($conexion, $_POST['email_renew']);
    $token = md5(rand());

    $check_email = "SELECT Email_mantenedor FROM usuario_mantenedor WHERE Email_mantenedor = '$email_renew' LIMIT 1";
    $check_email_query = mysqli_query($conexion, $check_email);

    if(mysqli_num_rows($check_email_query) > 0) {
        $row_run = mysqli_fetch_array($check_email_query);
        $get_name = $row_run['Nombre_mantenedor'];
        $get_email = $row_run['Email_mantenedor'];

        $update_token = "UPDATE usuario_mantenedor SET reset_token = '$token' WHERE Email_mantenedor = '$get_email' LIMIT 1";
        $update_token_run = mysqli_query($conexion, $update_token);

        if($update_token_run){
            

        }else{
            header("Location: ../passw_rec.php?error_reg=Ocurrio un Error");
            exit();

        }

    }else{
        header("Location: ../passw_rec.php?error_reg=No existe el Correo Electronico ingresado");
        exit();

    }

}
?>