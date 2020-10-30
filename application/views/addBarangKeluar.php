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
    <div class="card-header"><i class="fa fa-list"></i>Data Barang Keluar</div>
    <div class="card-body">
      <!-- <div class="row"> -->
        <div class="col-lg-6 offset-lg-3">

		<h4 align="center">Tambah Data Barang Keluar</h4><br>
		<?php echo validation_errors(); ?><br> 

		<?php echo form_open( 'barangKeluar/addBarangKeluar', array('class' => 'needs-validation', 'novalidate' => '') ); ?> 
		<!-- <hr><h5>A. DATA DIRI</h5><hr><br> -->
		<div class="form-group">
			<label for="">Nama Pembeli</label>
			<!-- <input type="text" class="form-control" name="nama" placeholder="Meja v5" value="<?php //echo set_value('nama') ?>" required> -->
			<!-- <input type="text" class="form-control" name="supplier" placeholder="PT Otsuka" required> -->
			<?php echo form_dropdown('kd_pembeli', $pembeli, set_value('kd_pembeli'), 'class="form-control" required' ); ?>
			<div class="invalid-feedback">Mohon isikan Nama Pembeli</div>
		</div>
		<div class="form-group">
			<label for="">Nama Barang</label>
			<!-- <input type="text" class="form-control" name="nama" placeholder="Meja v5" value="<?php //echo set_value('nama') ?>" required> -->
			<!-- <input type="text" class="form-control" name="supplier" placeholder="PT Otsuka" required> -->
			<?php echo form_dropdown('kd_brg', $barang, set_value('kd_brg'), 'class="form-control" required' ); ?>
			<div class="invalid-feedback">Mohon isikan Nama Barang</div>
		</div>
		<div class="form-group">
			<label for="">Jumlah Barang Keluar dalam KG</label>
			<input type="text" class="form-control" name="jumlahKeluar" placeholder="5000" value="<?php echo set_value('jumlahKeluar') ?>" required>
			<!-- <input type="text" class="form-control" name="nm_pembeli" placeholder="" required> -->
			<div class="invalid-feedback">Mohon isikan jumlah Barang</div>
		</div>
		<div class="form-group">
			<label for="">Tanggal</label>
			<input type="date" class="form-control" name="tanggal" value="<?php echo set_value('tanggal') ?>" required>
			<!-- <input type="text" class="form-control" name="nm_pembeli" placeholder="" required> -->
			<div class="invalid-feedback">Mohon isikan tanggal barang</div>
		</div><br>
		
		<hr>
		<button id="submitBtn" type="submit" class="btn btn-primary">Simpan</button>
		<a href="<?php echo base_url('BarangKeluar/') ?>" class="btn btn-secondary">Cancel</a><hr>
		<br>



        </div>
      <!-- </div> -->
    </div>
  </div>
</div>
</div>