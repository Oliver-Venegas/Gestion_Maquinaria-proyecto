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


// Verifica que no esté vacio y que el string sea de tamaño mayor a 3 carácteres(1-9)        
if ((empty($rut_reg)) || strlen($rut_reg) < 3) {
    header("Location: ../reg_man.php?error_reg=RUT vacio o con menos de 3 caracteres");
    exit();

}

// Quitar los últimos 2 valores (el guión y el dígito verificador) y luego verificar que sólo sea
// numérico
$parteNumerica = str_replace(substr($rut_reg, -2, 2), '', $rut_reg);

if (!preg_match("/^[0-9]*$/", $parteNumerica)) {
    header("Location: ../reg_man.php?error_reg=El RUT sólo debe contener numeros");
    exit();

}

$guionYVerificador = substr($rut_reg, -2, 2);
// Verifica que el guion y dígito verificador tengan un largo de 2.
if (strlen($guionYVerificador) != 2) {
    header("Location: ../reg_man.php?error_reg=Error en el largo del digito verificador");
    exit();

}

// obliga a que el dígito verificador tenga la forma -[0-9] o -[kK]
if (!preg_match('/(^[-]{1}+[0-9kK]).{0}$/', $guionYVerificador)) {
    header("Location: ../reg_man.php?error_reg=El digito verificador no cuenta con el patron requerido");
    exit();


}

// Valida que sólo sean números, excepto el último dígito que pueda ser k
if (!preg_match("/^[0-9.]+[-]?+[0-9kK]{1}/", $rut_reg)) {
    header("Location: ../reg_man.php?error_reg=Error al ingresar el RUT");
    exit();

}

$rutV = preg_replace('/[\.\-]/i', '', $rut_reg);
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

    header("Location: ../sessiMantenedor.php?suscces_reg=Se Registro el Mantenedor");


}else{

    header("Location: ../reg_man.php?error_reg=Intentelo de nuevo, el Mantenedor no se pudo registrar");

    exit();
}

mysqli_close($conexion);

} else {
    header("Location: ../reg_man.php?error_reg=El RUT ingresado no es valido");
    exit();

}


?>