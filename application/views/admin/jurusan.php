<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><i class="fas fa-fw fa-tasks"></i> <?= $title; ?></h1>
	<br>
	<div class="container">
		<div class="row">
			<div class="col-md-5 text-center">
				<form class="user" method="POST" action="">
					<div class="form-group text-start">
						<p class="ms-3 mb-0">Email</p>
						<input type="text" class="form-control form-control-user" id="email" name="email">
						<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>

					<div class="form-group text-start">
                        <p class="ms-3 mb-0">Nama Jurusan</p>
                        <select class="custom-select rounded-pill px-3" id="nama" name="nama">
                            <option value="Teknik Sipil">Teknik Sipil</option>
                            <option value="Teknik Mesin">Teknik Mesin</option>
                            <option value="Teknik Elektro">Teknik Elektro</option>
                            <option value="Akuntansi">Akuntansi</option>
                            <option value="Administrasi Niaga">Administrasi Niaga</option>
                            <option value="Teknik Grafika Penerbitan">Teknik Grafika Penerbitan</option>
                            <option value="Teknik Informatika dan Komputer">Teknik Informatika dan Komputer</option>
                        </select>
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

					<div class="form-group text-start">
						<p class="ms-3 mb-0">Password</p>
						<input type="text" class="form-control form-control-user" id="password" name="password">
						<?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>

					<div class="text-center">
						<button type="submit" class="btn btn-primary btn-user px-4 mt-3">
							Tambah Jurusan
						</button>
					</div>
				</form>
				<br>
			</div>
			<div class="col-md-7 ps-4">
				<div class="container">
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr class="bg-white">
								<th scope="col">No</th>
								<th scope="col">Email</th>
								<th scope="col">Jurusan</th>
								<th scope="col">Password</th>
								<th scope="col">aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
                            $no = 1;
                            foreach ($jurusan as $jur) {
                            ?>
							<tr>
								<th scope="row"><?= $no++; ?></th>
								<td><?= $jur['email']; ?></td>
								<td><?= $jur['nama']; ?></td>
								<td><?= $jur['password']; ?></td>
								<td class="text-center" style="width:90px;">
									<a href="<?= base_url('Admin/editjurusan/' . $jur['id_user']); ?>"><i class="fas fa-edit text-primary fs-5"></i></a>
									<a href="<?= base_url('Admin/hapusjurusan/' . $jur['id_user']); ?>"><i
											class="fas fa-trash-alt text-danger fs-5 ms-1"></i></a>
								</td>
							</tr>
							<?php
                            }
                            ?>
						</tbody>
					</table>
				</div>
			</div>

		</div>
	</div>


</div>
