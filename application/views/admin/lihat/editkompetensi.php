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
                        <input type="text" class="form-control form-control-user" id="email" name="email" value="<?= $kompetensi['email'];?>" readonly>
                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
    
                    <div class="form-group text-start">
                        <p class="ms-3 mb-0">Nama Lengkap</p>
                        <input type="text" class="form-control form-control-user" id="nama" name="nama" value="<?= $kompetensi['nama'];?>" readonly>
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
    
                    <div class="form-group text-start">
                        <p class="ms-3 mb-0">NIK (No. KTP)</p>
                        <input type="text" class="form-control form-control-user" id="nik" name="nik" value="<?= $kompetensi['nik'];?>">
                        <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
    
                    <div class="form-group text-start">
                        <p class="ms-3 mb-0">Tempat Lahir</p>
                        <input type="text" class="form-control form-control-user" id="tempat_lahir" name="tempat_lahir" value="<?= $kompetensi['tempat_lahir'];?>">
                        <?= form_error('tempat_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
    
                    <div class="form-group text-start">
                        <p class="ms-3 mb-0">Tanggal lahir</p>
                        <input type="date" class="form-control form-control-user" id="tgl_lahir" name="tgl_lahir" value="<?= $kompetensi['tgl_lahir'];?>">
                        <?= form_error('tgl_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
    
                    <div class="mb-3 ps-4 text-start">
                        <p class="mb-2">Jenis Kelamin</p>

                        <input class="form-check-input" type="radio" name="jk" id="jk" value="Laki-Laki" <?php if($kompetensi['jk'] == 'Laki-Laki'){ echo 'checked';} ?>>
                        <label class="form-check-label me-5" for="jk">
                            Laki-laki
                        </label>
                        <input class="form-check-input" type="radio" name="jk" id="jk" value="Perempuan" <?php if($kompetensi['jk'] == 'Perempuan'){ echo 'checked';} ?>>
                        <label class="form-check-label" for="jk">
                            Perempuan
                        </label>
                    </div>
    
                    <div class="form-group text-start">
                        <p class="ms-3 mb-0">Alamat Rumah <small>(Jln/No/RT/RW/Kelurahan/Kecamatan/Kota/Provinsi)</small></p>
                        <input type="text" class="form-control form-control-user" id="alamat" name="alamat" value="<?= $kompetensi['alamat'];?>">
                        <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
    
                    <div class="form-group text-start">
                        <p class="ms-3 mb-0">No. Telp/HP</p>
                        <input type="text" class="form-control form-control-user" id="no_telp" name="no_telp" value="<?= $kompetensi['no_telp'];?>">
                        <?= form_error('no_telp', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
    
                    <div class="form-group text-start">
                        <p class="ms-3 mb-0">NIM</p>
                        <input type="text" class="form-control form-control-user" id="nim" name="nim" value="<?= $kompetensi['nim'];?>">
                        <?= form_error('nim', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
    
                    <div class="form-group text-start">
                        <p class="ms-3 mb-0">Jurusan</p>
                        <select class="custom-select rounded-pill px-3" id="jurusan" name="jurusan">
                            <option value="<?= $kompetensi['jurusan'];?>"><?= $kompetensi['jurusan'];?></option>
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
                        <input type="text" class="form-control form-control-user" id="prodi" name="prodi" value="<?= $kompetensi['prodi'];?>">
                        <?= form_error('prodi', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
    
                    <div class="form-group text-start">
                        <p class="ms-3 mb-0">Semester</p>
                        <input type="text" class="form-control form-control-user" id="semester" name="semester" value="<?= $kompetensi['semester'];?>">
                        <?= form_error('semester', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
    
                    <div class="form-group text-start">
                        <p class="ms-3 mb-0">Skema Uji <small>(diisi sesuai skema yang telah ditentukan, lihat pengumuman)</small></p>
                        <select class="custom-select rounded-pill px-3" id="skema" name="skema">
                            <option value="<?= $kompetensi['skema'];?>"><?= $kompetensi['skema'];?></option>
                            <option value="Filing">Filing</option>
                            <option value="Mail Handling">Mail Handling</option>
                            <option value="Pemasangan Instalasi Ketenagalistrikan">Pemasangan Instalasi Ketenagalistrikan</option>
                            <option value="Pemasangan Sistem Otomasi Industri Non PLC">Pemasangan Sistem Otomasi Industri Non PLC</option>
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
