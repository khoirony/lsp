<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-fw fa-tasks"></i> <?= $title; ?> 
    <a data-bs-toggle="modal" href="#pengumuman" class="pb-2"><span class="badge bg-warning fs-6">Pengumuman</span></a> 
    <a data-bs-toggle="modal" href="#sertifikat" class="pb-2"><span class="badge bg-warning fs-6">Sertifikat</span></a> 
    <a href="<?= base_url('admin/editprofesi/'.$profesi['id_user']);?>" class="pb-2"><span class="badge bg-primary fs-6">Edit</span></a> 
    <a href="<?= base_url('Admin/setujuprofesi/' . $profesi['id_user']); ?>"><span class="badge bg-success fs-6">Setujui</span></a> 
    <a href="<?= base_url('Admin/batalprofesi/' . $profesi['id_user']); ?>"><span class="badge bg-danger fs-6">Tolak</span></a></h1>
        
    <!-- Modal Pengumuman -->
    <div class="modal fade" id="pengumuman" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Pengumuman Jadwal Tes</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="<?= base_url('admin/pengumumanprofesi/'.$profesi['id_user']);?>" method="post">
            <div class="modal-body">
                <div class="form-floating">
                    <textarea class="form-control" name="pengumuman" id="pengumuman">Jadwal test Sertikom DIKSI Kemendikbud anda akan dilaksanakan pada tanggal 1 Juli 2022</textarea>
                    <label for="floatingTextarea">Masukkan Pengumuman Tes</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-user px-3">Send</button>
            </div>
        </form>
        </div>
    </div>
    </div>

    <!-- Modal Sertifikat -->
    <div class="modal fade" id="sertifikat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Upload Sertifikat Peserta</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="<?= base_url('admin/sertifikatprofesi/'.$profesi['id_user']);?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="mb-3">
                    <input type="file" class="form-control" name="berkas" id="berkas" placeholder="pdf/csv">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-user px-3">Upload</button>
            </div>
        </form>
        </div>
    </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="container bg-white py-4 mb-3">
                <div class="row mb-3">
                    <div class="col-4">
                        Email
                    </div>
                    <div class="col-8">
                        : <?= $profesi['email'];?>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4">
                        Nama Lengkap
                    </div>
                    <div class="col-8">
                        : <?= $profesi['nama'];?>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4">
                        NIK (No KTP)
                    </div>
                    <div class="col-8">
                        : <?= $profesi['nik'];?>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4">
                        Tempat, Tgl Lahir
                    </div>
                    <div class="col-8">
                        : <?= $profesi['tempat_lahir'];?>, <?= $profesi['tgl_lahir'];?>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4">
                        Jenis Kelamin
                    </div>
                    <div class="col-8">
                        : <?= $profesi['jk'];?>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4">
                        Alamat Rumah
                    </div>
                    <div class="col-8">
                        : <?= $profesi['alamat'];?>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4">
                        No Telp/HP
                    </div>
                    <div class="col-8">
                        : <?= $profesi['no_telp'];?>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4">
                        NIM
                    </div>
                    <div class="col-8">
                        : <?= $profesi['nim'];?>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4">
                        Jurusan
                    </div>
                    <div class="col-8">
                        : <?= $profesi['jurusan'];?>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4">
                        Program Studi
                    </div>
                    <div class="col-8">
                        : <?= $profesi['prodi'];?>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4">
                        Semester
                    </div>
                    <div class="col-8">
                        : <?= $profesi['semester'];?>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4">
                        Skema Uji
                    </div>
                    <div class="col-8">
                        : <?= $profesi['skema'];?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="container p-5 text-center">
                <h5>Status</h5>
                <?php if($profesi['status'] == 1): ?>
                    <i class="fas fa-check-circle display-1 text-success"></i>
                <?php elseif($profesi['status'] == 2): ?>
                    <i class="fas fa-times-circle display-1 text-danger"></i>
                <?php elseif($profesi['status'] == 0): ?>
                    <span class="display-1"><i class="fas fa-spinner text-primary"></i></span>
                <?php endif; ?>
                <br><br>

                <div class="row justify-content-center mt-5">
                    <div class="col-4">
                        Foto KTP<br><br>
                        <?php if($profesi['image'] != null){ 
                            ?>
                            <img src="<?= base_url('assets/img/profesi/' . $profesi['image']); ?>" class="w-50" alt="image" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body mx-auto">
                                        <img src="<?= base_url('assets/img/profesi/' . $profesi['image']); ?>" alt="image" class="w-50">
                                    </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }else{
                            echo "<br>-belum diupload-";
                        }
                        ?>
                    </div>
                    <div class="col-4">
                        APL 01 dan APL 02<br>
                        <?php if($profesi['berkas'] != null){ 
                            ?>
                            <a href="<?= base_url('assets/berkas/' . $profesi['berkas']); ?>"><i class="fas fa-file-pdf display-3"></i></a>
                        <?php
                        }else{
                            echo "<br>-belum diupload-";
                        }
                        ?>
                    </div>
                    <div class="col-4">
                        Sertifikasi Non-LSP<br>
                        <?php if($mahasiswa['nonlsp'] != null):?>
                            <img src="<?= base_url('assets/img/nonlsp/' . $mahasiswa['nonlsp']); ?>" class="w-50" alt="nonlsp" type="button" data-bs-toggle="modal" data-bs-target="#nonlsp">
    
                            <!-- Modal -->
                            <div class="modal fade" id="nonlsp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body mx-auto">
                                            <img src="<?= base_url('assets/img/nonlsp/' . $mahasiswa['nonlsp']); ?>" alt="nonlsp" class="w-50">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php else: ?>
                            <br>
                            -belum diupload-
                        <?php endif; ?>
                            
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
