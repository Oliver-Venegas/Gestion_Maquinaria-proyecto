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
        <div class="row align-items-stretch p-2 uppermant_table">


<table class="Manten_table rounded">



<?php 
            $querytabl_Mantenupper = "SELECT * FROM mantencion_maquin WHERE rut_LogUser_cone= '$rut_load_log'";
            $querytabl_Mantenupper_run = mysqli_query($conexion, $querytabl_Mantenupper);

            if(mysqli_num_rows($querytabl_Mantenupper_run) > 0)
            {
              foreach($querytabl_Mantenupper_run as $Informfallas_mantened){

                 ?>
                 

<thead>



            <tr>
                
                <th class="tabmante_main" data-bs-toggle="collapse" data-bs-target=".colap_test<?= $Informfallas_mantened['ID_con_mantencion'] ?>"><?= $Informfallas_mantened['Nomb_empre_cone'] ?> </th>
                <th class="tabmante_main" data-bs-toggle="collapse" data-bs-target=".colap_test<?= $Informfallas_mantened['ID_con_mantencion'] ?>"><?= $Informfallas_mantened['Nomb_maquin_cone'] ?></th>
                <th class="tabmante_main" data-bs-toggle="collapse" data-bs-target=".colap_test<?= $Informfallas_mantened['ID_con_mantencion'] ?>"><?= $Informfallas_mantened['Fecha_trab_cone'] ?></th>
                <th class="tabmante_main" data-bs-toggle="collapse" data-bs-target=".colap_test"> </th>
                <th class="tabmante_main "> <button type="button" class="btm Creainform_btnmodal bx bx-plus plus_manten shadow" value="<?= $Informfallas_mantened['ID_con_mantencion'] ?>" data-bs-toggle="modal" data-bs-target="#Crea_manten"></button> </th>
                <th class="tabmante_main"><button type="button" class="btm Deletinform_btnmodal bx bx-x close_manten shadow" value="<?= $Informfallas_mantened['ID_con_mantencion'] ?>" data-bs-toggle="modal" data-bs-target="#Elimall_manten">   </button></th>

                <th class="tabmante_main_phone">
                <div class="row plusex_mant">
                    <div class="col-auto" data-bs-toggle="collapse" data-bs-target=".colap_test<?= $Informfallas_mantened['ID_con_mantencion'] ?>"><?= $Informfallas_mantened['Nomb_empre_cone'] ?></div>
                    <div class="col-auto">
                      
                    <button type="button" class="btm Creainform_btnmodal bx bx-plus plus_manten" value="<?= $Informfallas_mantened['ID_con_mantencion'] ?>" data-bs-toggle="modal" data-bs-target="#Crea_manten">   </button>
                    <button type="button" class="btm Deletinform_btnmodal bx bx-x close_manten" value="<?= $Informfallas_mantened['ID_con_mantencion'] ?>" data-bs-toggle="modal" data-bs-target="#Elimall_manten">   </button>
                    
                    </div>
                </div>
                    
                </th>        
                
            </tr> 

 </thead>
               
                

        <tbody class="collapse colap_test<?= $Informfallas_mantened['ID_con_mantencion'] ?>" >

            <tr>
                <td class="tabmante_head">Hora</td>
                <td class="tabmante_head">Observacion</td>
                <td class="tabmante_head">Estado</td>
                <td class="tabmante_head"> </td>
                <td class="tabmante_head"> </td>
                <td class="tabmante_head"> </td>

            </tr>

            <?= $prueba = $Informfallas_mantened['ID_con_mantencion'] ?>

            <?php 
            $querytabl_Manten = "SELECT * FROM inform_fallas WHERE rut_LogUser_Manten= '$rut_load_log' AND ID_InformFallas_cone= '$prueba'";
            $querytabl_Manten_run = mysqli_query($conexion, $querytabl_Manten);

            if(mysqli_num_rows($querytabl_Manten_run) > 0)
            {
              foreach($querytabl_Manten_run as $Informsecc_mantened){

                 ?>

            <tr class="tabmante_fila">
                <td class="tabmante_body" data-cell="Hora">
                  <div class="edit"> <?= $Informsecc_mantened['HorasdelTrabajo'] ?> </div>
                    <input type="time" class="form-control txt_edit" value="<?= $Informsecc_mantened['HorasdelTrabajo'] ?>" id="HorasdelTrabajo_<?= $Informsecc_mantened['ID_infor_fallas'] ?>"> 
                   </td>
                <td class="tabmante_body" data-cell="Observacion"> <?= $Informsecc_mantened['Titul_observ'] ?> </td>
                <td class="tabmante_body" data-cell="Estado">
                  
                  <div class="edit"> <?= $Informsecc_mantened['Estadomanten'] ?></div>

                    <select class="form-select txt_edit" value="<?= $Informsecc_mantened['Estadomanten'] ?>"  aria-label="Default select example" id="Estadomanten_<?= $Informsecc_mantened['ID_infor_fallas'] ?>">
                <?php

                $busc_estmanten = "SELECT * FROM estad_manten";
                $busc_estmanten_run = mysqli_query($conexion, $busc_estmanten) or die (mysqli_error($conexion));

                foreach($busc_estmanten_run as $list_estad):  ?>
                                          
                  <option value="<?php echo $list_estad['Nombre_estado'] ?>"> <?php echo $list_estad['Nombre_estado'] ?> </option>

                <?php endforeach ?>

                    </select>

                </td>
                <td class="tabmante_body"><button type="button" value="<?= $Informsecc_mantened['ID_infor_fallas'] ?>" class="ViewManten_btnmodal btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#Viewdata_manten">Datos</button></td>
                <td class="tabmante_body"><button type="button" value="<?= $Informsecc_mantened['ID_infor_fallas'] ?>" class="EditManten_btnmodal btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#Edit_manten">Editar</button></td>
                <td class="tabmante_body"><button type="button" value="<?= $Informsecc_mantened['ID_infor_fallas'] ?>" class="DeletManten_btnmodal btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#Elim_manten">Eliminar</button></td>

            </tr>

            
            
            <?php
              }

            }
            ?>
            
            </tbody>
    

          <tr>
              <td class="tabmante_invis"></td>
              <td class="tabmante_invis"></td>
              <td class="tabmante_invis"></td> 
              <td class="tabmante_invis"></td> 
              <td class="tabmante_invis"></td>
              <td class="tabmante_invis"></td>
          </tr>
            


            <?php
              }

            }
            ?>

        </table>

        </div>


<div class="modal fade" id="Elim_manten" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

<form id="deletMantenMod">

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Informe de Fallas</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <input type="hidden" name="manten_iddel" id="manten_iddel">

      <div id="errorMessageDelet" class="alert alert-warning d-none"></div>

        <h5>¿Esta Seguro que desea eliminar esta Seccion del Informe de Fallas?</h3>


      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-danger">Eliminar</button>
      </div>
    </div>
  </div>

  </form>

</div>


<div class="modal fade" id="Elimall_manten" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

<form id="deletinfromfallasMod">

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Informe de Fallas</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <div id="errorMessageDelet" class="alert alert-warning d-none"></div>

        <h5>¿Esta Seguro que desea eliminar el Informe de Fallas?</h5>

        <input type="hidden" name="informfall_iddel" id="informfall_iddel">

        <input type="hidden" name="informfall_clientdel" id="informfall_clientdel">

      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-danger">Eliminar</button>
      </div>
    </div>
  </div>

  </form>

</div>




<div class="modal fade" id="Crea_manten" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

<form id="crearMantenMod">

  <div class="modal-dialog">
    <div class="modal-content mod_mantencre">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Crear Informe de Fallas</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      <div id="errorMessage" class="alert alert-warning d-none"></div>

      <input type="hidden" name="informfall_id" id="informfall_id">


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
                        <label for="text" class="form-label">Titulo de la Observacion <h7 style="color: gray; font-family: Arial;  font-size: 12px; margin-left: 5px;">  /*Campo Exigente*/</h7></label>
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

<form id="updatMantenMod">

  <div class="modal-dialog">
    <div class="modal-content mod_mantenedi">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Informe de Fallas</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <div id="errorMessageUpdat" class="alert alert-warning d-none"></div>

      <input type="hidden" name="mantenfall_id" id="mantenfall_id">

        
      
                    <div class="mb-4">
                        <label for="text" class="form-label">Orden</label>
                        <div class="col-4">
                          <input type="text" class="form-control" name="order_Mantenedi" id="order_Mantenedi">
                        </div>
                        
                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label">Horas del Trabajo</label>
                        <div class="col-4">
                          <input type="time" class="form-control" name="hors_Mantenedi" id="hors_Mantenedi">  
                        </div>
                           
                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label">Aviso</label>
                        <div class="col-4">
                          <input type="text" class="form-control" name="avis_Mantenedi" id="avis_Mantenedi">
                        </div>
                        
                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label">Titulo de la Observacion <h7 style="color: gray; font-family: Arial;  font-size: 12px; margin-left: 5px;">  /*Campo Exigente*/</h7></label>
                        <div class="col-8">
                          <input type="text" class="form-control" name="obtitul_Mantenedi" id="obtitul_Mantenedi">
                        <span></span> 
                        </div>
                        
                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label">Observacion</label>
                       <textarea class="form-control " name="obser_Mantenedi" id="obser_Mantenedi"></textarea>
                        <span></span> 
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





<div class="modal fade" id="Viewdata_manten" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Informe de Fallas</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

                    <div class="mb-4">
                        <label for="text" class="form-label"><strong>Orden: </strong></label>
                        <label id="order_Mantenview" for="text" class="form-label"></label>

                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label"><strong>Horas del Trabajo: </strong></label>
                        <label id="hors_Mantenview" for="text" class="form-label"></label>
                        
                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label"><strong>Aviso: </strong></label>
                        <label id="avis_Mantenview" for="text" class="form-label"></label>
                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label"><strong>Titulo de la Observacion: </strong></label>
                        <label id="obtitul_Mantenview" for="text" class="form-label"></label>
                      
                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label"><strong>Observacion: </strong></label>
                        <label id="obser_Mantenview" for="text" class="form-label"></label>
                      
                    </div>                


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

$(document).on('click', '.edit', function () {


  $('.txt_edit').hide();
  $(this).next('.txt_edit').show().focus();
  $(this).hide();
  


$(".txt_edit").focusout(function(){

  var id = this.id;
  var split_id = id.split("_");
  var field_name = split_id[0];
  var edit_id = split_id[1];
  var value = $(this).val();

$(this).hide();

$(this).prev('.edit').show();
$(this).prev('.edit').text(value);


  $.ajax({
    url: "php/Manten_CRUD_inst.php",
    type: "POST",
    data: {field:field_name, value:value, id:edit_id },
    succes:function(response){
      if(response == 1){
        console.log('saved');

      }else{
        console.log("not saved");

      }

    }, cache: false

  });

});


});



    </script>


    <script>

$(document).on('click', '.Creainform_btnmodal', function () {

var informfall_id = $(this).val();

$.ajax({
  type: "GET",
  url: "php/Manten_CRUD_inst.php?informfall_id=" + informfall_id,
  success: function (response) {

    var res =jQuery.parseJSON(response);
    if(res.status == 422){

      alert(res.message);

    }else if(res.status == 200){

      $('#informfall_id').val(res.data.ID_con_mantencion);

      $('#Crea_manten').modal('show');

    }

  }, cache: false

  });

});

$(document).on('click', '.Deletinform_btnmodal', function () {

var informfall_id = $(this).val();

$.ajax({
  type: "GET",
  url: "php/Manten_CRUD_inst.php?informfall_id=" + informfall_id,
  success: function (response) {

    var res =jQuery.parseJSON(response);
    if(res.status == 422){

      alert(res.message);

    }else if(res.status == 200){

      $('#informfall_iddel').val(res.data.ID_con_mantencion);
      $('#informfall_clientdel').val(res.data.id_LogClien_cone);

      

      $('#Elimall_manten').modal('show');

    }

  }, cache: false

  });

});


$(document).on('submit', '#deletinfromfallasMod', function (e) {
    e.preventDefault();

    var formData = new FormData(this);
    formData.append("delet_infromfallasMod", true);

    $.ajax({
      type: "POST",
      url: "php/Manten_CRUD_inst.php",
      data: formData,
      processData: false,
      contentType: false,
      success: function (response) {

        var res = jQuery.parseJSON(response);
        if (res.status == 422) {

          $('#errorMessageDelet').removeClass('d-none');
          $('#errorMessageDelet').text(res.message);
          
        }else if(res.status == 200) {

          $('#errorMessageDelet').addClass('d-none');
          $('#Elimall_manten').modal('hide');

          alertify.set('notifier','position', 'top-center');
          alertify.success(res.message);

          $('.Manten_table').load(location.href + " .Manten_table");

        }
        
      }

    });

    

  });




$(document).on('submit', '#crearMantenMod', function (e) {
    e.preventDefault();

    var formData = new FormData(this);
    formData.append("crear_MantenMod", true);

    $.ajax({
      type: "POST",
      url: "php/Manten_CRUD_inst.php",
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
          $('#Crea_manten').modal('hide');
          $('#crearMantenMod')[0].reset();

          alertify.set('notifier','position', 'top-center');
          alertify.success(res.message);
          

          $('.Manten_table').load(location.href + " .Manten_table");

        }
        
      }

    });


});

  $(document).on('click', '.EditManten_btnmodal', function () {

    var mantenfall_id = $(this).val();

    $.ajax({
      type: "GET",
      url: "php/Manten_CRUD_inst.php?mantenfall_id=" + mantenfall_id,
      success: function (response) {

        var res =jQuery.parseJSON(response);
        if(res.status == 422){

          alert(res.message);

        }else if(res.status == 200){

          $('#mantenfall_id').val(res.data.ID_infor_fallas);
          $('#order_Mantenedi').val(res.data.Orden);
          $('#hors_Mantenedi').val(res.data.HorasdelTrabajo);
          $('#avis_Mantenedi').val(res.data.Aviso);
          $('#obtitul_Mantenedi').val(res.data.Titul_observ);
          $('#obser_Mantenedi').val(res.data.Observacion_data);

          $('#Edit_manten').modal('show');

        }

      }, cache: false

      });

  });



  $(document).on('submit', '#updatMantenMod', function (e) {
    e.preventDefault();

    var formData = new FormData(this);
    formData.append("updat_MantenMod", true);

    $.ajax({
      type: "POST",
      url: "php/Manten_CRUD_inst.php",
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
          $('#Edit_manten').modal('hide');
          $('#updatMantenMod')[0].reset();

          alertify.set('notifier','position', 'top-center');
          alertify.success(res.message);

          $('.Manten_table').load(location.href + " .Manten_table");

        }
        
      }, cache: false

    });


  });


  $(document).on('click', '.ViewManten_btnmodal', function () {

    var mantenfall_id = $(this).val();

      $.ajax({
      type: "GET",
      url: "php/Manten_CRUD_inst.php?mantenfall_id=" + mantenfall_id,
      success: function (response) {

      var res =jQuery.parseJSON(response);
      if(res.status == 422){

        alert(res.message);

      }else if(res.status == 200){
        
          $('#order_Mantenview').text(res.data.Orden);
          $('#hors_Mantenview').text(res.data.HorasdelTrabajo);
          $('#avis_Mantenview').text(res.data.Aviso);
          $('#obtitul_Mantenview').text(res.data.Titul_observ);
          $('#obser_Mantenview').text(res.data.Observacion_data);

          $('#Viewdata_manten').modal('show');

     }

   }, cache: false

    });

  });



  $(document).on('click', '.DeletManten_btnmodal', function () {

    var mantenfall_id = $(this).val();

      $.ajax({
       type: "GET",
       url: "php/Manten_CRUD_inst.php?mantenfall_id=" + mantenfall_id,
       success: function (response) {

        var res =jQuery.parseJSON(response);
        if(res.status == 422){

        alert(res.message);

      }else if(res.status == 200){

         $('#manten_iddel').val(res.data.ID_infor_fallas);

         $('#Elim_manten').modal('show');

}

}

});

});


  $(document).on('submit', '#deletMantenMod', function (e) {
    e.preventDefault();

    var formData = new FormData(this);
    formData.append("delet_MantenMod", true);

    $.ajax({
      type: "POST",
      url: "php/Manten_CRUD_inst.php",
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
          $('#Elim_manten').modal('hide');

          alertify.set('notifier','position', 'top-center');
          alertify.success(res.message);

          $('.Manten_table').load(location.href + " .Manten_table");

        }
        
      }

    });

    

  });

</script>




      </body>
</html>