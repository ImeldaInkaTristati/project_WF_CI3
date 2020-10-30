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
    <div class="card-header"><i class="fa fa-list"></i>Data Barang</div>
    <div class="card-body">
      <!-- <div class="row"> -->
        <div class="col-lg-6 offset-lg-3">

		<?php    
			// $this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert">', '</div>');
		?>

		<!-- <?php //echo (isset( $upload_error)) ? '<div class="alert alert-warning" role="alert">' .$upload_error. '</div>' : ''; ?> -->

		<!-- <?php //echo form_open( current_url(), array('class' => 'needs-validation', 'novalidate' => '') ); ?> -->
		<h4 align="center">Tambah Data Barang</h4><br>
		<?php echo validation_errors(); ?><br> 

		<?php echo form_open( 'barang/addBarang', array('class' => 'needs-validation', 'novalidate' => '') ); ?> 
		<!-- <hr><h5>A. DATA DIRI</h5><hr><br> -->
		<div class="form-group">
			<label for="">Nama Barang</label> 
			<input type="text" class="form-control" name="nm_brg" placeholder="Pupuk Kompos" value="<?php echo set_value('nm_brg') ?>" required>
			<!-- <input type="text" class="form-control" name="nm_pembeli" placeholder="" required> -->
			<div class="invalid-feedback">Mohon isikan Nama Barang</div>
		</div>
		<div class="form-group">
			<label for="">Supplier</label>
			<!-- <input type="text" class="form-control" name="nama" placeholder="Meja v5" value="<?php //echo set_value('nama') ?>" required> -->
			<!-- <input type="text" class="form-control" name="supplier" placeholder="PT Otsuka" required> -->
			<?php echo form_dropdown('kd_supplier', $supplier, set_value('kd_supplier'), 'class="form-control" required' ); ?>
			<div class="invalid-feedback">Mohon isikan Nama Supplier</div>
		</div><br>
		
		<hr>
		<button id="submitBtn" type="submit" class="btn btn-primary">Simpan</button>
		<a href="<?php echo base_url('Barang/') ?>" class="btn btn-secondary">Cancel</a><hr>
		<br>



        </div>
      <!-- </div> -->
    </div>
  </div>
</div>
</div>