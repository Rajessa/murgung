<?php
include 'header.php';
include 'admin/koneksi.php';

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM t_data WHERE id = '$id'"));

$fotos = [];
$foto_lain = mysqli_query($conn, "SELECT * FROM project_images WHERE project_id = '$id'");
while ($img = mysqli_fetch_assoc($foto_lain)) {
    $fotos[] = $img['image'];
}
?>

<style>
  .main-img {
    width: 100%;
    max-height: 500px;
    object-fit: cover;
    margin-bottom: 20px;
    cursor: zoom-in;
  }

  .carousel {
    margin-bottom: 30px;
  }

  .carousel .carousel-item {
    width: 300px !important;
    height: 200px;
  }

  .carousel .carousel-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .project-table {
    margin-top: 30px;
  }

  .project-table td {
    padding: 8px 10px;
  }

  .swiper {
  width: 100%;
  height: 400px;
  margin-top: 20px;
}

.swiper-slide img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  border-radius: 8px;
}

.swiper-button-next,
.swiper-button-prev {
  z-index: 10000 !important;
}

</style>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<div class="container">
  <h3 class="center grey-text text-darken-2">Detail Proyek</h3>

  <!-- Gambar Utama -->
  <img src="admin/img/project/<?= $data['image']; ?>" class="main-img materialboxed">

  <!-- Slider Foto Lain -->
  <?php if (count($fotos) > 0): ?>
  <div class="swiper mySwiper">
    <div class="swiper-wrapper">
      <?php foreach ($fotos as $img): ?>
      <div class="swiper-slide">
        <img src="admin/img/project/<?= $img; ?>" class="img-fluid materialboxed" alt="Foto Tambahan">
      </div>
      <?php endforeach; ?>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
  </div>
  <?php else: ?>
  <p class="text-muted">Tidak ada foto tambahan.</p>
  <?php endif; ?>

  <!-- Tabel Deskripsi -->
  <table class="highlight project-table">
    <tbody>
      <tr>
        <td><strong>Pemberi Kerja</strong></td>
        <td><?= $data['pemberi_kerja']; ?></td>
      </tr>
      <tr>
        <td><strong>Tanggal Mulai</strong></td>
        <td><?= date('d M Y', strtotime($data['tanggal_dimulai_proyek'])); ?></td>
      </tr>
      <tr>
        <td><strong>Tanggal Selesai</strong></td>
        <td><?= date('d M Y', strtotime($data['tanggal_selesai_proyek'])); ?></td>
      </tr>
      <tr>
        <td><strong>Status Proyek</strong></td>
        <td><?= $data['status_proyek']; ?></td>
      </tr>
      <tr>
        <td><strong>Nilai Kontrak</strong></td>
        <td>Rp <?= number_format($data['nilai_kontrak'], 0, ',', '.'); ?></td>
      </tr>
      <tr>
        <td><strong>Nama Pekerjaan</strong></td>
        <td><?= nl2br($data['deskripsi']); ?></td>
      </tr>
    </tbody>
  </table>

  <div class="center">
    <a href="projects.php" class="btn yellow black-text" style="margin-top: 20px;">← Kembali ke Projects</a>
  </div>
</div>

<!-- JS Swiper dan Materialbox -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    var elems = document.querySelectorAll('.materialboxed');
    M.Materialbox.init(elems);

    var swiper = new Swiper('.mySwiper', {
      loop: true,
      spaceBetween: 20,
      slidesPerView: 1,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      effect: 'fade',
      fadeEffect: {
        crossFade: true
      },
      autoplay: {
        delay: 3000,
        disableOnInteraction: false,
      },
    });

    // Pause autoplay saat zoom gambar
    elems.forEach(function (el) {
      el.addEventListener('click', function () {
        swiper.autoplay.stop();
      });
    });

    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape') {
        swiper.autoplay.start();
      }
    });

    document.addEventListener('click', function (e) {
      if (document.querySelector('.materialbox-overlay') && !e.target.classList.contains('materialboxed')) {
        swiper.autoplay.start();
      }
    });
  });
</script>

<?php include 'footer.php'; ?>
