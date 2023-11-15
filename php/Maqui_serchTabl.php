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

    $inp_query = "SELECT * FROM maquina_mantened WHERE rut_LogUser_Maqui= '$rut_load_log' AND  Nombr_Maquina LIKE '{$input}%'";

    $inp_query_run = mysqli_query($conexion,$inp_query);

    if(mysqli_num_rows($inp_query_run) > 0){

        while($Maquin_mantened = mysqli_fetch_assoc($inp_query_run)){
            
            $numser_maquin = $Maquin_mantened['Numer_Serie'];
            $nombr_maquin = $Maquin_mantened['Nombr_Maquina'];
            $rutempr_maquin = $Maquin_mantened['Rut_Empresa'];
            
        
        ?>

                <tr class="tabmaqui_fila">
                <td class="tabmaqui_body"  data-cell="Numero Serie"> <?php echo $numser_maquin ?> </td>
                <td class="tabmaqui_body"  data-cell="Nombre Maquina"> <?php echo $nombr_maquin ?> </td>
                <td class="tabmaqui_body"  data-cell="Rut de la Empresa"> <?php echo $rutempr_maquin ?> </td>
                <td class="tabmaqui_body"><button type="button" value="<?php echo $numser_maquin ?>" class="ViewMaqui_btnmodal btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#Viewdata_maqui">Datos</button></td>
                <td class="tabmaqui_body"><button type="button" value="<?php echo $numser_maquin ?>" class="EditMaqui_btnmodal btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#Edit_maqui">Editar</button></td>
                <td class="tabmaqui_body"><button type="button" value="<?php echo $numser_maquin ?>" class="DeletMaqui_btnmodal btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#Elim_maqui">Eliminar</button></td>


   
            </tr>


<?php
        }       
            

    }
}
?>