<?php include('includes/navbar.php');
$activityId=$_POST["activityId"];
$activityName=$_POST["activityName"];
$searchstation=$_POST["stationName"];
$Train=$_POST["trainNo"];
$supervisorRef=$_POST["superRef"];
?>
<?php 
//START REPORT dAILY SUPERVISION
    if(isset($_POST['dailsupervisionbtn']))
    {    
        $row;
        $folder ="photos/";
        $supervisor =$_SESSION['userId'];
        $superRef =$_POST['superRef'];
        $stationName =$_POST['stationName'];
        $trainNo =$_POST['trainNo'];
        $coachNo =$_POST['searchchouch'];
        $handwash =$_POST['handwash'];
        $tissue =$_POST['tissue'];
        $windowcleaning =$_POST['windowcleaning'];
        $floorcleaning =$_POST['floorcleaning'];
        $seatcleaning =$_POST['seatcleaning'];
        $tablescleaning =$_POST['tablescleaning'];
        $applydetergents =$_POST['applydetergents'];
        $windowglasscleaning =$_POST['windowglasscleaning'];
        $doorrubbercleaning =$_POST['doorrubbercleaning'];
        $diaphragmcleaning =$_POST['diaphragmcleaning'];
        $laggagecarrcleaning =$_POST['laggagecarrcleaning'];
        $acpolescleaning =$_POST['acpolescleaning'];
        $sanitarybin =$_POST['sanitarybin'];
        $sanitarybinemptied =$_POST['sanitarybinemptied'];
        $sanitarybincleaned =$_POST['sanitarybincleaned'];
        $plasticbagsprovision =$_POST['plasticbagsprovision'];
        $externalcleaning =$_POST['externalcleaning'];
        $decantation =$_POST['decantation'];
        $flashing =$_POST['flashing'];
        $cleaningtank =$_POST['cleaningtank'];
        $coment =$_POST['coment'];
        $WateronArivalP =$_POST['WateronArivalP'];
        $WateronArivalT =$_POST['WateronArivalT'];
        $WateronDepartureP =$_POST['WateronDepartureP'];
        $WateronDepartureT =$_POST['WateronDepartureT'];
        $approvalPM = 0;
        $approvalPC = 0;
        $image =$_FILES["image"]["name"];   
        $tempimage =$_FILES["image"]["tmp_name"];   

                $sql = "INSERT INTO dailycleanliness (`supervisionRef`, `Station`, `Train_No`, `Coach_No`, `Hand_Wash`, `Tissue`, `WindowCleaning`, `FloorCleaning`, `SeatCleaning`, `TableCleaning`, `Detergents`, `GlassCleaning`, `DoorCleaning`, `Diaphragm`, `CarrierCleaning`, `ACpoles`, `SanitaryBinProvision`, `BinEmpties`, `BinCleaned`, `BagsProvision`, `ExteriorCleaning`, `Decantation`, `FlashingDecanted`, `TankExteriorCleaning`, `WateronArivalP`, `WateronArrivalT`, `WateronDepartureP`, `WateronDepartureT`, `Comment`, `photo`, `approvalPM`, `ApprovalPC`, `Supervisor`, `Date`, `dateFilter`) 
                VALUES ('{$superRef}', '{$stationName}', '{$trainNo}', '{$coachNo}', '{$handwash}', '{$tissue}', '{$windowcleaning}', '{$floorcleaning}', '{$seatcleaning}', '{$tablescleaning}', '{$applydetergents}', '{$windowglasscleaning}', '{$doorrubbercleaning}', '{$diaphragmcleaning}', '{$laggagecarrcleaning}', '{$acpolescleaning}', '{$sanitarybin}', '{$sanitarybinemptied}', '{$sanitarybincleaned}', '{$plasticbagsprovision}', '{$externalcleaning}', '{$decantation}', '{$flashing}', '{$cleaningtank}', '{$WateronArivalP}', '{$WateronArivalT}', '{$WateronDepartureP}', '{$WateronDepartureT}', '{$coment}', '{$image}', '{$approvalPM}', '{$approvalPC}', '{$supervisor}', now(), now());";
                mysqli_query($connect, $sql);
                move_uploaded_file($tempimage, $folder.$image);

                if ($sql)
                {
                    
                            $_SESSION['popup_code'] = "success";
                            $_SESSION['popup'] = "Daily Cleanliness Supervision Successful Submitted";
                        
                }
                else{
                    $_SESSION['popup'] = "Failed, Try Again";
                    $_SESSION['popup_code'] = "error";
                } 
    }  
    //END OF REPORT dAILY SUPERVISION
	//START INTERIOR CLEANLINESS SUPERVISION
		if(isset($_POST['toInteriorSubForm']))
		{    
			$row;
			$folder ="photos/";
			$supervisor =$_SESSION['userId'];
			$superRef =$_POST['superRef'];
			$stationName =$_POST['stationName'];
			$trainNo =$_POST['trainNo'];
			$coachNo =$_POST['searchchouch'];
			$vacuumcleaning =$_POST['vacuumcleaning'];
			$coment =$_POST['coment'];
			$approvalPM = 0;
			$approvalPC = 0;
			$image =$_FILES["image"]["name"];   
			$tempimage =$_FILES["image"]["tmp_name"];   

					$sql = "INSERT INTO interiorcleaning (`supervisionRef`, `station`, `train_no`, `coach_no`, `cleanlinessStatus`, `comment`, `photo`, `approvalPM`, `ApprovalPC`, `Supervisor`, `date`, `dateFilter`) 
					VALUES ('{$superRef}', '{$stationName}', '{$trainNo}', '{$coachNo}', '{$vacuumcleaning}', '{$coment}', '{$image}', '{$approvalPM}', '{$approvalPC}', '{$supervisor}', now(), now());";
					mysqli_query($connect, $sql);
					move_uploaded_file($tempimage, $folder.$image);

					if ($sql)
					{
						
								$_SESSION['popup_code'] = "success";
								$_SESSION['popup'] = "Interior Cleanliness Supervision Successful Submitted";
							
					}
					else{
						$_SESSION['popup'] = "Failed, Try Again";
						$_SESSION['popup_code'] = "error";
					} 
	}  
	//END OF INTERIOR CLEANLINESS SUPERVISION
	//START FUMIGATION SUPERVISION
		if(isset($_POST['fumigationSubmitBtn']))
		{    
			$row;
			$folder ="photos/";
			$supervisor =$_SESSION['userId'];
			$superRef =$_POST['superRef'];
			$stationName =$_POST['stationName'];
			$trainNo =$_POST['trainNo'];
			$coachNo =$_POST['searchchouch'];
			$fumigation =$_POST['fumigation'];
			$applypesticides =$_POST['applypesticides'];
			$coment =$_POST['coment'];
			$approvalPM = 0;
			$approvalPC = 0;
			$image =$_FILES["image"]["name"];   
			$tempimage =$_FILES["image"]["tmp_name"];   

					$sql = "INSERT INTO fumigation (`supervisionRef`, `station`, `train_no`, `coach_no`, `fumigation`, `pesticides`, `comment`, `photo`, `approvalPM`, `ApprovalPC`, `Supervisor`, `date`, `dateFilter`) 
					VALUES ('{$superRef}', '{$stationName}', '{$trainNo}', '{$coachNo}', '{$fumigation}', '{$applypesticides}', '{$coment}', '{$image}', '{$approvalPM}', '{$approvalPC}', '{$supervisor}', now(), now());";
					mysqli_query($connect, $sql);
					move_uploaded_file($tempimage, $folder.$image);

					if ($sql)
					{
						
								$_SESSION['popup_code'] = "success";
								$_SESSION['popup'] = "Fumigation Supervision Successful Submitted";
							
					}
					else{
						$_SESSION['popup'] = "Failed, Try Again";
						$_SESSION['popup_code'] = "error";
					} 
	}  
		//END OF FUMIGATION SUPERVISION
?>
<!------------------------------------ Dashboard Start ---------------------------------------------------------->
<style>
 #notprovided:checked{
	background-color:red;
	border-color: red;
 }
</style>
<div class="container-fluid">
    <div class="panel panel-default">
			<div class="panel-heading">
				<h5></h5><hr style="color:#f9b500;" />
			</div>
			<!-- /panel-heading -->
				<div class="panel-body">
					<div class="panel-body py-4">
						<!----------------- Breadcrumb display dash ------------------------------------->
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
								<li class="breadcrumb-item"><a href="#">Tanrail</a></li>
								<li class="breadcrumb-item active" aria-current="page">Cleanliness Supervision</li>
							</ol>
						</nav>
						<!----------------- Breadcrumb display dash ------------------------------------->
									<div class="row justify-content-center align-items-center h-100">
										<div class="col-12">
											<div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
												<div class="card-body">
																		<!--Search box-->
																		<div class="row">
																			<div class="offset-md-10 col-md-2">
																				<div class="input-group">
																						<button class="btn btn-outline-primary rounded-pill" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
																							<i class="fa fa-plus"> Submitted Forms</i>
																						</button> 
																				</div>
																			</div>
																		</div>

																	<!----------INCLUDES FORMS----------------------------------->
																	<?php 
																	if($activityId == 1){
																		include('pages/supervisionForms/dailyCleanlinessForm.php');
																	}elseif($activityId == 2){
																		include('pages/supervisionForms/InteriorFloorWashingForm.php');
																	}elseif($activityId == 3){
																		include('pages/supervisionForms/FumigationofCoachesForm.php');
																	}

																	?>
																	<!----------INCLUDES FORMS----------------------------------->
																
																		
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
 