
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
                <i class="fa fa-edit"></i>
              </div>
              <div class="mr-5">
                <?php
                  // $query = mysqli_query($mysqli, "SELECT * FROM barang");
                  //  $a=mysqli_num_rows($query);
                  //   echo $a." Total Barang";
                // echo $data." Total pendaftar";
                 echo "<h5>".$this->m_admin->get_total_barang()." Total Barang</h5>";
                 // echo "<h5>".$totalbarang." Total Barang</h5>";
                // echo "<h5>Total Barang</h5>";
                ?>
              </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="<?php echo site_url().'Barang/' ?>">
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
                <i class="fa fa-user-plus"></i>
              </div>
              <div class="mr-5">
                <?php
                  // $query = mysqli_query($mysqli, "SELECT * FROM supplier");
                   // $a=mysqli_num_rows($query);
                    // echo $a." Total SUPLIER";
                // echo $data." Total pendaftar";
                 // echo "<h5>".$this->m_admin->get_totalSuplier()." Total Suplier</h5>";
                echo "<h5>".$this->m_admin->get_total_supplier()." Total Suplier</h5>";
                // echo "<h5>".$totalsuplier." Total Suplier</h5>";
                echo "<h5>Total Supplier</h5>";
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
                <i class="fa fa-fw fa-user"></i>
              </div>
              <div class="mr-5">
                <?php
                  //$query = mysqli_query($mysqli, "SELECT * FROM pembeli");
                  //$a=mysqli_num_rows($query);
                  //echo $a." Total Pembeli";
                //echo "<h5>".$this->M_admin->get_totalPembeli()." Detail Pembeli</h5>";
                // echo "<h5>".$totalpembeli." Total Pembeli</h5>";
                echo "<h5>".$this->m_admin->get_total_pembeli()." Total Pembeli</h5>";
                // echo "<h5>  Total Pembeli</h5>";
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
                <i class="fa fa-envelope"></i>
              </div>
              <div class="mr-5">
                <?php
                  //$query = mysqli_query($mysqli, "SELECT * FROM work_order");
                  // $a=mysqli_num_rows($query);
                  //   echo $a." Total Records";
                //echo "<h5>".$this->model_admin->get_totalDaftar()." Detail Seleksi</h5>";
                // echo "<h5>".$totalorder." Total Order</h5>";
                echo "<h5>".$this->m_admin->get_total_order()." Total Order</h5>";
               // echo "<h5> Total Work Order</h5>"; 
                ?>
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

