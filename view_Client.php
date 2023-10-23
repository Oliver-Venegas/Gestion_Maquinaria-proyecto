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

            <caption class="tabcli_capti">Listado de los Clientes</caption>

            <tr>
                <th class="tabcli_head">Rut Empresa</th>
                <th class="tabcli_head">Nombre Empresa</th>
                <th class="tabcli_head">Fecha del Trabajo</th>
                <th class="tabcli_head"> </th>
                <th class="tabcli_head"> </th>

            </tr>

            <tr class="tabcli_fila">
                <td class="tabcli_body" data-bs-toggle="modal" data-bs-target="#Viewdata_clien" data-cell="Rut Empresa">2197828-1</td>
                <td class="tabcli_body" data-bs-toggle="modal" data-bs-target="#Viewdata_clien" data-cell="Nombre Empresa">Sanander</td>
                <td class="tabcli_body" data-bs-toggle="modal" data-bs-target="#Viewdata_clien" data-cell="Fecha del Trabajo">23/02/2022</td>
                <td class="tabcli_body"><button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#Modal_cliedi">Editar</button></td>
                <td class="tabcli_body"><button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#Elim_cli">Eliminar</button></td>

            </tr>

            <tr class="tabcli_fila">
                <td class="tabcli_body" data-cell="Rut Empresa">1143228-4</td>
                <td class="tabcli_body" data-cell="Nombre Empresa">Deca</td>
                <td class="tabcli_body" data-cell="Fecha del Trabajo">21/05/2021</td>
                <td class="tabcli_body"><button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#Modal_cliedi">Editar</button></td>
                <td class="tabcli_body"><button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#Elim_cli">Eliminar</button></td>
                
            </tr>

            <tr class="tabcli_fila">
                <td class="tabcli_body" data-cell="Rut de Empresa">1223234-8</td>
                <td class="tabcli_body" data-cell="Nombre de la Empresa">Santa Isabel</td>
                <td class="tabcli_body" data-cell="Fecha del Trabajo">07/10/2022</td>
                <td class="tabcli_body"><button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#Modal_cliedi">Editar</button></td>
                <td class="tabcli_body"><button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#Elim_cli">Eliminar</button></td>
                
            </tr>

            <tr class="tabcli_fila">
                <td class="tabcli_body" data-cell="Rut Empresa">2190820-3</td>
                <td class="tabcli_body" data-cell="Nombre Empresa">Torrico</td>
                <td class="tabcli_body" data-cell="Fecha del Trabajo">11/02/2023</td>
                <td class="tabcli_body"><button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#Modal_cliedi">Editar</button></td>
                <td class="tabcli_body"><button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#Elim_cli">Eliminar</button></td>
                
            </tr>

            <tr class="tabcli_fila">
                <td class="tabcli_body" data-cell="Rut Empresa">1720075-2</td>
                <td class="tabcli_body" data-cell="Nombre Empresa">Corona</td>
                <td class="tabcli_body" data-cell="Fecha del Trabajo">03/12/2020</td>
                <td class="tabcli_body"><button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#Modal_cliedi">Editar</button></td>
                <td class="tabcli_body"><button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#Elim_cli">Eliminar</button></td>
                
            </tr>

            <tr class="tabcli_fila">
                <td class="tabcli_body" data-cell="Rut Empresa">2813922-k</td>
                <td class="tabcli_body" data-cell="Nombre Empresa">Totus</td>
                <td class="tabcli_body" data-cell="Fecha del Trabajo">18/09/2022</td>
                <td class="tabcli_body"><button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#Modal_cliedi">Editar</button></td>
                <td class="tabcli_body"><button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#Elim_cli">Eliminar</button></td>
                
            </tr>

            
        </table>

        </div>
        
        <div class="d-flex justify-content-center rounded shadow">
            <div class="row cretcli_cont mb-4">
          
                <div class="row p-3 bg-white rounded shadow align-items-stretch justify-content-evenly">
                    <div class="col-auto p-1">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal_cli">Crear Nuevo Cliente</button>
                    </div>
                   
                    <div class="col-auto p-1">
                        <input type="text"  class="form-control" name="" placeholder="Buscar Cliente">
                    </div>
                        
                </div>
                       
        </div>
        </div>
        
<div class="modal fade" id="Modal_cli" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
    <div class="modal-content mod_clicre">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Ingrese los Datos del Cliente</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body ">
        
      <form action="#">
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
                        
                        <br>
                       
                            <div class="row" id="bolet_cli" style="display: none;">
                               <div class="mb-4 align-items-stretch">
                                <label for="text" class="form-label">Codigo de la Boleta</label>
                                <div class="col-6">
                                  <input type="text" class="form-control" name="id_bol" placeholder="00000000">
                                </div>
                                
                            </div>
                            <div class="mb-4 align-items-stretch">
                            <label for="text" class="form-label">Ingrese la Boleta</label>
                                <input type="file" class="form-control" name="data_bol">
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




<div class="modal fade" id="Modal_cliedi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content mod_cliedi">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar los Datos del Cliente</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      <form action="#">
                    <div class="mb-4">
                        <label for="text" class="form-label">Rut de Empresa</label>
                        <div class="col-5">
                        <input type="text" class="form-control" name="rutempr_Clienedi">
                        <span></span> 
                        </div>
                        
                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label">Nombre de la Empresa</label>
                        <div class="col-7">
                        <input type="text" class="form-control" name="nombrempr_Clienedi">
                        <span></span>  
                        </div>
                        
                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label">Nombre de Contacto</label>
                        <div class="col-7">
                         <input type="text" class="form-control" name="nombrcont_Clienedi"> 
                        </div>
                        
                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label">Horas de Trabajo en la Empresa</label>
                        <div class="col-4">
                          <input type="time" class="form-control" name="hrsempr_Clienedi">
                        </div>
                        
                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label">Fecha del Trabajo</label>
                        <div class="col-5">
                        <input type="date" class="form-control" name="dateempr_Clienedi">
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
                                  <input type="text" class="form-control" name="id_boledi">
                                </div>
                                
                            </div>
                            <div class="mb-4 align-items-stretch">
                            <label for="text" class="form-label">Ingrese la Boleta</label>
                            <input type="file" class="form-control" name="data_boledi">
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



<div class="modal fade" id="Elim_cli" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Cliente</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h5>¿Esta Seguro que desea eliminar al Cliente?</h3>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-danger">Eliminar</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="Viewdata_clien" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Datos del Cliente</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      <form action="#">
                    <div class="mb-4">
                        <label for="text" class="form-label"><strong>Rut de Empresa: </strong></label>
                        <label for="text" class="form-label">2197828-1</label>

                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label"><strong>Nombre de la Empresa: </strong></label>
                        <label for="text" class="form-label">Sanander</label>
                        
                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label"><strong>Nombre de Contacto: </strong></label>
                        <label for="text" class="form-label">Patrcicio Vega</label>
                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label"><strong>Horas de Trabajo en la Empresa: </strong></label>
                        <label for="text" class="form-label"></label>
                      
                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label"><strong>Fecha del Trabajo: </strong></label>
                        <label for="text" class="form-label">23/02/2022</label>
                      
                    </div>          
                    
                    <div class="mb-4">
                        <label for="text" class="form-label"><strong>Codigo de la Boleta: </strong></label>
                        <label for="text" class="form-label"></label>
                      
                    </div>     

                    <div class="mb-4">
                        <label for="text" class="form-label"><strong>Datos de la Boleta: </strong></label>
                        <label for="text" class="form-label"></label>
                      
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
        
    <script src="js/CliBol_val.js"></script>
    <script src="js/valid_AdClien.js"></script>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>