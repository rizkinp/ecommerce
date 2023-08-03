<!-- navbar --> 
<link rel="stylesheet" href="templates/style.css"> 
<nav class="navbar navbar-default cat-navbar" style="background-color: #9BABB8;"> 
  <div class="container"> 
    <div class="navbar-header"> 
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse"> 
        <span class="sr-only">Toggle navigation</span> 
        <span class="icon-bar"></span> 
        <span class="icon-bar"></span> 
        <span class="icon-bar"></span> 
      </button> 
      <a class="navbar-brand" href="index.php"> 
      <img src="templates/meow.png" alt="Logo" class="img-fluid" style="max-width: 70px; max-height: 70px;"> 
        <span class="logo-text">MeowDonald's</span> 
      </a> 
    </div> 
 
    <div class="collapse navbar-collapse" id="navbar-collapse"> 
      <ul class="nav navbar-nav"> 
        <li><a href="index.php"><ion-icon name="paw-outline"></ion-icon> Home</a></li> 
        <li><a href="keranjang.php"><ion-icon name="cart-outline"></ion-icon> Cart</a></li> 
        <li><a href="checkout.php"><ion-icon name="wallet-outline"></ion-icon> Checkout</a></li> 
        <li><a href="riwayat.php"><ion-icon name="time-outline"></ion-icon> Purchase History</a></li> 
        <!-- Jika sudah login (ada login pelanggan) --> 
        <?php if(isset($_SESSION["pelanggan"])): ?> 
          <li class="dropdown"> 
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><ion-icon name="person-circle-outline"></ion-icon> Account</a> 
            <ul class="dropdown-menu"> 
              <li><a href="logout.php"><ion-icon name="log-out-outline"></ion-icon> Logout</a></li> 
            </ul> 
          </li> 
           
        <!-- Selain itu (belum login / belum ada session pelanggan) --> 
        <?php else: ?> 
          <li class="dropdown"> 
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><ion-icon name="person-circle-outline"></ion-icon> Akun</a> 
            <ul class="dropdown-menu"> 
              <li><a href="login.php"><ion-icon name="log-in-outline"></ion-icon> Login</a></li> 
              <li><a href="daftar.php"><ion-icon name="person-add-outline"></ion-icon> Register</a></li> 
            </ul> 
          </li> 
        <?php endif; ?> 
      </ul> 
 
      <form action="pencarian.php" method="get" class="navbar-form navbar-right"> 
  <div class="input-group"> 
    <input type="text" class="form-control" name="keyword" placeholder="Cari..." style="background-color: #EEE3CB;"> 
    <span class="input-group-btn"> 
      <button class="btn btn-primary" type="submit" aria-label="Cari"><ion-icon name="search-outline"></ion-icon></button> 
    </span> 
  </div> 
</form> 
 
    </div> 
  </div> 
</nav> 
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script> 
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>