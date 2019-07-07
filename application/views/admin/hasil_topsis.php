<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $tittle; ?></h1>
    
    <ul class="nav nav-tabs" id="myTab" role="tablist">
		<li class="nav-item">
			<a class="nav-link active" id="nilai-tab" data-toggle="tab" href="#nilai" role="tab" aria-controls="nilai" aria-selected="true">Nilai Preferensi</a>
		</li>
		<li class="nav-item">
	    	<a class="nav-link" id="jarak-tab" data-toggle="tab" href="#jarak" role="tab" aria-controls="jarak" aria-selected="false">Jarak Solusi</a>
		</li>
	</ul>
	<div class="tab-content" id="myTabContent">
		<div class="tab-pane fade show active" id="nilai" role="tabpanel" aria-labelledby="nilai-tab">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Nomor</th>
						<th>Nama</th>
						<th>V<sub>i</sub></th>
					</tr>
				</thead>
				<tbody>
					<?php $i=1; foreach ($preferensi as $p): ?>
					<tr>
						<td><?= $i++ ?></td>
						<td><?= $p['nama_alternatif']; ?></td>
						<td><?= $p['nilai']; ?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
		<div class="tab-pane fade" id="jarak" role="tabpanel" aria-labelledby="jarak-tab">
			
		</div>
	</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->