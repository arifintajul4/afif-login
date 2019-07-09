<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $tittle; ?></h1>

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="input-tab" data-toggle="tab" href="#input" role="tab" aria-controls="input" aria-selected="true">Input kriteria</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="data-tab" data-toggle="tab" href="#data" role="tab" aria-controls="data" aria-selected="false">Data Kriteria</a>
        </li>
    </ul>
    <div class="tab-content mt-3" id="myTabContent">
        <div class="tab-pane fade show active" id="input" role="tabpanel" aria-labelledby="input-tab">
            <?= $this->session->flashdata('message'); ?>
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama">Nama Kriteria</label>
                            <input type="text" class="form-control" name="nama" id="nama" required autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="bobot">Bobot</label>
                            <input type="text" class="form-control" name="bobot" id="bobot" required>
                        </div>
                        <div class="form-group">
                            <label for="poin1">Poin 1</label>
                            <input type="number" class="form-control" name="poin1" id="poin1" required>
                        </div>
                        <div class="form-group">
                            <label for="poin2">Poin 2</label>
                            <input type="number" class="form-control" name="poin2" id="poin2" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="poin3">Poin 3</label>
                            <input type="number" class="form-control" name="poin3" id="poin3" required>
                        </div>
                        <div class="form-group">
                            <label for="poin4">Poin 4</label>
                            <input type="number" class="form-control" name="poin4" id="poin4" required>
                        </div>
                        <div class="form-group">
                            <label for="poin5">Poin 5</label>
                            <input type="number" class="form-control" name="poin5" id="poin5" required>
                        </div>
                        <div class="form-group">
                            <label for="sifat">Sifat Kriteria</label>
                            <select class="form-control" id="sifat" name="sifat" required>
                                <option value="Benefit">Benefit</option>
                                <option value="Cost">Cost</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </form>
        </div>
        <div class="tab-pane fade" id="data" role="tabpanel" aria-labelledby="data-tab">
            <table class="table table-hover table-bordered" id="datatable">
                <thead>
                    <tr>
                        <th>Nama Kriteria</th>
                        <th>Bobot</th>
                        <th>Poin 1</th>
                        <th>Poin 2</th>
                        <th>Poin 3</th>
                        <th>Poin 4</th>
                        <th>Poin 5</th>
                        <th>Sifat kriteria</th>
                        <th><center>Aksi</center></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($kriteria as $k): ?>
                    <tr>
                        <td><?= $k['nama_kriteria']; ?></td>
                        <td align="center"><?= $k['bobot']; ?></td>
                        <td align="center"><?= $k['poin1']; ?></td>
                        <td align="center"><?= $k['poin2']; ?></td>
                        <td align="center"><?= $k['poin3']; ?></td>
                        <td align="center"><?= $k['poin4']; ?></td>
                        <td align="center"><?= $k['poin5']; ?></td>
                        <td><?= $k['sifat']; ?></td>
                        <td><center>
                            <a href="#" class="badge badge-primary editKriteria" data-toggle="modal" data-target="#editModals" data-id="<?= $k['id']; ?>">Edit</a>
                            <a href="<?= base_url('kriteria/hapus/').$k['id']; ?>" class="badge badge-danger hapus">Hapus</a>
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
                    <label for="nama">Nama Kriteria</label>
                    <input type="text" class="form-control" name="nama" id="nama" required autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="bobot">Bobot</label>
                    <input type="text" class="form-control" name="bobot" id="bobot" required>
                </div>
                <div class="form-group">
                    <label for="poin1">Poin 1</label>
                    <input type="number" class="form-control" name="poin1" id="poin1" required>
                </div>
                <div class="form-group">
                    <label for="poin2">Poin 2</label>
                    <input type="number" class="form-control" name="poin2" id="poin2" required>
                </div>
                <div class="form-group">
                    <label for="poin3">Poin 3</label>
                    <input type="number" class="form-control" name="poin3" id="poin3" required>
                </div>
                <div class="form-group">
                    <label for="poin4">Poin 4</label>
                    <input type="number" class="form-control" name="poin4" id="poin4" required>
                </div>
                <div class="form-group">
                    <label for="poin5">Poin 5</label>
                    <input type="number" class="form-control" name="poin5" id="poin5" required>
                </div>
                <div class="form-group">
                    <label for="sifat">Sifat Kriteria</label>
                    <select class="form-control" id="sifat" name="sifat" required>
                        <option value="Benefit">Benefit</option>
                        <option value="Cost">Cost</option>
                    </select>
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