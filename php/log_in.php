<?php 

session_start();

include ('conect_BD.php');

$email_user = $_POST['email_user'];
$password_user = $_POST['password_user'];

$password_user = hash('sha512', $password_user);


if(empty($email_user)){
    header("Location: ../index.php?error_reg=Debe ingresar un Correo Electronico");
    exit();
}
else if(empty($password_user)){
    header("Location: ../index.php?error_reg=Debe ingresar una Contraseña");
    exit();

}

$valid_log = mysqli_query($conexion, "SELECT * FROM usuario_mantenedor
                            WHERE Email_mantenedor='$email_user' AND Pass_mantenedor='$password_user'");

    if(mysqli_num_rows($valid_log) > 0){

        $_SESSION['user_manten'] = $email_user;

        header("Location: ../menu.php");

        exit();

    }else{
        header("Location: ../index.php?error_reg=Correo Electronico o Contraseña incorrecta");

        exit();
    }

?>