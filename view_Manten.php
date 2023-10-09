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
            <a href="view_Manten.php" class="user_home">Mantenedor</a>

            <input type="checkbox" id="check_general">
            <label for="check_general" class='menugen_icons'>
            <i class='bx bx-menu' id="general_icon"></i>
            <i class='bx bx-x' id="general_close"></i>
            </label>
            <a href="index.html" class='bx bx-exit' id="general_session"></a>

            <nav class="navbar_general">
            <a href="menu.php" style="--i:0;">Home</a>
            <a href="chang_Mant.php" style="--i:1;">Estado de Mantencion</a>
            <a href="view_Maqui.php" style="--i:2;">Maquinas</a>    
            <a href="view_Client.php" style="--i:3;">Clientes</a>
            <a class="cerr_sess" href="index.html" style="--i:4;">Cerrar Sesion</a>
            

            </nav>

        </header>

        <div class="container mant_cont mt-5 mb-5">
            
        <div class="row align-items-stretch">

            <div class="col bg-white mt-5 p-5 rounded shadow">

                <h2 class="fw-bold text-center py-4">Mantenedor</h2>

                <br>
                <div class="col-auto p-1">
                    <label  for="text" class="form-label"><p><strong>RUT:  </strong></p></label>
                    <label for="text" class="form-label">1937244-2</label>
                   
                </div>

                <div class="col-auto p-1">
                    <label  for="text" class="form-label"><p><strong>Nombre y Apellido:  </strong></p></label>
                    <label for="text" class="form-label">Rodrigo Espejo</label>
                   
                </div>

                <div class="col-auto p-1">
                    <label  for="text" class="form-label"><p><strong>Tipo de Mantenedor:  </strong></p></label>
                    <label for="text" class="form-label">Mantenedor Electrico</label>
                   
                </div>

                <div class="col-auto p-1">
                    <label  for="text" class="form-label"><p><strong>Correo Electronico:  </strong></p></label>
                    <label for="text" class="form-label">rodrigoespejo@gmail.com</label>
                   
                </div>

<br>
                <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#Chang_mantenetipe">Cambiar Tipo de Mantenedor</button>

                   </div>


                   <div class="modal fade" id="Chang_mantenetipe" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Cambiar el Tipo de Mantenedor</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <form action="#">

                    <div class="mb-4">
                        <label for="text" class="form-label p-1">¿Dessea Cambiar a un Tipo de Mantenedor ya Existente o Crear un Nuevo Tipo de Mantenedor?</label>
                        <div class="p-2"><input type="radio" name="rad_tipe" onclick="hideshowTip_mant(2)" value="hide_tipe" checked> Crear Nuevo Tipo de Mantenedor</div>
                        <div class="p-2"><input type="radio" name="rad_tipe" onclick="hideshowTip_mant(1)" value="show_tipe" > Cambiar a Tipo de Mantenedor ya Existente</div>
                        
                        
                        <br>

                        <div id="tip_exmant"  >
                            <select class="form-select mb-4 align-items-stretch" aria-label="Default select example">
                             
                             <option value="1">Mantenedor Electrico</option>
                             <option value="2">Mantenedor Mecanico</option>
                        </select>

                        </div>
                        
                       
                            <div class="row" id="tipe_creamant" >
                               <div class="mb-4 align-items-stretch">
                                <label for="text" class="form-label">Nuevo Tipo de Mantenedor</label>
                                <input type="text" class="form-control" name="id_bol">
                            </div>
   
                            </div>
                            
                        
                     
                    </div>


                </form>

      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>


        </div>

        </div>


        <script src="js/Tip_ChMant.js"></script>
            

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>