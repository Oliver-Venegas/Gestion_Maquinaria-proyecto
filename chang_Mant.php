<?php
  session_start();

  include('php/conect_BD.php');

  if(!isset($_SESSION['user_manten'])){
    header("Location: index.php");
    session_destroy();
    die();
    
  }


?>

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
    <a href="chang_Mant.php" class="user_home">Estado de Mantencion</a>

    <input type="checkbox" id="check_general">
    <label for="check_general" class='menugen_icons'>
    <i class='bx bx-menu' id="general_icon"></i>
    <i class='bx bx-x' id="general_close"></i>
    </label>
    <a href="php/log_out.php" class='bx bx-exit' id="general_session"></a>
   

    <nav class="navbar_general">
    <a href="view_Manten.php" style="--i:0;">Mantenedor</a>
    <a href="menu.php" style="--i:1;">Mantencion</a>
    <a href="view_Maqui.php" style="--i:2;">Maquinas</a>    
    <a href="view_Client.php" style="--i:3;">Clientes</a>
    <a class="cerr_sess" href="php/log_out.php" style="--i:4;">Cerrar Sesion</a>
    

    </nav>

</header>

        <div class="container mt-5 mb-5 conent_Mantchang">
        <div class="row align-items-stretch">

        <?php 
    if(isset($_SESSION['estd_no'])){
    ?>

      <div class="alert alert-danger alert-dismissible fade show mt-5" role="alert">
      <strong>Error</strong> <?php echo $_SESSION['estd_no']; ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    
      


    <?php

    unset($_SESSION['estd_no']);

    }

    ?>

<?php 
    if(isset($_SESSION['estd_succe'])){
    ?>

      <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
      <strong>Success</strong> <?php echo $_SESSION['estd_succe']; ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    
      


    <?php

    unset($_SESSION['estd_succe']);

    }

    ?>

            <div class="col p-5 bg-white mt-5 rounded shadow">

                <h2 class="fw-bold text-lg-center py-1">Crear Estado de Mantencion</h2>
                <br>

                <form action="php/manten_state.php" method="POST">

                    <div class="mb-4">
                        <label for="text" class="form-label p-1">¿Dessea Eliminar un Estado de Mantencion o Crear un Nuevo Estado de Mantencion?</label>
                        <div class="p-2"><input type="radio" name="rad_tipe" onclick="hideshowEst_mant(2)" value="hide_Estd"> Crear Nuevo Estado de Mantencion</div>
                        <div class="p-2"><input type="radio" name="rad_tipe" onclick="hideshowEst_mant(1)" value="show_Estd" > Eliminar Estado de Mantencion </div>
                        
                        
                        <br>

                        <div class="col-5" id="estd_exmant"  >


                        <select class="form-select mb-4 align-items-stretch" name="estd_mantencion" aria-label="Default select example">
              
              <?php

               $busc_estd = "SELECT * FROM estad_manten";
               $busc_estd_run = mysqli_query($conexion, $busc_estd) or die (mysqli_error($conexion));
               
               foreach($busc_estd_run as $list_estd):  ?>
                                          
                  <option value="<?php echo $list_estd['id_estd_mantenc'] ?>"><?php echo $list_estd['Nombre_estado'] ?></option>

                <?php endforeach ?>

              </select>


                        </div>
                        
                       
                            <div class="row" id="estd_creamant" >
                               <div class="col-5 mb-4 align-items-stretch">
                                <label for="text" class="form-label">Nuevo Estado de Mantencion</label>
                                <input type="text" class="form-control" name="crea_estdmanten">
                            </div>
   
                            </div>
                            
                        
                     
                    </div>


                    <div class="row align-items-stretch" style="justify-content: space-between;">
                    <div class="col-auto p-2">
                   <button class="btn btn-light btn-lg"><a class="btn_backlog" href="menu.php">Cancelar</a></button>
                   </div>

                   <div class="col-auto p-2">
                    <button type="submit" class="btn btn-primary btn-lg">Confirmar</button>
                   </div>
                    </div>

                </form>
                
            </div>
        </div>
    </div>

    <script src="js/estd_Mantenc.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>