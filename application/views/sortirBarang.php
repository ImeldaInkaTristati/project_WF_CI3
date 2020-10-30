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
    <div class="card-header"><i class="fa fa-list"></i>Data Sortir Barang</div>
    <div class="card-body">
      <!-- <div class="row"> -->
        <div class="col-lg-6 offset-lg-3">Sortir Barang</h4><br>
		<?php echo validation_errors(); ?><br> 

		<?php echo form_open( current_url(), array('class' => 'needs-validation', 'novalidate' => '') ); ?> 
		<!-- <hr><h5>A. DATA DIRI</h5><hr><br> -->
		<div class="form-group">
			<label for="">Nama Barang</label>
			<input type="text" class="form-control" name="kd_masuk" value="<?php echo set_value('kd_masuk', $barang->kd_masuk) ?>" disabled>
			<!-- <input type="text" class="form-control" name="nm_pembeli" placeholder="" required> -->
			<div class="invalid-feedback">Mohon isikan Nama Barang</div>
		</div>
		<div class="form-group">
			<label for="">Jumlah Barang Masuk dalam KG</label>
			<input type="text" class="form-control" name="jumlahMasuk" value="<?php echo set_value('jumlah', $barang->jumlahMasuk) ?>" disabled>
		</div>
		<div class="form-group">
			<label for="">Jumlah Ready dalam KG</label>
			<input type="text" class="form-control" name="ready" placeholder="2000" value="<?php echo set_value('ready') ?>" required>
		</div><br>
		
		<hr>
		<button id="submitBtn" type="submit" class="btn btn-primary">Edit</button>
		<a href="<?php echo base_url('Barang/barangMasuk/') ?>" class="btn btn-secondary">Cancel</a><hr>
		<br>



        </div>
      <!-- </div> -->
    </div>
  </div>
</div>
</div>