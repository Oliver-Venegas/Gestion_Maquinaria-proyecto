<?php
  session_start();

  include('php/conect_BD.php');

  if(!isset($_SESSION['cliente_rut']) || !isset($_SESSION['maquinas_serie'])){
    header("Location: index.php");
    session_destroy();
    die();
    
  }

    $mostra_client = $_SESSION['cliente_rut'];
    $mostra_maqui = $_SESSION['maquinas_serie'];

    
  $obtdatoscliente_sql = "SELECT ID_Cliente  FROM cliente_mantened WHERE Rut_empresa = '$mostra_client' AND seri_ConnMaqui = '$mostra_maqui'";
  $result_tocli = $conexion->query($obtdatoscliente_sql);

  while($data_ofcli = $result_tocli->fetch_assoc()){

    $id_load_cli = $data_ofcli['ID_Cliente'];


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
<body class="menu_bacgrcliente">



        <header class="nav_superior">
            <a href="menuCliente.php" class="user_home">Mantencion</a>

            
            <a href="php/log_out.php" class='bx bx-exit' id="general_sessioncliente"></a>

        </header>


        <div class="container  mt-5 mb-5 ">
        <div class="row align-items-stretch p-2 uppermant_table">


<table class="Manten_table rounded">



<?php 
            $querytabl_Mantenupper = "SELECT * FROM mantencion_maquin WHERE id_LogClien_cone= '$id_load_cli' AND seri_LogMaqui_cone= '$mostra_maqui'";
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
                <th class="tabmante_main" data-bs-toggle="collapse" data-bs-target=".colap_test<?= $Informfallas_mantened['ID_con_mantencion'] ?>"></th>

                <th class="tabmante_main_phone">
                <div class="row plusex_mant">
                    <div class="col-auto" data-bs-toggle="collapse" data-bs-target=".colap_test<?= $Informfallas_mantened['ID_con_mantencion'] ?>"><?= $Informfallas_mantened['Nomb_maquin_cone'] ?></div>

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

            </tr>

            <?= $prueba = $Informfallas_mantened['ID_con_mantencion'] ?>

            <?php 
            $querytabl_Manten = "SELECT * FROM inform_fallas WHERE ID_InformFallas_cone= '$prueba'";
            $querytabl_Manten_run = mysqli_query($conexion, $querytabl_Manten);

            if(mysqli_num_rows($querytabl_Manten_run) > 0)
            {
              foreach($querytabl_Manten_run as $Informsecc_mantened){

                 ?>

            <tr class="tabmante_fila">
                <td class="tabmante_body" data-cell="Hora"> <?= $Informsecc_mantened['HorasdelTrabajo'] ?> </td>

                <td class="tabmante_body" data-cell="Observacion"> <?= $Informsecc_mantened['Titul_observ'] ?> </td>
                <td class="tabmante_body" data-cell="Estado"> <?= $Informsecc_mantened['Estadomanten'] ?> </td>
                <td class="tabmante_body"><button type="button" value="<?= $Informsecc_mantened['ID_infor_fallas'] ?>" class="ViewManten_btncliente btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#Viewdata_mantencliente">Datos</button></td>

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
          </tr>
            


            <?php
              }

            }
            ?>

        </table>

        </div>


<div class="modal fade" id="Viewdata_mantencliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Informe de Fallas</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

                    <div class="mb-4">
                        <label for="text" class="form-label"><strong>Estado: </strong></label>
                        <label id="estad_cliview" for="text" class="form-label"></label>

                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label"><strong>Orden: </strong></label>
                        <label id="order_cliview" for="text" class="form-label"></label>

                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label"><strong>Horas del Trabajo: </strong></label>
                        <label id="hors_cliview" for="text" class="form-label"></label>
                        
                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label"><strong>Aviso: </strong></label>
                        <label id="avis_cliview" for="text" class="form-label"></label>
                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label"><strong>Titulo de la Observacion: </strong></label>
                        <label id="obtitul_cliview" for="text" class="form-label"></label>
                      
                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label"><strong>Observacion: </strong></label>
                        <label id="obser_cliview" for="text" class="form-label"></label>
                      
                    </div>                


      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Salir</button>
        
      </div>
    </div>
  </div>
</div>




</div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


    <script>

  $(document).on('click', '.ViewManten_btncliente', function () {

    var clientefall_id = $(this).val();

      $.ajax({
      type: "GET",
      url: "php/obtCli_infallas.php?clientefall_id=" + clientefall_id,
      success: function (response) {

      var res =jQuery.parseJSON(response);
      if(res.status == 422){

        alert(res.message);

      }else if(res.status == 200){
        
          $('#order_cliview').text(res.data.Orden);
          $('#hors_cliview').text(res.data.HorasdelTrabajo);
          $('#avis_cliview').text(res.data.Aviso);
          $('#obtitul_cliview').text(res.data.Titul_observ);
          $('#obser_cliview').text(res.data.Observacion_data);
          $('#estad_cliview').text(res.data.Estadomanten);

          $('#Viewdata_mantencliente').modal('show');

     }

   }, cache: false

    });

  });


</script>




      </body>
</html>