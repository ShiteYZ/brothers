 <!-- Navbar top-->
 <div class="container-fluid">
        <img src="assets/img/topnavbar.jpg" width = 100%/>
	</div>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary" style="background-color: #47B0AF">
  <!-- Container wrapper -->
  <div class="container">
    <!-- Toggle button -->
    <button
      data-mdb-collapse-init
      class="navbar-toggler"
      type="button"
      data-mdb-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Navbar brand -->
      <a class="navbar-brand mt-2 mt-lg-0" href="#">
        <img
          src="assets/img/brozaslogo.png"
          height="30"
          alt="Brothers"
          loading="lazy"
        />
      </a>
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="index.php?p=dashboard">Dashibodi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?p=members">Wanachama</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?p=ada">Ada</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?p=mfukowaMaendeleo">Mfuko wa Maendeleo</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?p=mikopo">Mikopo</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?p=miradi">Miradi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?p=report">Ripoti</a>
        </li>
      </ul>
      <!-- Left links -->
    </div>
    <!-- Collapsible wrapper -->

    <!-- Right elements -->
    <div class="d-flex align-items-center">

      <!-- Avatar -->
          <div class="dropdown">
            
            <button class="btn btn-warning rounded-pill dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
																								<?php print $_SESSION["userName"];?>  <i class="fa fa-user"></i>
																							</button> 
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="index.php?p=logout"><i class="fa fa-sign-out"></i> Log out</a></li>
              <li><a class="dropdown-item" href="index.php?p=wasifuwangu"><i class="fa fa-sign-out"></i> Wasifu Wangu</a></li>
              <li><a class="dropdown-item" href="index.php?p=viongozi"><i class="fa fa-sign-out"></i> Viongozi</a></li>
            </ul>
          </div>
    </div>
    <!-- Right elements -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->
