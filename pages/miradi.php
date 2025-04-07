<?php include('includes/navbar.php') ?>

<!------------------------------------ Dashboard Start ---------------------------------------------------------->
<div class="container-fluid">
    <div class="panel panel-default">
			<div class="panel-heading">
				<h5></h5><hr style="color:#f9b500;" />
			</div>

				<!-- Modal -->
					<div class="modal fade" id="miradimodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
						<form class="form-detail" name="addstaffform" method="POST" action="index.php?p=addnewMradi" enctype="multipart/form-data" onsubmit="return process();">
							
							<div class="modal-header">
								<h5 class="modal-title" id="staticBackdropLabel">Recodi Mradi Mpya</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>

								<div class="modal-body">

									<div class="row">

										<div class="col-md-12 mb-12">
										<div class="form-outline">
											<input type="text" name="jina" class="form-control form-control-lg" />
											<label class="form-label" for="jinaMradi">Jina la Mradi</label>
										</div>
										</div>

										<div class="col-md-12 mb-12">
										<div class="form-outline">
											<input type="text" name="eneo" class="form-control form-control-lg" />
											<label class="form-label" for="eneoMradi">Eneo la Mradi</label>
										</div>
										</div>

										<div class="col-md-12 mb-12">
										<div class="form-outline">
											<input type="text" name="thamani" class="form-control form-control-lg" />
											<label class="form-label" for="thamaniMradi">Thamani ya Mradi</label>
										</div>
										</div>

										<div class="col-md-12 mb-12">
										<div class="form-outline">
											<input type="file" name="picha" class="form-control form-control-lg" />
											<label class="form-label" for="pichaMradi">Picha</label>
										</div>
										</div>

									</div>
										
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-warning rounded-pill" data-bs-dismiss="modal">funga</button>
									<button type="submit" name="recodimradi" class="btn btn-primary rounded-pill">Recodi</button>
								</div>

						</form>
						</div>
					</div>
					</div>
				<!-- Modal -->
			<!-- /panel-heading -->
				<div class="panel-body">
					<div class="panel-body py-4">
						<!----------------- /members display dash ------------------------------------->
									<div class="row justify-content-center align-items-center h-100">
										<div class="col-12">
											<div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
												<div class="card-body">

													<fieldset>
																<legend>Miradi</legend>
																		<!--Search box-->
																		<div class="row">
																			<div class="offset-md-6 col-md-4">
																				<form class="form-detail" name="searchform" method="POST" action="#" enctype="multipart/form-data">
																					<div class="input-group">
																						<input class="form-control border-end-0 border rounded-pill" type="search" value="search" id="example-search-input">
																						<span class="input-group-append">
																							<button class="btn btn-outline-secondary bg-white border-bottom-0 border rounded-pill ms-n5" type="button">
																								<i class="fa fa-search"></i>
																							</button>
																						</span>
																					</div>
																				</form>
																			</div>
																			<div class="col-md-2">
																				<div class="input-group">
																					<button class="btn btn-outline-primary rounded-pill" type="button" data-bs-toggle="modal" data-bs-target="#miradimodal">
																						<i class="fa fa-plus"></i> Ongeza Mradi Mpya
																					</button> 
																				</div>
																			</div>
																		</div>
																	<!-------------------/END OFMIRADI PREVIEW---------------------------->
																	<div class="row py-4">

																			<div align="center">
																				<a href="#"><button class="btn btn-outline-primary rounded-pill" data-filter="all">Yote</button></a>
																				<a href="#"><button class="btn btn-outline-primary rounded-pill" data-filter="hdpe">Kilimo</button></a>
																				<a href="#"><button class="btn btn-outline-primary rounded-pill" data-filter="sprinkle">Ufungaji</button></a>
																				<a href="#"><button class="btn btn-outline-primary rounded-pill" data-filter="spray">Viwanja</button></a>
																				<a href="#"><button class="btn btn-outline-primary rounded-pill" data-filter="irrigation">Biashara</button></a>
																			</div>
																			<br/><br/>
																				<?php
																					$sql="select * from miradi order by id ASC";
																					$result=mysqli_query($connect, $sql);
																					?>
																					<?php
																					while($data=mysqli_fetch_assoc($result))
																					{
																				?>
																					<div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter hdpe py-4">

																						<!--------------------------------------MIRADI GALLERY----------------------------------------->	
																							<div class="card" style="border-radius: 15px;">
																									<div class="card-header text-white" style="border-radius: 15px; background-color:#47B0AF">
																										<div class="row">
																												<div class="col-md-11">
																													<i class="fa fa-angle-double-right"></i>	<?php echo $data["jina"]; ?>
																												</div>
																												<div class="col-md-1">
																													<form class="form-detail" name="viewform" method="POST" action="index.php?p=miradidetails" enctype="multipart/form-data" onsubmit="return process();">
																														<div class="input-group">	
																															<input type="hidden" name="miradiid"  value="<?php print $data["id"]; ?>">
																															<span class="input-group-append">
																																<button type="submit" class="btn btn-outline-primary bg-white rounded-pill" type="button">
																																	<i class="fa fa-eye"></i>
																																</button>
																															</span>
																														</div>
																													</form>
																												</div>
																												<div class="col-md-12">
																													<i class="fa fa-angle-double-right"></i>	<?php echo $data["eneo"]; ?>
																												</div>
																										</div>
																									</div> <!--/panel-->

																									<div class="card-body">
																										<?php echo "<img src='uploads/".$data['picha']."' width='100%' height='350px'>"; ?>
																									</div>
																							</div>
																						<!--------------------------------------FAMILIA PANEL----------------------------------------->	

																					</div>
																				<?php
																					}
																				?>
																	</div> <br/>
																<!---------------------END OF MIRADI PREVIEW------------------------------------>			
													</fieldset>

												</div>
											</div>
										</div>
									</div>
         				<!----------------- /members display dash ------------------------------------->
            		</div>
    			</div>
		</div>
</div>
<?php
    include('includes/scripts.php');
?>
 