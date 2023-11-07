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
    <a href="view_Client.php" class="user_home">Clientes</a>

    <input type="checkbox" id="check_general">
    <label for="check_general" class='menugen_icons'>
    <i class='bx bx-menu' id="general_icon"></i>
    <i class='bx bx-x' id="general_close"></i>
    </label>
    <a href="php/log_out.php" class='bx bx-exit' id="general_session"></a>
   

    <nav class="navbar_general">
    <a href="view_Manten.php" style="--i:0;">Mantenedor</a>
    <a href="menu.php" style="--i:1;">Mantencion</a>
    <a href="chang_Mant.php" style="--i:2;">Estado de Mantencion</a>    
    <a href="view_Maqui.php" style="--i:3;">Maquinas</a>
    <a class="cerr_sess" href="php/log_out.php" style="--i:4;">Cerrar Sesion</a>
    

    </nav>

</header>


    <div class="container  mt-5 mb-5 ">
        <div class="row align-items-stretch p-4">

          <table class="client_table ">

            
            <thead>
              <tr>
                
                <th class="tabcli_head">Rut Empresa</th>
                <th class="tabcli_head">Nombre Empresa</th>
                <th class="tabcli_head">Fecha del Trabajo</th>
                <th class="tabcli_head"> </th>
                <th class="tabcli_head"> </th>
                <th class="tabcli_head"> </th>

            </tr>
            </thead>

            
            <tbody id="serchresut">

            <?php 
            $querytabl_Client = "SELECT * FROM cliente_mantened WHERE rut_LogUser_Clint= '$rut_load_log'";
            $querytabl_Client_run = mysqli_query($conexion, $querytabl_Client);

            if(mysqli_num_rows($querytabl_Client_run) > 0)
            {
              foreach($querytabl_Client_run as $Client_mantened){

                 ?>

                <tr class="tabcli_fila">
                  <td  style="display: none;" class="tabcli_body"> <?= $Client_mantened['ID_Cliente'] ?>  </td>
                <td class="tabcli_body "  data-cell="Rut Empresa"> <?= $Client_mantened['Rut_empresa'] ?>  </td>
                <td class="tabcli_body "  data-cell="Nombre Empresa"> <?= $Client_mantened['Nombre_empresa'] ?>  </td>
                <td class="tabcli_body "  data-cell="Fecha del Trabajo"> <?= $Client_mantened['Fecha_del_trabajo'] ?>  </td>
                
                <td class="tabcli_body"><button type="button" value="<?= $Client_mantened['ID_Cliente']; ?>" class="ViewClient_btnmodal btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#Viewdata_clien">Datos</button></td>
                <td class="tabcli_body"><button type="button" value="<?= $Client_mantened['ID_Cliente']; ?>" class="EditClient_btnmodal btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#Modal_cliedi">Editar</button></td>
                <td class="tabcli_body"><button type="button" value="<?= $Client_mantened['ID_Cliente']; ?>" class="DeletClient_btnmodal btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#Elim_cli">Eliminar</button></td>

                </tr>
                <?php
              }

            }
            ?>
            
            
            
            </tbody>

         <caption class="tabcli_capti">Listado de los Clientes</caption>   
        </table>

        </div>
        
        <div class="d-flex justify-content-center rounded shadow">
            <div class="row cretcli_cont mb-4">
          
                <div class="row p-3 bg-white rounded shadow align-items-stretch justify-content-evenly">
                    <div class="col-auto p-1">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal_cli">Crear Nuevo Cliente</button>
                    </div>
                   
                    <div class="col-auto p-1">
                        <input type="text"  class="form-control" id="Client_serch" placeholder="Buscar Cliente">
                    </div>
                        
                </div>
                       
        </div>
        </div>
        
<div class="modal fade" id="Modal_cli" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >

  <form id="crearClientMod">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content mod_clicre">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Ingrese los Datos del Cliente</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body" >

       <div id="errorMessage" class="alert alert-warning d-none"></div>


       <input type="hidden" name="torutuserLoad" value="<?php echo $rut_load_log ?>">

                    <div class="mb-4">
                        <label for="text" class="form-label">Rut de Empresa</label>
                        <div class="col-5">
                          <input type="text" class="form-control" name="rutempr_Clien" placeholder="00000000-0">
                          <span></span> 
                        </div>
                        
                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label">Nombre de la Empresa</label>
                        <div class="col-7">
                          <input type="text" class="form-control" name="nombrempr_Clien" placeholder="La Polar">
                          <span></span> 
                        </div>
                        
                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label">Nombre de Contacto</label>
                        <div class="col-7">
                         <input type="text" class="form-control" name="nombrcont_Clien" placeholder="Juan Ejemplo"> 
                        </div>
                        
                    </div>

                    <div class="mb-4">
                          <label for="text" class="form-label">Horas de Trabajo en la Empresa</label>
                        <div class="col-4">
                          <input type="time" class="form-control" name="hrsempr_Clien">
                        </div>
                        
                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label">Fecha del Trabajo</label>
                        <div class="col-5">
                         <input type="date" class="form-control" name="dateempr_Clien">
                        <span></span>  
                        </div>
                        
                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label p-1">¿Desea ingresar la Boleta?</label>
                        <div class="p-2"><input type="radio" name="rad_cli" onclick="hideshowBol_Cli(2)" value="show_cli" > Si</div>
                        <div class="p-2"><input type="radio" name="rad_cli" onclick="hideshowBol_Cli(1)" value="hide_cli" checked> No</div>
                        
                       
                            <div class="row" id="bolet_cli" style="display: none;">
                               <div class="mb-4 align-items-stretch">
                                <label for="text" class="form-label">Codigo de la Boleta</label>
                                <div class="col-6">
                                  <input type="text" class="form-control" name="id_bol" placeholder="00000000">
                                </div>
                                
                            </div>

<!-- 

                           <div class="mb-4 align-items-stretch">
                            <label for="text" class="form-label">Ingrese la Boleta</label>
                                <input type="file" class="form-control" name="data_bol">
                           </div>


 -->
                           
                            
                            
                            </div>
                            
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




<div class="modal fade" id="Modal_cliedi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >

<form id="updatClientMod" >

  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content mod_cliedi">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar los Datos del Cliente</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        
      <div id="errorMessageUpdat" class="alert alert-warning d-none"></div>

      <input type="hidden" name="client_id" id="client_id">
     
                    <div class="mb-4">
                        <label for="text" class="form-label">Rut de Empresa</label>
                        <div class="col-5">
                        <input type="text" class="form-control" name="rutempr_Clienedi" id="rutempr_Clienedi">
                        <span></span> 
                        </div>
                        
                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label">Nombre de la Empresa</label>
                        <div class="col-7">
                        <input type="text" class="form-control" name="nombrempr_Clienedi" id="nombrempr_Clienedi">
                        <span></span>  
                        </div>
                        
                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label">Nombre de Contacto</label>
                        <div class="col-7">
                         <input type="text" class="form-control" name="nombrcont_Clienedi" id="nombrcont_Clienedi"> 
                        </div>
                        
                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label">Horas de Trabajo en la Empresa</label>
                        <div class="col-4">
                          <input type="time" class="form-control" name="hrsempr_Clienedi" id="hrsempr_Clienedi">
                        </div>
                        
                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label">Fecha del Trabajo</label>
                        <div class="col-5">
                        <input type="date" class="form-control" name="dateempr_Clienedi" id="dateempr_Clienedi">
                        <span></span> 
                        </div>
                        
                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label p-1">¿Desea ingresar la Boleta?</label>
                        <div class="p-2"><input type="radio" name="rad_cliedi" onclick="hideshowBol_Cliedi(2)" value="show_cliedi" > Si</div>
                        <div class="p-2"><input type="radio" name="rad_cliedi" onclick="hideshowBol_Cliedi(1)" value="hide_cliedi" checked> No</div>
                        
                        <br>
                       
                            <div class="row" id="edibolet_cli" style="display: none;">
                               <div class="mb-4 align-items-stretch">
                                <label for="text" class="form-label">Codigo de la Boleta</label>
                                <div class="col-6">
                                  <input type="text" class="form-control" name="id_boledi" id="id_boledi">
                                </div>
                                
                            </div>

                            <!-- 
                            <div class="mb-4 align-items-stretch">
                            <label for="text" class="form-label">Ingrese la Boleta</label>
                            <input type="file" class="form-control" name="data_boledi">
                            </div>
                            -->


                            </div>
                            
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



<div class="modal fade" id="Elim_cli" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

<form id="deletClientMod">

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Cliente</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <input type="hidden" name="client_iddel" id="client_iddel">

      <div id="errorMessageDelet" class="alert alert-warning d-none"></div>


        <h5>¿Esta Seguro que desea eliminar al Cliente?</h5>


      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-danger">Eliminar</button>
      </div>
    </div>
  </div>

  </form>

</div>


<div class="modal fade" id="Viewdata_clien" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Datos del Cliente</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
  
                    <div class="mb-4">
                        <label for="text" class="form-label"><strong>Rut de Empresa: </strong></label>
                        <label id="rutempr_Clienview" for="text" class="form-label"></label>

                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label"><strong>Nombre de la Empresa: </strong></label>
                        <label id="nombrempr_Clienview" for="text" class="form-label"></label>
                        
                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label"><strong>Nombre de Contacto: </strong></label>
                        <label id="nombrcont_Clienview" for="text" class="form-label"></label>

                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label"><strong>Horas de Trabajo en la Empresa: </strong></label>
                        <label id="hrsempr_Clienview" for="text" class="form-label"></label>
                      
                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label"><strong>Fecha del Trabajo: </strong></label>
                        <label id="dateempr_Clienview" for="text" class="form-label"></label>
                      
                    </div>          
                    
                    <div class="mb-4">
                        <label for="text" class="form-label"><strong>Codigo de la Boleta: </strong></label>
                        <label id="id_bolview" for="text" class="form-label"></label>                       
                      
                    </div>     

                    <div class="mb-4">
                        <label for="text" class="form-label"><strong>Datos de la Boleta: </strong></label>
                        <p  class="form-control"></p>
                      
                    </div>     


      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Salir</button>
        
      </div>
    </div>
  </div>
</div>

      



    </div>
        
    <script src="js/CliBol_val.js"></script>
    <script src="js/valid_AdClien.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>



  <script>

    $(document).ready(function(){

      $("#Client_serch").keyup(function(){

        var input = $(this).val();

        if(input != ""){
          $.ajax({

            url:"php/Clien_serchTabl.php",
            method:"POST",
            data:{input:input},

            success:function(data){
              $("#serchresut").html(data);

            }

          });

        }else{
          
          $.ajax({

            url:"php/Clien_serchTabl.php",
            method:"POST",
            data:{input:input},

            success:function(data){
              $("#serchresut").html(data);

            }

            });
        }

      });

    });
  </script>

        <script>

        $(document).on('submit', '#crearClientMod', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("crear_ClientMod", true);

            $.ajax({
              type: "POST",
              url: "php/Client_CRUD_inst.php",
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
                  $('#Modal_cli').modal('hide');
                  $('#crearClientMod')[0].reset();

                  alertify.set('notifier','position', 'top-center');
                  alertify.success(res.message);

                  $('.client_table').load(location.href + " .client_table");

                }
                
              }

            });


        });

          $(document).on('click', '.EditClient_btnmodal', function () {

            var client_id = $(this).val();

            $.ajax({
              type: "GET",
              url: "php/Client_CRUD_inst.php?client_id=" + client_id,
              success: function (response) {

                var res =jQuery.parseJSON(response);
                if(res.status == 422){

                  alert(res.message);

                }else if(res.status == 200){

                  $('#client_id').val(res.data.ID_Cliente);
                  $('#rutempr_Clienedi').val(res.data.Rut_empresa);
                  $('#nombrempr_Clienedi').val(res.data.Nombre_empresa);
                  $('#nombrcont_Clienedi').val(res.data.Nombre_contacto);
                  $('#hrsempr_Clienedi').val(res.data.Hora_trabaj_empresa);
                  $('#dateempr_Clienedi').val(res.data.Fecha_del_trabajo);
                  $('#id_boledi').val(res.data.Codigo_boleta);

                //  $('#').val(res.data.Datos_boleta);

                  $('#Modal_cliedi').modal('show');

                }

              }

              });

          });



          $(document).on('submit', '#updatClientMod', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("updat_ClientMod", true);

            $.ajax({
              type: "POST",
              url: "php/Client_CRUD_inst.php",
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
                  $('#Modal_cliedi').modal('hide');
                  $('#updatClientMod')[0].reset();

                  alertify.set('notifier','position', 'top-center');
                  alertify.success(res.message);

                  $('.client_table').load(location.href + " .client_table");

                }
                
              }

            });


          });


          $(document).on('click', '.ViewClient_btnmodal', function () {

            var client_id = $(this).val();

              $.ajax({
              type: "GET",
              url: "php/Client_CRUD_inst.php?client_id=" + client_id,
              success: function (response) {

              var res =jQuery.parseJSON(response);
              if(res.status == 422){

                alert(res.message);

              }else if(res.status == 200){

                $('#rutempr_Clienview').text(res.data.Rut_empresa);
                $('#nombrempr_Clienview').text(res.data.Nombre_empresa);
                $('#nombrcont_Clienview').text(res.data.Nombre_contacto);
                $('#hrsempr_Clienview').text(res.data.Hora_trabaj_empresa);
                $('#dateempr_Clienview').text(res.data.Fecha_del_trabajo);
                $('#id_bolview').text(res.data.Codigo_boleta);

            //  $('#').val(res.data.Datos_boleta);

                $('#Viewdata_clien').modal('show');

             }

           }

            });

          });



          $(document).on('click', '.DeletClient_btnmodal', function () {

            var client_id = $(this).val();

              $.ajax({
               type: "GET",
               url: "php/Client_CRUD_inst.php?client_id=" + client_id,
               success: function (response) {

                var res =jQuery.parseJSON(response);
                if(res.status == 422){

                alert(res.message);

              }else if(res.status == 200){

                 $('#client_iddel').val(res.data.ID_Cliente);

                 $('#Elim_cli').modal('show');

    }

  }

  });

});

     
          $(document).on('submit', '#deletClientMod', function (e) {
            e.preventDefault();


            var formData = new FormData(this);
            formData.append("delet_ClientMod", true);

            $.ajax({
              type: "POST",
              url: "php/Client_CRUD_inst.php",
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
                  $('#Elim_cli').modal('hide');

                  alertify.set('notifier','position', 'top-center');
                  alertify.success(res.message);

                  $('.client_table').load(location.href + " .client_table");

                }
                
              }

            });

            

          });

        </script>

      </body>
</html>