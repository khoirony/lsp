<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-fw fa-tasks"></i> <?= $title; ?></h1>
	<br>
	<div class="mr-3 mb-2">
        <div class="row">
            <div class="col ps-3">
                <div class="border border-primary rounded-pill bg-white p-1" style="width: 19em;">
                    <form class="d-inline-flex ms-3" method="POST" action="<?= base_url('Jurusan/carikompetensi'); ?>">
                        <input type="text" class="border-0" id="cari" name="cari" placeholder="Masukkan nama..">
                        <button type="submit" class="btn btn-primary rounded-pill ps-3 pe-3 ms-4">
                            Cari
                        </button>
                    </form>
                </div>
            </div>
            <div class="col text-right">
				
            </div>
        </div>
    </div>
    <table class="table table-striped table-bordered table-hover">
			<thead>
				<tr class="bg-white">
					<th scope="col">No</th>
					<th scope="col">Email</th>
					<th scope="col">Nama Lengkap</th>
					<th scope="col">NIM</th>
					<th scope="col">Jurusan</th>
					<th scope="col">Prodi</th>
					<th scope="col">Skema</th>
                    <th scope="col">status</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				foreach ($kompetensi as $kom) {
				?>
				<tr>
					<th scope="row"><?= $no++; ?></th>
					<td><?= $kom['email']; ?></td>
					<td><?= $kom['nama']; ?></td>
					<td><?= $kom['nim']; ?></td>
					<td><?= $kom['jurusan']; ?></td>
					<td><?= $kom['prodi']; ?></td>
					<td><?= $kom['skema']; ?></td>
					<td>
						<?php if($kom['status'] == 0): ?>
                        	<span class="badge bg-primary">waiting</span>
						<?php elseif($kom['status'] == 1): ?>
							<span class="badge bg-success">accepted</span>
						<?php elseif($kom['status'] == 2): ?>
							<span class="badge bg-danger">canceled</span>
						<?php endif; ?>
                    </td>
				</tr>
				<?php
				}
				?>
			</tbody>
		</table>

</div>
<!-- /.container-fluid -->