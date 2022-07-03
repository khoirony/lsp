<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-fw fa-user-edit"></i> My Profile</h1>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center">
                <form class="user" method="POST" action="">
                <div class="form-group text-start">
                        <p class="ms-3 mb-0">Email</p>
                        <input type="text" class="form-control form-control-user" id="email" name="email" value="<?= $user['email'];?>" readonly>
                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
    
                    <div class="form-group text-start">
                        <p class="ms-3 mb-0">Nama Lengkap</p>
                        <input type="text" class="form-control form-control-user" id="nama" name="nama" value="<?= $user['nama'];?>" readonly>
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
    
                    <div class="form-group text-start">
                        <p class="ms-3 mb-0">NIK (No. KTP)</p>
                        <input type="text" class="form-control form-control-user" id="nik" name="nik" value="<?= $user['nik'];?>">
                        <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
    
                    <div class="form-group text-start">
                        <p class="ms-3 mb-0">Tempat Lahir</p>
                        <input type="text" class="form-control form-control-user" id="tempat_lahir" name="tempat_lahir" value="<?= $user['tempat_lahir'];?>">
                        <?= form_error('tempat_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
    
                    <div class="form-group text-start">
                        <p class="ms-3 mb-0">Tanggal lahir</p>
                        <input type="date" class="form-control form-control-user" id="tgl_lahir" name="tgl_lahir" value="<?= $user['tgl_lahir'];?>">
                        <?= form_error('tgl_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
    
                    <div class="mb-3 ps-4 text-start">
                        <p class="mb-2">Jenis Kelamin</p>

                        <input class="form-check-input" type="radio" name="jk" id="jk" value="Laki-Laki" <?php if($user['jk'] == 'Laki-Laki'){ echo 'checked';} ?>>
                        <label class="form-check-label me-5" for="jk">
                            Laki-laki
                        </label>
                        <input class="form-check-input" type="radio" name="jk" id="jk" value="Perempuan" <?php if($user['jk'] == 'Perempuan'){ echo 'checked';} ?>>
                        <label class="form-check-label" for="jk">
                            Perempuan
                        </label>
                    </div>
    
                    <div class="form-group text-start">
                        <p class="ms-3 mb-0">Alamat Rumah <small>(Jln/No/RT/RW/Kelurahan/Kecamatan/Kota/Provinsi)</small></p>
                        <input type="text" class="form-control form-control-user" id="alamat" name="alamat" value="<?= $user['alamat'];?>">
                        <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
    
                    <div class="form-group text-start">
                        <p class="ms-3 mb-0">No. Telp/HP</p>
                        <input type="text" class="form-control form-control-user" id="no_telp" name="no_telp" value="<?= $user['no_telp'];?>">
                        <?= form_error('no_telp', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
    
                    <div class="form-group text-start">
                        <p class="ms-3 mb-0">NIM</p>
                        <input type="text" class="form-control form-control-user" id="nim" name="nim" value="<?= $user['nim'];?>">
                        <?= form_error('nim', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
    
                    <div class="form-group text-start">
                        <p class="ms-3 mb-0">Jurusan</p>
                        <input type="text" class="form-control form-control-user" id="jurusan" name="jurusan" value="<?= $user['jurusan'];?>">
                        <?= form_error('jurusan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
    
                    <div class="form-group text-start">
                        <p class="ms-3 mb-0">Program Studi</p>
                        <input type="text" class="form-control form-control-user" id="prodi" name="prodi" value="<?= $user['prodi'];?>">
                        <?= form_error('prodi', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
    
                    <div class="form-group text-start">
                        <p class="ms-3 mb-0">Semester</p>
                        <input type="text" class="form-control form-control-user" id="semester" name="semester" value="<?= $user['semester'];?>">
                        <?= form_error('semester', '<small class="text-danger pl-3">', '</small>'); ?>
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
                <div class="container bg-white py-4 mb-3">
                    <?= $this->session->flashdata('msg');
                                if (isset($_SESSION['msg'])) {
                                    unset($_SESSION['msg']);
                                } ?>
                    <div class="row mb-3">
                        <div class="col-4">
                            Email
                        </div>
                        <div class="col-8">
                            : <?= $user['email'];?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4">
                            Nama Lengkap
                        </div>
                        <div class="col-8">
                            : <?= $user['nama'];?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4">
                            NIK (No KTP)
                        </div>
                        <div class="col-8">
                            : <?= $user['nik'];?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4">
                            Tempat, Tgl Lahir
                        </div>
                        <div class="col-8">
                            : <?= $user['tempat_lahir'];?>, <?= $user['tgl_lahir'];?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4">
                            Jenis Kelamin
                        </div>
                        <div class="col-8">
                            : <?= $user['jk'];?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4">
                            Alamat Rumah
                        </div>
                        <div class="col-8">
                            : <?= $user['alamat'];?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4">
                            No Telp/HP
                        </div>
                        <div class="col-8">
                            : <?= $user['no_telp'];?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4">
                            NIM
                        </div>
                        <div class="col-8">
                            : <?= $user['nim'];?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4">
                            Jurusan
                        </div>
                        <div class="col-8">
                            : <?= $user['jurusan'];?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4">
                            Program Studi
                        </div>
                        <div class="col-8">
                            : <?= $user['prodi'];?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4">
                            Semester
                        </div>
                        <div class="col-8">
                            : <?= $user['semester'];?>
                        </div>
                    </div>
                </div>
            </div>
    
        </div>
    </div>


</div>
