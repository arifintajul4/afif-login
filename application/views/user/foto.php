<!-- Begin Page Content -->
<div class="container-fluid" style="min-height: 70%">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $tittle; ?></h1>
    <?= $this->session->flashdata('message'); ?>
    <!-- Button trigger modal -->
	<button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#exampleModal">
	  Tambah Foto
	</button>

	<div class="row">
	<?php foreach($foto as $f): ?>
		<div class="col-md-3">

			<div class="mb-2">
				<a href="<?= base_url('assets/img/galery/').$f['foto']; ?>">
					<img src="<?= base_url('assets/img/galery/').$f['foto']; ?>" class="img-thumbnail img-responsive shadow" style="height: 250px; width: 400px;">
				</a>
			</div>

		</div>
	<?php endforeach; ?>
	</div>
	<div class="row">
    	<div class="col">
        	<!--Tampilkan pagination-->
        	<?php echo $pagination; ?>
    	</div>
    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pilih Foto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo form_open_multipart('foto/tambah'); ?>
		    <div class="form-group">
		        <div class="custom-file">
		            <input type="file" class="custom-file-input" id="gambar" name="gambar">
		            <label class="custom-file-label" for="gambar" name="gambar">Choose file</label>
		        </div>
	    	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary" name="upload">Upload</button>
        </form>
      </div>
    </div>
  </div>
</div>