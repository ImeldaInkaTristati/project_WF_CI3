<div class="content-wrapper"> <!-- "keseluruhan konten" -->
  <div class="container-fluid"> <!-- isi content -->
<!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Data Work Order</li>
  </ol>

  <!-- Menampilkan data kategori-->
  <div class="card mb-3">
    <div class="card-header"><i class="fa fa-list"></i>Data Work Order</div>
    <div class="card-body">
      <!-- <div class="row"> -->
        <div class="col-lg-6 offset-lg-3">

		<h4 align="center">Tambah Data Work Order</h4><br>
		<?php echo validation_errors(); ?><br> 

		<?php echo form_open( 'order/do_insert', array('class' => 'needs-validation', 'novalidate' => '') ); ?> 
		<!-- <hr><h5>A. DATA DIRI</h5><hr><br> -->
		<div class="form-group">
			<label for="">Nama Pembeli</label>
			<?php echo form_dropdown('kd_pembeli', $pembeli, set_value('kd_pembeli'), 'class="form-control" required' ); ?>
			<div class="invalid-feedback">Mohon isikan Nama Pembeli</div>
		</div>
		<div class="form-group">
			<label for="">Nama Barang</label>
			<?php echo form_dropdown('kd_brg', $barang, set_value('kd_brg'), 'class="form-control" required' ); ?>
			<div class="invalid-feedback">Mohon isikan Nama Barang</div>
		</div>
		<div class="form-group">
			<label for="">Jumlah Pesanan Barang dalam KG</label>
			<input type="text" class="form-control" name="jumlahOrder" placeholder="5000" value="<?php echo set_value('jumlahOrder') ?>" required>
			<!-- <input type="text" class="form-control" name="nm_pembeli" placeholder="" required> -->
			<div class="invalid-feedback">Mohon isikan Jumlah pesanan barang</div>
		</div>
		<div class="form-group">
			<label for="">Tanggal Pesan</label>
			<input type="date" class="form-control" name="tgl_pesan" value="<?php echo set_value('tgl_pesan') ?>" required>
			<!-- <input type="text" class="form-control" name="nm_pembeli" placeholder="" required> -->
			<div class="invalid-feedback">Mohon isikan Tanggal Pemesanan</div>
		</div>
		<div class="form-group">
			<label for="">Tanggal Kirim</label>
			<input type="date" class="form-control" name="tgl_kirim" value="<?php echo set_value('tgl_kirim') ?>" required>
			<!-- <input type="text" class="form-control" name="nm_pembeli" placeholder="" required> -->
			<div class="invalid-feedback">Mohon isikan Tanggal Pengiriman</div>
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