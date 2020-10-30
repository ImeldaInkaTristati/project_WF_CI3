

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
    <div class="card-header"><i class="fa fa-sitemap"></i>Laporan Data Supplier</div>
    <div class="card-body">
    <h5>Lihat Laporan Sesuai Tanggal</h5>
      <div class="row">
      <div class="col-lg-5 offset-lg-0">
        <div class="form-group">
            <!-- <label for="">Tanggal Awal</label> -->
            <!-- <input type="text" class="form-control" name="nama" placeholder="Meja v5" value="<?php //echo set_value('nama') ?>" required> -->
            <input type="date" class="form-control" name="tglAwal">
            <!-- <div class="invalid-feedback">Mohon isikan Nama Barang</div> -->
        </div>
      </div>
      <div class="col-lg-5 offset-lg-0">
          <div class="form-group">
            <!-- <label for="">Tanggal Akhir</label> -->
            <!-- <input type="text" class="form-control" name="nama" placeholder="Meja v5" value="<?php //echo set_value('nama') ?>" required> -->
            <input type="date" class="form-control" name="tglAkhir">
            <!-- <div class="invalid-feedback">Mohon isikan Nama Barang</div> -->
          </div>
      </div> <br>
      <div class="col-lg-2 offset-lg-0">
          <a href="<?php echo site_url('Supplier/addSupplier/') ?>" class="btn btn-primary">Lihat Laporan</a>
      </div>
      </div>
      <div class="row">
        <div class="col-md-12"><br></div>
        
        <table id="table_id" class="table table-hover table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr> 
          <th>Kode</th>
          <th>Nama</th>
          <th>Alamat</th>
          <th>No Telp</th>
          <th>Email</th>
          <th>Action
          </p></th>
        </tr>
      </thead>
      <tbody>
         <tr>
         	<td>S0001</td>
         	<td>Alfinda Rahmadiarni</td>
         	<td>Jalan Mawar</td>
         	<td>0898876543</td>
         	<td>alfinda@gmai.com</td>
         	<td><a href="#" class="btn btn-sm btn-outline-warning">Edit</a>
         		<a href="#" class="btn btn-sm btn-outline-danger">Hapus</a>
         	</td>
         </tr>
      </tbody>
      <tfoot>
        <tr>
          <th>Kode</th>
          <th>Nama</th>
          <th>Alamat</th>
          <th>No Telp</th>
          <th>Email</th>
          <th>Action</th>
        </tr>
      </tfoot>
    </table>
    </div>
    </div>
  </div>
</div>
</div>


<script type="text/javascript">
  $(document).ready( function () {
      $('#table_id').DataTable();
  } );
</script>