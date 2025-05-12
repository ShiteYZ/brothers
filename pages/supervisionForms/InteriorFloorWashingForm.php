
<form class="form-detail" name="searchform" method="POST" action="index.php?p=supervisionForm" enctype="multipart/form-data">
    <!-------------------INNER PANEL---------------------------->
    <div class="row">
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
                        <input type="hidden" class="form-control" name="activityId"  value="<?php print $activityId; ?>" />	
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon3">Activity</span>
                            <input type="text" class="form-control" name="activityName" aria-describedby="basic-addon3" value="<?php print $activityName; ?>" readonly />
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon3">Station</span>
                            <input type="text" class="form-control" name="stationName" aria-describedby="basic-addon3" value="<?php print $searchstation; ?>" readonly />
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon3">Train No</span>
                            <input type="text" class="form-control" name="trainNo" aria-describedby="basic-addon3" value="<?php print $Train; ?>" readonly />
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon3">Supervision Reference No</span>
                            <input type="text" class="form-control" name="superRef" aria-describedby="basic-addon3" value="<?php print $supervisorRef; ?>" readonly />
                        </div>
                    </div>
            </div>
        </div><!-- END OF COL-3-->
        <div class="col-md-6 py-4"><!--COL-3-->
        <fieldset>
        <legend>Vacuum Cleaning and Train Interior Floor Washing</legend>
                    <!--COACH INPUT WITH auto Search-->
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Couch No</span>
                        <input type="text" class="form-control" id="searchchouch" name="searchchouch" aria-describedby="basic-addon3" placeholder="eg BCB-K-2201" autocomplete="off" required>
                    </div>
                    <div class="list-group list-group item-action" id="coachretrieval"></div>
                <!--/COACH INPUT WITH auto Search-->
            <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <!--CARD HEADER-->
                    <div class="card-header bg-default text-orange" style="border-radius: 15px;text-align:center;">
                        Vacuum Cleaning and Train Interior Floor Washing
                    </div>
                    <!--CARD HEADER-->
                    <div class="card-body">
                            <!--INPUT FOR SUPERVISION FORM-->
                            <div class="col-md-12 mb-12">
                                <div class="form-outline">
                                    <fieldset><hr />
                                    <label class="form-label" for="jinaKikao"><i class="fa fa-angle-double-right"></i>  Vacuum Cleaning and Train Interior Floor Washing</label>
                                    </fieldset>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="vacuumcleaning" id="provided"
                                            value="Cleaned" checked />
                                            <label class="form-check-label" for="Provided">Cleanliness Performed Well</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="vacuumcleaning" id="notprovided"
                                            value="Not Cleaned" />
                                            <label class="form-check-label" for="Not Provided">Cleanliness Not Performed Well</label>
                                        </div>
                                </div>
                            </div>
                            <!--/INPUT FOR SUPERVISION FORM-->
                    </div>
            </div>
             <!-- COMMENTS -->
             <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <!--CARD HEADER-->
                    <div class="card-header bg-default text-orange" style="border-radius: 15px;text-align:center;">
                        Write Down Comment if Any
                    </div>
                    <!--CARD HEADER-->
                    <div class="card-body">
                            <!--INPUT COMMENT FOR SUPERVISION FORM-->
                            <div class="col-md-12 mb-12">
                                <div class="form-outline">
                                    <fieldset>
                                    <label class="form-label" for="image"><i class="fa fa-angle-double-right"></i>  Attach Image</label>
                                    </fieldset>
                                    <input type="file" name="image" class="form-control form-control-lg" />
                                </div>
                            </div>
                            <div class="col-md-12 mb-12">
                                <div class="form-outline">
                                    <fieldset><hr />
                                    <label class="form-label" for="jinaKikao"><i class="fa fa-angle-double-right"></i>  Comment / Remark</label>
                                    </fieldset>
                                    <textarea name="coment" class="form-control form-control-lg"></textarea>
                                </div>
                            </div>
                            <!--/INPUT COOMENT FOR SUPERVISION FORM-->
                    </div>
            </div>
            <!-- COMMENT -->
            <div class="form-group">
                <button type="submit" name="toInteriorSubForm" class="form-control btn btn-warning rounded submit px-3" style="background-color: #00B074;">Submit Interior Cleaning report</button>
            </div>
        <fieldset>
        </div><!-- END OF COL-3-->
        </div>
    <!-------------------INNER PANEL---------------------------->
</form>
<script>
$(document).ready(function(){

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