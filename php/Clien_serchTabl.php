<?php 
  session_start();


include ('conect_BD.php');

$mostra_email_user = $_SESSION['user_manten'];

$obtdatos_sql = "SELECT Rut  FROM usuario_mantenedor WHERE Email_mantenedor = '$mostra_email_user'";
$result_tolog = $conexion->query($obtdatos_sql);

while($data_oflog = $result_tolog->fetch_assoc()){

  $rut_load_log = $data_oflog['Rut'];


}

if(isset($_POST['input'])){

    $input = $_POST['input'];

    $inp_query = "SELECT * FROM cliente_mantened WHERE rut_LogUser_Clint= '$rut_load_log' AND  Nombre_empresa LIKE '{$input}%'";

    $inp_query_run = mysqli_query($conexion,$inp_query);

    if(mysqli_num_rows($inp_query_run) > 0){

        while($Client_mantened = mysqli_fetch_assoc($inp_query_run)){
            
            $id_clint = $Client_mantened['ID_Cliente'];
            $rutempre_clint = $Client_mantened['Rut_empresa'];
            $nombrempre_clint = $Client_mantened['Nombre_empresa'];
            $datejob_clint = $Client_mantened['Fecha_del_trabajo'];
        
        ?>


                <tr class="tabcli_fila">
                <td  style="display: none;" class="tabcli_body"> <?php echo $id_clint ?>  </td>
                <td class="tabcli_body "  data-cell="Rut Empresa"> <?php echo $rutempre_clint ?>  </td>
                <td class="tabcli_body "  data-cell="Nombre Empresa"> <?php echo $nombrempre_clint ?>  </td>
                <td class="tabcli_body "  data-cell="Fecha del Trabajo"> <?php echo $datejob_clint ?>  </td>
                
                <td class="tabcli_body"><button type="button" value="<?php echo $id_clint ?>" class="ViewClient_btnmodal btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#Viewdata_clien">Datos</button></td>
                <td class="tabcli_body"><button type="button" value="<?php echo $id_clint ?>" class="EditClient_btnmodal btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#Modal_cliedi">Editar</button></td>
                <td class="tabcli_body"><button type="button" value="<?php echo $id_clint ?>" class="DeletClient_btnmodal btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#Elim_cli">Eliminar</button></td>

   
            </tr>


<?php
        }       
            

    }
}
?>