<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-fw fa-tasks"></i> <?= $title; ?><a href="<?= base_url('mahasiswa/editkompetensi/'.$kompetensi['id_kompetensi']);?>" class="pb-2"><span class="badge bg-primary fs-6 ms-2">Edit</span></a></h1>
        

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
                    
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
