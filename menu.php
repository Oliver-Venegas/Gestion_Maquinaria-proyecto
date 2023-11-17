<?php
  session_start();

  include('php/conect_BD.php');

  if(!isset($_SESSION['user_manten'])){
    header("Location: index.php");
    session_destroy();
    die();
    
  }

    $mostra_email_user = $_SESSION['user_manten'];

  $obtdatos_sql = "SELECT Rut  FROM usuario_mantenedor WHERE Email_mantenedor = '$mostra_email_user'";
  $result_tolog = $conexion->query($obtdatos_sql);

  while($data_oflog = $result_tolog->fetch_assoc()){

    $rut_load_log = $data_oflog['Rut'];


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
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
</head>
<body class="menu_bacgr">



        <header class="nav_superior">
            <a href="menu.php" class="user_home">Mantencion</a>

            <input type="checkbox" id="check_general">
            <label for="check_general" class='menugen_icons'>
            <i class='bx bx-menu' id="general_icon"></i>
            <i class='bx bx-x' id="general_close"></i>
            </label>
            <a href="php/log_out.php" class='bx bx-exit' id="general_session"></a>

            <nav class="navbar_general">
            <a href="view_Manten.php" style="--i:0;">Mantenedor</a>
            <a href="chang_Mant.php" style="--i:1;">Estado de Mantencion</a>
            <a href="view_Maqui.php" style="--i:2;">Maquinas</a>    
            <a href="view_Client.php" style="--i:3;">Clientes</a>
            <a class="cerr_sess" href="php/log_out.php" style="--i:4;">Cerrar Sesion</a>
            

            </nav>

        </header>


        <div class="container  mt-5 mb-5 ">
        <div class="row align-items-stretch p-2 ">


<table class="Manten_table rounded">

            <tr>
                <thead>
                 <th class="tabmante_main" data-bs-toggle="collapse" data-bs-target=".colap_test">Sanander</th>
                <th class="tabmante_main" data-bs-toggle="collapse" data-bs-target=".colap_test">Sensor de Metales</th>
                <th class="tabmante_main" data-bs-toggle="collapse" data-bs-target=".colap_test"">23/02/2022</th>
                <th class="tabmante_main"> </th>
                <th class="tabmante_main "><i class='bx bx-plus-circle plus_manten' data-bs-toggle="modal" data-bs-target="#Crea_manten"></i></th>
                <th class="tabmante_main"><i class='bx bx-x-circle close_manten' data-bs-toggle="modal" data-bs-target="#Elimall_manten"></i></th>

                <th class="tabmante_main_phone">
                <div class="row plusex_mant">
                    <div class="col-auto" data-bs-toggle="collapse" data-bs-target=".colap_test">Sanander</div>
                    <div class="col-auto">
                      
                        <i class='bx bx-plus-circle plus_manten' data-bs-toggle="modal" data-bs-target="#Crea_manten"></i>
                        <i class='bx bx-x-circle close_manten' data-bs-toggle="modal" data-bs-target="#Elimall_manten"></i>
                    </div>
                </div>
                    
                </th>                
                
            </tr> 

                </thead>
                

        <tbody class="collapse colap_test">

            <tr>
                <th class="tabmante_head">Hora</th>
                <th class="tabmante_head">Observacion</th>
                <th class="tabmante_head">Estado</th>
                <th class="tabmante_head"> </th>
                <th class="tabmante_head"> </th>
                <th class="tabmante_head"> </th>

            </tr>

            <tr class="tabmante_fila">
                <td class="tabmante_body" data-cell="Hora"><input type="time" class="form-control"></td>
                <td class="tabmante_body" data-cell="Observacion">Compresor D DE BIOGAS</td>
                <td class="tabmante_body" data-cell="Estado">
                <select class="form-select" aria-label="Default select example">
                             
                             <option value="1">Realizado</option>
                             <option value="2">Normalizado</option>
                             <option value="3">Pendiente</option>
                             <option value="4">En curso</option>
                        </select>
                </td>
                <td class="tabmante_body"><button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#Viewdata_manten">Datos</button></td>
                <td class="tabmante_body"><button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#Edit_manten">Editar</button></td>
                <td class="tabmante_body"><button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#Elim_manten">Eliminar</button></td>

            </tr>       
            
            </tbody>
    
        </table>

        </div>


<div class="modal fade" id="Elim_manten" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Informe de Fallas</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h5>¿Esta Seguro que desea eliminar esta Seccion del Informe de Fallas?</h3>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-danger">Eliminar</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="Elimall_manten" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Informe de Fallas</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h5>¿Esta Seguro que desea eliminar el Informe de Fallas?</h3>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-danger">Eliminar</button>
      </div>
    </div>
  </div>
</div>




<div class="modal fade" id="Crea_manten" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

<form action="#">

  <div class="modal-dialog">
    <div class="modal-content mod_mantencre">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Crear Informe de Fallas</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      <div id="errorMessage" class="alert alert-warning d-none"></div>


       <input type="hidden" name="torutuserLoad_manten" value="<?php echo $rut_load_log ?>">
      
                    <div class="mb-4">
                        <label for="text" class="form-label">Orden</label>
                        <div class="col-4">
                          <input type="text" class="form-control" name="order_Manten" placeholder="0000000">
                        </div>
                        

                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label">Aviso</label>
                        <div class="col-4">
                          <input type="text" class="form-control" name="avis_Manten" placeholder="0000000">
                        </div>
                        
                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label">Titulo de la Observacion</label>
                        <div class="col-8">
                        <input type="text" class="form-control" name="obtitul_Manten" placeholder="Falla del Lente">
                        <span></span> 
                        </div>
                        
                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label">Observacion</label>
                        <textarea class="form-control "  name="obser_Manten" placeholder="Ingrese el la Descripcion del roblema encontrado"></textarea>
                    </div>



                    

                

      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>

  </form>

</div>



<div class="modal fade" id="Edit_manten" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content mod_mantenedi">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Informe de Fallas</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      <form action="#">
                    <div class="mb-4">
                        <label for="text" class="form-label">Orden</label>
                        <div class="col-4">
                          <input type="text" class="form-control" name="order_Mantenedi">
                        </div>
                        
                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label">Horas del Trabajo</label>
                        <div class="col-4">
                          <input type="time" class="form-control" name="hors_Mantenedi">  
                        </div>
                           
                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label">Aviso</label>
                        <div class="col-4">
                          <input type="text" class="form-control" name="avis_Mantenedi">
                        </div>
                        
                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label">Titulo de la Observacion</label>
                        <div class="col-8">
                          <input type="text" class="form-control" name="obtitul_Mantenedi">
                        <span></span> 
                        </div>
                        
                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label">Observacion</label>
                       <textarea class="form-control " name="obser_Mantenedi"></textarea>
                        <span></span> 
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





<div class="modal fade" id="Viewdata_manten" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Informe de Fallas</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      <form action="#">
                    <div class="mb-4">
                        <label for="text" class="form-label"><strong>Orden: </strong></label>
                        <label for="text" class="form-label">1932783</label>

                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label"><strong>Horas del Trabajo: </strong></label>
                        <label for="text" class="form-label">02:00</label>
                        
                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label"><strong>Aviso: </strong></label>
                        <label for="text" class="form-label">1727362</label>
                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label"><strong>Titulo de la Observacion: </strong></label>
                        <label for="text" class="form-label">Compresor D DE BIOGAS</label>
                      
                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label"><strong>Observacion: </strong></label>
                        <label for="text" class="form-label">Falla Rastra del clarificador primario D, Motor A en local se revisa equipo en terreno y no se detexta problemas de ningun tipo,
                          se revisan paradas de emergencias con revision de continuidad de pulsadores y todo se encuentra en buenas condiciones.
                        </label>
                      
                    </div>                

                </form>

      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Salir</button>
        
      </div>
    </div>
  </div>
</div>




</div>

<script src="js/valid_AdManten.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>



    <script>

$(document).on('submit', '#crearMaquinMod', function (e) {
    e.preventDefault();

    var formData = new FormData(this);
    formData.append("crear_MaquinMod", true);

    $.ajax({
      type: "POST",
      url: "php/Maquin_CRUD_inst.php",
      data: formData,
      processData: false,
      contentType: false,
      success: function (response) {

        var res = jQuery.parseJSON(response);
        if (res.status == 422) {

          $('#errorMessage').removeClass('d-none');
          $('#errorMessage').text(res.message);
          
        }else if(res.status == 200) {

          $('#errorMessage').addClass('d-none');
          $('#Modal_maqui').modal('hide');
          $('#crearMaquinMod')[0].reset();

          alertify.set('notifier','position', 'top-center');
          alertify.success(res.message);

          $('.maquina_table').load(location.href + " .maquina_table");

        }
        
      }

    });


});

  $(document).on('click', '.EditMaqui_btnmodal', function () {

    var maqui_id = $(this).val();

    $.ajax({
      type: "GET",
      url: "php/Maquin_CRUD_inst.php?maqui_id=" + maqui_id,
      success: function (response) {

        var res =jQuery.parseJSON(response);
        if(res.status == 422){

          alert(res.message);

        }else if(res.status == 200){

          $('#maqui_id').val(res.data.Numer_Serie);
          $('#numser_Maquiedi').val(res.data.Numer_Serie);
          $('#nombr_Maquiedi').val(res.data.Nombr_Maquina);
          $('#rutEmpr_Maquiedi').val(res.data.Rut_Empresa);
          $('#seri_repuedi').val(res.data.Num_SerRepuest);
          $('#nombr_repuedi').val(res.data.Nombre_Repuest);
          $('#cant_repuedi').val(res.data.Cant_Repuest);

          $('#Edit_maqui').modal('show');

        }

      }, cache: false

      });

  });



  $(document).on('submit', '#updatMaquinMod', function (e) {
    e.preventDefault();

    var formData = new FormData(this);
    formData.append("updat_MaquinMod", true);

    $.ajax({
      type: "POST",
      url: "php/Maquin_CRUD_inst.php",
      data: formData,
      processData: false,
      contentType: false,
      success: function (response) {

        var res = jQuery.parseJSON(response);
        if (res.status == 422) {

          $('#errorMessageUpdat').removeClass('d-none');
          $('#errorMessageUpdat').text(res.message);
          
        }else if(res.status == 200) {

          $('#errorMessageUpdat').addClass('d-none');
          $('#Edit_maqui').modal('hide');
          $('#updatMaquinMod')[0].reset();

          alertify.set('notifier','position', 'top-center');
          alertify.success(res.message);

          $('.maquina_table').load(location.href + " .maquina_table");

        }
        
      }, cache: false

    });


  });


  $(document).on('click', '.Viewdata_manten', function () {

    var manten_id = $(this).val();

      $.ajax({
      type: "GET",
      url: "php/Manten_CRUD_inst.php?manten_id=" + manten_id,
      success: function (response) {

      var res =jQuery.parseJSON(response);
      if(res.status == 422){

        alert(res.message);

      }else if(res.status == 200){

          $('#numser_Maquinview').text(res.data.Numer_Serie);
          $('#nombrmaq_Maquinview').text(res.data.Nombr_Maquina);
          $('#rutempr_Maquinview').text(res.data.Rut_Empresa);
          $('#repseri_Maquinview').text(res.data.Num_SerRepuest);
          $('#nombrep_Maquinview').text(res.data.Nombre_Repuest);
          $('#cantrep_Maquinview').text(res.data.Cant_Repuest);

          $('#Viewdata_maqui').modal('show');

     }

   }, cache: false

    });

  });



  $(document).on('click', '.DeletMaqui_btnmodal', function () {

    var maqui_id = $(this).val();

      $.ajax({
       type: "GET",
       url: "php/Maquin_CRUD_inst.php?maqui_id=" + maqui_id,
       success: function (response) {

        var res =jQuery.parseJSON(response);
        if(res.status == 422){

        alert(res.message);

      }else if(res.status == 200){

         $('#maqui_iddel').val(res.data.Numer_Serie);

         $('#Elim_maqui').modal('show');

}

}

});

});


  $(document).on('submit', '#deletMaquintMod', function (e) {
    e.preventDefault();


    var formData = new FormData(this);
    formData.append("delet_MaquintMod", true);

    $.ajax({
      type: "POST",
      url: "php/Maquin_CRUD_inst.php",
      data: formData,
      processData: false,
      contentType: false,
      success: function (response) {

        var res = jQuery.parseJSON(response);
        if (res.status == 500) {

          $('#errorMessageDelet').removeClass('d-none');
          $('#errorMessageDelet').text(res.message);
          
        }else if(res.status == 200) {

          $('#errorMessageDelet').addClass('d-none');
          $('#Elim_maqui').modal('hide');

          alertify.set('notifier','position', 'top-center');
          alertify.success(res.message);

          $('.maquina_table').load(location.href + " .maquina_table");

        }
        
      }

    });

    

  });

</script>




      </body>
</html>