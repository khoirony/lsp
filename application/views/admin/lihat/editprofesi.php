<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-fw fa-tasks"></i> Edit Formulir Pendaftaran Sertifikasi PSKK BNSP 2022</h1>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center">
                <form class="user" method="POST" action="">
                <div class="form-group text-start">
                        <p class="ms-3 mb-0">Email</p>
                        <input type="text" class="form-control form-control-user" id="email" name="email" value="<?= $profesi['email'];?>" readonly>
                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
    
                    <div class="form-group text-start">
                        <p class="ms-3 mb-0">Nama Lengkap</p>
                        <input type="text" class="form-control form-control-user" id="nama" name="nama" value="<?= $profesi['nama'];?>" readonly>
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
    
                    <div class="form-group text-start">
                        <p class="ms-3 mb-0">NIK (No. KTP)</p>
                        <input type="text" class="form-control form-control-user" id="nik" name="nik" value="<?= $profesi['nik'];?>">
                        <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
    
                    <div class="form-group text-start">
                        <p class="ms-3 mb-0">Tempat Lahir</p>
                        <input type="text" class="form-control form-control-user" id="tempat_lahir" name="tempat_lahir" value="<?= $profesi['tempat_lahir'];?>">
                        <?= form_error('tempat_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
    
                    <div class="form-group text-start">
                        <p class="ms-3 mb-0">Tanggal lahir</p>
                        <input type="date" class="form-control form-control-user" id="tgl_lahir" name="tgl_lahir" value="<?= $profesi['tgl_lahir'];?>">
                        <?= form_error('tgl_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
    
                    <div class="mb-3 ps-4 text-start">
                        <p class="mb-2">Jenis Kelamin</p>

                        <input class="form-check-input" type="radio" name="jk" id="jk" value="Laki-Laki" <?php if($profesi['jk'] == 'Laki-Laki'){ echo 'checked';} ?>>
                        <label class="form-check-label me-5" for="jk">
                            Laki-laki
                        </label>
                        <input class="form-check-input" type="radio" name="jk" id="jk" value="Perempuan" <?php if($profesi['jk'] == 'Perempuan'){ echo 'checked';} ?>>
                        <label class="form-check-label" for="jk">
                            Perempuan
                        </label>
                    </div>
    
                    <div class="form-group text-start">
                        <p class="ms-3 mb-0">Alamat Rumah <small>(Jln/No/RT/RW/Kelurahan/Kecamatan/Kota/Provinsi)</small></p>
                        <input type="text" class="form-control form-control-user" id="alamat" name="alamat" value="<?= $profesi['alamat'];?>">
                        <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
    
                    <div class="form-group text-start">
                        <p class="ms-3 mb-0">No. Telp/HP</p>
                        <input type="text" class="form-control form-control-user" id="no_telp" name="no_telp" value="<?= $profesi['no_telp'];?>">
                        <?= form_error('no_telp', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
    
                    <div class="form-group text-start">
                        <p class="ms-3 mb-0">NIM</p>
                        <input type="text" class="form-control form-control-user" id="nim" name="nim" value="<?= $profesi['nim'];?>">
                        <?= form_error('nim', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
    
                    <div class="form-group text-start">
                        <p class="ms-3 mb-0">Jurusan</p>
                        <select class="custom-select rounded-pill px-3" id="jurusan" name="jurusan">
                            <option value="<?= $profesi['jurusan'];?>"><?= $profesi['jurusan'];?></option>
                            <option value="Teknik Sipil">Teknik Sipil</option>
                            <option value="Teknik Mesin">Teknik Mesin</option>
                            <option value="Teknik Elektro">Teknik Elektro</option>
                            <option value="Akuntansi">Akuntansi</option>
                            <option value="Administrasi Niaga">Administrasi Niaga</option>
                            <option value="Teknik Grafika Penerbitan">Teknik Grafika Penerbitan</option>
                            <option value="Teknik Informatika dan Komputer">Teknik Informatika dan Komputer</option>
                        </select>
                        <?= form_error('jurusan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
    
                    <div class="form-group text-start">
                        <p class="ms-3 mb-0">Program Studi</p>
                        <input type="text" class="form-control form-control-user" id="prodi" name="prodi" value="<?= $profesi['prodi'];?>">
                        <?= form_error('prodi', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
    
                    <div class="form-group text-start">
                        <p class="ms-3 mb-0">Semester</p>
                        <input type="text" class="form-control form-control-user" id="semester" name="semester" value="<?= $profesi['semester'];?>">
                        <?= form_error('semester', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
    
                    <div class="form-group text-start">
                        <p class="ms-3 mb-0">Skema Uji <small>(diisi sesuai skema yang telah ditentukan, lihat pengumuman)</small></p>
                        <select class="custom-select rounded-pill px-3" id="skema" name="skema">
                            <option value="<?= $profesi['skema'];?>"><?= $profesi['skema'];?></option>
                            <option value="Tenaga Pemasar Operasional Penjualan">Tenaga Pemasar Operasional Penjualan</option>
                            <option value="Pengawas Pekerjaan Struktur Bangunan Gedung">Pengawas Pekerjaan Struktur Bangunan Gedung</option>
                            <option value="Juru Gambar Pekerjaan Jalan dan Jembatan">Juru Gambar Pekerjaan Jalan dan Jembatan</option>
                            <option value="Teknisi Laboratorium Beton Aspal">Teknisi Laboratorium Beton Aspal</option>
                            <option value="Teknisi Pemeliharaan Sistem Scada">Teknisi Pemeliharaan Sistem Scada</option>
                            <option value="Teknisi Instrumentasi">Teknisi Instrumentasi</option>
                            <option value="Teknisi Madya Jaringan Komputer">Teknisi Madya Jaringan Komputer</option>
                            <option value="Teknisi Muda Jaringan Komputer">Teknisi Muda Jaringan Komputer</option>
                            <option value="Teknisi Instalasi Fiber Optik">Teknisi Instalasi Fiber Optik</option>
                        </select>
                        <?= form_error('skema', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
    
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-user px-5 mt-3">
                            Submit
                        </button>
                    </div>
                </form>
                <br>
            </div>
            <div class="col-md-6 ps-4">
            
            </div>
    
        </div>
    </div>


</div>
