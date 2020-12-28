<?php
include_once 'funciones/sesiones.php';
include_once 'funciones/funciones.php';
include_once 'templates/header.php';
include_once 'templates/barra.php';
include_once 'templates/aside.php'?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Dashboard</h1>
    </section>
    <section class="content">
      <div class="row">
         <div class="col-lg-3 col-xs-6">
          <?php
              $sql="SELECT COUNT(id_registrado) as registrados FROM registrados ";
              $stmt=$conn->query($sql);
              $resultado=$stmt->fetch_assoc();
          ?>
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $resultado['registrados']; ?></h3>
                <p>Total registrados</p>
              </div>
              <div class="icon">
                <i class="fa fa-user"></i>
              </div>
              <a href="lista-registrados.php" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div><!--fin col-->

            <div class="col-lg-3 col-xs-6">
                <?php
                    $sql="SELECT COUNT(id_registrado) as registrados FROM registrados where pagado=1";
                    $stmt=$conn->query($sql);
                    $resultado=$stmt->fetch_assoc();
                ?>
                <!-- small box -->
                <div class="small-box bg-info bg-yellow">
                  <div class="inner">
                    <h3><?php echo $resultado['registrados']; ?></h3>
                    <p>Total pagados</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-users"></i>
                  </div>
                  <a href="lista-registrados.php" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                </div><!--fin small box-->
              </div><!--fin col-->

          <div class="col-lg-3 col-xs-6">
            <?php
                $sql="SELECT COUNT(id_registrado) as registrados FROM registrados WHERE pagado=0";
                $stmt=$conn->query($sql);
                $resultado=$stmt->fetch_assoc();
            ?>
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h3><?php echo $resultado['registrados']; ?></h3>
                <p>Total sin pagar</p>
              </div>
              <div class="icon">
                <i class="fa fa-user-times"></i>
              </div>
              <a href="lista-registrados.php" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div><!--fin col-->

          <div class="col-lg-3 col-xs-6">
            <?php
                $sql="SELECT SUM(total_pagado) as ganancias FROM registrados WHERE pagado=1";
                $stmt=$conn->query($sql);
                $resultado=$stmt->fetch_assoc();
            ?>
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <h3>$ <?php echo $resultado['ganancias']; ?></h3>
                <p>Ganacias totales</p>
              </div>
              <div class="icon">
                 <i class="fas fa-dollar-sign"></i>
              </div>
              <a href="lista-registrados.php" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div><!--fin col-->

      </div><!-- fin row-->
    </section>
  </div>
  <!-- /.content-wrapper -->

  <?php include_once 'templates/footer.php'?>
