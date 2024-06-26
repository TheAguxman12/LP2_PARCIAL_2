<?php
include("./functions/header.php");
require ('./functions/test_listado.php');



$viajes = listado($connection,$_SESSION['user_id']);

?>
    <div class="pagetitle">
      <h1>Lista de viajes registrados</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Viajes</li>
          <li class="breadcrumb-item active">Listado</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">


          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Viajes cargados</h5>

              <!-- Default Table -->
              <table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Fecha Viaje</th>
            <th scope="col">Destino</th>
            <th scope="col">Camión</th>
            <th scope="col">Chofer</th>
            <?php if($_SESSION['nivel'] >= 2): ?>
            <th>Costo Viaje</th>
            <?php endif ?>
            <?php if ($_SESSION['nivel'] <= 1 || $_SESSION['nivel'] >=3 ): ?>
            <th>Monto Chofer</th>
            <?php endif ?>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($viajes as $index => $viaje): ?>
        <?php $estado = calculo_viaje($viaje['fecha_viaje']) ?>
        <tr class="table-<?=$estado['estado']?>" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-original-title="<?=$estado['mensaje']?>">
            <th scope="row"><?php echo $index + 1; ?></th>
            <td><?php echo date('d/m/Y', strtotime($viaje['fecha_viaje'])); ?></td>
            <td><?php echo $viaje['destino']; ?></td>
            <td><?php echo $viaje['camion']; ?></td>
            <td><?php echo $viaje['chofer']; ?></td>
            <?php if ($_SESSION['nivel'] >= 2): ?>
                <td><?php echo '$ ' . number_format($viaje['costo_viaje'], 2); ?></td>
            <?php endif; ?>
            <?php if ($_SESSION['nivel'] <= 1 || $_SESSION['nivel'] >=3 ): ?>
                <td>
                    <?php echo $viaje['monto_chofer']; ?>
                    <?php if ($_SESSION['nivel'] >= 3): ?>
                        <?php echo '('.$viaje['porcentaje_chofer'].'%)'; ?>
                    <?php endif; ?>
                </td>
            <?php endif; ?>
        </tr>
    <?php endforeach; ?>
</tbody>

</table>
              <!-- End Default Table Example -->


            </div>
          </div>
        </div>




      </div>
    </section>

  </main><!-- End #main -->


  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script> -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>-->
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>

  <!--<script src="assets/vendor/php-email-form/validate.js"></script> -->

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>
</html>