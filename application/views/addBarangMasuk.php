<div class="content-wrapper"> <!-- "keseluruhan konten" -->
  <div class="container-fluid"> <!-- isi content -->
<!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Data Barang</li>
  </ol>

  <!-- Menampilkan data kategori-->
  <div class="card mb-3">
    <div class="card-header"><i class="fa fa-list"></i>Data Barang Masuk</div>
    <div class="card-body">
      <!-- <div class="row"> -->
        <div class="col-lg-6 offset-lg-3">

		<h4 align="center">Tambah Data Barang Masuk</h4><br>
		<?php echo validation_errors(); ?><br> 

		<?php echo form_open( 'barang/addBarangMasuk', array('class' => 'needs-validation', 'novalidate' => '') ); ?> 
		<!-- <hr><h5>A. DATA DIRI</h5><hr><br> -->
		<div class="form-group">
			<label for="">Nama Barang</label>
			<!-- <input type="text" class="form-control" name="nama" placeholder="Meja v5" value="<?php //echo set_value('nama') ?>" required> -->
			<!-- <input type="text" class="form-control" name="supplier" placeholder="PT Otsuka" required> -->
			<?php echo form_dropdown('kd_brg', $barang, set_value('kd_brg'), 'class="form-control" required' ); ?>
			<div class="invalid-feedback">Mohon isikan Nama Barang</div>
		</div>
		<div class="form-group">
			<label for="">Jumlah Barang Masuk dalam KG</label>
			<input type="text" class="form-control" name="jumlahMasuk" placeholder="5000" value="<?php echo set_value('jumlahMasuk') ?>" required>
			<!-- <input type="text" class="form-control" name="nm_pembeli" placeholder="" required> -->
			<div class="invalid-feedback">Mohon isikan jumlah Barang</div>
		</div>
		<div class="form-group">
			<label for="">Tanggal</label>
			<input type="date" class="form-control" name="tanggal" value="<?php echo set_value('tanggal') ?>" required>
			<!-- <input type="text" class="form-control" name="nm_pembeli" placeholder="" required> -->
			<div class="invalid-feedback">Mohon isikan tanggal barang masuk</div>
		</div><br>
		
		<hr>
		<button id="submitBtn" type="submit" class="btn btn-primary">Simpan</button>
		<a href="<?php echo base_url('Barang/barangMasuk/') ?>" class="btn btn-secondary">Cancel</a><hr>
		<br>



        </div>
      <!-- </div> -->
    </div>
  </div>
</div>
</div>