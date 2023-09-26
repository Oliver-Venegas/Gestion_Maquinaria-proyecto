<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Bodega Minera</title>
    <!-- CONEXION CSS -->
    <link rel="stylesheet" href="estilos.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

        <header class="nav_superior">
            <a href="#" class="user_home">Mantenedor</a>

            <input type="checkbox" id="check_general">
            <label for="check_general" class='menugen_icons'>
            <i class='bx bx-menu' id="general_icon"></i>
            <i class='bx bx-x' id="general_close"></i>
            </label>

            <nav class="navbar_general">
            <a href="">Home</a>
            <a href="">Maquinas</a>
            <a href="creat_Client.php">Clientes</a>
            <a href="index.html">Cerrar Sesion</a>

            </nav>

        </header>

        <div class="container w-80 bg-white mt-4 mb-5 ">
        <div class="row align-items-stretch">

            <div class="col p-5">

                <h2 class="fw-bold text-lg-start py-5">Ingrese los Datos del Cliente</h2>
                <br>

                <form action="#">
                    <div class="mb-4">
                        <label for="text" class="form-label">Rut Empresa</label>
                        <input type="text" class="form-control" name="rutempr_Clien">
                        <span></span> 
                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label">Nombre Empresa</label>
                        <input type="text" class="form-control" name="nombrempr_Clien">
                        <span></span> 
                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label">Nombre de Contacto</label>
                        <input type="text" class="form-control" name="nombrcont_Clien">
                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label">Horas de Traajo en la Empresa</label>
                        <input type="text" class="form-control" name="hrsempr_Clien">
                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label">Fecha del Trabajo</label>
                        <input type="text" class="form-control" name="dateempr_Clien">
                        <span></span> 
                    </div>
<br>

                    <div class="row align-items-stretch">
                    <div class="col p-2">
                   <button class="btn btn-light btn-lg"><a class="btn_backlog" href="menu.php">Cancelar</a></button>
                   </div>

                   <div class="col-2 p-2">
                    <button type="submit" class="btn btn-primary btn-lg">Guardar</button>
                   </div>
                    </div>

                </form>
                
            </div>
        </div>
    </div>

    <script src="js/valid_AdClien.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>