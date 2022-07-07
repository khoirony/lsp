<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-fw fa-tachometer-alt"></i> <?= $title; ?></h1>

    <div class="row text-white pt-3 pb-5 justify-content-center">
        <div class="card bg-info col-5 mr-5">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h5 class="card-title">Sertifikasi Kompetensi</h5>
                <div class="display-4">
                    <?= $hitungkompetensi; ?> Peserta
                </div>
                <a href="<?= base_url('Mahasiswa/kompetensi'); ?>">
                    <p class="card-text text-white">Lihat Detail <i class="fas fa-angle-double-right ml-2"></i></p>
                </a>
            </div>
        </div>

        <div class="card bg-success col-5">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-user-tie"></i>
                </div>
                <h5 class="card-title">Sertifikasi Kompetensi dan Profesi</h5>
                <div class="display-4">
                    <?= $hitungprofesi; ?> Peserta
                </div>
                <a href="<?= base_url('Mahasiswa/profesi'); ?>">
                    <p class="card-text text-white">Lihat Detail <i class="fas fa-angle-double-right ml-2"></i></p>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->