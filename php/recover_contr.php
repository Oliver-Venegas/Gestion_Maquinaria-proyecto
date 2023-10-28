<?php 



include ('conect_BD.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



//Load Composer's autoloader
 require '../vendor/autoload.php';

function send_password_reset($get_name, $get_email, $token){

    $mail = new PHPMailer(true);

                  
    $mail->isSMTP();                               
    $mail->SMTPAuth   = true;    

    $mail->Host       = 'smtp.gmail.com'; 
    $mail->Username   = 'vermuda6@gmail.com';
    $mail->Password   = 'mlqd gxpd krqx jyzn';
    
    //SMTP password
    $mail->SMTPSecure = 'tls';          
    $mail->Port       = 587;                           

    //Recipients
    $mail->setFrom('vermuda6@gmail.com', $get_name);
    $mail->addAddress($get_email);  
    
    $mail->isHTML(true);                                
    $mail->Subject = 'Notificación de restablecimiento de contraseña';


    /*
    //Web Hosting

    $email_templat = "
    <h2>Cambio de Clave</h2>
    <p>Aqui se encuentra un Link para enviarl@ a la pagina para cambiar cambiar su Clave</p>
    <br>
    <a href='http://localhost/Gestion_Maquinaria/new_contr.php?reset_token=$token&Email_mantenedor=$get_email'>Click aqui para restablecer su Clave</a>
    
    ";
    
    */

    $email_templat = "
    <h2>Hola</h2>
    <p>Aqui se encuentra un Link para enviarl@ a la pagina para cambiar cambiar su Clave</p>
    <br>
    <a href='http://localhost/Gestion_Maquinaria/new_contr.php?reset_token=$token&Email_mantenedor=$get_email'>Click aqui para restablecer su Clave</a>
    
    ";

    $mail->Body    = $email_templat;
    $mail->send();


}

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
            send_password_reset($get_name, $get_email, $token); 
             
            header("Location: ../passw_rec.php?suscces_reg=Se Envio un Correo a su Correo Electronico para Cambiar su Clave");
            exit();

        }else{
            header("Location: ../passw_rec.php?error_reg=Ocurrio un Error");
            exit();

        }

    }else{
        header("Location: ../passw_rec.php?error_reg=No existe el Correo Electronico ingresado");
        exit();

    }

}

if(isset($_POST['send_renewpassw'])){

    $email_renew = mysqli_real_escape_string($conexion, $_POST['email_torenew']);
    $passw_renew = mysqli_real_escape_string($conexion, $_POST['pass_renew']);
    $passagain_renew = mysqli_real_escape_string($conexion, $_POST['again_renew']);



    $token_renew = mysqli_real_escape_string($conexion, $_POST['pass_token']);

    if(!empty($token_renew)){

        if(!empty($email_renew) && !empty($passw_renew) && !empty($passagain_renew)){
            $check_token = "SELECT reset_token FROM usuario_mantenedor WHERE reset_token = '$token_renew' LIMIT 1";
            $check_token_run = mysqli_query($conexion, $check_token);

            if(mysqli_num_rows($check_token_run) > 0){

                if($passw_renew == $passagain_renew){

                    $passw_renew = hash('sha512', $passw_renew);

                    $update_passw = "UPDATE usuario_mantenedor SET Pass_mantenedor = '$passw_renew' WHERE reset_token = '$token_renew' LIMIT 1";
                    $update_passw_run = mysqli_query($conexion, $update_passw);

                    if($update_passw_run){
                        header("Location: ../index.php?suscces_reg=Se Actualizo su Clave Exitosamente");
                        exit();


                    }else{
                        header("Location: ../new_contr.php?reset_token=$token_renew&Email_mantenedor=$email_renew&error_reg=Ocurrio un Error");
                        exit();

                    }

                }else{
                    header("Location: ../new_contr.php?reset_token=$token_renew&Email_mantenedor=$email_renew&error_reg=Las Contraseñas no coinciden");
                    exit();

                }


            }else{
                header("Location: ../new_contr.php?reset_token=$token_renew&Email_mantenedor=$email_renew&error_reg=Token Invalido");
                exit();

            }


        }else{
            header("Location: ../new_contr.php?reset_token=$token_renew&Email_mantenedor=$email_renew&error_reg=Debe ingresar todos los campos");
            exit();

        }


    }else{
        header("Location: ../passw_rec.php?error_reg=El Token no es correcto");
        exit();

    }

}
?>