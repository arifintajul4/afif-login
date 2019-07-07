<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $tittle; ?></h1>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <?= $this->session->flashdata('message'); ?>
            <form action="" method="post">
                <label for="nama">Nama Alternatif</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="nama" autocomplete="off" required>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" id="button-addon2">Tambah</button>
                    </div>
                </div>
            </form>
        </div>
        
    </div>
    <div class="row">
        <div class="col-md-6 mb-2">
            <table class="table table-hover table-bordered" id="datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Alternatif</th>
                        <th><center>Aksi</center></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; foreach ($alternatif as $alt): ?>
                    <tr>
                        <td align="center"><?= $i++ ?></td>
                        <td><?= $alt['nama_alternatif'] ?></td>
                        <td><center>
                            <a href="#" class="badge badge-primary editAlternatif" data-toggle="modal" data-target="#editModals" data-id="<?= $alt['id']; ?>">Edit</a>
                            <a href="<?= base_url('alternatif/hapus/').$alt['id']; ?>" class="badge badge-danger hapus">Hapus</a>
                            </center>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="editModals" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
            <div class="form-group">
                <label for="nama">Nama Alternatif</label>
                <input type="text" class="form-control" name="nama" id="nama" required autocomplete="off">
            </div>
            
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>

      </div>
    </div>
  </div>
</div>