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

        <?php echo form_open(current_url()); ?>

		<h4 align="center">Tambah Data Order</h4><br>
		
		<?php echo validation_errors(); ?><br>
		<!-- <hr><h5>A. DATA DIRI</h5><hr><br> -->
		<div class="form-group">
			<label for="">Kode</label>
			<input type="text" class="form-control" name="id_order" value="<?php echo $id_order ?>" >
			
		</div>
		<div class="form-group">
			<label for="">Tanggal Pesan</label>
			<input type="text" class="form-control" name="tgl_pesan" value="<?php echo $tgl_pesan ?>" >
			<!-- <div class="invalid-feedback">Mohon isikan Nama Barang</div> -->
		</div>
		<div class="form-group">
			<label for="">Nama Barang</label>
			<input type="text" class="form-control" name="nm_brg" value="<?php echo $nm_brg?>" >
			<!-- <div class="invalid-feedback">Mohon isikan Nama Barang</div> -->
		</div>
		<div class="form-group">
			<label for="">Nama Pembeli</label>
			<input type="text" class="form-control" name="nm_pembeli" value="<?php echo $nm_pembeli ?>" >
			<!-- <div class="invalid-feedback">Mohon isikan Nama Barang</div> -->
		</div>

		<div class="form-group">
			<label for="">Alamat</label>
			<input type="text" class="form-control" name="alamat" value="<?php echo $alamat ?>" >
				
			</textarea>
			<!-- <div class="invalid-feedback">Mohon isikan Nama Barang</div> -->
		</div>

		<div class="form-group">
			<label for="">Jumlah</label>
			<input type="text" class="form-control" name="jumlah_order" value="<?php echo $jumlah_order ?>" >
			<!-- <div class="invalid-feedback">Mohon isikan Nama Barang</div> -->
		</div>

		<div class="form-group">
			<label for="">Tanggal Kirim</label>
			<input type="text" class="form-control" name="tgl_kirim" value="<?php echo $tgl_kirim ?>" >
			<!-- <div class="invalid-feedback">Mohon isikan Nama Barang</div> -->
		</div><br>
		
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