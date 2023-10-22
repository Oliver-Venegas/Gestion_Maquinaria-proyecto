<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Gestion de Maquinaria</title>
    <!-- CONEXION CSS -->
    <link rel="stylesheet" href="estilos.css">
</head>
<body class="backg_body">
    <div class="container w-75 bg-primary mt-5 mb-5 rounded shadow">
        <div class="row align-items-stretch">
            <div class="col backg_image d-none d-lg-block col-md-5 col-lg-5 col-xl-6  rounded"></div>

            <div class="col bg-white p-5 rounded-end">

                <?php
                include ('php/conect_BD.php');

                if (isset($_POST["submit"])) {

                    $email_user = mysqli_real_escape_string($conexion, $_POST["email_user"]);
                    $password_user = mysqli_real_escape_string($conexion, $_POST["password_user"]);

                    $result = mysqli_query($conexion,"SELECT * FROM usuario_mantenedor WHERE Email_mantenedor='$email_user' AND Pass_mantenedor='$password_user'") or die("Error de Conexion");
                    $row_reslt = mysqli_fetch_assoc($result);

                    if (is_array( $row_reslt ) && !empty( $row_reslt )) {
                        $_SESSION['eml_log'] = $row_reslt['Email_mantenedor'];
                        $_SESSION['rut_log'] = $row_reslt['Rut'];
                        $_SESSION['nombr_log'] = $row_reslt['Nombre_mantenedor'];
                        $_SESSION['manten_log'] = $row_reslt['mant_type'];

                }else{
                    echo "
                        <h2 class='fw-bold text-center py-4'>Error</h2>
                        <div class='message_creamant'><strong>El Correo Electronico o la Contraseña es Equivocada</strong></div>
                        <br>";

       echo "<a class='btn_backlog btn btn-light btn-lg' href='index.php'>Regresar</a>";
                }
                if (isset($_SESSION['eml_log']))    {
                    header("Location: menu.php");

                }

            }
            
            else{
                
                ?>

                <h2 class="fw-bold text-center py-4">Iniciar Sesion</h2>

                <form action="" method="post">
                    <div class="mb-4">
                        <label for="email" class="form-label">Correo Electronico</label>
                        <div class="usr_maillen">
                           <input type="email" class="form-control" name="email_user" id="email_user" placeholder="Ingrese su Correo Electronico"> 
                        </div>
                        
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label">Contraseña</label>
                        <div class="usr_empassdiv">
                           <input type="password" class="form-control" name="password_user" id="password_user" placeholder="Ingrese su Contraseña"> 
                        </div>
                        
                    </div>
<br>
                   <div class="d-grid ">
                   <input type="submit" name="submit" class="btn_ingreso btn btn-primary" value="Ingresar"></input>
                   </div>

                   <br>
                   <div class="my-3">
                    <span>¿No tienes Cuenta? <a href="reg_man.php">Registrate</a></span>
                    <br>
                    <span><a href="passw_rec.php">Recuperar Contraseña</a></span>
                   </div>

                </form>
                

                <?php 
            }
                ?>
            </div>
        </div>
    </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>