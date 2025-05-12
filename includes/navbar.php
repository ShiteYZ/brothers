 <!-- Navbar top-->
 <div class="container-fluid">
        <img src="assets/img/tanrailbanner.jpg" width = 100%/>
	</div>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary" style="background-color: #692d2c">
  <!-- Container wrapper -->
  <div class="container">
    <!-- Toggle button -->
    <button
      class="navbar-toggler collapsed"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fa fa-bars" style="background-color: white;"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Navbar brand -->
      <a class="navbar-brand mt-2 mt-lg-0" href="#">
        <img
          src="assets/img/instalogo.png"
          height="30"
          alt="Bmh"
          loading="lazy"
        />
      </a>
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="index.php?p=dashboard" style="color:white">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?p=cleanlinessAndSupervision" style="color:white">Cleanliness Supervision</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?p=claimAndComments" style="color:white">Claims and Comments</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?p=report" style="color:white">Reports</a>
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
              <li><a class="dropdown-item" href="index.php?p=personalprofile"><i class="fa fa-user"></i> Personal Profile</a></li>
              <?php
									if($_SESSION['jobTitle'] == 'PM' || $_SESSION['jobTitle'] == 'Admin'){
							?>
              <li><a class="dropdown-item" href="index.php?p=usermanagement"><i class="fa fa-gear"></i> User Management</a></li>
              <?php
								}
							?>
              <li><a class="dropdown-item" href="index.php?p=logout"><i class="fa fa-sign-out"></i> Log out</a></li>
            </ul>
          </div>
    </div>
    <!-- Right elements -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->
