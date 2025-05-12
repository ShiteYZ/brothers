
<style>
.gradient-custom-2 {
/* fallback for old browsers */
background: #fccb90;

/* Chrome 10-25, Safari 5.1-6 */
background:  #692d2c;

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background:  #692d2c;
}

@media (min-width: 768px) {
.gradient-form {
height: 100vh !important;
}
}
@media (min-width: 769px) {
.gradient-custom-2 {
border-top-right-radius: .3rem;
border-bottom-right-radius: .3rem;
}
}
</style>
<section class="h-100 gradient-form" style="background-color:#FFA500;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                  <img src="assets/img/tanraillogonew.png"
                    style="width: 185px;" alt="logo">
                </div>

                <form class="form-detail" name="sform" method="POST" action="index.php?p=logincheck" enctype="multipart/form-data" onsubmit="return process();">
                  <p>Please login to your account</p>

                  <div class="form-outline mb-4">
				  	<input type="text" class="form-control" name="username" id="full-name" placeholder="Enter Email Address" required>
                    <label class="form-label" for="Username">Username</label>
                  </div>

                  <div class="form-outline mb-4">
				  	<input type="password" class="form-control" name="password" id="pass" placeholder="Password" required>
                    <label class="form-label" for="Password">Password</label>
                  </div>
				  <div class="form-group">
                	<button type="submit" name="register" class="form-control btn btn-warning rounded submit px-3" style="background-color: #692d2c;color: white;">Login</button>
            	</div>

                </form>

              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4"  style="color: white;">Cleanliness Supervision Reporting System</h4>
                <p class="small mb-0">Daily Cleanliness Reporting </br> Interior Cleaning and Vacuum Cleaning </br> Exterior Coaches Cleaning </br> Fumigation of Coaches </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
		