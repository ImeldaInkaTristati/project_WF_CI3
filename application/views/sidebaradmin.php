<?php
// include "../connection.php"; //memanggil file connection.php untuk koneksi ke database
// session_start(); //memulai session
// if(isset($_SESSION['username'])){ //jika session username terisi
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Sistem Informasi Inventory</title> 
  
  <!-- file css yang dibutuhkan -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/vendor/bootstrap/css/bootstrap.min.css'?>">
  <link rel="stylesheet" href="<?php echo base_url().'assets/vendor/font-awesome/css/font-awesome.min.css'?>">
  <link rel="stylesheet" href="<?php echo base_url().'assets/vendor/datatables/dataTables.bootstrap4.css'?>">
  <link rel="stylesheet" href="<?php echo base_url().'assets/css/sb-admin.css'?>">
  <!-- <link rel="stylesheet" href="<?php //echo base_url().'assets/css/responsive.bootstrap.min.css'?>"> -->
</head>

<!-- body -->
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="admin.php">Sistem Informasi Inventory</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="<?php echo site_url().'Admin/' ?>">
            <i class="fa fa-fw fa-dashboard"></i>
            <!-- <?php $username //= $this->session->userdata('username'); ?> -->
            <!-- <span class="nav-link-text"><?php //echo $username; ?>'s Dashboard</span> -->
            <?php $username = $this->session->userdata('username'); ?>
            <!-- <a href="<?php //echo site_url().'User/' ?>"><?php echo $username; ?>'s Home</a> -->
            <span class="nav-link-text"><?php echo $username; ?>'s Dashboard</span>
          </a>
        </li>
        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Data Barang">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">Data Barang</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="<?php echo site_url().'Barang/' ?>">Data Barang</a>
            </li>
            <li>
              <a href="<?php echo site_url().'Barang/barangMasuk/' ?>">Data Barang Masuk</a>
            </li>
            <li>
              <a href="<?php echo site_url().'BarangKeluar/' ?>">Data Barang Keluar</a>
            </li>
          </ul>
        </li>
        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Data Work Order">
          <a class="nav-link" href="<?php echo site_url().'Order/' ?>">
            <i class="fa fa-fw fa-trophy"></i>
            <span class="nav-link-text">Data Work Order</span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Data Supplier">
          <a class="nav-link" href="<?php echo site_url().'Supplier/' ?>">
            <i class="fa fa-fw fa-book"></i>
            <span class="nav-link-text">Data Supplier</span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Data Pembeli">
          <a class="nav-link" href="<?php echo site_url().'Pembeli/' ?>">
            <i class="fa fa-fw fa-sitemap"></i>
            <span class="nav-link-text">Data Pembeli</span>
          </a>
        </li>

        <!-- <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Laporan">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents2" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">Laporan</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents2">
            <li>
              <a href="<?php echo site_url().'Laporan/laporanKeluar/' ?>">Laporan</a>
            </li>
            <li>
              <a href="<?php echo site_url().'LaporanMasuk/' ?>" target="_blank">Data Sortir Barang</a>
            </li>
            <!-- <li>
              <a href="<?php echo site_url().'Barang/barangMasuk/' ?>">Data Sortir Barang</a>
            </li> 
            <li>
              <a href="<?php echo site_url().'LaporanKeluar/' ?>" target="_blank">Data Barang Keluar</a>
            </li>
            <li>
              <a href="<?php echo site_url().'LaporanOrder/' ?>" target="_blank">Data Work Order</a>
            </li>
          </ul>
        </li> -->

      </ul>
      <ul class="navbar-nav sidenav-toggler"> <!-- navigasi atas -->
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <!-- <a class="nav-link" data-toggle="modal" data-target="#exampleModal"> -->
            <a class="nav-link" href="<?php echo site_url().'Admin/logout/' ?>">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>    

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>


<!-- Logout Modal-->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Yakin ingin Logout?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Pilih tombol "Logout" untuk keluar dari halaman admin</div>
      <div class="modal-footer">
        <form action="../logout.php" method="post">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="../../index.php">Logout</a> 
          <input type="submit" class="btn btn-primary" name="logout" value="Logout">
        </form>
      </div>
    </div>
  </div>
</div> -->

<?php 
// } else { 
  ?> <!-- jika session username kosong, akan diarahkan ke halaman utama -->
  <!-- <script type="text/javascript">
    alert("Silahkan Login dulu");
  </script> -->

<?php 
// header("Location: ../../index.php"); } 
?>

    <!-- File js yang dibutuhkan -->
    <!-- <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../../vendor/datatables/jquery.dataTables.js"></script>
    <script src="../../vendor/datatables/dataTables.bootstrap4.js"></script>
    <script src="../../js/sb-admin.min.js"></script>
    <script src="../../js/sb-admin-datatables.min.js"></script> -->
    <!-- <script src="../../js/dataTables.responsive.js"></script> -->
    <script src="<?php echo base_url().'assets/vendor/jquery/jquery.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/vendor/bootstrap/js/bootstrap.bundle.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/vendor/jquery-easing/jquery.easing.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/vendor/datatables/jquery.dataTables.js'?>"></script>
    <script src="<?php echo base_url().'assets/vendor/datatables/dataTables.bootstrap4.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/sb-admin.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/sb-admin-datatables.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/dataTables.responsive.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/custom.js'?>"></script>
    
  </div>
</body>
</html>
