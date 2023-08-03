<?php 
// koneksi ke database 
include 'koneksi.php'; 
 
// Jika tombol daftar ditekan 
if (isset($_POST['daftar'])) { 
  // Mengambil isian nama, email, password, alamat, telepon 
  $nama = $_POST['nama']; 
  $email = $_POST['email']; 
  $password = $_POST['password']; 
  $alamat = $_POST['alamat']; 
  $telepon = $_POST['telepon']; 
 
  // Cek apakah email sudah digunakan atau belum 
  $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email'"); 
  $yangcocok = $ambil->num_rows; 
  if ($yangcocok == 1) { 
    echo "<script>alert('Pendaftaran gagal, email sudah digunakan!')</script>"; 
    echo "<style>#email { border-color: red; }</style>"; 
  } else { 
    // Insert ke tabel pelanggan 
    $koneksi->query("INSERT INTO pelanggan(email_pelanggan, password_pelanggan, nama_pelanggan, telepon_pelanggan, alamat_pelanggan) VALUES('$email', '$password', '$nama', '$telepon', '$alamat')"); 
    echo "<script>alert('Pendaftaran sukses, Silahkan login')</script>"; 
    echo "<meta http-equiv='refresh' content='1;url=login.php'>"; 
  } 
} 
?> 
 
<!DOCTYPE html> 
<html lang="en"> 
 
<head> 
  <meta charset="UTF-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <title>Meow Donald's Daftar</title> 
  <link rel="stylesheet" href="style.css"> 
</head> 
 
<body> 
  <section> 
  <video src="bg_video.mp4" autoplay muted loop></video>
    <div class="form-box"> 
      <div class="form-value"> 
        <form action="" method="post"> 
          <h2>Daftar Pelanggan</h2> 
          <div class="inputbox"> 
            <ion-icon name="person-outline"></ion-icon> 
            <input type="text" name="nama" required> 
            <label for="nama">Nama</label> 
          </div> 
          <div class="inputbox"> 
            <ion-icon name="mail-outline"></ion-icon> 
            <input type="email" name="email" required id="email"> 
            <label for="email">Email</label> 
          </div> 
          <div class="inputbox"> 
            <ion-icon name="lock-closed-outline"></ion-icon> 
            <input type="password" name="password" required> 
            <label for="password">Password</label> 
          </div> 
          <div class="inputbox"> 
            <ion-icon name="call-outline"></ion-icon> 
            <input type="text" name="telepon" required> 
            <label for="telepon">Telepon</label> 
          </div> 
          <div class="inputbox"> 
            <ion-icon name="location-outline"></ion-icon> 
            <input name="alamat" required></input> 
            <label for="alamat">Alamat</label> 
          </div> 
          <button type="submit" name="daftar">Daftar</button> 
          <div class="register"> 
            <p>Sudah memiliki akun? <a href="login.php">Login</a></p> 
          </div> 
        </form> 
      </div> 
    </div> 
  </section> 
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script> 
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script> 
</body> 
 
</html>