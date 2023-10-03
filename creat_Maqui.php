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

                <h2 class="fw-bold text-lg-center py-1">Ingrese los Datos de la Maquina</h2>
                <br>

                <form action="#">
                    <div class="mb-4">
                        <label for="text" class="form-label">Numero de Serie</label>
                        <input type="text" class="form-control" name="numser_Maqui">
                        <span></span> 
                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label">Nombre de la Maquina</label>
                        <input type="text" class="form-control" name="nombr_Maqui">
                        <span></span> 
                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label">Rut de la Empresa que pertenece la Maquina</label>
                        <input type="text" class="form-control" name="rutEmpr_Maqui">
                        <span></span>
                    </div>


                    <div class="mb-4">
                        <label for="text" class="form-label p-1">¿Tiene Repuestos la Maquina?</label>
                        <div class="p-2"><input type="radio" name="rad_maqu" onclick="hideshowRep_Maqu(2)" value="show_maqu" > Si</div>
                        <div class="p-2"><input type="radio" name="rad_maqu" onclick="hideshowRep_Maqu(1)" value="hide_maqu" checked> No</div>
                        
                        <br>
                       
                            <div class="row" id="repue_maqui" style="display: none;">

                               <div class="mb-4 align-items-stretch">
                                <label for="text" class="form-label">Numero de Serie del Repuesto</label>
                                <input type="text" class="form-control" name="seri_repu">
                            </div>

                            <div class="mb-4 align-items-stretch">
                            <label for="text" class="form-label">Nombre del Repuesto</label>
                                <input type="text" class="form-control" name="nombr_repu">
                            </div> 

                            <div class="mb-4 align-items-stretch">
                                <label for="text" class="form-label">Cantidad de Repuestos</label>
                                <input type="text" class="form-control" name="cant_repu">
                            </div>

                            </div>
                            
                        
                     
                    </div>


                    <div class="row ">
                    <div class="col p-2">
                   <button class="btn btn-light btn-lg"><a class="btn_backlog" href="selct_Maqui.php">Cancelar</a></button>
                   </div>

                   <div class="col p-2">
                    <button type="submit" class="btn btn-primary btn-lg">Guardar</button>
                   </div>
                    </div>

                </form>
                
            </div>
        </div>
    </div>


    <script src="js/MaquRep_val.js"></script>
    <script src="js/MaquRep_val.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>