<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-fw fa-map-marker-alt"></i> Formulir Pendaftaran Sertikom DIKSI Kemendikbud 2022</h1>
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
                        <input type="text" class="form-control form-control-user" id="nik" name="nik" value="<?= $user['nik'];?>" readonly>
                        <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
    
                    <div class="form-group text-start">
                        <p class="ms-3 mb-0">Tempat Lahir</p>
                        <input type="text" class="form-control form-control-user" id="tempat_lahir" name="tempat_lahir" value="<?= $user['tempat_lahir'];?>" readonly>
                        <?= form_error('tempat_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
    
                    <div class="form-group text-start">
                        <p class="ms-3 mb-0">Tanggal lahir</p>
                        <input type="date" class="form-control form-control-user" id="tgl_lahir" name="tgl_lahir" value="<?= $user['tgl_lahir'];?>" readonly>
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
                        <input type="text" class="form-control form-control-user" id="alamat" name="alamat" value="<?= $user['alamat'];?>" readonly>
                        <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
    
                    <div class="form-group text-start">
                        <p class="ms-3 mb-0">No. Telp/HP</p>
                        <input type="text" class="form-control form-control-user" id="no_telp" name="no_telp" value="<?= $user['no_telp'];?>" readonly>
                        <?= form_error('no_telp', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
    
                    <div class="form-group text-start">
                        <p class="ms-3 mb-0">NIM</p>
                        <input type="text" class="form-control form-control-user" id="nim" name="nim" value="<?= $user['nim'];?>" readonly>
                        <?= form_error('nim', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
    
                    <div class="form-group text-start">
                        <p class="ms-3 mb-0">Jurusan</p>
                        <input type="text" class="form-control form-control-user" id="jurusan" name="jurusan" value="<?= $user['jurusan'];?>" readonly>
                        <?= form_error('jurusan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
    
                    <div class="form-group text-start">
                        <p class="ms-3 mb-0">Program Studi</p>
                        <input type="text" class="form-control form-control-user" id="prodi" name="prodi" value="<?= $user['prodi'];?>" readonly>
                        <?= form_error('prodi', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
    
                    <div class="form-group text-start">
                        <p class="ms-3 mb-0">Semester</p>
                        <input type="text" class="form-control form-control-user" id="semester" name="semester" value="<?= $user['semester'];?>" readonly>
                        <?= form_error('semester', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
    
                    <div class="form-group text-start">
                        <p class="ms-3 mb-0">Skema Uji <small>(diisi sesuai skema yang telah ditentukan, lihat pengumuman)</small></p>
                        <select class="custom-select rounded-pill px-3" id="skema" name="skema">
                            <option value="Tenaga Pemasar Operasional Penjualan">Tenaga Pemasar Operasional Penjualan</option>
                            <option value="Pengawas Pekerjaan Struktur Bangunan Gedung">Pengawas Pekerjaan Struktur Bangunan Gedung</option>
                            <option value="Juru Gambar Pekerjaan Jalan dan Jembatan">Juru Gambar Pekerjaan Jalan dan Jembatan</option>
                            <option value="Teknisi Laboratorium Beton Aspal">Teknisi Laboratorium Beton Aspal</option>
                            <option value="Teknisi Pemeliharaan Sistem Scada">Teknisi Pemeliharaan Sistem Scada</option>
                            <option value="Teknisi Instrumentasi">Teknisi Instrumentasi</option>
                            <option value="Teknisi Madya Jaringan Komputer">Teknisi Madya Jaringan Komputer</option>
                            <option value="Teknisi Muda Jaringan Komputer">Teknisi Muda Jaringan Komputer</option>
                            <option value="Teknisi Instalasi Fiber Optik">Teknisi Instalasi Fiber Optik</option>
                            <option value="RF Planer">RF Planer</option>
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
            Persyaratan Peserta: <br>

            a.	Mengisi formulir pendaftaran sertifikasi kompetensi  <br>
            b.  Mengisi dan menandatangani form APL 01 dan APL 02 sesuai Skema yang telah ditentukan (Form dapat didownload di web lsp.pnj.ac.id pada menu download <br>
            c.  Menyiapkan berkas persyaratan: <br>
                <ul>
                    <li>Foto kopi Marksheet semester 1 sd. terakhir</li>
                    <li>Foto kopi lembar pengesahan Laporan PKL bila telah melaksanakan PKL</li>
                    <li>Foto kopi Sertifikat Pelatihan dan Tugas Kliiah yang mendukung skema yang diujikan</li>
                    <li>Foto kopi KTP</li>
                    <li>Foto berwarna Ukuran 3 x 4 cm sebanyak 1 lembar</li>
                    <li>CV/Daftar Riwayat Hidupi</li>
                </ul>
            <br>
            Semua berkas (point b dan c) dibawa pada saat pelaksanaan dan dimasukkan dalam map diberi nama peserta dan Judul Skema, dengan ketentuan warna map: <br>

            <ul>
                <li>Merah (Administrasi Bisnis)</li>
                <li>Biru (Teknik Sipil)</li>
                <li>Kuning (Teknik Elektro)</li>
                <li>Hijau (Teknik Mesin)</li>
            </ul>
            <br>

            •	Hadir sesuai jadwal pembekalan/uji kompetensi (pukul 8.00 WIB) Pakaian kemeja putih dan rok/celana hitam dan Baju Lab/Bengkel/Praktek.  Tempat Uji Kompetensi di Jurusan masing-masing. <br><br>

            Mengikuti Konsultasi Pra Asesmen/panduan pengisian APL 01 dan APL 02 melalui media Zoom 
            (jadwal menyusul diinformasikan melalui WA Group Uji Kompetensi) <br>

            Peserta pembekalan/uji kompetensi tidak dikenakan biaya. <br>

            Peserta yang dinyatakan Kompeten wajib membawa foto 3x4 pada saat pengambilan sertifikat <br>

            Untuk update informasi pelaksanaan Uji Kompetensi, peserta diharapkan bergabung dalam Whatsapp Group pada link https://bit.ly/WAG_UJIKOMPSKK_DIKSI.  <br>

            Infomasi lebih lanjut dapat menghubungi Sekretariat LSP melalui No. WA 088292230466.
            </div>
    
        </div>
    </div>


</div>
