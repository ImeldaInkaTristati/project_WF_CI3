<div class="content-wrapper"> <!-- "keseluruhan konten" -->
  <div class="container-fluid"> <!-- isi content -->
<!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Data Keluar</li>
  </ol>

  <!-- Menampilkan data kategori-->
  <!-- <?php echo validation_errors(); ?><br>  -->

  <?php echo form_open( 'Laporan/laporanKeluar/', array('class' => 'needs-validation', 'novalidate' => '') ); ?> 
  <div class="card mb-3">
    <div class="card-header"><i class="fa fa-sitemap"></i>Laporan Data Barang Keluar</div>
    <div class="card-body">
    <h5>Lihat Laporan Sesuai Tanggal</h5>
      <div class="row">
        <div class="col-lg-4 offset-lg-0">
          <div class="form-group">
              <!-- <label for="">Tanggal Awal</label> -->
              <!-- <input type="text" class="form-control" name="nama" placeholder="Meja v5" value="<?php //echo set_value('nama') ?>" required> -->
              <input type="date" class="form-control" name="tglAwal">
              <!-- <div class="invalid-feedback">Mohon isikan Nama Barang</div> -->
          </div> 
        </div>-
        <div class="col-lg-4 offset-lg-0">
            <div class="form-group">
              <!-- <label for="">Tanggal Akhir</label> -->
              <!-- <input type="text" class="form-control" name="nama" placeholder="Meja v5" value="<?php //echo set_value('nama') ?>" required> -->
              <input type="date" class="form-control" name="tglAkhir">
              <!-- <div class="invalid-feedback">Mohon isikan Nama Barang</div> -->
            </div>
        </div> <br>
        <div class="col-lg-1 offset-lg-0">
            <!-- <a href="<?php //echo site_url('Laporan/filterLaporanKeluar/') ?>" class="btn btn-primary">Lihat Laporan</a> -->
            <button id="submitBtn" type="submit" class="btn btn-primary">Lihat Laporan</button>
        </div>
        <div class="col-lg-1 offset-lg-1">
            <a href="<?php echo base_url()."Laporan/cetakLaporanKeluar/"; ?>" target="_blank" class="btn btn-success">Cetak Laporan</a>
        </div> 
      </div>
      <div class="row">
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