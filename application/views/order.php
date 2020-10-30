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
    <div class="card-header"><i class="fa fa-sitemap"></i> Data Work Order</div>
    <div class="card-body">
      <div class="row"> 
        <table>
        <td>
          <a href="<?php echo site_url('Order/addOrder/') ?>" class="btn btn-primary">Tambah Work Order</a>
        </td><td>
          <a href="<?php echo site_url('LaporanOrder') ?>" target="_blank" class="btn btn-success">Cetak Order Barang</a> 
        </td><td>
          <a href="<?php echo site_url('Laporan/filterOrder') ?>" target="_blank" class="btn btn-warning">Filter Order Barang</a> 
        </td>
        </table>
        <div class="col-md-12"><br></div>
        <table id="table_id" class="table table-hover table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr> 
          <th>Kode</th>
          <th>Nama Pembeli</th>
          <th>Alamat</th>
          <th>Nama Barang</th>
          <th>Jumlah</th>
          <th>Tanggal Pesan</th>
          <th>Tanggal Kirim</th>
          <th>Action
          </p></th>
        </tr>
      </thead>
      <tbody>

       <?php 
       $tgl=date('Y-m-d');
       foreach($result as $d){ ?>
         <tr>
          <td><?php echo $d->id_order; ?></td>
          <td><?php echo $d->nm_pembeli; ?></td>
          <td><?php echo $d->alamat; ?></td>
          <td><?php echo $d->nm_brg; ?></td>
          <td><?php echo $d->jumlahOrder; ?></td>
          <td><?php echo $d->tgl_pesan; ?></td>
          <td><?php echo $d->tgl_kirim; ?></td>
          <td>
          <?php if($d->status == 0) { ?>
            <?php if($d->tgl_kirim <= $tgl){ ?>
              <a class="btn btn-sm btn-outline-success" href="<?php echo base_url()."order/kirim/".$d->id_order; ?>" >Kirim</a>
              <?php } else { ?>
              <a  class="btn btn-sm btn-outline-warning" href="<?php echo base_url()."order/edit/".$d->id_order; ?>">Edit</a>
              <a class="btn btn-sm btn-outline-danger" href="<?php echo base_url()."order/do_delete/".$d->id_order; ?>" >Hapus</a>
            <?php } } }?>
          </td>
         </tr>
      </tbody> 
      
      <tfoot>
        <tr> 
          <th>Kode</th>
          <th>Tanggal Pesan</th>
          <th>Nama Barang</th>
          <th>Nama Pembeli</th>
          <th>Alamat</th>
          <th>Jumlah</th>
          <th>Tanggal Kirim</th>
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