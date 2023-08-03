
<?php
session_start();

// koneksi ke database
include 'koneksi.php';

if (empty($_SESSION["keranjang"]) || !isset($_SESSION["keranjang"])) {
  echo "<script>alert('Keranjang kosong, silahkan pilih produk!');</script>";
  echo "<script>location='index.php';</script>";
}
// Proses ceklis data yang di-checklist
if (isset($_POST["checkout"])) {
  $checkedItems = $_POST["checklist"]; // Mendapatkan array id_produk yang di-checklist
  $_SESSION["keranjang"] = []; // Mengosongkan keranjang
  foreach ($checkedItems as $id_produk) {
    // Menyimpan produk yang di-checklist ke dalam session keranjang
    $_SESSION["keranjang"][$id_produk] = 1;
  }
  // Redirect ke halaman checkout
  echo "<script>location='checkout.php';</script>";
}

// Rest of your code...
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Keranjang Belanja</title>
  <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
  <style>
    .content {
      animation: slide-up 0.5s ease-in-out;
    }

    @keyframes slide-up {
      0% {
        opacity: 0;
        transform: translateY(50px);
      }
      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Gaya tambahan untuk tabel belanja */
    table.table-bordered {
      border-collapse: collapse;
    }

    table.table-bordered thead th {
      background-color: #f8f9fa;
      border: 1px solid #dee2e6;
    }

    table.table-bordered tbody td {
      background-color: #fff;
      border: 1px solid #dee2e6;
    }

    table.table-bordered tbody td:hover {
      background-color: #f2f5f8;
    }
  </style>
</head>
<body>
<?php include 'templates/navbar.php'; ?>
  <!-- Body section -->
  <form action="" method="post">
    <table class="table table-bordered">
      <!-- Table content -->
      <thead>
        <tr>
          <th>No</th>
          <th>Gambar</th>
          <th>Produk</th>
          <th>Harga</th>
          <th>Jumlah</th>
          <th>Subharga</th>
          <th>Checklist</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; ?>
        <?php foreach ($_SESSION['keranjang'] as $id_produk => $jumlah): ?>
          <!-- Menampilkan produk yang sedang duperulangkan berdasarkan id_produk -->
          <?php
          $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
          $pecah = $ambil->fetch_assoc();
          

          $subharga = $pecah['harga_produk'] * $jumlah;
          ?>
          <tr>
            <td><?= $no++; ?></td>
            <td>
            <img src="foto_produk/<?= $pecah['foto_produk']; ?>" style="width: 100px;">
            </td>
            <td><?= $pecah['nama_produk']; ?></td>
            <td>Rp. <?= number_format($pecah['harga_produk']); ?>,-</td>
            <td><?= $jumlah; ?></td>
            <td>Rp. <?= number_format($subharga); ?>,-</td>
            <td>
              <input type="checkbox" name="checklist[]" value="<?= $id_produk; ?>">
            </td>
            <td>
            <a href="hapuskeranjang.php?id=<?= $id_produk; ?>" class="btn btn-danger btn-xs">hapus</a>
          </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <a href="index.php" class="btn btn-default">Lanjutkan Belanja</a>
    <button class="btn btn-primary" type="submit" name="checkout">Checkout</button>
  </form>
  <!-- Rest of your code... -->
</body>
</html>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Keranjang Belanja</title>
  <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
  <style>
    .content {
      animation: slide-up 0.5s ease-in-out;
    }

    @keyframes slide-up {
      0% {
        opacity: 0;
        transform: translateY(50px);
      }
      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Gaya tambahan untuk tabel belanja */
    table.table-bordered {
      border-collapse: collapse;
    }

    table.table-bordered thead th {
      background-color: #f8f9fa;
      border: 1px solid #dee2e6;
    }

    table.table-bordered tbody td {
      background-color: #fff;
      border: 1px solid #dee2e6;
    }

    table.table-bordered tbody td:hover {
      background-color: #f2f5f8;
    }
  </style>
</head>
<body>



<section class="content">
  <div class="container">
    <h1>Keranjang Belanja</h1>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Produk</th>
          <th>Harga</th>
          <th>Jumlah</th>
          <th>Subharga</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
       