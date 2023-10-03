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
    <a href="#" class="user_home">Mantenedor</a>

    <input type="checkbox" id="check_general">
    <label for="check_general" class='menugen_icons'>
    <i class='bx bx-menu' id="general_icon"></i>
    <i class='bx bx-x' id="general_close"></i>
    </label>
    <a href="index.html" class='bx bx-exit' id="general_session"></a>
   

    <nav class="navbar_general">
    <a href="" style="--i:0;">Home</a>
    <a href="chang_Mant.php" style="--i:1;">Tipo de Mantenedor</a>
    <a href="selct_Maqui.php" style="--i:2;">Maquinas</a>    
    <a href="selct_Cli.php" style="--i:3;">Clientes</a>
    <a class="cerr_sess" href="index.html" style="--i:4;">Cerrar Sesion</a>
    

    </nav>

</header>

    <div class="container  mt-5 ">
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
                <td class="tabcli_body" data-cell="Rut Empresa">2197828-1</td>
                <td class="tabcli_body" data-cell="Nombre Empresa">Sanander</td>
                <td class="tabcli_body" data-cell="Fecha del Trabajo">23/02/2022</td>
                <td class="tabcli_body"><a class="btn btn-primary btn-sm" href="creat_Client.php">Editar</a></td>
                <td class="tabcli_body" ><button type="button" class="btn btn-danger btn-sm">Eliminar</button></td>

            </tr>

            <tr class="tabcli_fila">
                <td class="tabcli_body" data-cell="Rut Empresa">1143228-4</td>
                <td class="tabcli_body" data-cell="Nombre Empresa">Deca</td>
                <td class="tabcli_body" data-cell="Fecha del Trabajo">21/05/2021</td>
                <td class="tabcli_body"><a class="btn btn-primary btn-sm" href="creat_Client.php">Editar</a></td>
                <td class="tabcli_body"><button type="button" class="btn btn-danger btn-sm">Eliminar</button></td>
                
            </tr>

            <tr class="tabcli_fila">
                <td class="tabcli_body" data-cell="Rut de Empresa">1223234-8</td>
                <td class="tabcli_body" data-cell="Nombre de la Empresa">Santa Isabel</td>
                <td class="tabcli_body" data-cell="Fecha del Trabajo">07/10/2022</td>
                <td class="tabcli_body"><a class="btn btn-primary btn-sm" href="creat_Client.php">Editar</a></td>
                <td class="tabcli_body"><button type="button" class="btn btn-danger btn-sm">Eliminar</button></td>
                
            </tr>

            <tr class="tabcli_fila">
                <td class="tabcli_body" data-cell="Rut Empresa">2190820-3</td>
                <td class="tabcli_body" data-cell="Nombre Empresa">Torrico</td>
                <td class="tabcli_body" data-cell="Fecha del Trabajo">11/02/2023</td>
                <td class="tabcli_body"> <a class="btn btn-primary btn-sm" href="creat_Client.php">Editar</a></td>
                <td class="tabcli_body"><button type="button" class="btn btn-danger btn-sm">Eliminar</button></td>
                
            </tr>

            <tr class="tabcli_fila">
                <td class="tabcli_body" data-cell="Rut Empresa">1720075-2</td>
                <td class="tabcli_body" data-cell="Nombre Empresa">Corona</td>
                <td class="tabcli_body" data-cell="Fecha del Trabajo">03/12/2020</td>
                <td class="tabcli_body"><a class="btn btn-primary btn-sm" href="creat_Client.php">Editar</a></td>
                <td class="tabcli_body"><button type="button" class="btn btn-danger btn-sm">Eliminar</button></td>
                
            </tr>

            <tr class="tabcli_fila">
                <td class="tabcli_body" data-cell="Rut Empresa">2813922-k</td>
                <td class="tabcli_body" data-cell="Nombre Empresa">Totus</td>
                <td class="tabcli_body" data-cell="Fecha del Trabajo">18/09/2022</td>
                <td class="tabcli_body"><a class="btn btn-primary btn-sm" href="creat_Client.php">Editar</a></td>
                <td class="tabcli_body"><button type="button" class="btn btn-danger btn-sm">Eliminar</button></td>
                
            </tr>

            
        </table>

        </div>
        

    </div>
        

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>