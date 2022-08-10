<?php
$id = $_GET["id"];
$resultado = $connection->query("SELECT * FROM usuario WHERE id = $id");
$resultado = $resultado->fetch_all(MYSQLI_ASSOC);

$id = $resultado[0]["id"];
$nombre = $resultado[0]["nombreCompleto"];
$user = $resultado[0]["usuario"];
$correo = $resultado[0]["correo"];
//$fechaActualizacion = date('Y-m-d h:i:s');
$estado = $resultado[0]['estado'];
$foto  = $resultado[0]['foto'];
$permisoVer = $resultado[0]['permisoVer'];
$permisoCrear = $resultado[0]['permisoCrear'];
$permisoEliminar = $resultado[0]['permisoEliminar'];
$image = $resultado[0]['foto'];
?>

<div class="container-fluid">
    <!-- basic form start -->
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Actualizar Usuario</h4>
                <form action="usuarioControlador.php?action=actualizando" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nombre Completo</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" aria-describedby="emailHelp" placeholder="Nombre" value="<?php echo $nombre ?>">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Usuario</label>
                        <input type="text" class="form-control" id="usuario" name="usuario" aria-describedby="emailHelp" placeholder="Usuario" value="<?php echo $user ?>">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Correo" value="<?php echo $correo ?>">
                    </div>

                    <div class="form-group">
                        <label for="activo">Estado</label>
                        <select name="estado" id="estado" class="form-control" required>
                            <option value="1">ACTIVO</option>
                            <option value="0">INACTIVO</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="activo">Tipo</label>
                        <select name="tipo" id="tipo" class="form-control" required>
                            <option value="NORMAL">NORMAL</option>
                            <option value="MOBILIARIO">MOBILIARIO</option>
                            <option value="CLIENTES">CLIENTES</option>
                            <option value="VENTAS">VENTAS</option>
                            <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                        </select>
                    </div>
                    <b class="text-muted mb-3 d-block"> Permisos</b>
                    <div class="form-control">
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <label class="btn btn-outline-secondary" for="btn-check-1-outlined"><input type="checkbox" class="btn-check" id="btn-check-1-outlined" name="permisoVer" value="ver" <?php if ($permisoVer == "ver") {
                                                                                                                                                                                                        print "checked";
                                                                                                                                                                                                    } ?> autocomplete="off">
                                Ver</label>
                        </div>
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <label class="btn btn-outline-success" for="btn-check-2-outlined"><input type="checkbox" class="btn-check" id="btn-check-2-outlined" name="permisoCrear" value="crear" <?php if ($permisoCrear == "crear") {
                                                                                                                                                                                                        print "checked";
                                                                                                                                                                                                    } ?> autocomplete="off">
                                Crear</label>
                        </div>

                        <div class="custom-control custom-checkbox custom-control-inline">
                            <label class="btn btn-outline-danger" for="btn-check-3-outlined"><input type="checkbox" class="btn-check" id="btn-check-3-outlined" name="permisoEliminar" value="eliminar" <?php if ($permisoEliminar == "eliminar") {
                                                                                                                                                                                                            print "checked";
                                                                                                                                                                                                        } ?> autocomplete="off">
                                Eliminar</label>
                        </div>
                    </div>

                    <br>
                    <b class="text-muted mb-3 d-block"> Foto Actual</b>
                    <div class="input-group mb-3">
                        <input type="hidden" value="<?php echo $image ?>" name="fotoAnterior"> </input>
                        <div class="input-group-prepend">
                            <img src="<?php echo $image ?>" width="150px" height="150px" style="float: left" class="rounded float-start label-control" alt="...">
                        </div>
                        
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="simon" name="checkImage" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Mantener Imagen Anterior ? 
                            </label>
                        </div>
                        <br>
                        <input style="width: 61vw; margin-left: 12vw; " type="file" name="fotoactu" id="fotoactu" class="form-control">
                    </div>

                    <input type="hidden" name="id" id="id" value="<?php print $id ?>">
                    <br>
                    <br>

                    <input type="submit" class="btn btn-outline-success mb-3" value="Actualizar Datos">
                </form>
            </div>
        </div>
    </div>
    <!-- basic form end -->
</div>