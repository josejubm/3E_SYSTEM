<!-- page container area start -->
<div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="index.html"><img src="imagesUser/3Emexico.png" alt="logo"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li >
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-table"></i><span>Usuario</span></a>
                                <ul class="collapse">
                                <li class="active"><a href="usuarioControlador.php?action=leer"> Usuarios </a></li>
                                    <li class="active"><a href="usuarioControlador.php?action=agregar">Agregar Usuario</a></li>
                                    <?php if ($_COOKIE['TIPO'] == "ADMINISTRADOR") { ?>
                                        <li class="active"><a href="usuarioControlador.php?action=table">Tabla Usuarios</a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        