<div class="row">
    <div class="col-12 mt-4">

        <!-- alert -->
        <?php if (isset($alert["flash"])) : ?>
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                </symbol>
            </svg>
            <div class="container col-12">
                <div class="alert <?= $alert["flash"]["type"] ?> d-flex align-items-center alert-dismissible fade show" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="26" height="26" role="img" aria-label="Success:">
                        <use xlink:href="#check-circle-fill" />
                    </svg>
                    <div class="ml-2">
                        <?= $alert["flash"]["message"] ?>
                    </div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span class="fa fa-times"></span>
                    </button>
                </div>
            </div>
            <?php unset($alert["flash"]) ?>
        <?php endif ?>
        <!-- end alert -->

        <!-- Dark table start -->
        <div class="col-12 mt-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Usuarios</h4>
                    <br>
                    <a href="usuarioControlador.php?action=agregar"> <button class="btn btn-outline-success mb-3">agregar Usuario</button> </a>
                    <br>
                    <br>
                    <div class="data-tables datatable-dark">
                        <table id="dataTable3" class="text-center">
                            <thead class="text-capitalize">
                                <tr>
                                    <th scope="row">id</th>

                                    <th>Nombre</th>
                                    <th>Usuario</th>
                                    <th>Contraseña</th>
                                    <th>Correo Electronico</th>
                                    <th>Tipo de Usuario </th>
                                    <th>Last Login </th>
                                    <th>activo</th>
                                    <th> </th>
                                    <th> </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $resultado = $connection->query('SELECT * FROM usuario');
                                $resultado = $resultado->fetch_all(MYSQLI_ASSOC);
                                $numeroFilas = sizeof($resultado);
                                for ($i = 0; $i < $numeroFilas; $i++) {
                                    $id = $resultado[$i]["id"];
                                    $nombre = $resultado[$i]["nombreCompleto"];
                                    $user = $resultado[$i]["usuario"];
                                    $contraseña = $resultado[$i]["contrasena"];
                                    $domicilio = $resultado[$i]["domicilio"];
                                    $correoElectronico = $resultado[$i]["correoElectronico"];
                                    $tipo = $resultado[$i]["tipo"];
                                    $lastLogin = $resultado[$i]["lastLogin"];
                                    $activo = $resultado[$i]["activo"];
                                    print "<tr>
                                            <td>$id</td>
                                             <td>$nombre</td>
                                            <td>$user</td>
                                            <td>$contraseña</td>
                                            <td>$correoElectronico </td>
                                            <td>$tipo </td>
                                            <td>$lastLogin  </td>
                                            <td>$activo </td>

                                            <td> <a href='usuarioControlador.php?action=actualizar&id=$id'> <button class='btn btn-warning'> actualizar </button> </a> </td>

                                            <td> <a href='usuarioControlador.php?action=borrar&id=$id&nombre=$nombre'> <button class='btn btn-danger'> eliminar </button> </a> </td>
                                            
                                            </tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Dark table end -->
    </div>