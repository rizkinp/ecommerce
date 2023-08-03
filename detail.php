<?php
session_start();

// Koneksi ke database
include 'koneksi.php';

// Mendapatkan id_produk dari url
$id_produk = $_GET['id'];

// Query ambil data
$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
$detail = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($detail);
// echo "</pre>";

// Jika tombol beli di klik
if(isset($_POST['beli'])){
  // Mendapatkan jumlah yang diinputkan
  $jumlah = $_POST['jumlah'];

  // Masukkan ke keranjang belanja
  $_SESSION['keranjang'][$id_produk] = $jumlah;

  echo "<div class='alert alert-success'>Produk telah masuk ke keranjang</div>";
  echo "<meta http-equiv='refresh' content='1;url=keranjang.php'>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Produk</title>
  <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
  <style>
    /* Palet Warna */
    :root {
      --primary-color: #007bff; /* Warna utama */
      --secondary-color: #6c757d; /* Warna sekunder */
      --success-color: #28a745; /* Warna sukses */
      --warning-color: #ffc107; /* Warna peringatan */
      --danger-color: #dc3545; /* Warna bahaya */
      --light-color: #f8f9fa; /* Warna terang */
      --dark-color: #343a40; /* Warna gelap */
    }

    /* Animasi */
    .fade-in {
      animation: fade-in 0.5s ease-in-out;
    }

    @keyframes fade-in {
      0% {
        opacity: 0;
        transform: translateY(20px);
      }
      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Typography */
    h2 {
      color: var(--primary-color);
      font-size: 24px;
      font-weight: bold;
    }

    h4 {
      color: var(--secondary-color);
      font-size: 18px;
      font-weight: bold;
    }

    h5 {
      color: var(--secondary-color);
      font-size: 16px;
    }

    p {
      color: var(--secondary-color);
      font-size: 14px;
      line-height: 1.6;
    }

    .btn-primary {
      background-color: var(--primary-color);
      border-color: var(--primary-color);
    }

    .btn-secondary {
      background-color: var(--secondary-color);
      border-color: var(--secondary-color);
    }

    .btn-secondary:hover {
      background-color: var(--light-color);
    }
  </style>
</head>
<body>
<!-- navbar -->
<?php include 'templates/navbar.php'; ?>

<section class="content fade-in">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <img src="foto_produk/<?= $detail['foto_produk']; ?>" class="img-responsive">
      </div>
      <div class="col-md-6">
        <h2><?= $detail['nama_produk']; ?></h2>
        <h4>Rp. <?= number_format($detail['harga_produk']); ?>,-</h4>
        <div class="d-flex align-items-center">
          <h5 class="mr-2">Stok :</h5>
          <h5><?= $detail['stok_produk']; ?></h5>
        </div>
        <form action="" method="post">
          <div class="form-group">
            <div class="input-group">
              <input type="number" min="1" max="<?= $detail['stok_produk']; ?>" class="form-control" style="width: 80px;" name="jumlah">
            </div>
            <small class="text-muted">Stok tersedia: <?= $detail['stok_produk']; ?></small>
          </div>
        </form>
        <p><?= $detail['deskripsi_produk']; ?></p>
        <a href="beli.php?id=<?= $detail['id_produk']; ?>" class="btn btn-primary">Masukan ke keranjang</a>
        <a href="checkout.php?id=<?= $detail['id_produk']; ?>" class="btn btn-primary">Beli</a>
      </div>
    </div>
  </div>
</section>

</body>
</html>
