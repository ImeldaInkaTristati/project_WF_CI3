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
    <div class="card-header"><i class="fa fa-sitemap"></i> Data Barang Keluar</div>
    <div class="card-body">
      <div class="row">
      <table>
      <td>
        <a href="<?php echo site_url('barangKeluar/addBarangKeluar') ?>" class="btn btn-primary">Tambah Barang Keluar</a> 
      </td><td>
        <a href="<?php echo site_url('LaporanKeluar') ?>" target="_blank" class="btn btn-success">Cetak Barang Keluar</a> 
      </td><td>
        <a href="<?php echo site_url('Laporan/filterKeluar') ?>" target="_blank" class="btn btn-warning">Filter Barang Keluar</a> 
      </td>
      </table>
        <div class="col-md-12"><br></div>
        <table id="table_id" class="table table-hover table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr> 
          <th>Kode</th>
          <th>Nama Pembeli</th>
          <th>Nama Barang</th>
          <th>Jumlah Barang Keluar</th>
          <th>Tanggal</th>
          <!-- <th>Action</p></th> -->
        </tr>
      </thead>
      <tbody>
         <?php foreach($result as $b){ ?>
         <tr>
          <td><?php echo $b->kd_keluar; ?></td>
          <td><?php echo $b->nm_pembeli; ?></td>
          <td><?php echo $b->nm_brg; ?></td>
          <td><?php echo $b->jumlahKeluar; ?></td>
          <td><?php echo $b->tanggalKeluar; ?></td>
          <!-- <td> -->
            <!-- <a class="btn btn-sm btn-outline-warning" href="<?php echo base_url()."barangKeluar/editKeluar/".$b->kd_keluar; ?>">Edit</a> -->
            <!-- <a class="btn btn-sm btn-outline-danger" href="<?php echo base_url()."barangKeluar/hapusKeluar/".$b->kd_keluar; ?>" >Hapus</a> -->
          <!-- </td> -->
         </tr>
      </tbody> <?php } ?>
      <tfoot>
        <tr>
          <th>Kode</th>
          <th>Nama Pembeli</th>
          <th>Nama Barang</th>
          <th>Jumlah Barang Masuk</th>
          <th>Tanggal</th>
          <!-- <th>Action</th> -->
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