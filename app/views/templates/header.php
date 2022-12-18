<?php header('Access-Control-Allow-Origin: *'); //for all 
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="<?= BASEURL; ?>/css/cursor.css">
  <title><?= $data['judul']; ?></title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow p-3">
    <div class="container">
      <a class="navbar-brand" href="<?= BASEURL; ?>">My Kuliah</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <ul class="navbar-nav">
          <a class="nav-link active" href="<?= BASEURL; ?>">Home</a>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Matkul
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="<?= BASEURL; ?>/matkul">Daftar Matkul</a></li>
              <li><a class="dropdown-item" href="<?= BASEURL; ?>/matkul/editmatkul">Edit Matkul</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Akademik
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="<?= BASEURL; ?>/akademik">KS/KHS</a></li>
              <li><a class="dropdown-item" href="<?= BASEURL; ?>/akademik/transkrip">Transkrip</a></li>
              <li><a class="dropdown-item" href="<?= BASEURL; ?>/akademik/perwalian">Perwalian</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Jadwal
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="<?= BASEURL; ?>/jadwal/inputjadwal">Input Jadwal</a></li>
            </ul>
          </li>
          <a class="nav-link" href="<?= BASEURL; ?>/about">About</a>
        </ul>
      </div>
    </div>
  </nav>