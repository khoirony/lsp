        <!-- Sidebar -->
        <ul class="navbar-nav warna-dasar sidebar sidebar-dark accordion" id="accordionSidebar">

        	<!-- Sidebar - Brand -->
        	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        		<span class="sidebar-brand-text">Sertifikasi LSP</span>
        	</a>

        	<!-- Divider -->
        	<hr class="sidebar-divider">


        	<li class="nav-item <?php if($active == 'dashboard'){ echo'active';}?>">
        		<a class="nav-link pb-0" href="<?= base_url('mahasiswa') ?>">
					<i class="fas fa-fw fa-tachometer-alt"></i>
        			<span>Dashboard</a>
        	</li>

			<?php if($user['role'] == 1): ?>
			<div class="sidebar-heading mt-3">
                Menu Admin
            </div>
            <li class="nav-item <?php if($active == 'kompetensi'){ echo'active';}?>">
        		<a class="nav-link pb-0" href="<?= base_url('admin/kompetensi') ?>">
                <i class="fas fa-fw fa-tasks"></i>
        			<span>Manage Kompetensi</a>
        	</li>
			<li class="nav-item <?php if($active == 'profesi'){ echo'active';}?>">
        		<a class="nav-link pb-0" href="<?= base_url('admin/profesi') ?>">
                <i class="fas fa-fw fa-tasks"></i>
        			<span>Manage Profesi</a>
        	</li>
			<li class="nav-item <?php if($active == 'jurusan'){ echo'active';}?>">
        		<a class="nav-link pb-0" href="<?= base_url('admin/jurusan') ?>">
                <i class="fas fa-fw fa-user-tie"></i>
        			<span>Manage Jurusan</a>
        	</li>
            <?php endif; ?>

			<?php if($user['role'] == 2): ?>
			<div class="sidebar-heading mt-3">
                Menu Jurusan
            </div>
            <li class="nav-item <?php if($active == 'manage'){ echo'active';}?>">
        		<a class="nav-link pb-0" href="<?= base_url('jurusan/data') ?>">
                <i class="fas fa-fw fa-user-friends"></i>
        			<span>Data Mahasiwa</a>
        	</li>
            <?php endif; ?>

            <?php if($user['role'] == 3): ?>
			<div class="sidebar-heading mt-3">
                Pendaftaran Sertifikasi
            </div>
            <li class="nav-item <?php if($active == 'kompetensi'){ echo'active';}?>">
        		<a class="nav-link pb-0" href="<?= base_url('mahasiswa/kompetensi') ?>">
                <i class="fas fa-fw fa-tasks"></i>
        			<span>Kompetensi</a>
        	</li>
			<li class="nav-item <?php if($active == 'profesi'){ echo'active';}?>">
        		<a class="nav-link pb-0" href="<?= base_url('mahasiswa/profesi') ?>">
                <i class="fas fa-fw fa-tasks"></i>
        			<span>Kompetensi & Profesi</a>
        	</li>
			<li class="nav-item <?php if($active == 'pengumuman'){ echo'active';}?>">
        		<a class="nav-link pb-0" href="<?= base_url('mahasiswa/pengumuman') ?>">
                <i class="fas fa-fw fa-bullhorn"></i>
        			<span>Pengumuman</a>
        	</li>
            <?php endif; ?>

			
			<hr class="sidebar-divider mt-3">

        	<!-- Sidebar Toggler (Sidebar) -->
        	<div class="text-center d-none d-md-inline">
        		<button class="rounded-circle border-0" id="sidebarToggle"></button>
        	</div>

        </ul>
        <!-- End of Sidebar -->
