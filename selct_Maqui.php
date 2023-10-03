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
<body class="menu_bacgr">

<header class="nav_superior">
    <a href="#" class="user_home">Mantenedor</a>

    <input type="checkbox" id="check_general">
    <label for="check_general" class='menugen_icons'>
    <i class='bx bx-menu' id="general_icon"></i>
    <i class='bx bx-x' id="general_close"></i>
    </label>
    <a href="index.html" class='bx bx-exit' id="general_session"></a>
   

    <nav class="navbar_general">
    <a href="" style="--i:0;">Home</a>
    <a href="chang_Mant.php" style="--i:1;">Tipo de Mantenedor</a>
    <a href="selct_Maqui.php" style="--i:2;">Maquinas</a>    
    <a href="selct_Cli.php" style="--i:3;">Clientes</a>
    <a class="cerr_sess" href="index.html" style="--i:4;">Cerrar Sesion</a>
    

    </nav>

</header>

        <div class="container  mt-5 mb-5 conent_Maquicre ">
        <div class="row align-items-stretch">

            <div class="col p-5 bg-white mt-5 rounded shadow">

      

                    <div class="row">
                    <div class="col p-2">
                  <a class="btn_backlog btn btn-light btn-lg" href="view_Maqui.php">Mostrar Maquinas</a>
                   </div>

                   <div class="col p-2">
                   <a class="btn_backlog btn btn-light btn-lg" href="creat_Maqui.php">Crear Maquinas</a>
                    
                   </div>
                    </div>

                </form>
                
            </div>
        </div>
    </div>


    <script src="js/CliBol_val.js"></script>
    <script src="js/valid_AdClien.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>