<?php 
include 'header.php';
include 'js/koneksi.php';

// Ambil status dari parameter URL
$status = isset($_GET['status']) ? $_GET['status'] : 'Semua';

// Query data proyek
if ($status == 'Semua') {
    $projects = mysqli_query($con, "SELECT * FROM t_data ORDER BY tanggal_dimulai_proyek DESC");
} else {
    $projects = mysqli_query($con, "SELECT * FROM t_data WHERE status_proyek='$status' ORDER BY tanggal_dimulai_proyek DESC");
}
?>

<style>
   .project-section {
    padding: 50px 0;
  }

  .filter-btn {
    margin: 0 5px 20px 5px;
    background-color: #6F826A !important;
    color: white !important;
  }

  .hide {
    display: none !important;
  }

  .card-image img {
    width: 100%;
    height: 200px;
    object-fit: cover;
  }

  .card.fixed-height {
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  box-shadow: 0 4px 8px rgba(0,0,0,0.1); /* Tambahan biar elegan */
  border-radius: 8px;
  overflow: hidden;
}

.card-content {
  padding: 15px;
  flex-grow: 1;
}

.card-image img {
  width: 100%;
  height: 200px;
  object-fit: cover;
}

.project-title {
  font-size: 18px;
  font-weight: bold;
  display: block;
  margin-bottom: 8px;
  color: #333;
}

.project-description {
  font-size: 14px;
  color: #777;
}

.card-action a {
  color: #6F826A !important;
  font-weight: bold;
  padding: 10px 15px;
  display: block;
}

.project-title {
  font-size: 18px;
  font-weight: bold;
  display: block;
  margin-bottom: 8px;
  color: #333;
  height: 48px; /* fix tinggi judul */
  overflow: hidden;
  text-overflow: ellipsis;
  display: -webkit-box;
  -webkit-line-clamp: 2; /* maksimal 2 baris */
  -webkit-box-orient: vertical;
}

.filter-btn {
  font-family: "Acme", sans-serif;
  font-size: 16px; /* sesuaikan ukuran jika perlu */
  font-weight: 400;
  color: white !important;
  background-color: #6F826A !important;
}

.status-filter-info {
  background-color: #f0f8e0;
  color: #4a6c45;
  padding: 12px 20px;
  border: 2px solid #4a6c45;
  border-radius: 8px;
  display: inline-block;
  font-weight: bold;
  margin-bottom: 20px;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
}



</style>

<body>
  <div class="parallax-container valign-wrapper">
    <div class="container">
      <div class="row center">
        <h3 class="header white-text">PROJECTS</h3>
      </div>
    </div>
    <div class="parallax">
      <img src="img/bg_gedung1.jpg" alt="Background Gedung">
    </div>
  </div>

  <section class="project-section">
    <div class="container">
      <!-- Info Filter Aktif -->
      <?php if ($status != 'Semua') : ?>
  <div class="center">
    <p class="status-filter-info">
      Menampilkan Proyek <?= $status; ?>
    </p>
  </div>
<?php endif; ?>


      <!-- Filter Kategori -->
      <div class="center">
        <button class="btn filter-btn" data-filter="all">Semua Kategori</button>
        <button class="btn filter-btn" data-filter="rumah">Rumah</button>
        <button class="btn filter-btn" data-filter="gedung">Gedung</button>
        <button class="btn filter-btn" data-filter="jalan">Jalan</button>
        <button class="btn filter-btn" data-filter="lainnya">Lainnya</button>
      </div>

      <!-- Tampilkan Proyek -->
      <div class="row">
        <?php while ($row = mysqli_fetch_assoc($projects)) : ?>
          <div class="col s12 m4 project-item <?= strtolower($row['kategori']); ?>">
            <div class="card fixed-height">
              <div class="card-image">
                <a href="project_detail.php?id=<?= $row['id']; ?>">
                  <img src="admin/img/project/<?= $row['image']; ?>" alt="<?= $row['pemberi_kerja']; ?>">
                </a>
              </div>
              <div class="card-content">
                <a href="project_detail.php?id=<?= $row['id']; ?>">
                  <span class="project-title"><?= $row['nama_proyek']; ?></span>
                </a>
                <p class="project-description">
                  Kategori: <?= ucfirst($row['kategori']); ?><br>
                  Status: <?= $row['status_proyek']; ?>
                </p>
              </div>
              <div class="card-action">
                <a href="project_detail.php?id=<?= $row['id']; ?>">Selengkapnya »</a>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
  </section>

  <script>
    const filterButtons = document.querySelectorAll('.filter-btn');
    const projects = document.querySelectorAll('.project-item');

    filterButtons.forEach(btn => {
      btn.addEventListener('click', () => {
        const filter = btn.getAttribute('data-filter');
        projects.forEach(project => {
          if (filter === 'all') {
            project.classList.remove('hide');
          } else {
            project.classList.toggle('hide', !project.classList.contains(filter));
          }
        });
      });
    });
  </script>

<?php include 'footer.php'; ?>
