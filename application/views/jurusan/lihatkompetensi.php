<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-fw fa-tasks"></i> <?= $title; ?></h1> 
        
    <!-- Modal Pengumuman -->
    <div class="modal fade" id="pengumuman" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Pengumuman Jadwal Tes</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="<?= base_url('admin/pengumumankompetensi/'.$kompetensi['id_user']);?>" method="post">
            <div class="modal-body">
                <div class="form-floating">
                    <textarea class="form-control" name="pengumuman" id="pengumuman">Jadwal test Sertifikasi PSKK-BNSP anda akan dilaksanakan pada tanggal 1 Juli 2022</textarea>
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
        <form action="<?= base_url('admin/sertifikatkompetensi/'.$kompetensi['id_user']);?>" method="post" enctype="multipart/form-data">
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
                        : <?= $kompetensi['email'];?>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4">
                        Nama Lengkap
                    </div>
                    <div class="col-8">
                        : <?= $kompetensi['nama'];?>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4">
                        NIK (No KTP)
                    </div>
                    <div class="col-8">
                        : <?= $kompetensi['nik'];?>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4">
                        Tempat, Tgl Lahir
                    </div>
                    <div class="col-8">
                        : <?= $kompetensi['tempat_lahir'];?>, <?= $kompetensi['tgl_lahir'];?>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4">
                        Jenis Kelamin
                    </div>
                    <div class="col-8">
                        : <?= $kompetensi['jk'];?>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4">
                        Alamat Rumah
                    </div>
                    <div class="col-8">
                        : <?= $kompetensi['alamat'];?>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4">
                        No Telp/HP
                    </div>
                    <div class="col-8">
                        : <?= $kompetensi['no_telp'];?>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4">
                        NIM
                    </div>
                    <div class="col-8">
                        : <?= $kompetensi['nim'];?>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4">
                        Jurusan
                    </div>
                    <div class="col-8">
                        : <?= $kompetensi['jurusan'];?>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4">
                        Program Studi
                    </div>
                    <div class="col-8">
                        : <?= $kompetensi['prodi'];?>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4">
                        Semester
                    </div>
                    <div class="col-8">
                        : <?= $kompetensi['semester'];?>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4">
                        Skema Uji
                    </div>
                    <div class="col-8">
                        : <?= $kompetensi['skema'];?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="container p-5 text-center">
                <h5>Status</h5>
                <?php if($kompetensi['status'] == 1): ?>
                    <i class="fas fa-check-circle display-1 text-success"></i>
                <?php elseif($kompetensi['status'] == 2): ?>
                    <i class="fas fa-times-circle display-1 text-danger"></i>
                <?php elseif($kompetensi['status'] == 0): ?>
                    <span class="display-1"><i class="fas fa-spinner text-primary"></i></span>
                <?php endif; ?>
                <br><br>

                <div class="row justify-content-center mt-5">
                    <div class="col-5">
                        Foto KTP<br>
                        <?php if($kompetensi['image'] != null): ?>
                            <img src="<?= base_url('assets/img/kompetensi/' . $kompetensi['image']); ?>" class="w-50" alt="image" type="button" data-bs-toggle="modal" data-bs-target="#fotoktp">

                            <!-- Modal -->
                            <div class="modal fade" id="fotoktp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body mx-auto">
                                        <img src="<?= base_url('assets/img/kompetensi/' . $kompetensi['image']); ?>" alt="image" class="w-50">
                                    </div>
                                    </div>
                                </div>
                            </div>
                        <?php else: ?>
                            <br>
                            -belum diupload-
                        <?php endif; ?>
                        
                    </div>
                    <div class="col-5">
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
