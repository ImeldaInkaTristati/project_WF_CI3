

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
    <div class="card-header"><i class="fa fa-sitemap"></i> Data Supplier</div>
    <div class="card-body">
      <div class="row">
      <table>
      <td>
        <a href="<?php echo site_url('Supplier/addSupplier/') ?>" class="btn btn-primary">Tambah Supplier</a> 
      </td>
      <td>
        <a href="<?php echo site_url('LaporanSupplier/') ?>" target="_blank" class="btn btn-success">Cetak Data Supplier</a> 
      </td>
      </table>
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
        <?php foreach($result as $d){ ?>
         <tr>
          <td><?php echo $d['kd_supplier']; ?></td>
          <td><?php echo $d['nama']; ?></td>
          <td><?php echo $d['alamat']; ?></td>
          <td><?php echo $d['telpon']; ?></td>
          <td><?php echo $d['email']; ?></td>
          <td><a  class="btn btn-sm btn-outline-warning" href="<?php echo base_url()."supplier/edit/".$d['kd_supplier']; ?>">Edit</a>
            <!-- <a class="btn btn-sm btn-outline-danger" href="<?php echo base_url()."supplier/do_delete/".$d['kd_supplier']; ?>" >Hapus</a> -->
          </td>
         </tr>
      </tbody> <?php } ?>
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