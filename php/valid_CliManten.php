<?php 

session_start();

include ('conect_BD.php');

$rut_cliente = $_POST['rut_cliente'];
$serie_maquina = $_POST['serie_maquina'];


if(empty($rut_cliente)){
    header("Location: ../sessiMantenedor.php?error_reg=Debe ingresar un Rut");
    exit();
}
else if(empty($serie_maquina)){
    header("Location: ../sessiMantenedor.php?error_reg=Debe ingresar un Numero de Serie");
    exit();

}

$valid_cliente = mysqli_query($conexion, "SELECT * FROM cliente_mantened
                            WHERE Rut_empresa='$rut_cliente' AND seri_ConnMaqui='$serie_maquina'");

    if(mysqli_num_rows($valid_cliente) > 0){

        $_SESSION['cliente_rut'] = $rut_cliente;
        $_SESSION['maquinas_serie'] = $serie_maquina;

        header("Location: ../menuCliente.php");

        exit();

    }else{
        header("Location: ../sessiCliente.php?error_reg=El Cliente no tiene ingresada una Maquina o No Existe el Cliente");

        exit();
    }

?>