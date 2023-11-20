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
    <a href="view_Maqui.php" class="user_home">Maquinas</a>

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
    <a href="view_Client.php" style="--i:3;">Clientes</a>
    <a class="cerr_sess" href="php/log_out.php" style="--i:4;">Cerrar Sesion</a>
    

    </nav>

</header>

    <div class="container  mt-5 ">
        <div class="row align-items-stretch p-4 uppermant_table">
<table class="maquina_table">

            <caption class="tabmaqui_capti">Listado de las Maquinas</caption>

            <thead>
              <tr>
                <th class="tabmaqui_head">Numero Serie</th>
                <th class="tabmaqui_head">Nombre Maquina</th>
                <th class="tabmaqui_head">Rut de la Empresa</th>
                <th class="tabmaqui_head"> </th>
                <th class="tabmaqui_head"> </th>
                <th class="tabmaqui_head"> </th>

              </tr>
            </thead>

            <tbody id="serchresut_maqui">

            <?php 
            $querytabl_Maquin = "SELECT * FROM maquina_mantened WHERE rut_LogUser_Maqui= '$rut_load_log'";
            $querytabl_Maquin_run = mysqli_query($conexion, $querytabl_Maquin);

            if(mysqli_num_rows($querytabl_Maquin_run) > 0)
            {
              foreach($querytabl_Maquin_run as $Maquin_mantened){

                 ?>

                <tr class="tabmaqui_fila">
                <td class="tabmaqui_body"  data-cell="Numero Serie"> <?= $Maquin_mantened['Numer_Serie'] ?> </td>
                <td class="tabmaqui_body"  data-cell="Nombre Maquina"> <?= $Maquin_mantened['Nombr_Maquina'] ?> </td>
                <td class="tabmaqui_body"  data-cell="Rut de la Empresa"> <?= $Maquin_mantened['Rut_Empresa'] ?> </td>
                <td class="tabmaqui_body"><button type="button" value="<?= $Maquin_mantened['Numer_Serie'] ?>" class="ViewMaqui_btnmodal btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#Viewdata_maqui">Datos</button></td>
                <td class="tabmaqui_body"><button type="button" value="<?= $Maquin_mantened['Numer_Serie'] ?>" class="EditMaqui_btnmodal btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#Edit_maqui">Editar</button></td>
                <td class="tabmaqui_body"><button type="button" value="<?= $Maquin_mantened['Numer_Serie'] ?>" class="DeletMaqui_btnmodal btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#Elim_maqui">Eliminar</button></td>

            </tr>


                <?php
              }

            }
            ?>

            </tbody>
            


            
        </table>

        </div>
        </div>

        <div class="d-flex justify-content-center rounded shadow">
            <div class="row cretcli_cont mb-4">
          
                <div class="row p-3 bg-white rounded shadow align-items-stretch justify-content-evenly">
                    <div class="col-auto p-1">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal_maqui">Crear Nueva Maquina</button>
                    </div>
                   
                    <div class="col-auto p-1">
                        <input type="text"  class="form-control" id="Maquin_serch" placeholder="Buscar Maquina">
                    </div>
                                         
                </div>
                       
        </div>
        </div>
        
<div class="modal fade" id="Modal_maqui" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >

  <form id="crearMaquinMod">

  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content mod_maquicre">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Ingrese los Datos de la Maquina</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <div id="errorMessage" class="alert alert-warning d-none"></div>


       <input type="hidden" name="torutuserLoad" value="<?php echo $rut_load_log ?>">
        
      
                    <div class="mb-4">
                        <label for="text" class="form-label">Numero de Serie</label>
                        <div class="col-6">
                        <input type="text" class="form-control" name="numser_Maqui" placeholder="000000000">
                        <span></span> 
                        </div>
                        
                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label">Nombre de la Maquina</label>
                        <div class="col-7">
                          <input type="text" class="form-control" name="nombr_Maqui" placeholder="Aplanadora Industrial">
                          <span></span> 
                        </div>
                        
                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label">Rut de la Empresa que pertenece la Maquina</label>
                        <div class="col-9">

                        <select class="form-select mb-4 align-items-stretch" name="rutEmpr_Maqui" aria-label="Default select example">


                        <?php

 $busc_rutempr = "SELECT * FROM cliente_mantened WHERE rut_LogUser_Clint = '$rut_load_log' AND seri_ConnMaqui = 0";
 $busc_rutempr_run = mysqli_query($conexion, $busc_rutempr) or die (mysqli_error($conexion));
 
 foreach($busc_rutempr_run as $list_ruts):  ?>
                            
    <option value="<?php echo $list_ruts['ID_Cliente'] ?>"><?php echo $list_ruts['Rut_empresa']," / ". $list_ruts['Fecha_del_trabajo'] ?></option>

  <?php endforeach ?>

                        </select>
                        <span></span>
                        </div>
                        
                    </div>


                    <div class="mb-4">
                        <label for="text" class="form-label p-1">¿Tiene Repuestos la Maquina?</label>
                        <div class="p-2"><input type="radio" name="rad_maqu" onclick="hideshowRep_Maqu(2)" value="show_maqu"> Si</div>
                        <div class="p-2"><input type="radio" name="rad_maqu" onclick="hideshowRep_Maqu(1)" value="hide_maqu"> No</div>
                        
                        <br>
                       
                            <div class="row" id="repue_maqui" style="display: none;">

                               <div class="mb-4 align-items-stretch">
                                <label for="text" class="form-label">Numero de Serie del Repuesto</label>
                                <div class="col-6">
                                  <input type="text" class="form-control" name="seri_repu" placeholder="000000000">
                                </div>
                                
                            </div>

                            <div class="mb-4 align-items-stretch">
                            <label for="text" class="form-label">Nombre del Repuesto</label>
                              <div class="col-7">
                              <input type="text" class="form-control" name="nombr_repu" placeholder="Fuente de Poder">
                              </div>
                                
                            </div> 

                            <div class="mb-4 align-items-stretch">
                                <label for="text" class="form-label">Cantidad de Repuestos</label>
                                <div class="col-3">
                                <input type="text" class="form-control" name="cant_repu" placeholder="00">
                                </div>
                                
                            </div>

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




<div class="modal fade" id="Edit_maqui" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

<form id="updatMaquinMod">

  <div class="modal-dialog">
    <div class="modal-content mod_maquiedi">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar la Maquina</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <div id="errorMessageUpdat" class="alert alert-warning d-none"></div>

      <input type="hidden" name="maqui_id" id="maqui_id">


                    <div class="mb-4">
                        <label for="text" class="form-label">Numero de Serie</label>
                        <div class="col-6">
                        <input type="text" class="form-control" name="numser_Maquiedi" id="numser_Maquiedi">
                        <span></span> 
                        </div>
                        
                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label">Nombre de la Maquina</label>
                        <div class="col-7">
                        <input type="text" class="form-control" name="nombr_Maquiedi" id="nombr_Maquiedi">
                        <span></span> 
                        </div>
                        
                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label">Rut de la Empresa que pertenece la Maquina</label>
                        <div class="col-9">

                        <select class="form-select mb-4 align-items-stretch" name="rutEmpr_Maquiedi" id="rutEmpr_Maquiedi" aria-label="Default select example">
                        


                        <?php

 $busc_rutempr = "SELECT * FROM cliente_mantened WHERE rut_LogUser_Clint = '$rut_load_log'";
 $busc_rutempr_run = mysqli_query($conexion, $busc_rutempr) or die (mysqli_error($conexion));
 
 foreach($busc_rutempr_run as $list_ruts):  ?>
                            
    <option value="<?php echo $list_ruts['ID_Cliente'] ?>"><?php echo $list_ruts['Rut_empresa']," / ". $list_ruts['Fecha_del_trabajo'] ?></option>

  <?php endforeach ?>

                        </select>
                        <span></span>
                        </div>
                        
                    </div>


                    <div class="mb-4">
                        <label for="text" class="form-label p-1">¿Tiene Repuestos la Maquina?</label>
                        <div class="p-2"><input type="radio" name="rad_maquedi" onclick="hideshowRep_Maquedi(2)" value="show_maquedi" > Si</div>
                        <div class="p-2"><input type="radio" name="rad_maquedi" onclick="hideshowRep_Maquedi(1)" value="hide_maquedi"> No</div>
                        
                        <br>
                       
                            <div class="row" id="repue_maquiedi" style="display: none;">

                               <div class="mb-4 align-items-stretch">
                                <label for="text" class="form-label">Numero de Serie del Repuesto</label>
                                <div class="col-6">
                                  <input type="text" class="form-control" name="seri_repuedi" id="seri_repuedi">
                                </div>
                                
                            </div>

                            <div class="mb-4 align-items-stretch">
                            <label for="text" class="form-label">Nombre del Repuesto</label>
                                <div class="col-7">
                                <input type="text" class="form-control" name="nombr_repuedi" id="nombr_repuedi">
                                </div>
                                
                            </div> 

                            <div class="mb-4 align-items-stretch">
                                <label for="text" class="form-label">Cantidad de Repuestos</label>
                                <div class="col-3">
                                <input type="text" class="form-control" name="cant_repuedi" id="cant_repuedi">
                                </div>
                                
                            </div>

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
    


<div class="modal fade" id="Elim_maqui" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

<form id="deletMaquintMod">

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Maquina</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <input type="hidden" name="maqui_iddel" id="maqui_iddel">

      <div id="errorMessageDelet" class="alert alert-warning d-none"></div>

        <h5>¿Esta Seguro que desea eliminar la Maquina?</h5>


      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-danger">Eliminar</button>
      </div>
    </div>
  </div>

</form>

</div>



<div class="modal fade" id="Viewdata_maqui" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Datos de la Maquina</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
                    <div class="mb-4">
                        <label for="text" class="form-label"><strong>Numero de Serie: </strong></label>
                        <label id="numser_Maquinview" for="text" class="form-label"></label>

                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label"><strong>Nombre de la Maquina: </strong></label>
                        <label id="nombrmaq_Maquinview" for="text" class="form-label"></label>
                        
                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label"><strong>Rut de la Empresa que pertenece la Maquina: </strong></label>
                        <label id="rutempr_Maquinview" for="text" class="form-label"></label>
                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label"><strong>Numero de Serie del Repuesto: </strong></label>
                        <label id="repseri_Maquinview" for="text" class="form-label"></label>
                      
                    </div>          
                    
                    <div class="mb-4">
                        <label for="text" class="form-label"><strong>Nombre del Repuesto: </strong></label>
                        <label id="nombrep_Maquinview" for="text" class="form-label"></label>
                      
                    </div>     

                    <div class="mb-4">
                        <label for="text" class="form-label"><strong>Cantidad de Repuestos: </strong></label>
                        <label id="cantrep_Maquinview" for="text" class="form-label"></label>
                      
                    </div>     

      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Salir</button>
        
      </div>
    </div>
  </div>
</div>




    
        

    <script src="js/MaquRep_val.js"></script>
    <script src="js/valid_AdMaqui.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


    <script>

$(document).ready(function(){

  $("#Maquin_serch").keyup(function(){

    var input = $(this).val();

    if(input != ""){
      $.ajax({

        url:"php/Maqui_serchTabl.php",
        method:"POST",
        data:{input:input},

        success:function(data){
          $("#serchresut_maqui").html(data);

        }

      });

    }else{
      
      $.ajax({

        url:"php/Maqui_serchTabl.php",
        method:"POST",
        data:{input:input},

        success:function(data){
          $("#serchresut_maqui").html(data);

        }

        });
    }

  });

});
</script>

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
          $('#rutEmpr_Maquiedi').val(res.data.Numer_Serie);
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


  $(document).on('click', '.ViewMaqui_btnmodal', function () {

    var maqui_id = $(this).val();

      $.ajax({
      type: "GET",
      url: "php/Maquin_CRUD_inst.php?maqui_id=" + maqui_id,
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