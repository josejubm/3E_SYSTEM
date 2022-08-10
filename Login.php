<?php

use LDAP\Result;

require_once('libraries/Auth/Auth.php');
require_once('libraries/funciones.php');

$head = CargarPagina('template/HeadLogin.php');
print $head;
?>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- login area start -->
    <div class="login-area">
        <div class="container">
            <div class="login-box ptb--100">
                <form method="POST" action='Auth.php'>
                    <div class="login-form-head">
                        <h4>¡Bienvenido de nuevo!</h4>
                        <div>  <!-- alert -->
                        <?php if ($resultado['STATUS'] == "ERROR") { ?>
                            <br>
                            <h6 class="text-danger display-6">
                                <i class="ti-close"> <?php print_r($resultado['MENSAJE']) ?></i>
                            </h6>
                        <?php } ?>
                    </div>  <!-- end alert -->
                    </div>
                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="exampleInputEmail1">User</label>
                            <input type="text" id="user" name="user">
                            <i class="ti-user"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" id="password" name="password">
                            <i class="ti-lock"></i>
                            <div class="text-danger"></div>
                        </div>

                        <input type="hidden" name="action" value="login">

                        <div class="row mb-4 rmber-area">
                            <div class="col-6">
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                    <label class="custom-control-label" for="customControlAutosizing">Remember Me</label>
                                </div>
                            </div>
                            <div class="col-6 text-right">
                                <a href="#">Forgot Password?</a>
                            </div>
                        </div>
                        <div class="submit-btn-area">
                            <button href="Auth.php?action=login" id="form_submit" type="submit">iniciar sesión<i class="ti-arrow-right"></i></button>
                        </div>
                        <div class="form-footer text-center mt-5">
                            <p class="text-muted">Don't have an account? <a href="register.html">Sign up</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- login area end -->
    <?php
    $scripts = CargarPagina('template/ScriptsLogin.php');
    print $scripts
    ?>