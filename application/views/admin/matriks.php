<!-- Begin Page Content -->
<div class="container-fluid">
    
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $tittle; ?></h1>
    <hr>
    <div class="row">
        <div class="col-md-4">
            <?= $this->session->flashdata('message'); ?>
            <form action="<?= base_url('matriks/tambah'); ?>" method="post">
                <div class="form-group">
                    <label for="alternatif">Pilih Alternatif</label>
                    <select class="form-control" id="alternatif" name="alternatif">
                      <?php foreach ($alternatif as $alt): ?>
                          <option value="<?= $alt['id']; ?>"><?= $alt['nama_alternatif']; ?></option>
                      <?php endforeach; ?>
                    </select>
                </div>
                <?php $i=1; foreach ($kriteria as $k): ?>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="<?= $k['id']; ?>"><?= $k['nama_kriteria']; ?></label>
                            <input type="hidden" name="id_krite<?= $i; ?>" value="<?= $k['id']; ?>" />
                        </div>
                        <div class="col-md-6">
                            <select class="form-control" id="<?= $k['id']; ?>" name="nilai<?= $i; ?>">
                                <option></option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                    </div>
                </div>
                <?php $i++; endforeach; ?>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
        <div class="col-md-8">
            <table class="table table-bordered table-striped">
                <thead>
                    <?php $num_kriteria = $this->db->get('kriteria')->num_rows(); ?>
                    <tr>
                        <th rowspan="2">No</th>
                        <th rowspan="2">Nama</th>
                        <th colspan="<?= $num_kriteria ?>"><center>Kriteria</center></th>
                    </tr>
                    <tr>
                    <?php for($i=1; $i<=$num_kriteria; $i++): ?>
                        <th><center>C<?= $i; ?></center></th>
                    <?php endfor; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; foreach ($alternatif as $alt): ?>
                    <tr>
                        <td align="center"><?= $i++; ?></td>
                        <td><?= $alt['nama_alternatif']; ?></td>

                    <?php 
                    $matriks = $this->Matriks_models->getNilaiByAlternatif($alt['id']);
                    
                    foreach ($matriks as $m ): ?>
                        <td align="center"><?= $m['nilai']; ?></td>
                    <?php endforeach; ?>

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