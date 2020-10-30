<div class="content-wrapper"> <!-- "keseluruhan konten" -->
  <div class="container-fluid"> <!-- isi content -->
<!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Data Supplier</li>
  </ol>

  <!-- Menampilkan data kategori-->
  <div class="card mb-3">
    <div class="card-header"><i class="fa fa-list"></i>Data Supplier</div>
    <div class="card-body">
      <!-- <div class="row"> -->
        <div class="col-lg-6 offset-lg-3">

		<h4 align="center">Edit Data Supplier</h4><br>
		
		<?php echo validation_errors(); ?><br>


		<?php echo form_open(current_url(), array('class' => 'needs-validation', 'novalidate' => '') ); ?> 
		<!-- <hr><h5>A. DATA DIRI</h5><hr><br> -->
		<!-- <div class="form-group">
			<label for="">Kode Supplier</label>
			<input type="text" class="form-control" name="kd_supplier" value="<?php //echo $kd_supplier ?>" >
			<div class="invalid-feedback">Mohon isikan Nama Barang</div>
		</div> -->
		<div class="form-group">
			<label for="">Nama Supplier</label>
			<input type="text" class="form-control" name="nama"  value="<?php echo set_value('nama', $supplier->nama) ?>" required >
			<div class="invalid-feedback">Mohon isikan Nama Suppier</div>
		</div>

		<div class="form-group">
			<label for="alamat">Alamat Lengkap</label>
			<textarea class="form-control" name="alamat" rows="3" placeholder="jl Jalan gg2 no 2020 RT 03 RW 09 kel Bunul kec Blimbing kota Malang kodepos 1234" required><?php echo set_value('alamat', $supplier->alamat) ?></textarea>
			<div class="invalid-feedback">Mohon isikan alamat lengkap Supplier</div>
		</div>

		<div class="form-group">
			<label for="">No Telpon</label>
			<input type="text" class="form-control" name="telpon"value="<?php echo set_value('telpon', $supplier->telpon) ?>" required>
			<!-- <input type="text" class="form-control" name="telpon" placeholder="" required> -->
			<div class="invalid-feedback">Mohon isikan No Telpon Supplier</div>
		</div>

		<div class="form-group">
			<label for="">Email</label>
			<input type="email" class="form-control" name="email" value="<?php echo set_value('email', $supplier->email) ?>" required>
			<!-- <input type="email" class="form-control" name="email" placeholder="" required> -->
			<div class="invalid-feedback">Mohon isikan email Supplier</div>
		</div><br>
		
		<hr>
		<button id="submitBtn" type="submit" class="btn btn-primary">Simpan</button>
		<a href="<?php echo base_url('Supplier/') ?>" class="btn btn-secondary">Cancel</a><hr>
		<br>



        </div>
      <!-- </div> -->
    </div>
  </div>
</div>
</div>