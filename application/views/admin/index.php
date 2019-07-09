<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>
    <hr>
    <?= $this->session->flashdata('message'); ?>

    <!-- Content Row -->
    <div class="row">
    
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Users</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $this->User_models->countAllUsers(); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Members</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $this->User_models->countMembers(); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Admin</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $this->User_models->countAdmin(); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Aktif</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $this->User_models->countActiveMember(); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Row -->

    <table class="table table-striped">
    	<thead>
    		<tr>
    			<th>No</th>
    			<th>Nama</th>
    			<th>Email</th>
    			<th>Role</th>
                <th>Tgl Daftar</th>
                <th><center>Aksi</center></th>
    		</tr>
    	</thead>
    	<tbody>
            <?php $i=1; foreach ($users as $user): ?>
    		<tr>
    			<td><?= $i++; ?></td>
    			<td><?= $user['name']?></td>
    			<td><?= $user['email']?></td>
    			<td><?php echo $user['role_id']==1 ? 'Admin' : 'Member'; ?></td>
                <td><?= date('d F Y', $user['date_created']); ?></td>
                <td align="center">
                    <a href="#" class="badge badge-primary editUsers" data-toggle="modal" data-target="#editModals" data-id="<?= $user['id']; ?>">edit</a>
                    <a href="<?= base_url('admin/hapus/').$user['id']; ?>" class="badge badge-danger hapus">hapus</a>
                </td>
    		</tr>
            <?php endforeach; ?>
    	</tbody>
    </table>

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
                <label for="nama">Nama</label>
                <input type="text" class="form-control" name="nama" id="nama" required autocomplete="off">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="mail" class="form-control" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <select class="form-control" id="role" name="role">
                    <option value="1">Admin</option>
                    <option value="2">Member</option>
                </select>
            </div>
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>

      </div>
    </div>
  </div>
</div>

<!-- Modal Detail -->

<div class="modal fade bd-example-modal-lg" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Detail Member</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="row no-gutters">
            <div class="col-md-4 py-3">
                <img src="" class="card-img" alt="Profil Pic">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title" id="nama">Nama</h5>
                    <p class="card-text" id="email">Email</p>
                    <p class="card-text"><small class="text-muted" id="date">Member Since </small></p>
                </div>
            </div>
        </div>

    </div>
  </div>
</div>