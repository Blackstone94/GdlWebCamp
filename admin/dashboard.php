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
      <div class="card-body">
        <h2 class="content-header">Graficas</h2>
        <div class="row">
          <div class="col-12">
            <div class="card card-info">
                <div class="card-header">
                      <h3 class="card-title">Datos de registros</h3>
                </div>
                <div class="card-body">
                  <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                    <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 333px;" width="333" height="250" class="chartjs-render-monitor"></canvas>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
          </div><!-- /.col-12 -->
        </div><!-- /.row -->
      </div><!-- /.card-body -->

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

      <h2>Regalos</h2>
      <div class="row">

        <div class="col-lg-3 col-xs-6">
            <?php
                $sql="SELECT COUNT(id_registrado) as pulseras FROM registrados WHERE regalo=1";
                $stmt=$conn->query($sql);
                $resultado=$stmt->fetch_assoc();
            ?>
            <!-- small box -->
            <div class="small-box bg-teal">
              <div class="inner">
                <h3><?php echo $resultado['pulseras']; ?></h3>
                <p>Pulseras totales</p>
              </div>
              <div class="icon">
                 <i class="fas fa-gift"></i>
              </div>
              <a href="lista-registrados.php" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div><!--fin col-->

          <div class="col-lg-3 col-xs-6">
            <?php
                $sql="SELECT COUNT(id_registrado) as etiquetas FROM registrados WHERE regalo=2";
                $stmt=$conn->query($sql);
                $resultado=$stmt->fetch_assoc();
            ?>
            <!-- small box -->
            <div class="small-box bg-fuchsia">
              <div class="inner">
                <h3><?php echo $resultado['etiquetas']; ?></h3>
                <p>Etiquetas totales</p>
              </div>
              <div class="icon">
                 <i class="fas fa-gift"></i>
              </div>
              <a href="lista-registrados.php" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div><!--fin col-->

          <div class="col-lg-3 col-xs-6">
            <?php
                $sql="SELECT COUNT(id_registrado) as plumas FROM registrados WHERE regalo=3";
                $stmt=$conn->query($sql);
                $resultado=$stmt->fetch_assoc();
            ?>
            <!-- small box -->
            <div class="small-box bg-purple">
              <div class="inner">
                <h3><?php echo $resultado['plumas']; ?></h3>
                <p>Plumas totales</p>
              </div>
              <div class="icon">
                 <i class="fas fa-gift"></i>
              </div>
              <a href="lista-registrados.php" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div><!--fin col-->

      </div><!--fin row-->

    </section>
  </div>
  <!-- /.content-wrapper -->

  <?php include_once 'templates/footer.php'?>

