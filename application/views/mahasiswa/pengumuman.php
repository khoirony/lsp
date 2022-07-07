<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-fw fa-bullhorn"></i> <?= $title; ?></h1>


    
        <div class="row">
            <div class="col">
                <?php if($hitungkompetensi != 0 && $kompetensi['pengumuman'] != null): ?>
                <div class="container bg-white px-4 py-3 mb-2 rounded shadow-sm">
                    <p>
                        <?= $kompetensi['pengumuman']; ?> <span class="badge bg-warning">New</span>
                    </p>
                </div>
                <?php endif; ?>
                <?php if($hitungkompetensi != 0 && $kompetensi['sertifikat'] != null): ?>
                <div class="container bg-white px-4 py-3 mb-2 rounded shadow-sm">
                    <p>
                        <a href="<?= base_url('assets/berkas/'.$kompetensi['sertifikat']);?>">Download Sertifikat Tes Sertifikasi PSKK BNSP 2022</a> <span class="badge bg-warning">New</span>
                    </p>
                </div>
                <?php endif; ?>

                <?php if($hitungprofesi != 0 && $profesi['pengumuman'] != null): ?>
                <div class="container bg-white px-4 py-3 mb-2 rounded shadow-sm">
                    <p>
                        <?= $profesi['pengumuman']; ?> <span class="badge bg-warning">New</span>
                    </p>
                </div>
                <?php endif; ?>
                <?php if($hitungprofesi != 0 && $profesi['sertifikat'] != null): ?>
                <div class="container bg-white px-4 py-3 mb-2 rounded shadow-sm">
                    <p>
                        <a href="<?= base_url('assets/berkas/'.$profesi['sertifikat']);?>">Download Sertifikat Tes Sertikom DIKSI Kemendikbud 2022</a> <span class="badge bg-warning">New</span>
                    </p>
                </div>
                <?php endif; ?>
            </div>
            <div class="col">
                
            </div>
        </div>

</div>
<!-- /.container-fluid -->