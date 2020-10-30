<div class="content-wrapper"> <!-- "keseluruhan konten" -->
  <div class="container-fluid"> <!-- isi content -->
<!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Data Order</li>
  </ol>

  <!-- Menampilkan data kategori-->
  <div class="card mb-3">
    <div class="card-header"><i class="fa fa-list"></i>Data Order</div>
    <div class="card-body">
      <!-- <div class="row"> -->
        <div class="col-lg-6 offset-lg-3">

		<?php    
			// $this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert">', '</div>');
		?>

		<!-- <?php //echo (isset( $upload_error)) ? '<div class="alert alert-warning" role="alert">' .$upload_error. '</div>' : ''; ?> -->

		<!-- <?php //echo form_open( current_url(), array('class' => 'needs-validation', 'novalidate' => '') ); ?> -->
		<h4 align="center">Tambah Data Order</h4><br>
		<!-- <?php //echo validation_errors(); ?><br> -->
		<!-- <hr><h5>A. DATA DIRI</h5><hr><br> -->
		<div class="form-group">
			<label>Pembeli</label>
			<select name="pembeli" class="form-control">
				<option>Alfinda Rahmadiarni</option>
				<option>Fadilla Setyabudi</option>
				<option>Revina Laksmi</option>
			</select>
		</div>
		<div class="form-group">
			<label for="">Tanggal Pesan</label>
			<!-- <input type="text" class="form-control" name="nama" placeholder="Meja v5" value="<?php //echo set_value('nama') ?>" required> -->
			<input type="date" class="form-control" name="tglPesan">
			<!-- <div class="invalid-feedback">Mohon isikan Nama Barang</div> -->
		</div>
		<div class="form-group">
			<label>Barang</label>
			<select name="pembeli" class="form-control">
				<option>Pupuk Kompos</option>
				<option>Benih Cabe</option>
				<option>Benih Sawi</option>
			</select>
		</div>
		<div class="form-group">
			<label for="">Jumlah dalam KG</label>
			<!-- <input type="text" class="form-control" name="nama" placeholder="Meja v5" value="<?php //echo set_value('nama') ?>" required> -->
			<input type="text" class="form-control" name="jml" placeholder="30 kg" required>
			<!-- <div class="invalid-feedback">Mohon isikan Nama Barang</div> -->
		</div>
		<div class="form-group">
			<label for="">Tanggal Kirim</label>
			<!-- <input type="text" class="form-control" name="nama" placeholder="Meja v5" value="<?php //echo set_value('nama') ?>" required> -->
			<input type="date" class="form-control" name="tglKirim">
			<!-- <div class="invalid-feedback">Mohon isikan Nama Barang</div> -->
		</div>
		<br>
		
		<hr>
		<button id="submitBtn" type="submit" class="btn btn-primary">Simpan</button>
		<a href="<?php echo base_url('Order/') ?>" class="btn btn-secondary">Cancel</a><hr>
		<br>



        </div>
      <!-- </div> -->
    </div>
  </div>
</div>
</div>