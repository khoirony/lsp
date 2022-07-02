<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="<?= base_url('assets/'); ?>css/styles1.css" rel="stylesheet">

	<script src="https://kit.fontawesome.com/c12c059ff2.js" crossorigin="anonymous"></script>
	<title><?= $title; ?></title>

  
    <!-- Import Map -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
   integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
   crossorigin=""/>
   <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
   integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
   crossorigin=""></script>
</head>

<body>
<!-- <nav class="navbar navbar-expand-lg navbar-dark text-white bg-secondary shadow">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item">
          <a class="nav-link me-3 text-white" href="<?= base_url('/');?>">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link me-3 text-white" href="<?= base_url('auth/profile');?>">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link me-3 text-white" href="<?= base_url('auth/bidang');?>">Data Bidang Tanah</a>
        </li>
		    <li class="nav-item">
          <a class="nav-link me-3 text-white" href="<?= base_url('auth/kegiatan');?>">Data Kegiatan</a>
        </li>
      </ul>
    </div>
  </div>
</nav> -->