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

                <form action="recover_contr.php" method="POST">
                    <div class="mb-4">
                        <label for="text" class="form-label">Corrreo Electronico del Mantenedor</label>
                        <div class="usr_maillen">
                            <input type="text" class="form-control" name="email_renew" placeholder="Ingrese su Correo Electronico">
                        </div>
                        
                    </div>

<br>
                    <div class="row align-items-stretch" style="justify-content: space-between;">
                    <div class="col-auto p-2">
                   <a class="btn_backlog btn btn-light btn-lg" href="index.php">Cancelar</a>
                   </div>

                   <div class="col-auto p-2">
                    <a  class="btn btn-primary btn-lg" href="new_contr.php">Confirmar</a>
                   </div>
                    </div>
                

                </form>
                
            </div>
        </div>
    </div>
 
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>