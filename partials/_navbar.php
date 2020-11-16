
<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center BRAND-LOGO">
    <a class="navbar-brand brand-logo" href="index.php"> <h1>Virtual Store</h1> </a>
    <a class="navbar-brand brand-logo-mini" href="index.php"><i class="mdi mdi-cart menu-icon"></i> </a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-stretch">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="mdi mdi-menu"></span>
    </button> 
    <div class="search-field d-none d-md-block">
      <form class="d-flex align-items-center h-100" action="#">
        <div class="input-group">
          <div class="input-group-prepend bg-transparent">
            <i class="input-group-text border-0 mdi mdi-magnify"></i>
          </div>
          <input type="text" class="form-control bg-transparent border-0" placeholder="Busquedad x Categoria">
        </div>
      </form>
    </div>
    <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item nav-profile dropdown">
        <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
          <div class="nav-profile-img">
            <img src="../../assets/images/faces/face1.jpg" alt="image">
          </div>
          <div class="nav-profile-text">
            <p class="mb-1 text-black"> <?php echo $name ?> </p>
          </div>
        </a>
      </li>
      <li class="nav-item nav-profile dropdown">
        <a class="nav-link" id="profileDropdown" href="productos.php"  aria-expanded="false">
          Agregar Foto
        </a>
      </li>
      <form method="POST" action="index.php">
        <li class="nav-item nav-logout d-none d-lg-block">
        <!-- <i class="mdi mdi-power"></i> -->
          <button type="submit" name="close" id="close" class="btn btn-danger" value="Salir">Salir</button>
        </li>
      </form>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="mdi mdi-menu"></span>
    </button>
  </div>
</nav>