<?php

include ('conect_BD.php');

$rut_reg = $_POST['rut_reg'];
$nombr_reg = $_POST['nombr_reg'];
$password_reg = $_POST['password_reg'];
$passagain_reg = $_POST['passagain_reg'];
$email_reg = $_POST['email_reg'];
$type_mantensel = $_POST['type_mantensel'];


if(empty($rut_reg)){
    header("Location: ../reg_man.php?error_reg=Debe ingresar un Rut");
    exit();
}
else if(empty($nombr_reg)){
    header("Location: ../reg_man.php?error_reg=Debe ingresar un Nombre y Apellido");
    exit();

}
if(empty($email_reg)){
    header("Location: ../reg_man.php?error_reg=Debe ingresar un Correo Electronico");
    exit();
}
else if(empty($password_reg)){
    header("Location: ../reg_man.php?error_reg=Debe ingresar una Contraseña");
    exit();

}
if($password_reg != $passagain_reg){
    header("Location: ../reg_man.php?error_reg=Las Contraseñas no coinciden");
    exit();
}


$password_reg = hash('sha512', $password_reg);


$query_regist = "INSERT INTO usuario_mantenedor (Rut, Nombre_mantenedor, Pass_mantenedor , Email_mantenedor ,mant_type )
                 VALUES ('$rut_reg', '$nombr_reg', '$password_reg', '$email_reg', '$type_mantensel')";


$verifymail_query = mysqli_query($conexion, "SELECT * FROM usuario_mantenedor WHERE Email_mantenedor = '$email_reg'");

if(mysqli_num_rows($verifymail_query) > 0){

    header("Location: ../reg_man.php?error_reg=El Correo Electronico ya se encuentra en uso");

    exit();
}

$verifyrut_query = mysqli_query($conexion, "SELECT * FROM usuario_mantenedor WHERE Rut = '$rut_reg'");

if(mysqli_num_rows($verifyrut_query) > 0){

    header("Location: ../reg_man.php?error_reg=El Rut ya se encuentra en uso");

    exit();
}

$ejectura_regis = mysqli_query($conexion, $query_regist);

if($ejectura_regis){

    header("Location: ../index.php?suscces_reg=Se Registro el Mantenedor");


}else{

    header("Location: ../reg_man.php?error_reg=Intentelo de nuevo, el antenedor no se pudo guardar");

    exit();
}


mysqli_close($conexion);

?>