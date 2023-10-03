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

                <h2 class="fw-bold text-center py-4">Registrate como Mantenedor</h2>

                <form action="#">
                    <div class="mb-4">
                        <label for="text" class="form-label">RUT</label>
                        <input type="text" class="form-control" name="rut_reg">
                        <span></span> 
                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label">Nombre y Apellido</label>
                        <input type="text" class="form-control" name="nombr_reg">
                        <span></span> 
                    </div>


                    <div class="mb-4">
                        <label for="text" class="form-label">Tipo de Mantenedor</label>
                        <select class="form-select" aria-label="Default select example">
                             
                             <option value="1">Mantenedor Electrico</option>
                             <option value="2">Mantenedor Mecanico</option>
                        </select>

                    </div>

                    <div class="mb-4">
                        <label for="email" class="form-label">Correo Electronico</label>
                        <input type="email" class="form-control" name="email_reg">
                        <span></span> 
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" name="password_reg">
                        <span></span> 
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label">Vuelva a Escribir la Contraseña</label>
                        <input type="password" class="form-control" name="passagain_reg">
                        <span></span> 
                    </div>

<br>
                    <div class="row align-items-stretch">
                    <div class="col p-2">
                        <a class="btn_backlog btn btn-light btn-lg" href="index.html"> Regresar</a>
                   </div>

                   <div class="col p-2">
                    <button type="submit" class="btn btn-primary btn-lg">Guardar</button>
                   </div>
                    </div>
                

                </form>
                
            </div>
        </div>
    </div>

    <script src="js/valid_newUser.js"></script>
 
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>