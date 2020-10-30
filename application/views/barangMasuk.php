

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
    <div class="card-header"><i class="fa fa-sitemap"></i> Data Barang Masuk</div>
    <div class="card-body">
      <div class="row">
      <table>
        <td>
          <a href="<?php echo site_url('Barang/addBarangMasuk/') ?>" class="btn btn-primary">Tambah Barang Masuk</a>
        </td><td>
          <a href="<?php echo site_url('LaporanMasuk') ?>" target="_blank" class="btn btn-success">Cetak Sortir Barang</a> 
        </td><td>
          <a href="<?php echo site_url('Laporan/filterMasuk') ?>" target="_blank" class="btn btn-warning">Filter Barang Masuk</a> 
        </td>
        </table> 
        <div class="col-md-12"><br></div>
        <table id="table_id" class="table table-hover table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr> 
          <th>Kode</th>
          <th>Nama Barang</th>
          <th>Jumlah</th>
          <th>Ready</th>
          <th>Reject</th>
          <th>Tanggal</th> 
          <th>Action
          </p></th>
        </tr>
      </thead>
      <tbody>
         <?php foreach($barang as $b){ ?>
         <tr>
          <td><?php echo $b->kd_masuk; ?></td>
          <td><?php echo $b->nm_brg; ?></td>
          <td><?php echo $b->jumlahMasuk; ?></td>
          <td><?php echo $b->ready; ?></td>
          <td><?php echo $b->reject; ?></td>
          <td><?php echo $b->tanggal; ?></td>
          <td>
            <?php if($b->ready == 0 && $b->reject == 0){ ?> 
            <a  class="btn btn-sm btn-outline-warning" href="<?php echo base_url()."barang/sortirBarang/".$b->kd_masuk; ?>">Sortir Barang</a> <?php } ?>
          </td>
         </tr>
      </tbody> <?php } ?>
      <tfoot>
        <tr>
          <th>Kode</th>
          <th>Nama Barang</th>
          <th>Jumlah</th>
          <th>Ready</th>
          <th>Reject</th>
          <th>Tanggal</th>
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