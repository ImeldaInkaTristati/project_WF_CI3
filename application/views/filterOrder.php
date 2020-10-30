<div class="content-wrapper"> <!-- "keseluruhan konten" -->
  <div class="container-fluid"> <!-- isi content -->
<!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Filter Data Order Barang</li>
  </ol>

  <!-- Menampilkan data kategori-->
  <!-- <?php echo validation_errors(); ?><br>  -->

  <?php echo form_open( 'Laporan/cetakLaporanOrder/', array('class' => 'needs-validation', 'novalidate' => '') ); ?> 
  <div class="card mb-3">
    <div class="card-header"><i class="fa fa-sitemap"></i>Form Filter Data Order Barang</div>
    <div class="card-body">
    <h5 align="center">Lihat Laporan Sesuai Tanggal</h5><br><br>
      <div class="row">
        <div class="col-lg-4 offset-lg-4">
          <h6>Filter Awal</h6>
          <div class="form-group">
              <!-- <label for="">Tanggal Awal</label> -->
              <!-- <input type="text" class="form-control" name="nama" placeholder="Meja v5" value="<?php //echo set_value('nama') ?>" required> -->
              <input type="date" class="form-control" name="tglAwal">
              <!-- <div class="invalid-feedback">Mohon isikan Nama Barang</div> -->
          </div>
        </div>
        <div class="col-lg-4 offset-lg-4">
        <h6>Filter Akhir</h6>
            <div class="form-group">
              <!-- <label for="">Tanggal Akhir</label> -->
              <!-- <input type="text" class="form-control" name="nama" placeholder="Meja v5" value="<?php //echo set_value('nama') ?>" required> -->
              <input type="date" class="form-control" name="tglAkhir">
              <!-- <div class="invalid-feedback">Mohon isikan Nama Barang</div> -->
            </div>
        </div> <br>
        <div class="col-lg-4 offset-lg-4">
            <!-- <a href="<?php //echo site_url('Laporan/filterLaporanKeluar/') ?>" class="btn btn-primary">Lihat Laporan</a> -->
            <button id="submitBtn" type="submit" class="btn btn-primary">Cetak Laporan</button>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

