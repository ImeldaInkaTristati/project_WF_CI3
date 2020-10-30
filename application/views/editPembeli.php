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

        <!-- <?php echo form_open(current_url()); ?> -->
		
		<?php echo validation_errors(); ?><br>

		<?php echo form_open(current_url(), array('class' => 'needs-validation', 'novalidate' => '') ); ?> 
		<h4 align="center">Edit Data Pembeli</h4><br>
		<!-- <hr><h5>A. DATA DIRI</h5><hr><br> -->
		<!-- <div class="form-group">
			<label for="">Kode Pembeli</label>
			<input type="text" class="form-control" name="kd_pembeli" value="<?php //echo $kd_pembeli ?>" >
			<div class="invalid-feedback">Mohon isikan Nama Barang</div>
		</div> -->
		<div class="form-group">
			<label for="">Nama Pembeli</label>
			<input type="text" class="form-control" name="nm_pembeli"  value="<?php echo set_value('nm_pembeli', $pembeli->nm_pembeli) ?>" required >
			<div class="invalid-feedback">Mohon isikan Nama Pembeli</div>
		</div>

		<div class="form-group">
			<label for="alamat">Alamat Lengkap</label>
			<textarea class="form-control" name="alamat" rows="3" placeholder="jl Jalan gg2 no 2020 RT 03 RW 09 kel Bunul kec Blimbing kota Malang kodepos 1234" required><?php echo set_value('alamat', $pembeli->alamat) ?></textarea>
			<div class="invalid-feedback">Mohon isikan alamat lengkap Pembeli</div>
		</div>

		<div class="form-group">
			<label for="">No Telpon</label>
			<input type="text" class="form-control" name="telpon"value="<?php echo set_value('telpon', $pembeli->telpon) ?>" required>
			<!-- <input type="text" class="form-control" name="telpon" placeholder="" required> -->
			<div class="invalid-feedback">Mohon isikan No Telpon Pembeli</div>
		</div>

		<div class="form-group">
			<label for="">Email</label>
			<input type="email" class="form-control" name="email" placeholder="john@gmail.com" value="<?php echo set_value('email', $pembeli->email) ?>" required>
			<!-- <input type="email" class="form-control" name="email" placeholder="" required> -->
			<div class="invalid-feedback">Mohon isikan email Pembeli</div>
		</div><br>
		
		<hr>
		<button id="submitBtn" type="submit" class="btn btn-primary">Update</button>
		<a href="<?php echo base_url('Pembeli/') ?>" class="btn btn-secondary">Cancel</a><hr>
		<br>



        </div>
      <!-- </div> -->
    </div>
  </div>
</div>
</div>