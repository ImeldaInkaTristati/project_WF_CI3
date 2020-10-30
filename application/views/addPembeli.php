<div class="content-wrapper"> <!-- "keseluruhan konten" -->
  <div class="container-fluid"> <!-- isi content -->
<!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Data Pembeli</li>
  </ol>

  <!-- Menampilkan data kategori-->
  <div class="card mb-3">
    <div class="card-header"><i class="fa fa-list"></i>Data Pembeli</div>
    <div class="card-body">
      <!-- <div class="row"> -->
        <div class="col-lg-6 offset-lg-3">


		<?php echo validation_errors(); ?><br>
 
		<?php
		 // echo (isset( $upload_error)) ? '<div class="alert alert-warning" role="alert">' .$upload_error. '</div>' : ''; 
		 ?>  

		<?php echo form_open( 'Pembeli/do_insert', array('class' => 'needs-validation', 'novalidate' => '') ); ?> 
		<h4 align="center">Tambah Data Pembeli</h4><br>
		<!-- <hr><h5>A. DATA DIRI</h5><hr><br> -->
		<!-- <div class="form-group">
			<label for="">Kode Pembeli</label>
			<input type="text" class="form-control" name="nama" placeholder="Meja v5" value="<?php //echo set_value('nama') ?>" required> 
			<input type="text" class="form-control" name="kd_pembeli" placeholder="" required>
			<div class="invalid-feedback">Mohon isikan Nama Barang</div>
		</div> -->
		<div class="form-group">
			<label for="">Nama Pembeli</label>
			<input type="text" class="form-control" name="nm_pembeli" placeholder="John Doe" value="<?php echo set_value('nm_pembeli') ?>" required>
			<!-- <input type="text" class="form-control" name="nm_pembeli" placeholder="" required> -->
			<div class="invalid-feedback">Mohon isikan Nama Pembeli</div>
		</div>

		<div class="form-group">
			<label for="alamat">Alamat Lengkap</label>
			<textarea class="form-control" name="alamat" rows="3" placeholder="jl Jalan gg2 no 2020 RT 03 RW 09 kel Bunul kec Blimbing kota Malang kodepos 1234" required><?php echo set_value('alamat') ?></textarea>
			<div class="invalid-feedback">Mohon isikan alamat lengkap Anda</div>
		</div>

		<div class="form-group">
			<label for="">No Telpon</label>
			<input type="text" class="form-control" name="telpon" placeholder="0812345678" value="<?php echo set_value('telpon') ?>" required>
			<!-- <input type="text" class="form-control" name="telpon" placeholder="" required> -->
			<div class="invalid-feedback">Mohon isikan No Telpon Pembeli</div>
		</div>

		<div class="form-group">
			<label for="">Email</label>
			<input type="email" class="form-control" name="email" placeholder="john@gmail.com" value="<?php echo set_value('email') ?>" required>
			<!-- <input type="email" class="form-control" name="email" placeholder="" required> -->
			<div class="invalid-feedback">Mohon isikan email Pembeli</div>
		</div><br>
		
		<hr>
		<button id="submitBtn" type="submit" class="btn btn-primary">Simpan</button>
		<a href="<?php echo base_url('Pembeli/') ?>" class="btn btn-secondary">Cancel</a><hr>
		<br>



        </div>
      <!-- </div> -->
    </div>
  </div>
</div>
</div>