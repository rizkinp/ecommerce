
<?php 
session_start(); 
// koneksi ke database 
include 'koneksi.php'; 
?> 
 
<!DOCTYPE html> 
<html lang="en"> 
<head> 
  <meta charset="UTF-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <title>Meow Donald's</title> 
  <link rel="stylesheet" href="admin/assets/css/bootstrap.css"> 
  <style> 
    .thumbnail { 
      position: relative; 
      overflow: hidden; 
    } 
 
    .thumbnail img { 
      width: 100%; 
      height: auto; 
      transition: transform 0.3s ease; 
    } 
 
    .thumbnail:hover img { 
      transform: scale(1.1); 
    } 
 
    .thumbnail .caption { 
      position: absolute; 
      bottom: 0; 
      width: 100%; 
      padding: 10px; 
      background-color: rgba(0, 0, 0, 0.7); 
      color: #fff; 
      transition: opacity 0.3s ease; 
      opacity: 0; 
    } 
 
    .thumbnail:hover .caption { 
      opacity: 1; 
    } 
 
    .thumbnail .caption h3 { 
      margin-top: 0; 
    } 
 
    .thumbnail .caption h5 { 
      margin-bottom: 10px; 
    } 
 
    .row { 
      display: flex; 
      flex-wrap: wrap; 
      justify-content: center; 
      align-items: flex-start; 
      gap: 20px; 
    } 
  </style> 
</head> 
<body> 
 
<?php include 'templates/navbar.php'; ?> 
<style> 
.carousel-inner > .item > img { 
  width: 1500px; /* Atur lebar carousel */ 
  height: 600px; 
} 
</style> 
 
<!-- CARAOUSEL --> 
<div id="myCarousel" class="carousel slide" data-ride="carousel"> 
  <!-- Indicators --> 
  <ol class="carousel-indicators"> 
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li> 
    <li data-target="#myCarousel" data-slide-to="1"></li> 
    <li data-target="#myCarousel" data-slide-to="2"></li> 
  </ol> 
 
  <!-- Wrapper for slides --> 
  <!-- GANTI GAMBAR NG KENE --> 
  <div class="carousel-inner"> 
    <div class="item active"> 
      <img src="welcom.jpg" alt="Los Angeles"> 
    </div> 
 
    <div class="item"> 
      <img src="produk.jpg" alt="Chicago"> 
    </div> 
 
    <div class="item"> 
      <img src="bgkucing.jpg" alt="New York"> 
    </div> 
  </div> 
 
  <!-- Left and right controls --> 
  <a class="left carousel-control" href="#myCarousel" data-slide="prev"> 
    <span class="glyphicon glyphicon-chevron-left"></span> 
    <span class="sr-only">Previous</span> 
  </a> 
  <a class="right carousel-control" href="#myCarousel" data-slide="next"> 
    <span class="glyphicon glyphicon-chevron-right"></span> 
    <span class="sr-only">Next</span> 
  </a> 
</div> 
 
<!-- konten --> 
<head> 
    <style> 
        h2 { 
            color: #EEE3CB; 
            font-size: 30px; 
            font-weight: bold; 
            margin-bottom: 20px; /* Menambahkan jarak 20px di bawah h2 */ 
        } 
        .product-section { 
            background-color: #9BABB8; 
            background-size: cover; /* Mengatur agar latar belakang memenuhi elemen */ 
            background-position: center; /* Mengatur posisi latar belakang menjadi tengah */ 
            padding: 10px; 
        } 
    </style> 
</head> 
<body> 
  <section id="product" class="py-5 product-section"> 
<section class="content"> 
  <div class="container" > 
    <h2>Our Product</h2> 
    <div class="row"> 
      <?php 
      $ambil = $koneksi->query("SELECT * FROM produk"); 
      while($perproduk = $ambil->fetch_assoc()): 
      ?> 
      <div class="col-md-3"> 
        <div class="thumbnail"> 
          <img src="foto_produk/<?= $perproduk['foto_produk']; ?>"> 
          <div class="caption"> 
            <h3><?= $perproduk['nama_produk']; ?></h3> 
            <h5>Rp. <?= number_format($perproduk['harga_produk']); ?>,-</h5> 
            <a href="beli.php?id=<?= $perproduk['id_produk']; ?>" class="btn btn-primary">beli</a> 
            <a href="detail.php?id=<?= $perproduk['id_produk']; ?>" class="btn btn-default">detail</a> 
          </div> 
        </div> 
      </div> 
      <?php endwhile; ?> 
    </div> 
  </div> 
</section> 
  </section> 
</body> 
 
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/

naa, [6/20/2023 10:31 AM]
2.9.2/umd/popper.min.js"></script> 
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script> 
<script> 
  $(document).ready(function() { 
    $('.thumbnail').hover( 
      function() { 
        $(this).find('.caption').fadeIn(200); 
      }, 
      function() { 
        $(this).find('.caption').fadeOut(200); 
      } 
    ); 
  }); 
</script> 
 
<!-- about meow --> 
<head> 
    <style> 
        .about-meow-section { 
            background-color: #EEE3CB; 
            padding: 10px; 
        } 
         
        .about-meow-section h2 { 
            color: #967E76; 
            font-size: 30px; 
            font-weight: bold; 
            margin-bottom: 20px; /* Menambahkan jarak 20px di bawah h2 */ 
        } 
         
        .about-meow-section p { 
            text-align: center; /* Mengatur paragraf di tengah secara horizontal */ 
        } 
    </style> 
</head> 
<body> 
    <!-- Konten HTML lainnya --> 
    <!-- about meow section --> 
    <section id="about_meow" class="py-5 about-meow-section"> 
        <div class="container"> 
            <div class="row gy-lg-5 align-items-center"> 
                <div class="col-lg-6 order-lg-1 text-center text-lg-start"> 
                    <div class="title pt-3 pb-5"> 
                        <h2 class="position-relative d-inline-block ms-4">Meow Donald's</h2> 
                    </div> 
                    <p>Welcome to our petshop! We are dedicated to providing the best products and services for your beloved pets</p> 
                    <p>At our petshop, you can find a wide range of high-quality pet supplies, including food, toys, accessories, grooming products, and more</p> 
                    <p>We carefully select our products to ensure they meet the needs and preferences of different pets.</p> 
                    <p>Visit our store today and explore the world of pet essentials. We look forward to serving you and your furry friends!</p> 
                </div> 
            </div> 
        </div> 
    </section> 
    <!-- end of about us section --> 
    <!-- Konten HTML lainnya --> 
</body> 
<!-- end of about meow --> 
 
 
<!-- about us --> 
<head> 
    <style> 
        .about-us-section { 
            background-color: #9BABB8; 
            background-size: cover; /* Mengatur agar latar belakang memenuhi elemen */ 
            background-position: center; /* Mengatur posisi latar belakang menjadi tengah */ 
            padding: 10px; 
        } 
         
   
        .about-us-section h2 { 
            color: #EEE3CB; 
            font-size: 30px; 
            font-weight: bold; 
            margin-bottom: 10px;/* Menambahkan jarak 20px di bawah h2 */ 
        } 
    </style> 
</head> 
<body> 
    <!-- Konten HTML lainnya --> 
    <!-- about us section --> 
    <section id="about" class="py-5 about-us-section"> 
        <div class="container"> 
            <div class="row gy-lg-5 align-items-center"> 
                <div class="col-lg-6 order-lg-1 text-center text-lg-start"> 
                    <div class="title pt-3 pb-5"> 
                        <h2 class="position-relative d-inline-block ms-4">Our Team</h2> 
                    </div> 
                    <div class="row"> 
                        <div> 
                            <img src="rizkinur.jpg" alt="" class="img-fluid"> 
                            <h3 class="text-center">Rizki Nur Pratama</h3> 
                        </div> 
                        <div> 
                            <img src="rinadwi.jpg" alt="" class="img-fluid"> 
                            <h3 class="text-center">Rina Dwi Oktavia</h3> 
                        </div> 
                    </div> 
                </div> 
            </div> 
        </div> 
    </section> 
    <!-- end of about us section --> 
    <!-- Konten HTML lainnya --> 
</body> 
 
<!-- end of about us --> 
 
<!-- footer --> 
<head> 
    <style> 
        .footer-section { 
            background-color: #EEE3CB; 
            background-size: cover; /* Mengatur agar latar belakang memenuhi elemen */

background-position: center; /* Mengatur posisi latar belakang menjadi tengah */ 
        } 
 
        .footer-section h3 { 
            color: #967E76; 
            font-size: 20px; 
            font-weight: bold; 
            margin-bottom: 10px;/* Menambahkan jarak 20px di bawah h2 */ 
        } 
    </style> 
</head> 
<body> 
<section id="footer" class="py-5 footer-section"> 
    <div class="container"> 
        <div class="row text-white g-4"> 
        <div class="col-md-6 col-lg-3"> 
          <a href="index.php"> 
            <img src="templates/meow.png" alt="Logo" class="img-fluid" style="max-width: 250px; max-height: 250px;"> 
         </a> 
        </div> 
            <div class="col-md-6 col-lg-3"> 
                <h3 class="fw-light">Links</h3> 
                <ul class="list-unstyled"> 
                    <li class="my-3"> 
                        <a href="index.php" class="text-white text-decoration-none text-muted"> 
                            <i class="fas fa-chevron-right me-1"></i> Home 
                        </a> 
                    </li> 
 
                    <li class="my-3"> 
                        <a href="#product" class="text-white text-decoration-none text-muted"> 
                            <i class="fas fa-chevron-right me-1"></i> Our Product 
                        </a> 
                    </li> 
 
                    <li class="my-3"> 
                        <a href="keranjang.php" class="text-white text-decoration-none text-muted"> 
                            <i class="fas fa-chevron-right me-1"></i> Cart 
                        </a> 
                    </li> 
 
                    <li class="my-3"> 
                        <a href="riwayat.php" class="text-white text-decoration-none text-muted"> 
                            <i class="fas fa-chevron-right me-1"></i> Purchase History 
                        </a> 
                    </li> 
                    <li class="my-3"> 
                      <a href="#about_meow" class="text-white text-decoration-none text-muted"> 
                        <i class="fas fa-chevron-right me-1"></i> Meow Donald's</a> 
                    </li> 
 
                    <li class="my-3"> 
                    <a href="#about" class="text-white text-decoration-none text-muted"> 
                            <i class="fas fa-chevron-right me-1"></i> Our Team 
                        </a> 
                    </li> 
                </ul> 
            </div> 
 
            <div class="col-md-6 col-lg-3"> 
                <h3 class="fw-light mb-3">Contact Us</h3> 
                <div class="d-flex justify-content-start align-items-start my-2 text-muted"> 
                    <span class="me-3"> 
                        <i class="fas fa-map-marked-alt"></i> 
                    </span> 
                    <span class="fw-light"> 
                        Jalan Margo Tani, Kediri 
                    </span> 
                </div> 
                <div class="d-flex justify-content-start align-items-start my-2 text-muted"> 
                    <span class="me-3"> 
                        <i class="fas fa-envelope"></i> 
                    </span> 
                    <span class="fw-light"> 
                        meowdonald@gmail.com 
                    </span> 
                </div> 
                <div class="d-flex justify-content-start align-items-start my-2 text-muted"> 
                    <span class="me-3"> 
                        <i class="fas fa-phone-alt"></i> 
                    </span> 
                    <span class="fw-light"> 
                        081234567890 
                    </span> 
                </div> 
            </div> 
        </div> 
    </div> 
</footer> 
</section> 
</body> 
<!-- end of footer --> 
 
 
 
 <!-- jquery --> 
 <script src = "js/jquery-3.6.0.js"></script> 
    <!-- isotope js --> 
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script> 
    <!-- bootstrap js --> 
    <script src = "bootstrap-5.0.2-dist/js/bootstrap.min.js"></script> 
    <!-- custom js --> 
    <script src = "js/script.js"></script> 
</body> 
</html>