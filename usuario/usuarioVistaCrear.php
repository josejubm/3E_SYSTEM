<div class="container-fluid">
    <!-- basic form start -->
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Crear Usuario</h4>
                <form action="usuarioControlador.php?action=registrar" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nombre Completo</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" aria-describedby="emailHelp" placeholder="Nombre ">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Usuario</label>
                        <input type="text" class="form-control" id="usuario" name="usuario" aria-describedby="emailHelp" placeholder="Usuario">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Correo">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
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
                            <label class="btn btn-outline-secondary" for="btn-check-1-outlined"><input type="checkbox" class="btn-check" id="btn-check-1-outlined" name="permisoVer" value="ver" autocomplete="off">
                                 Ver</label>
                        </div>
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <label class="btn btn-outline-success" for="btn-check-2-outlined"><input type="checkbox" class="btn-check" id="btn-check-2-outlined" name="permisoCrear" value="crear" autocomplete="off">
                                 Crear</label>
                        </div>

                        <div class="custom-control custom-checkbox custom-control-inline">
                            <label class="btn btn-outline-danger" for="btn-check-3-outlined"><input type="checkbox" class="btn-check" id="btn-check-3-outlined" name="permisoEliminar" value="eliminar" autocomplete="off">
                                 Eliminar</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="foto" class="form-label">FOTO</label>
                        <input class="form-control" type="file" name="foto" id="foto">
                    </div>



                    <br>

                    <input type="submit" class="btn btn-outline-success mb-3" value="Enviar Datos">

                </form>
            </div>
        </div>
    </div>
    <!-- basic form end -->
</div>