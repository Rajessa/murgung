<?php
session_start();
include 'koneksi.php';
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM t_data WHERE id = '$id'"));

if (isset($_POST['edit'])) {
    $nama_proyek = $_POST['nama_proyek'];
    $pemberi_kerja = $_POST['pemberi_kerja'];
    $deskripsi = $_POST['deskripsi'];
    $tgl_mulai = $_POST['tanggal_mulai'];
    $tgl_selesai = $_POST['tanggal_selesai'];
    $kategori = $_POST['kategori'];
    $nilai_kontrak = $_POST['nilai_kontrak'];

    // Logic status otomatis
    $tanggal_sekarang = date('Y-m-d');
    if ($tgl_selesai < $tanggal_sekarang) {
        $status_proyek = 'Selesai';
    } else {
        $status_proyek = 'On Going';
    }

    // Path folder upload
    $lokasiUpload = 'img/project/';

    // Cek apakah ada gambar baru diupload
    if ($_FILES['image']['name']) {
        $namaFile = $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];
        $namaBaru = uniqid() . '-' . $namaFile;

        if (move_uploaded_file($tmp, $lokasiUpload . $namaBaru)) {
            // Hapus gambar lama
            if (!empty($data['image']) && file_exists($lokasiUpload . $data['image'])) {
                unlink($lokasiUpload . $data['image']);
            }

            // Update dengan gambar baru
            mysqli_query($conn, "UPDATE t_data SET 
                image='$namaBaru',
                nama_proyek='$nama_proyek',
                pemberi_kerja='$pemberi_kerja',
                deskripsi='$deskripsi',
                tanggal_dimulai_proyek='$tgl_mulai',
                tanggal_selesai_proyek='$tgl_selesai',
                kategori='$kategori',
                nilai_kontrak='$nilai_kontrak',
                status_proyek='$status_proyek'
                WHERE id='$id'");
        }
    } else {
        // Update tanpa ganti gambar
        mysqli_query($conn, "UPDATE t_data SET 
            nama_proyek='$nama_proyek',
            pemberi_kerja='$pemberi_kerja',
            deskripsi='$deskripsi',
            tanggal_dimulai_proyek='$tgl_mulai',
            tanggal_selesai_proyek='$tgl_selesai',
            kategori='$kategori',
            nilai_kontrak='$nilai_kontrak',
            status_proyek='$status_proyek'
            WHERE id='$id'");
    }

    // Log aktivitas
    mysqli_query($conn, "INSERT INTO log_aktivitas (admin_id, aktivitas) VALUES ('{$_SESSION['admin_id']}', 'Edit proyek ID: $id, Status: $status_proyek')");
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Proyek</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
  <div class="row">
    <!-- Sidebar -->
    <div class="col-md-2 bg-dark text-white min-vh-100 p-3">
      <h4>Admin Panel</h4>
      <hr>
      <ul class="nav flex-column">
        <li class="nav-item"><a href="index.php" class="nav-link text-white">📂 Kelola Project</a></li>
        <li class="nav-item"><a href="log.php" class="nav-link text-white">🕒 Log Aktivitas</a></li>
        <li class="nav-item"><a href="logout.php" class="nav-link text-white">🚪 Logout</a></li>
      </ul>
    </div>

    <!-- Main Content -->
    <div class="col-md-10 p-4">
      <h3>Edit Proyek</h3>
      <form method="post" enctype="multipart/form-data">
        <div class="mb-3">
          <label>Kategori</label>
          <select name="kategori" class="form-select" required>
            <option value="jalan" <?= $data['kategori'] == 'jalan' ? 'selected' : '' ?>>Jalan</option>
            <option value="gedung" <?= $data['kategori'] == 'gedung' ? 'selected' : '' ?>>Gedung</option>
            <option value="rumah" <?= $data['kategori'] == 'rumah' ? 'selected' : '' ?>>Rumah</option>
            <option value="lainnya" <?= $data['kategori'] == 'lainnya' ? 'selected' : '' ?>>Lainnya</option>
          </select>
        </div>

        <div class="mb-3">
          <label>Upload Gambar Baru (kosongkan jika tidak diganti)</label>
          <input type="file" name="image" class="form-control">
          <?php if ($data['image']): ?>
            <p class="mt-2">Gambar saat ini:</p>
            <img src="img/project/<?= $data['image']; ?>" width="150">
          <?php endif; ?>
        </div>

        <div class="mb-3">
          <label>Nama Proyek</label>
          <input type="text" name="nama_proyek" value="<?= $data['nama_proyek'] ?>" class="form-control" required>
        </div>

        <div class="mb-3">
          <label>Pemberi Pekerjaan</label>
          <input type="text" name="pemberi_kerja" value="<?= $data['pemberi_kerja'] ?>" class="form-control" required>
        </div>

        <div class="mb-3">
          <label>Nama Pekerjaan</label>
          <textarea name="deskripsi" class="form-control"><?= $data['deskripsi'] ?></textarea>
        </div>

        <div class="mb-3">
          <label>Tanggal Mulai</label>
          <input type="date" name="tanggal_mulai" value="<?= $data['tanggal_dimulai_proyek'] ?>" class="form-control" required>
        </div>

        <div class="mb-3">
          <label>Tanggal Selesai</label>
          <input type="date" name="tanggal_selesai" value="<?= $data['tanggal_selesai_proyek'] ?>" class="form-control" required>
        </div>

        <div class="mb-3">
          <label>Nilai Kontrak (Rp)</label>
          <input type="number" name="nilai_kontrak" value="<?= $data['nilai_kontrak'] ?? 0 ?>" class="form-control" required>
        </div>

        <button type="submit" name="edit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
      </form>
    </div>
  </div>
</div>
</body>
</html>
