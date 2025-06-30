<?php 
session_start();
include 'js/koneksi.php';
if (isset($_SESSION['kd_cs'])) {
  $kode_cs = $_SESSION['kd_cs'];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>PT. Murgung Nusa Parama</title>

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="css/materialize.min.css">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
  <link rel="shortcut icon" href="img/logo/logo-murgung2.jpg" type="image/x-icon">
</head>

<style>
body {
  font-family: "PT Serif", serif;
  background: linear-gradient(to bottom, #d0f0c0, #ffffff);
}

.top-bar a {
  margin-left: 10px;
}
.top-bar i {
  vertical-align: middle;
  margin-right: 5px;
}

.brand-logo img {
  height: 50px;
  margin-top: 5px;
}

.sidenav {
  background-color: #4a6c45;
}
.sidenav li a {
  color: white;
  font-size: 18px;
}

.collapsible-header {
  color: white;
}
.collapsible-body a {
  color: white;
  padding-left: 30px;
}
</style>

<body id="home" class="scrollspy">

<!-- Top Bar -->
<div style="background-color:rgb(0, 0, 0); color: white; font-size: 14px; padding: 6px 0;">
  <div class="container">
    <div class="row" style="margin-bottom: 0;">
      <div class="col s12 m6">
        <span><i class="fa fa-envelope"></i> murgungnusaparama@gmail.com </span>
        &nbsp;&nbsp;
        <span><i class="fa fa-phone"></i> +62 821-1600-0463</span>
      </div>
      <div class="col s12 m6 right-align">
        <a href="https://www.facebook.com/61553585624739" class="white-text" style="margin: 0 6px;"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="white-text" style="margin: 0 6px;"><i class="fab fa-twitter"></i></a>
        <a href="https://www.instagram.com/murgungindonesia/" class="white-text" style="margin: 0 6px;"><i class="fab fa-instagram"></i></a>
        <a href="https://maps.app.goo.gl/wGTpDHjoStNjDW7K8" class="white-text" style="margin: 0 6px;"><i class="fa-solid fa-location-dot"></i></a>
      </div>
    </div>
  </div>
</div>

<!-- Navbar -->
<nav style="background-color: #4a6c45;">
  <div class="container">
    <div class="nav-wrapper">
      <a href="index.php" class="brand-logo">
        <img src="img/logo/logo-murgung.png" alt="Logo">
      </a>
      <a href="#" data-target="mobile-nav" class="sidenav-trigger right"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="index.php" class="white-text" style="font-size: 18px;">Home</a></li>
        <li><a href="service.php" class="white-text" style="font-size: 18px;">Services</a></li>

        <!-- Dropdown Projects Desktop -->
        <li>
          <a class="dropdown-trigger white-text" href="#!" data-target="dropdown-projects" style="font-size: 18px;">
            Projects <i class="material-icons right">arrow_drop_down</i>
          </a>
        </li>

        <li><a href="aboutus.php" class="white-text" style="font-size: 18px;">About Us</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Dropdown Content for Desktop -->
<ul id="dropdown-projects" class="dropdown-content">
  <li><a href="projects.php?status=Selesai">Proyek Selesai</a></li>
  <li><a href="projects.php?status=On Going">Proyek On Going</a></li>
</ul>

<!-- Sidebar Mobile -->
<ul class="sidenav" id="mobile-nav">
  <li><a href="index.php">Home</a></li>
  <li><a href="service.php">Services</a></li>

  <!-- Collapsible Dropdown untuk Projects di Mobile -->
  <li>
    <ul class="collapsible collapsible-accordion">
      <li>
        <a class="collapsible-header">Projects <i class="material-icons right">arrow_drop_down</i></a>
        <div class="collapsible-body">
          <ul>
            <li><a href="projects.php?status=Selesai">Proyek Selesai</a></li>
            <li><a href="projects.php?status=On Going">Proyek On Going</a></li>
          </ul>
        </div>
      </li>
    </ul>
  </li>

  <li><a href="aboutus.php">About Us</a></li>
</ul>

<!-- JS Materialize -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Init sidenav
    const sidenav = document.querySelectorAll('.sidenav');
    M.Sidenav.init(sidenav);

    // Init dropdown
    const dropdowns = document.querySelectorAll('.dropdown-trigger');
    M.Dropdown.init(dropdowns, {
      coverTrigger: false
    });

    // Init collapsible (untuk menu dropdown di mobile)
    const collapsibles = document.querySelectorAll('.collapsible');
    M.Collapsible.init(collapsibles);
  });
</script>
