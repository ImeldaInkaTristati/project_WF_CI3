<?php 
  // include "sidebaradmin.php"; //memanggil file sidebaradmin.php sebagai template halaman admin
?>
  <div class="content-wrapper"> <!-- "keseluruhan konten" -->
    <div class="container-fluid"> <!-- isi content -->

      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>

      <!-- Icon Cards-->
      <div class="row">

      <div class="col-xl-3 col-sm-6 mb-3"> 
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-user"></i>
              </div>
              <div class="mr-5">
                <?php
                  // $query = mysqli_query($mysqli, "SELECT * FROM user");
                  // $a=mysqli_num_rows($query);
                  //   echo $a." Total Users";
                // echo $data." Total pendaftar";
                // echo "<h5>".$this->model_admin->get_totalDaftar()." Total Pendaftar</h5>";
                echo "<h5>".$totalBarang." Total Barang</h5>";
                // echo "<h5>298 Jenis Barang</h5>";
                ?>
              </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="<?php echo site_url().'BarangMasuk/' ?>">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div> 
        </div>

        <!-- jumlah pengguna -->
        <div class="col-xl-3 col-sm-6 mb-3"> 
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-user"></i>
              </div>
              <div class="mr-5">
                <?php
                  // $query = mysqli_query($mysqli, "SELECT * FROM user");
                  // $a=mysqli_num_rows($query);
                  //   echo $a." Total Users";
                // echo $data." Total pendaftar";
                // echo "<h5>".$this->model_admin->get_totalDaftar()." Total Pendaftar</h5>";
                // echo "<h5>".$totaldaftar." Total Pendaftar</h5>";
                echo "<h5>298 Total Supplier</h5>";
                ?>
              </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="<?php echo site_url().'Supplier/' ?>">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div> 
        </div>


        <!-- jumlah record -->
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-sitemap"></i>
              </div>
              <div class="mr-5">
                <?php
                  // $query = mysqli_query($mysqli, "SELECT * FROM record");
                  // $a=mysqli_num_rows($query);
                  //   echo $a." Total Records";
                // echo "<h5>".$this->model_admin->get_totalDaftar()." Detail Seleksi</h5>";
                echo "<h5> 198 Total Pembeli</h5>";
                ?>
              </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="<?php echo site_url().'Pembeli/' ?>">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>

        <!-- jumlah kategori -->
        <div class="col-xl-3 col-sm-6 mb-3"> 
          <div class="card text-white bg-warning o-hidden h-100"> 
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-list"></i>
              </div>
              <div class="mr-5">
                <?php echo "65 Total Work Order</h5>" ?>
              </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="<?php echo site_url().'WorkOrder/' ?>">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>

        <!-- jumlah pertanyaan -->
       <!--  <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-question"></i>
              </div>
              <div class="mr-5">
                <?php
                  // $query = mysqli_query($mysqli, "SELECT * FROM pertanyaan");
                  // $a=mysqli_num_rows($query);
                  //   echo $a." Total Questions";
                ?>
              </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="pertanyaan.php">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div> -->
        
      </div>
      </div>
    </div>

<?php 
// include "footer.php"; 
?> <!-- memanggil file footer.php -->

</body>

</html>

