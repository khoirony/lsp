<div class="container">

	<!-- Outer Row -->
	<div class="row justify-content-center">


		<div class="col-lg-5 shadow-lg mt-5 rounded">
			<div class="p-5">
				<div class="text-center">
					<h3 class="text-center mb-0">Lembaga Sertifikasi Profesi</h3>
            		<h3 class="fw-normal text-center mb-4">Politeknik Negeri Jakarta</h3>
				</div>
				<br>
				<?= $this->session->flashdata('msg');
                                if (isset($_SESSION['msg'])) {
                                    unset($_SESSION['msg']);
                                } ?>
				<form method="POST" action="<?= base_url('auth'); ?>">
					<div class="mb-3">
						<input type="text" class="form-control rounded-pill py-3 ps-4" id="email" name="email"
							placeholder="Masukkan Email" value="<?= set_value('email'); ?>">
						<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
					<div class="mb-3">
						<input type="password" class="form-control rounded-pill py-3 ps-4" id="password" name="password"
							placeholder="Password">
						<?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
					<div class="text-center d-grid gap-2">
						<button type="submit" class="btn warna-dasar text-white btn-user py-3 btn-block rounded-pill">
							Masuk
						</button>
					</div>
				</form><br>
				<hr>
				<div class="text-center mt-0">
					<span class="small">Belum Mempunyai Akun?</span> <a class="small text-decoration-none"
						href="<?= base_url('auth/registrasi'); ?>">Daftar disini!</a>
				</div>
			</div>

		</div>

	</div>
	<br><br>

</div>
