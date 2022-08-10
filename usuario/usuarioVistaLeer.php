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

    <?php $usuarios = $conn->query("SELECT * FROM usuario"); ?>

    <div class="container pt-4 p-3">
      <div class="row">
        <?php foreach ($usuarios as $usuario) : ?>
          <style>
            html {
              font-size: 14px;
            }

            .container {
              font-size: 14px;
              color: #666666;
              font-family: "Open Sans";
            }
          </style>

          <div class="col-md-4 mb-4">
            <!-- Copy the content below until next comment -->
            <div class="card card-custom bg-white border-white border-0">
              <div class="card-custom-img" style="background-image: url(http://res.cloudinary.com/d3/image/upload/c_scale,q_auto:good,w_1110/trianglify-v1-cs85g_cc5d2i.jpg);"></div>
              <div class="card-custom-avatar">
                <img class="img-fluid" src="<?php if (isset($usuario['foto']) && $usuario['foto'] == "") {
                                              print "imagesUser/3Emexico.png";
                                            } else {
                                              print $usuario['foto'];
                                            }
                                            ?>" alt="Avatar" />
              </div>
              <div class="card-body" style="overflow-y: auto">
                <h4 class="card-title"> <?php print $usuario['nombreCompleto']; ?></h4>
                <br>
                <h6 class="card-text"> <?php print $usuario['correo']; ?></h6>
                <h6 class="card-text"> <?php print $usuario['usuario']; ?></h6>

              </div>
              <!-- <div class="card-footer" style="background: inherit; border-color: inherit;"> -->
              <div class="card-footer">
                <?php if ($_COOKIE['USER'] == $usuario['usuario'] || $_COOKIE['TIPO'] == "ADMINISTRADOR") { ?>

                  <a href="#" class="btn btn-outline-warning ti-file "> Reporte </a>
                  <a href="usuarioControlador.php?action=actualizar&id=<?= $usuario['id'] ?>" class="btn btn-outline-success ti-pencil-alt"> Editar</a>
                  <a href="usuarioControlador.php?action=borrar&id=<?= $usuario['id'] ?>&nombre=<?= $usuario['nombreCompleto'] ?>" class="btn btn-outline-danger ti-trash "> Eliminar </a>

                <?php } ?>
              </div>
            </div>
            <!-- Copy until here -->
          </div>
        <?php endforeach ?>
      </div>
    </div>

  </div>
  <!-- Dark table end -->
</div>