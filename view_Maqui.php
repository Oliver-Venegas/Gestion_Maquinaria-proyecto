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
                <td class="tabmaqui_body" data-cell="Numero Serie">53233321</td>
                <td class="tabmaqui_body" data-cell="Nombre Maquina">Pantalla LED</td>
                <td class="tabmaqui_body" data-cell="Rut de la Empresa">1143228-4</td>
                <td class="tabmaqui_body"><a class="btn btn-primary btn-sm" href="selct_Maqui.php">Editar</a></td>
                <td class="tabmaqui_body" ><button type="button" class="btn btn-danger btn-sm">Eliminar</button></td>

            </tr>

            <tr class="tabmaqui_fila">
                <td class="tabmaqui_body" data-cell="Numero Serie">12221241</td>
                <td class="tabmaqui_body" data-cell="Nombre Maquina">Sensor de Metales</td>
                <td class="tabmaqui_body" data-cell="Rut de la Empresa">2197828-1</td>
                <td class="tabmaqui_body"><a class="btn btn-primary btn-sm" href="selct_Maqui.php">Editar</a></td>
                <td class="tabmaqui_body"><button type="button" class="btn btn-danger btn-sm">Eliminar</button></td>
                
            </tr>

            <tr class="tabmaqui_fila">
                <td class="tabmaqui_body" data-cell="Numero Serie">32123212</td>
                <td class="tabmaqui_body" data-cell="Nombre Maquina">Bomba Cav/Prog</td>
                <td class="tabmaqui_body" data-cell="Rut de la Empresa">1223234-8</td>
                <td class="tabmaqui_body"><a class="btn btn-primary btn-sm" href="selct_Maqui.php">Editar</a></td>
                <td class="tabmaqui_body"><button type="button" class="btn btn-danger btn-sm">Eliminar</button></td>
                
            </tr>

            <tr class="tabmaqui_fila">
                <td class="tabmaqui_body" data-cell="Numero Serie">1234123</td>
                <td class="tabmaqui_body" data-cell="Nombre Maquina">Supresor de Gas</td>
                <td class="tabmaqui_body" data-cell="Rut de la Empresa">1720075-2</td>
                <td class="tabmaqui_body"> <a class="btn btn-primary btn-sm" href="selct_Maqui.php">Editar</a></td>
                <td class="tabmaqui_body"><button type="button" class="btn btn-danger btn-sm">Eliminar</button></td>
                
            </tr>

            <tr class="tabmaqui_fila">
                <td class="tabmaqui_body" data-cell="Numero Serie">577771993</td>
                <td class="tabmaqui_body" data-cell="Nombre Maquina">Compreso Hidraulico</td>
                <td class="tabmaqui_body" data-cell="Rut de la Empresa">2813922-k</td>
                <td class="tabmaqui_body"><a class="btn btn-primary btn-sm" href="selct_Maqui.php">Editar</a></td>
                <td class="tabmaqui_body"><button type="button" class="btn btn-danger btn-sm">Eliminar</button></td>
                
            </tr>

            <tr class="tabmaqui_fila">
                <td class="tabmaqui_body" data-cell="Numero Serie">231123334</td>
                <td class="tabmaqui_body" data-cell="Nombre Maquina">Microondas Industrial</td>
                <td class="tabmaqui_body" data-cell="Rut de la Empresa">2190820-3</td>
                <td class="tabmaqui_body"><a class="btn btn-primary btn-sm" href="selct_Maqui.php">Editar</a></td>
                <td class="tabmaqui_body"><button type="button" class="btn btn-danger btn-sm">Eliminar</button></td>
                
            </tr>

            
        </table>

        </div>
        

    </div>
        

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>