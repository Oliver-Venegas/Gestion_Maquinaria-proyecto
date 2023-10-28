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
            <div class="col backg_image d-none d-lg-block col-md-5 col-lg-5 col-xl-6 rounded"></div>

            <div class="col bg-white p-5 rounded-end">

                <h2 class="fw-bold text-center py-4">Cambiar la Contraseña</h2>

                <form action="php/recover_contr.php" method="POST">

                    <?php 
                        if(isset($_GET['error_reg'])) {

                            ?>
                        <div class="message_creamant">
                            <strong class="error_reg">  <?php  echo $_GET['error_reg'];  ?> </strong>
                        
                        </div>
                        <br>

                      <?php } ?>

                      <?php 
                        if(isset($_GET['suscces_reg'])) {

                            ?>
                        <div class="usses_creamant">
                            <strong class="suscces_reg">  <?php  echo $_GET['suscces_reg'];  ?> </strong>
                        
                        </div>
                        <br>

                      <?php } ?>

                      <input type="hidden" name="pass_token" value="<?php if(isset($_GET['reset_token']))  { echo $_GET['reset_token'];  } ?>">

                <div class="mb-4">
                        <label for="text" class="form-label">Ingrese su Correo Electronico</label>
                        <div class="usr_maillen">
                            <input type="email" class="form-control" name="email_torenew" value="<?php if(isset($_GET['Email_mantenedor']))  { echo $_GET['Email_mantenedor'];  } ?>" placeholder="Ingrese su Correo Electronico">
                        </div>
                        
                    </div>


                    <div class="mb-4">
                        <label for="text" class="form-label">Contraseña Nueva</label>
                        <div class="usr_empassdiv">
                            <input type="password" class="form-control" name="pass_renew">
                        </div>
                        
                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label">Vuelva a Escribir la Contraseña</label>
                        <div class="usr_empassdiv">
                            <input type="password" class="form-control" name="again_renew">
                        </div>
                        
                    </div>

<br>
<br>
                    <div class="row align-items-stretch" >
                    
                   <div class="d-grid">
                   <input type="submit" class="btn btn-primary" name="send_renewpassw" value="Confirmar">
                
                   </div>
                    </div>
                

                </form>
                
            </div>
        </div>
    </div>
 
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>