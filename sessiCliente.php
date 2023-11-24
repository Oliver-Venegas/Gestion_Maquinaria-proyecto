<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Gestion de Maquinaria</title>
    <!-- CONEXION CSS -->
    <link rel="stylesheet" href="estilos.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body class="backg_body">
    <div class="container w-75 bg-primary mt-5 mb-5 rounded shadow">
        <div class="row align-items-stretch">
            <div class="col backg_image_client d-none d-lg-block col-md-5 col-lg-5 col-xl-6 rounded"></div>

            <div class="col bg-white p-5 rounded-end">

            <div class="text-end">
                <a href="index.php" class='bx bx-arrow-back atras_index'></a>

                </div>

                <h2 class="fw-bold text-center py-4">Iniciar Sesion</h2>

                <form action="php/valid_CliManten.php" method="POST">

                <?php 
                        if(isset($_GET['error_reg'])) {

                            ?>
                        <div class="message_creamant">
                            <strong class="error_reg">  <?php  echo $_GET['error_reg'];  ?> </strong>
                        
                        </div>
                        <br>

                      <?php } ?>


                      
                      <div class="mb-4">
                        <label for="email" class="form-label">Ingrese su Rut como Cliente</label>
                        <div class="usr_empassdiv">
                           <input type="text" class="form-control" name="rut_cliente" id="rut_cliente" placeholder="00000000-0"> 
                        </div>
                        
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label">Ingrese el Numero de Serie de la Maquina</label>
                        <div class="usr_empassdiv">
                           <input type="text" class="form-control" name="serie_maquina" id="serie_maquina" placeholder="0000000000"> 
                        </div>
                        
                    </div>

<br>
                    <div class="d-grid ">
                   <input type="submit" name="submit" class="btn_ingreso btn btn-primary" value="Ingresar"></input>
                   </div>
                

                </form>
                <br>
            </div>
        </div>
    </div>
 
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>

