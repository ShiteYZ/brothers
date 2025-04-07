<?php include('includes/navbar.php');
   $userId = $_POST["userid"]; 
?>
<h5></h5><hr style="color:#f9b500;" />

<div class="container-fluid">
    <div class="panel panel-default">
			<div class="panel-heading">
				<h5></h5>
			</div>
			<!-- /panel-heading -->
				<div class="panel-body">
					<div class="panel-body py-4">
						<div class="row justify-content-center align-items-center h-100">
							<div class="col-10">
								<!----------------- Breadcrumb display dash ------------------------------------->
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="#">Dashibodi</a></li>
										<li class="breadcrumb-item"><a href="#">Rekebisha Taarifa za Mwanachama</a></li>
										<li class="breadcrumb-item active" aria-current="page">Fomu ya Marekebisho</li>
									</ol>
								</nav>
								<!----------------- Breadcrumb display dash ------------------------------------->
								<div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
									<div class="card-header bg-primary text-white" style="border-radius: 15px;">
											<i class="fa fa-angle-double-right"></i>	Rekebisha Taarifa za Mwanachama
									</div> <!--/panel-->
									<div class="card-body">
										<!--REGISTER FORM-->
										<div class="row justify-content-center">
										<div class="login-wrap p-4 p-md-5">
											<?php
												$sql="select * from members WHERE user_id = '$userId' ";
												$result=mysqli_query($connect, $sql);
												while($data=mysqli_fetch_assoc($result))
												{
											?>
											
											<form class="form-detail" name="addstaffform" method="POST" action="index.php?p=editmembersubmit" enctype="multipart/form-data" onsubmit="return process();">

												<div class="row">

													<div class="col-md-4 mb-4">
													<div class="form-outline">
														<input type="hidden" name="userid" value="<?php print $data["user_id"]; ?>" >
														<input type="text" name="firstName" class="form-control form-control-lg" value="<?php print $data["fname"]; ?>" />
														<label class="form-label" for="firstName">Jina la kwanza</label>
													</div>
													</div>

													<div class="col-md-4 mb-4">
													<div class="form-outline">
														<input type="text" name="middleName" class="form-control form-control-lg" value="<?php print $data["mname"]; ?>"/>
														<label class="form-label" for="middleName">Jina la kati</label>
													</div>
													</div>

													<div class="col-md-4 mb-4">
													<div class="form-outline">
														<input type="text" name="lastName" class="form-control form-control-lg" value="<?php print $data["lname"]; ?>" />
														<label class="form-label" for="lastName">Jina la Mwisho</label>
													</div>
													</div>

												</div>

												<div class="row">

													<div class="col-md-6 mb-4 d-flex align-items-center">
													<div class="form-outline datepicker w-100">
														<input type="date" class="form-control form-control-lg" name="birthdayDate" value="<?php print $data["bday"]; ?>"/>
														<label for="birthdayDate" class="form-label">Tarehe Kuzaliwa</label>
													</div>
													</div>

													<div class="col-md-6 mb-4">
													<h6 class="mb-2 pb-1">Jinsia: </h6>
													<?php 
													  $gender = $data["gender"]; 
													  if($gender == 'Kiume' ){
													?>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="gender" id="maleGender"
														value="Kiume" checked />
														<label class="form-check-label" for="maleGender">Kiume</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="gender" id="femaleGender"
														value="Kike" />
														<label class="form-check-label" for="femaleGender">Kike</label>
													</div>
													<?php 
													  }else{
													?>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="gender" id="femaleGender"
														value="Kike" checked />
														<label class="form-check-label" for="femaleGender">Kike</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="gender" id="maleGender"
														value="Kiume" />
														<label class="form-check-label" for="maleGender">Kiume</label>
													</div>
													
													<?php 
													  }
													?>
													</div>

												</div>

												<div class="row">

													<div class="col-md-6 mb-4 pb-2">
													<div class="form-outline">
														<input type="text" name="emailAddress" class="form-control form-control-lg" value="<?php print $data["email"]; ?>"/>
														<label class="form-label" for="emailAddress">Barua pepe</label>
													</div>
													</div>

													<div class="col-md-6 mb-4 pb-2">
													<div class="form-outline">
														<input type="text" name="phoneNumber" class="form-control form-control-lg" value="<?php print $data["contact"]; ?>" />
														<label class="form-label" for="phoneNumber">Namba ya Simu</label>
													</div>
													</div>

													<div class="col-md-6 mb-4 pb-2">
													<div class="form-outline">
														<input type="text" name="Nida" class="form-control form-control-lg" value="<?php print $data["nida"]; ?>" />
														<label class="form-label" for="nida">NIDA</label>
													</div>
													</div>

													<div class="col-md-6 mb-4 pb-2">
													<div class="form-outline">
														<input type="text" name="Address" class="form-control form-control-lg" value="<?php print $data["address"]; ?>" />
														<label class="form-label" for="nida">Anuani</label>
													</div>
													</div>

													<div class="col-md-6 mb-4 pb-2">
													<div class="form-outline">
														<input type="text" name="Akaunti" class="form-control" value="<?php print $data["akaunti_benki"]; ?>"/>
														<label class="form-label" for="Akaunti">Akaunti ya Banki</label>
													</div>
													</div>

													<div class="col-md-6 mb-4 pb-2">
													<div class="form-outline">
														<input type="text" name="Akaunti2" class="form-control" value="<?php print $data["akaunti2"]; ?>" />
														<label class="form-label" for="Akaunti">Akaunti ya Bank <mark style="color:red;">(Option)</mark></label>
													</div>
													</div>

													<div class="col-md-6 mb-4">
														<div class="form-outline">
															<select class="form-control" name="Previlege" required>
																<option >"Chagua Cheo"</option>
																<?php
																	$sqlvyeo="select * from vyeo";
																	$resultvyeo=mysqli_query($connect, $sqlvyeo);
																	while($datacheo=mysqli_fetch_assoc($resultvyeo))
																	{
																?>
																	<option value="<?php print $datacheo["cheo"]; ?>"><?php print $datacheo["cheo"]; ?></option>	
																<?php
																	}
																?>
															</select>
															<label class="form-label" for="previlege">Cheo</label>
														</div>
													</div>

													<div class="col-md-6 mb-4">
														<div class="form-outline">
															<input type="file" name="passport" class="form-control form-control-lg" required />
															<label class="form-label" for="passport">Pasipoti</label>
														</div>
													</div>

												</div>

												<div class="mt-4 pt-2">
												<button type="reset" class="btn btn-warning rounded-pill">Futa</button>
												<button type="submit" name="editbtnmemberregister" class="btn btn-primary rounded-pill">Rekebisha</button>
												</div>

										</form>
										<?php
											}
										?>
										</div>
										</div>
										<!--END REGISTER FORM-->
									</div>
								</div>
							</div>
						</div>

         				<!----------------- /bottom dash ------------------------------------->
            		</div>
    			</div>
</div>