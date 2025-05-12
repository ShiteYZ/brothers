<?php include('includes/navbar.php');
$activityid=$_POST["activityid"];
$supervisionReference = rand();
?>

<!------------------------------------ Dashboard Start ---------------------------------------------------------->
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
																	<!-------------------INNER PANEL---------------------------->
																		<div class="col-md-6 py-4"><!--COL-3-->
																			<div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
																					<!--CARD HEADER-->
																					<div class="card-header text-white" style="border-radius: 15px; background-color:#FFA500">
																						<div class="row">
																							<div class="col-md-8">
																								<i class="fa fa-angle-double-right"></i>	Select Station, And Train No
																							</div>
																							<div class="offset-md-2 col-md-2">
																								<div class="input-group">
																									<a href="index.php?p=cleanlinessAndSupervision">
																										<button class="btn btn rounded-pill" type="button" style="background-color:#FFFFFF">
																													<i class="fa fa-reply"></i>
																										</button> 
																									</a> 
																								</div>
																							</div>
																						</div>
																					</div>
																					<!--CARD HEADER-->
																					<div class="card-body">
																						<form class="form-detail" name="searchform" method="POST" action="index.php?p=supervisionForm" enctype="multipart/form-data">
																							<!--ACTIVITY ID-->
																							<?php
																								$sqlactivity="select * from mainactivities WHERE activity_id=$activityid";
																								$resultactivity=mysqli_query($connect, $sqlactivity);
																								while($dataactivity=mysqli_fetch_assoc($resultactivity))
																								{
																							?>
																								<input type="hidden" class="form-control" name="activityId"  value="<?php print $dataactivity["activity_id"]; ?>" />	
																								<div class="input-group mb-3">
																									<span class="input-group-text" id="basic-addon3">Activity</span>
																									<input type="text" class="form-control" name="activityName" aria-describedby="basic-addon3" value="<?php print $dataactivity["activity_name"]; ?>" readonly />
																								</div>
																							<?php
																								}
																							?>
																							<!--ACTIVITY ID-->
																							<!--INPUT WITH auto Search-->
																							<div class="input-group mb-3">
																								<input type="hidden" class="form-control" name="superRef"  value="<?php print $supervisionReference; ?>" />
																								<span class="input-group-text" id="basic-addon3">Station</span>
																								<input type="text" class="form-control" id="searchstation" name="stationName" aria-describedby="basic-addon3" placeholder="eg Dar es Salaam" autocomplete="off" required>
																							</div>
																							<div class="list-group list-group item-action" id="stationretrival"></div>
																							<!--/INPUT WITH auto Search-->
																							<!--TRAIN INPUT WITH auto Search-->
																							<div class="input-group mb-3">
																								<span class="input-group-text" id="basic-addon3">Train No</span>
																								<input type="text" class="form-control" id="searchtrain" name="trainNo" aria-describedby="basic-addon3" placeholder="eg E6800-01" autocomplete="off" required>
																							</div>
																							<div class="list-group list-group item-action" id="suggestions"></div>
																							<!--/TRAIN INPUT WITH auto Search-->
																							<!--SHIFT ARRANGEMENT
																							<div class="input-group mb-3">
																								<span class="input-group-text" id="basic-addon3">Shift</span>
																									<div class="form-check form-check-inline">
																										<input class="btn" type="radio" name="plasticbagsprovision" id="provided"
																										value="Cleaned" checked />
																										<label class="form-check-label" for="Provided">A</label>
																									</div>

																									<div class="form-check form-check-inline">
																										<input class="btn" type="radio" name="plasticbagsprovision" id="notprovided"
																										value="Not Cleaned" />
																										<label class="form-check-label" for="Not Provided">Mchana</label>
																									</div>
																							</div>
																							/SHIFT ARRANGEMENT-->
																							<div class="form-group">
																								<button type="submit" name="toSupervisionForm" class="form-control btn btn-warning rounded submit px-3">Go Next to Fill Form</button>
																							</div>
																						</form>
																					</div>
																			</div>
																		</div><!-- END OF COL-3-->
																	<!-------------------INNER PANEL---------------------------->
																
																		
												</div>
											</div>
										</div>
									</div>
         				<!----------------- /members display dash ------------------------------------->
            		</div>
    			</div>
		</div>
</div>
<script>
$(document).ready(function(){

	//SEARCH STATION
	$('#searchstation').on('input', function(){
        var stationqr = $(this).val();
        if (stationqr.length > 0) {
            $.ajax({
                url: 'reports/search.php',
                method: 'POST',
                data: {stationQuery: stationqr},
                success: function(data) {
                    var stationretrival = $('#stationretrival');
					stationretrival.html(data)
                }
            });
        } else {
            $('#stationretrival').html('');
        }
    });

    // Set clicked suggestion to input
    $(document).on('click', '#astation', function(){
        $('#searchstation').val($(this).text());
        $('#stationretrival').html('');
    });
	//END SEARCH STATION

	//SEARCH TRAIN
	$('#searchtrain').on('input', function(){
        var query = $(this).val();
        if (query.length > 0) {
            $.ajax({
                url: 'reports/search.php',
                method: 'POST',
                data: {query: query},
                success: function(data) {
                    var suggestions = $('#suggestions');
					suggestions.html(data)
                }
            });
        } else {
            $('#suggestions').html('');
        }
    });

    // Set clicked suggestion to input
    $(document).on('click', '#atrain', function(){
        $('#searchtrain').val($(this).text());
        $('#suggestions').html('');
    });
	//END SEARCH TRAIN

	//SEARCH COACHES
	$('#searchchouch').on('input', function(){
        var couch = $(this).val();
        if (couch.length > 0) {
            $.ajax({
                url: 'reports/search.php',
                method: 'POST',
                data: {couches: couch},
                success: function(data) {
                    var coachretrieval = $('#coachretrieval');
					coachretrieval.html(data)
                }
            });
        } else {
            $('#coachretrieval').html('');
        }
    });

    // Set clicked suggestion to input
    $(document).on('click', '#acouch', function(){
        $('#searchchouch').val($(this).text());
        $('#coachretrieval').html('');
    });
	//END SEARCH COACHES
});
</script>
<?php
    include('includes/scripts.php');
?>
 