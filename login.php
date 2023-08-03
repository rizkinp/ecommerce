<?php
session_start();

// koneksi ke database
include 'koneksi.php';

// jika tombol login ditekan
if(isset($_POST['login'])){

  $email = $_POST['email'];
  $password = $_POST['password'];

  // Melakukan query pada tabel pelanggan
  $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email' AND password_pelanggan='$password'");

  // Mengecek akun yang cocok (email & password)
  $akunyangcocok = $ambil->num_rows;

  // Jika ada akun yang cocok
  if($akunyangcocok == 1){
    // Mendapatkan akun dalam bentuk array
    $akun = $ambil->fetch_assoc();

    // Simpan di session
    $_SESSION["pelanggan"] = $akun;
    echo "<div class='alert alert-success'>Login sukses</div>";

    // Jika sudah belanja
    if(isset($_SESSION['keranjang']) OR !empty($_SESSION['keranjang'])){
      echo "<meta http-equiv='refresh' content='1;url=checkout.php'>";
    }
    else{
      echo "<meta http-equiv='refresh' content='1;url=riwayat.php'>";
    }
  }
  else{
    echo "<div class='alert alert-danger'>Login gagal!</div>";
    echo "<meta http-equiv='refresh' content='1;url=login.php'>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap">
  <style>
    * {
      margin: 0;
      padding: 0;
      font-family: 'Poppins', sans-serif;
    }

    section {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      width: 100%;
      background-position: center;
      background-size: cover;
    }

    video {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      z-index: -1;
    }

    .form-box {
      position: relative;
      width: 400px;
      height: 450px;
      background: transparent;
      border: 2px solid rgba(255, 255, 255, 0.5);
      border-radius: 20px;
      backdrop-filter: blur(15px);
      display: flex;
      justify-content: center;
      align-items: center;
    }

    h2 {
      font-size: 2em;
      color: #fff;
      text-align: center;
    }

    .inputbox {
      position: relative;
      margin: 30px 0;
      width: 310px;
      border-bottom: 2px solid #fff;
    }

    .inputbox label {
      position: absolute;
      top: 50%;
      left: 5px;
      transform: translateY(-50%);
      color: #fff;
      font-size: 1em;
      pointer-events: none;
      transition: .5s;
    }

    input:focus~label,
    input:valid~label {
      top: -5px;
    }

    .inputbox input {
      width: 100%;
      height: 50px;
      background: transparent;
      border: none;
      outline: none;
      font-size: 1em;
      padding: 0 35px 0 5px;
      color: #fff;
    }

    .inputbox ion-icon {
      position: absolute;
      right: 8px;
      color: #fff;
      font-size: 1.2em;
      top: 20px;
    }

    .forget {
      margin: -15px 0 15px;
      font-size: .9em;
      color: #fff;
      display: flex;
      justify-content: space-between;
    }

    .forget label input {
      margin-right: 3px;
    }

    .forget label a {
      color: #fff;
      text-decoration: none;
    }

    .forget label a:hover {
      text-decoration: underline;
    }

    button {
      width: 100%;
      height: 40px;
      border-radius: 40px;
      background: #fff;
      border: none;
      outline: none;
      cursor: pointer;
      font-size: 1em;
      font-weight: 600;
    }

    .register {
      font-size: .9em;
      color: #fff;
      text-align: center;
      margin: 25px 0 10px;
    }

    .register p a {
      text-decoration: none;
      color: #fff;
      font-weight: 600;
    }

    .register p a:hover {
      text-decoration: underline;
    }
  </style>
  <title>MEOW DONALD'sLOOGIN</title>
</head>
<body>
  <section>
    <video src="bg_video.mp4" autoplay muted loop></video>
    <div class="form-box">
      <div class="form-value">
        <form action="" method="post">
          <h2>Login</h2>
          <div class="inputbox">
            <ion-icon name="mail-outline"></ion-icon>
            <input type="email" name="email" required>
            <label for="">Email</label>
          </div>
          <div class="inputbox">
            <ion-icon name="lock-closed-outline"></ion-icon>
            <input type="password" name="password" required>
            <label for="">Password</label>
          </div>
          <div class="forget">
            <label for=""><input type="checkbox">Remember Me <a href="#">Forget Password</a></label>
          </div>
          <button type="submit" name="login">Log in</button>
          <div class="register">
            <p>Don't have an account? <a href="daftar.php">Register</a></p>
          </div>
        </form>
      </div>
    </div>
  </section>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
