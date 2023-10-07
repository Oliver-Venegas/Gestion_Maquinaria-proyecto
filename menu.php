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
            <a href="view_Manten.php" class="user_home">Mantenedor</a>

            <input type="checkbox" id="check_general">
            <label for="check_general" class='menugen_icons'>
            <i class='bx bx-menu' id="general_icon"></i>
            <i class='bx bx-x' id="general_close"></i>
            </label>
            <a href="index.html" class='bx bx-exit' id="general_session"></a>

            <nav class="navbar_general">
            <a href="menu.php" style="--i:0;">Home</a>
            <a href="chang_Mant.php" style="--i:1;">Tipo de Mantenedor</a>
            <a href="view_Maqui.php" style="--i:2;">Maquinas</a>    
            <a href="view_Client.php" style="--i:3;">Clientes</a>
            <a class="cerr_sess" href="index.html" style="--i:4;">Cerrar Sesion</a>
            

            </nav>

        </header>


        <div class="container  mt-5 mb-5 ">
        <div class="row align-items-stretch p-2 ">
<table class="Manten_table rounded">



            <tr data-bs-toggle="collapse" data-bs-target=".colap_test">
                <th class="tabmante_main">Sanander</th>
                <th class="tabmante_main" style="display: none;">Sensor de Metales</th>
                <th class="tabmante_main" style="display: none;">23/02/2022</th>
                <th class="tabmante_main"> </th>
                <th class="tabmante_main"> </th>

            </tr>

        <tbody class="collapse colap_test">

            <tr>
                <th class="tabmante_head">Hora</th>
                <th class="tabmante_head">Observacion</th>
                <th class="tabmante_head">Estado</th>
                <th class="tabmante_head"> </th>
                <th class="tabmante_head"> </th>

            </tr>

            <tr class="tabmante_fila">
                <td class="tabmante_body" data-cell="Hora">01:00</td>
                <td class="tabmante_body" data-cell="Observacion">Compresor D DE BIOGAS</td>
                <td class="tabmante_body" data-cell="Estado">Realizado</td>
                <td class="tabmante_body"><button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#Modal_cliedi">Editar</button></td>
                <td class="tabmante_body"><button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#Elim_cli">Eliminar</button></td>

            </tr>

            <tr class="tabmante_fila">
                <td class="tabmante_body" data-cell="Hora">03:00</td>
                <td class="tabmante_body" data-cell="Observacion">Revision de Supresor</td>
                <td class="tabmante_body" data-cell="Estado">Normalizado</td>
                <td class="tabmante_body"><button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#Modal_cliedi">Editar</button></td>
                <td class="tabmante_body"><button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#Elim_cli">Eliminar</button></td>
                
            </tr>

            <tr class="tabmante_fila">
                <td class="tabmante_body" data-cell="Hora">01:00</td>
                <td class="tabmante_body" data-cell="Observacion">Lectura erronea</td>
                <td class="tabmante_body" data-cell="Estado">Realizado</td>
                <td class="tabmante_body"><button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#Modal_cliedi">Editar</button></td>
                <td class="tabmante_body"><button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#Elim_cli">Eliminar</button></td>
                
            </tr>

            <tr class="tabmante_fila">
                <td class="tabmante_body" data-cell="Hora">01:00</td>
                <td class="tabmante_body" data-cell="Observacion">Revision Sentido de Giro</td>
                <td class="tabmante_body" data-cell="Estado">Realizado</td>
                <td class="tabmante_body"><button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#Modal_cliedi">Editar</button></td>
                <td class="tabmante_body"><button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#Elim_cli">Eliminar</button></td>
                
            </tr>

            
            </tbody>


            
        </table>

        </div>

</div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>