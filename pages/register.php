<?php include('includes/navbar.php') ?>
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
										<li class="breadcrumb-item"><a href="#">Sajili Mwanachama</a></li>
										<li class="breadcrumb-item active" aria-current="page">Mwanachama Fomu</li>
									</ol>
								</nav>
								<!----------------- Breadcrumb display dash ------------------------------------->
								<div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
									<div class="card-header bg-primary text-white" style="border-radius: 15px;">
											<i class="fa fa-angle-double-right"></i>	Sajili Mwanachama Mpya
									</div> <!--/panel-->
									<div class="card-body">
										<!--REGISTER FORM-->
										<div class="row justify-content-center">
										<div class="login-wrap p-4 p-md-5">
											
											<form class="form-detail" name="addstaffform" method="POST" action="index.php?p=addnewmembersubmit" enctype="multipart/form-data" onsubmit="return process();">

												<div class="row">

													<div class="col-md-4 mb-4">
													<div class="form-outline">
														<input type="text" name="firstName" class="form-control form-control-lg" />
														<label class="form-label" for="firstName">Jina la kwanza</label>
													</div>
													</div>

													<div class="col-md-4 mb-4">
													<div class="form-outline">
														<input type="text" name="middleName" class="form-control form-control-lg" />
														<label class="form-label" for="middleName">Jina la kati</label>
													</div>
													</div>

													<div class="col-md-4 mb-4">
													<div class="form-outline">
														<input type="text" name="lastName" class="form-control form-control-lg" />
														<label class="form-label" for="lastName">Jina la Mwisho</label>
													</div>
													</div>

												</div>

												<div class="row">

													<div class="col-md-6 mb-4 d-flex align-items-center">
													<div class="form-outline datepicker w-100">
														<input type="date" class="form-control form-control-lg" name="birthdayDate" />
														<label for="birthdayDate" class="form-label">Tarehe Kuzaliwa</label>
													</div>
													</div>

													<div class="col-md-6 mb-4">
													<h6 class="mb-2 pb-1">Jinsia: </h6>
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
													</div>

												</div>

												<div class="row">

													<div class="col-md-6 mb-4 pb-2">
													<div class="form-outline">
														<input type="text" name="emailAddress" class="form-control form-control-lg" />
														<label class="form-label" for="emailAddress">Barua pepe</label>
													</div>
													</div>

													<div class="col-md-6 mb-4 pb-2">
													<div class="form-outline">
														<input type="text" name="phoneNumber" class="form-control form-control-lg" />
														<label class="form-label" for="phoneNumber">Namba ya Simu</label>
													</div>
													</div>

													<div class="col-md-6 mb-4 pb-2">
													<div class="form-outline">
														<input type="text" name="Nida" class="form-control form-control-lg" />
														<label class="form-label" for="nida">NIDA</label>
													</div>
													</div>

													<div class="col-md-6 mb-4 pb-2">
													<div class="form-outline">
														<input type="text" name="Address" class="form-control form-control-lg" />
														<label class="form-label" for="nida">Anuani</label>
													</div>
													</div>

													<div class="col-md-6 mb-4 pb-2">
													<div class="form-outline">
														<input type="text" name="Akaunti" class="form-control" placeholder="NMB- 1338494934 (JINA LA AKAUNTI KWENYE MABANO)" />
														<label class="form-label" for="Akaunti">Akaunti ya Banki</label>
													</div>
													</div>

													<div class="col-md-6 mb-4 pb-2">
													<div class="form-outline">
														<input type="text" name="Akaunti2" class="form-control" placeholder="NMB- 1338494934 (JINA LA AKAUNTI KWENYE MABANO)" />
														<label class="form-label" for="Akaunti">Akaunti ya Bank <mark style="color:red;">(Option)</mark></label>
													</div>
													</div>

													<div class="col-md-6 mb-4">
														<div class="form-outline">
															<select class="form-control" name="Previlege">
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
															<input type="file" name="passport" class="form-control form-control-lg" required/>
															<label class="form-label" for="passport">Pasipoti</label>
														</div>
													</div>

												</div>

												<div class="mt-4 pt-2">
												<button type="reset" class="btn btn-warning rounded-pill">Futa</button>
												<button type="submit" name="memberregister" class="btn btn-primary rounded-pill">Sajili</button>
												</div>

										</form>
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