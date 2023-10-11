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
    <a href="view_Maqui.php" class="user_home">Maquinas</a>

    <input type="checkbox" id="check_general">
    <label for="check_general" class='menugen_icons'>
    <i class='bx bx-menu' id="general_icon"></i>
    <i class='bx bx-x' id="general_close"></i>
    </label>
    <a href="index.html" class='bx bx-exit' id="general_session"></a>
   

    <nav class="navbar_general">
    <a href="view_Manten.php" style="--i:0;">Mantenedor</a>
    <a href="menu.php" style="--i:1;">Mantencion</a>
    <a href="chang_Mant.php" style="--i:2;">Estado de Mantencion</a>    
    <a href="view_Client.php" style="--i:3;">Clientes</a>
    <a class="cerr_sess" href="index.html" style="--i:4;">Cerrar Sesion</a>
    

    </nav>

</header>

    <div class="container  mt-5 ">
        <div class="row align-items-stretch p-4">
<table class="maquina_table ">

            <caption class="tabmaqui_capti">Listado de las Maquinas</caption>

            <tr>
                <th class="tabmaqui_head">Numero Serie</th>
                <th class="tabmaqui_head">Nombre Maquina</th>
                <th class="tabmaqui_head">Rut de la Empresa</th>
                <th class="tabmaqui_head"> </th>
                <th class="tabmaqui_head"> </th>

            </tr>

            <tr class="tabmaqui_fila">
                <td class="tabmaqui_body" data-bs-toggle="modal" data-bs-target="#Viewdata_maqui" data-cell="Numero Serie">53233321</td>
                <td class="tabmaqui_body" data-bs-toggle="modal" data-bs-target="#Viewdata_maqui" data-cell="Nombre Maquina">Pantalla LED</td>
                <td class="tabmaqui_body" data-bs-toggle="modal" data-bs-target="#Viewdata_maqui" data-cell="Rut de la Empresa">1143228-4</td>
                <td class="tabmaqui_body"><button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#Edit_maqui">Editar</button></td>
                <td class="tabmaqui_body"><button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#Elim_maqui">Eliminar</button></td>

            </tr>

            <tr class="tabmaqui_fila">
                <td class="tabmaqui_body" data-cell="Numero Serie">12221241</td>
                <td class="tabmaqui_body" data-cell="Nombre Maquina">Sensor de Metales</td>
                <td class="tabmaqui_body" data-cell="Rut de la Empresa">2197828-1</td>
                <td class="tabmaqui_body"><button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#Edit_maqui">Editar</button></td>
                <td class="tabmaqui_body"><button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#Elim_maqui">Eliminar</button></td>
                
            </tr>

            <tr class="tabmaqui_fila">
                <td class="tabmaqui_body" data-cell="Numero Serie">32123212</td>
                <td class="tabmaqui_body" data-cell="Nombre Maquina">Bomba Cav/Prog</td>
                <td class="tabmaqui_body" data-cell="Rut de la Empresa">1223234-8</td>
                <td class="tabmaqui_body"><button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#Edit_maqui">Editar</button></td>
                <td class="tabmaqui_body"><button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#Elim_maqui">Eliminar</button></td>
                
            </tr>

            <tr class="tabmaqui_fila">
                <td class="tabmaqui_body" data-cell="Numero Serie">1234123</td>
                <td class="tabmaqui_body" data-cell="Nombre Maquina">Supresor de Gas</td>
                <td class="tabmaqui_body" data-cell="Rut de la Empresa">1720075-2</td>
                <td class="tabmaqui_body"><button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#Edit_maqui">Editar</button></td>
                <td class="tabmaqui_body"><button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#Elim_maqui">Eliminar</button></td>
                
            </tr>

            <tr class="tabmaqui_fila">
                <td class="tabmaqui_body" data-cell="Numero Serie">577771993</td>
                <td class="tabmaqui_body" data-cell="Nombre Maquina">Compreso Hidraulico</td>
                <td class="tabmaqui_body" data-cell="Rut de la Empresa">2813922-k</td>
                <td class="tabmaqui_body"><button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#Edit_maqui">Editar</button></td>
                <td class="tabmaqui_body"><button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#Elim_maqui">Eliminar</button></td>
                
            </tr>

            <tr class="tabmaqui_fila">
                <td class="tabmaqui_body" data-cell="Numero Serie">231123334</td>
                <td class="tabmaqui_body" data-cell="Nombre Maquina">Microondas Industrial</td>
                <td class="tabmaqui_body" data-cell="Rut de la Empresa">2190820-3</td>
                <td class="tabmaqui_body"><button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#Edit_maqui">Editar</button></td>
                <td class="tabmaqui_body"><button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#Elim_maqui">Eliminar</button></td>
                
            </tr>

            
        </table>

        </div>

        <div class="d-flex justify-content-center rounded shadow">
            <div class="row cretcli_cont mb-4">
          
                <div class="row p-3 bg-white rounded shadow align-items-stretch justify-content-evenly">
                    <div class="col-auto p-1">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal_maqui">Crear Nueva Maquina</button>
                    </div>
                   
                    <div class="col-auto p-1">
                        <input type="text"  class="form-control" name="" placeholder="Buscar Maquina">
                    </div>
                                         
                </div>
                       
        </div>
        </div>
        
<div class="modal fade" id="Modal_maqui" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content mod_maquicre">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Ingrese los Datos de la Maquina</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      <form action="#">
                    <div class="mb-4">
                        <label for="text" class="form-label">Numero de Serie</label>
                        <div class="col-6">
                        <input type="text" class="form-control" name="numser_Maqui">
                        <span></span> 
                        </div>
                        
                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label">Nombre de la Maquina</label>
                        <div class="col-7">
                          <input type="text" class="form-control" name="nombr_Maqui">
                          <span></span> 
                        </div>
                        
                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label">Rut de la Empresa que pertenece la Maquina</label>
                        <div class="col-5">
                        <input type="text" class="form-control" name="rutEmpr_Maqui">
                        <span></span>
                        </div>
                        
                    </div>


                    <div class="mb-4">
                        <label for="text" class="form-label p-1">¿Tiene Repuestos la Maquina?</label>
                        <div class="p-2"><input type="radio" name="rad_maqu" onclick="hideshowRep_Maqu(2)" value="show_maqu" > Si</div>
                        <div class="p-2"><input type="radio" name="rad_maqu" onclick="hideshowRep_Maqu(1)" value="hide_maqu" checked> No</div>
                        
                        <br>
                       
                            <div class="row" id="repue_maqui" style="display: none;">

                               <div class="mb-4 align-items-stretch">
                                <label for="text" class="form-label">Numero de Serie del Repuesto</label>
                                <div class="col-6">
                                  <input type="text" class="form-control" name="seri_repu">
                                </div>
                                
                            </div>

                            <div class="mb-4 align-items-stretch">
                            <label for="text" class="form-label">Nombre del Repuesto</label>
                              <div class="col-7">
                              <input type="text" class="form-control" name="nombr_repu">
                              </div>
                                
                            </div> 

                            <div class="mb-4 align-items-stretch">
                                <label for="text" class="form-label">Cantidad de Repuestos</label>
                                <div class="col-3">
                                <input type="text" class="form-control" name="cant_repu">
                                </div>
                                
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




<div class="modal fade" id="Edit_maqui" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content mod_maquiedi">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar la Maquina</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      <form action="#">
                    <div class="mb-4">
                        <label for="text" class="form-label">Numero de Serie</label>
                        <div class="col-6">
                        <input type="text" class="form-control" name="numser_Maquiedi">
                        <span></span> 
                        </div>
                        
                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label">Nombre de la Maquina</label>
                        <div class="col-7">
                        <input type="text" class="form-control" name="nombr_Maquiedi">
                        <span></span> 
                        </div>
                        
                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label">Rut de la Empresa que pertenece la Maquina</label>
                        <div class="col-5">
                        <input type="text" class="form-control" name="rutEmpr_Maquiedi">
                        <span></span>
                        </div>
                        
                    </div>


                    <div class="mb-4">
                        <label for="text" class="form-label p-1">¿Tiene Repuestos la Maquina?</label>
                        <div class="p-2"><input type="radio" name="rad_maquedi" onclick="hideshowRep_Maquedi(2)" value="show_maquedi" > Si</div>
                        <div class="p-2"><input type="radio" name="rad_maquedi" onclick="hideshowRep_Maquedi(1)" value="hide_maquedi" checked> No</div>
                        
                        <br>
                       
                            <div class="row" id="repue_maquiedi" style="display: none;">

                               <div class="mb-4 align-items-stretch">
                                <label for="text" class="form-label">Numero de Serie del Repuesto</label>
                                <div class="col-6">
                                  <input type="text" class="form-control" name="seri_repuedi">
                                </div>
                                
                            </div>

                            <div class="mb-4 align-items-stretch">
                            <label for="text" class="form-label">Nombre del Repuesto</label>
                                <div class="col-7">
                                <input type="text" class="form-control" name="nombr_repuedi">
                                </div>
                                
                            </div> 

                            <div class="mb-4 align-items-stretch">
                                <label for="text" class="form-label">Cantidad de Repuestos</label>
                                <div class="col-3">
                                <input type="text" class="form-control" name="cant_repuedi">
                                </div>
                                
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
    


<div class="modal fade" id="Elim_maqui" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Maquina</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h5>¿Esta Seguro que desea eliminar la Maquina?</h3>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-danger">Eliminar</button>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="Viewdata_maqui" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Datos de la Maquina</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      <form action="#">
                    <div class="mb-4">
                        <label for="text" class="form-label"><strong>Numero de Serie: </strong></label>
                        <label for="text" class="form-label">53233321</label>

                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label"><strong>Nombre de la Maquina: </strong></label>
                        <label for="text" class="form-label">Pantalla LED</label>
                        
                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label"><strong>Rut de la Empresa que pertenece la Maquina: </strong></label>
                        <label for="text" class="form-label">1143228-4</label>
                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label"><strong>Horas de Trabajo en la Empresa: </strong></label>
                        <label for="text" class="form-label"></label>
                      
                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label"><strong>Numero de Serie del Repuesto: </strong></label>
                        <label for="text" class="form-label">1828221</label>
                      
                    </div>          
                    
                    <div class="mb-4">
                        <label for="text" class="form-label"><strong>Nombre del Repuesto: </strong></label>
                        <label for="text" class="form-label">Resistencia</label>
                      
                    </div>     

                    <div class="mb-4">
                        <label for="text" class="form-label"><strong>Cantidad de Repuestos: </strong></label>
                        <label for="text" class="form-label">10</label>
                      
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
        

    <script src="js/MaquRep_val.js"></script>
    <script src="js/valid_AdMaqui.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>