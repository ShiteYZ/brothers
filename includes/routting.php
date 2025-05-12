<?php
session_start();

if(isset($_GET["p"]))
{
    $page=@$_GET["p"];
    if($page=="login")
    {
        $main_content="pages/login.php"; 
    }
    elseif($page=="logout" && isset($_SESSION['userName']))
    {
        $main_content="pages/logout.php";    
    }
    elseif($page=="dashboard" && isset($_SESSION['userName']))
    {
        $main_content="pages/dashboard.php";    
    }
    elseif($page=="usermanagement" && isset($_SESSION['userName']))
    {
        $main_content="pages/usermanagement.php";    
    }
    elseif($page=="cleanlinessAndSupervision" && isset($_SESSION['userName']))
    {
        $main_content="pages/cleanlinessAndSupervision.php";    
    }
    elseif($page=="submitedReport" && isset($_SESSION['userName']))
    {
        $main_content="pages/submitedReport.php";    
    }
    elseif($page=="selectTrain" && isset($_SESSION['userName']))
    {
        $main_content="pages/trainAndCoachesSelection.php";    
    }
    elseif($page=="supervisionForm" && isset($_SESSION['userName']))
    {
        $main_content="pages/supervisionForm.php";    
    }
    elseif($page=="claimAndComments" && isset($_SESSION['userName']))
    {
        $main_content="pages/claimAndComments.php";    
    }
    elseif($page=="personalprofile" && isset($_SESSION['userName']))
    {
        $main_content="pages/personalProfile.php";    
    }
    elseif($page=="miradiLisitiPreview" && isset($_SESSION['userName']))
    {
        $main_content="pages/miradiLisitiPreview.php";    
    }
    elseif($page=="report" && isset($_SESSION['userName']))
    {
        $main_content="pages/report.php";    
    }

    // LOGIN PAGE
	elseif($page=="logincheck")
    {
       $username=$_POST['username'];
	   $password=$_POST['password'];

       $sql = "SELECT * FROM supervisors WHERE username = '$username'";
		$result = $connect->query($sql);

		if($result->num_rows == 1) {
			$password = md5($password);
			// exists
			$mainSql = "SELECT * FROM supervisors WHERE username = '$username' AND password = '$password'";
			$mainResult = $connect->query($mainSql);

			if($mainResult->num_rows == 1) {
				$value = $mainResult->fetch_assoc();
				$user_id = $value['supervisor_id'];
				$user_name = $value['username'];
                $jobTitle = $value['jobTitle'];

				// set session
				$_SESSION['userId'] = $user_id;
				$_SESSION['userName'] = $user_name;
                $_SESSION['jobTitle'] = $jobTitle;

				header("location: index.php?p=dashboard");
            }else
            {
                     print"<script>location.href='index.php?p=login';</script>";
            }
        }else
        {
                 print"<script>location.href='index.php?p=login';</script>";
        }
    }

    //END LOGIN PANEL

    //START REGISTRATION PANEL
    elseif($page=="addNewUserSubmit")
    {
        
                if(isset($_POST['userBtn']))
                {    
                  $firstname =$_POST['fname'];
                  $middlename =$_POST['mname'];
                  $lastname =$_POST['sname'];
                  $gender =$_POST['gender'];
                  $dob =$_POST['dob'];
                  $email =$_POST['email'];
                  $contact =$_POST['contact'];  
                  $station =$_POST['station']; 
                  $jobtitle =$_POST['jobtitle'];  
                  $username =$_POST['email']; 
                  $password =md5('Tanrail');   

                        $sql = "INSERT INTO supervisors(fname, lname, sname, gender, dob, email, contact, username, password, station, jobTitle)
                                            VALUES (
                                                    '{$_POST['fname']}',
                                                    '{$_POST['mname']}',
                                                    '{$_POST['sname']}',
                                                    '{$_POST['gender']}',
                                                    '{$_POST['dob']}',
                                                    '{$_POST['email']}',
                                                    '{$_POST['contact']}',
                                                    '{$_POST['email']}',
                                                    '".$password."',
                                                    '{$_POST['station']}',
                                                    '{$_POST['jobtitle']}')";
                        mysqli_query($connect, $sql);

                        if ($sql)
                        {
                            
                                    $_SESSION['popup_code'] = "success";
                                    $_SESSION['popup'] = "New User Successful added";
                                    header("location: index.php?p=usermanagement");
                                
                        }
                        else{
                            $_SESSION['popup'] = "Failed, Try Again";
                            $_SESSION['popup_code'] = "error";
                            header("location: index.php?p=usermanagement");
                        } 

                    }
                
        
    }
	//END OF REGISTRATION PANEL
        //START EDIT MEMBER PANEL
        elseif($page=="editUserSubmit")
        {
            
            if(isset($_POST['userEBtn']))
            {    
              $superID =$_POST['superID'];
              $firstname =$_POST['fname'];
              $middlename =$_POST['mname'];
              $lastname =$_POST['sname'];
              $gender =$_POST['gender'];
              $dob =$_POST['dob'];
              $email =$_POST['email'];
              $contact =$_POST['contact'];  
              $station =$_POST['station']; 
              $jobtitle =$_POST['jobtitle'];  
              $username =$_POST['email']; 
              $password =md5('Tanrail');   

                      $sql="UPDATE supervisors SET fname ='".$firstname."', lname ='".$middlename."', sname ='".$lastname."', gender ='".$gender."', dob ='".$dob."', email ='".$email."', contact ='".$contact."', username ='".$username."', password ='".$password."', station ='".$station."', jobTitle ='".$jobtitle."' WHERE supervisor_id='".$superID."'";
                          
                            mysqli_query($connect, $sql);
    
                            if ($sql)
                            {
                                
                                        $_SESSION['popup_code'] = "success";
                                        $_SESSION['popup'] = "New User Successful added";
                                        header("location: index.php?p=usermanagement");
                                    
                            }
                            else{
                                $_SESSION['popup'] = "Failed, Try Again";
                                $_SESSION['popup_code'] = "error";
                                header("location: index.php?p=usermanagement");
                            } 
             }
                    
            
        }
        //END OF EDIT MEMBER PANEL
        //DELETE USER
        elseif($page=="deleteUserSubmit")
        {
            if(isset($_POST['userDBtn']))
            {    
                $superID =$_POST['superID'];

                    $sql="DELETE FROM supervisors WHERE supervisor_id='".$superID."'";

                    mysqli_query($connect, $sql);

                    if ($sql)
                        {
                            
                            $_SESSION['popup_code'] = "success";
                            $_SESSION['popup'] = "User Successful Deleted";
                            header("location: index.php?p=usermanagement");
                                
                        }
                        else{
                            $_SESSION['popup'] = "Failed, Try Again";
                            $_SESSION['popup_code'] = "error";
                            header("location: index.php?p=usermanagement");
                        } 

                }
        }
        //END DELETE USER
        //BADILI PASSWORD
        elseif($page=="badilipassword")
        {
            if(isset($_POST['badilipasswordSubmit']))
            {    
                $userid =$_POST['userid'];
                $loginname =$_POST['loginname'];
                $password =md5($_POST['password']); 
    
                    $sql="UPDATE supervisors SET password='".$password."' WHERE supervisor_id='".$userid."'";
                    mysqli_query($connect, $sql);
    
                    if ($sql)
                    {
                        $_SESSION['popup_code'] = "success";
                        $_SESSION['popup'] = "You have successful change password";
                        header("location: index.php?p=logout");
                    }
    
                }
        }
    //BADILI PASSWORD

     //ADD TRAIN
     elseif($page=="AddTrainSubmit")
     {
        if(isset($_POST['AddTrainBtn']))
        { 
            $trainno =$_POST['train_no'];

              $sql = "INSERT INTO train(train_no) VALUES ('{$_POST['train_no']}')";
              mysqli_query($connect, $sql);

              if ($sql)
              {
                $_SESSION['popup'] = "You have Successful Added New Train";
                $_SESSION['popup_code'] = "success";
                header("location: index.php?p=dashboard");
              }else {
                $_SESSION['popup'] = "Failed, Please Try Again";
                $_SESSION['popup_code'] = "error";
                header("location: index.php?p=dashboard");	
            }
                 
        }
     }
     //END OF ADD TRAIN
     //ADD COACH
     elseif($page=="AddCoachSubmit")
     {
        if(isset($_POST['AddCoachBtn']))
        { 
            $coachno =$_POST['coach_no'];

              $sql = "INSERT INTO coaches(coach_no) VALUES ('{$_POST['coach_no']}')";
              mysqli_query($connect, $sql);

              if ($sql)
              {
                $_SESSION['popup'] = "You have Successful Added New Coach";
                $_SESSION['popup_code'] = "success";
                header("location: index.php?p=dashboard");
              }else {
                $_SESSION['popup'] = "Failed, Please Try Again";
                $_SESSION['popup_code'] = "error";
                header("location: index.php?p=dashboard");	
            }
                 
        }
     }
     //END OF ADD COACH
     //ADD STATION
     elseif($page=="AddStationSubmit")
     {
        if(isset($_POST['AddStationBtn']))
        { 
            $stationname =$_POST['station_name'];

              $sql = "INSERT INTO stations(station_name) VALUES ('{$_POST['station_name']}')";
              mysqli_query($connect, $sql);

              if ($sql)
              {
                $_SESSION['popup'] = "You have Successful Added New Station";
                $_SESSION['popup_code'] = "success";
                header("location: index.php?p=dashboard");
              }else {
                $_SESSION['popup'] = "Failed, Please Try Again";
                $_SESSION['popup_code'] = "error";
                header("location: index.php?p=dashboard");	
            }
                 
        }
     }
     //END OF ADD STATION

     //CLAIMS AND COMMENT SUBMIT
    elseif($page=="ClaimCommentSubmit")
    {
        
                if(isset($_POST['claimBtn']))
                {    
                  $coment =$_POST['coment'];
                  $supervisor =$_SESSION['userId'];

                        $sql = "INSERT INTO claims(claim, submittedBy, date, PManswer, PCanswer, GManswer)
                                            VALUES (
                                                    '{$_POST['coment']}',
                                                    '{$supervisor}',
                                                     now(),
                                                    '',
                                                    '',
                                                    '')";
                        mysqli_query($connect, $sql);

                        if ($sql)
                        {
                            $_SESSION['popup_code'] = "success";
                            $_SESSION['popup'] = "Claims & Comment Successful Received";
                            header("location: index.php?p=claimAndComments");
                        }

                    }
                
        
    }
	//CLAIMS AND COMMENT SUBMIT
        //PM ANSWER CLAIM
        elseif($page=="PMAnswerClaim")
        {
            if(isset($_POST['PMansbtn']))
            {    
                $coment =$_POST['coment'];
                $claimID =$_POST['claimID'];
   
                    $sql="UPDATE claims SET PManswer= '$coment' WHERE claim_id='".$claimID."'";
                    mysqli_query($connect, $sql);
                    if ($sql)
                    {
                        $_SESSION['popup_code'] = "success";
                        $_SESSION['popup'] = "Answer successful Saved";
                        header("location: index.php?p=claimAndComments");
                    }
   
               }
        }
        //PM ANSWER CLAIM
        //PC ANSWER CLAIM
        elseif($page=="PCAnswerClaim")
        {
            if(isset($_POST['PCansbtn']))
            {    
                $coment =$_POST['coment'];
                $claimID =$_POST['claimID'];
   
                    $sql="UPDATE claims SET PCanswer= '$coment' WHERE claim_id='".$claimID."'";
                    mysqli_query($connect, $sql);
                    if ($sql)
                    {
                        $_SESSION['popup_code'] = "success";
                        $_SESSION['popup'] = "Answer successful Saved";
                        header("location: index.php?p=claimAndComments");
                    }
   
               }
        }
        //PC ANSWER CLAIM
        //GM ANSWER CLAIM
        elseif($page=="GMAnswerClaim")
        {
            if(isset($_POST['GMansbtn']))
            {    
                $coment =$_POST['coment'];
                $claimID =$_POST['claimID'];
   
                    $sql="UPDATE claims SET GManswer= '$coment' WHERE claim_id='".$claimID."'";
                    mysqli_query($connect, $sql);
                    if ($sql)
                    {
                        $_SESSION['popup_code'] = "success";
                        $_SESSION['popup'] = "Answer successful Saved";
                        header("location: index.php?p=claimAndComments");
                    }
   
               }
        }
        //GM ANSWER CLAIM
     //PM DAILY CLEANLINESS APPROVAL
     elseif($page=="DailyApprovePMSubmit")
     {
         if(isset($_POST['PMApproval']))
         {    
             $refNo =$_POST['supervisionRef'];

                 $sql="UPDATE dailycleanliness SET approvalPM='1' WHERE supervisionRef='".$refNo."'";
                 mysqli_query($connect, $sql);
                 if ($sql)
                 {
                     $_SESSION['popup_code'] = "success";
                     $_SESSION['popup'] = "You have Successful Approve the report";
                     header("location: index.php?p=cleanlinessAndSupervision");
                 }

            }
     }
     //PM DAILY CLEANLINESS APPROVAL
     //PM INTERIOR CLEANLINESS APPROVAL
     elseif($page=="VacuumApprovePMSubmit")
     {
         if(isset($_POST['PMApprovalV']))
         {    
             $refNo =$_POST['supervisionRef'];

                 $sql="UPDATE interiorcleaning SET approvalPM='1' WHERE supervisionRef='".$refNo."'";
                 mysqli_query($connect, $sql);
                 if ($sql)
                 {
                     $_SESSION['popup_code'] = "success";
                     $_SESSION['popup'] = "You have Successful Approve the report";
                     header("location: index.php?p=cleanlinessAndSupervision");
                 }

            }
     }
     //PM INTERIOR CLEANLINESS APPROVAL
     //PM FUMIGATION CLEANLINESS APPROVAL
     elseif($page=="FumigationApprovePMSubmit")
     {
         if(isset($_POST['PMApprovalF']))
         {    
             $refNo =$_POST['supervisionRef'];

                 $sql="UPDATE fumigation SET approvalPM='1' WHERE supervisionRef='".$refNo."'";
                 mysqli_query($connect, $sql);
                 if ($sql)
                 {
                     $_SESSION['popup_code'] = "success";
                     $_SESSION['popup'] = "You have Successful Approve the report";
                     header("location: index.php?p=cleanlinessAndSupervision");
                 }

            }
     }
     //PM FUMIGATION CLEANLINESS APPROVAL

     //PC DAILY CLEANLINESS APPROVAL
     elseif($page=="DailyApprovePCSubmit")
     {
         if(isset($_POST['PCApproval']))
         {    
             $refNo =$_POST['supervisionRef'];

                 $sql="UPDATE dailycleanliness SET ApprovalPC='1' WHERE supervisionRef='".$refNo."'";
                 mysqli_query($connect, $sql);
                 if ($sql)
                 {
                     $_SESSION['popup_code'] = "success";
                     $_SESSION['popup'] = "You have Successful Approve the report";
                     header("location: index.php?p=cleanlinessAndSupervision");
                 }

            }
     }
     //PC DAILY CLEANLINESS APPROVAL
     //PC INTERIOR CLEANLINESS APPROVAL
     elseif($page=="VacuumApprovePCSubmit")
     {
         if(isset($_POST['PCApprovalV']))
         {    
             $refNo =$_POST['supervisionRef'];

                 $sql="UPDATE interiorcleaning SET approvalPC='1' WHERE supervisionRef='".$refNo."'";
                 mysqli_query($connect, $sql);
                 if ($sql)
                 {
                     $_SESSION['popup_code'] = "success";
                     $_SESSION['popup'] = "You have Successful Approve the report";
                     header("location: index.php?p=cleanlinessAndSupervision");
                 }

            }
     }
     //PC INTERIOR CLEANLINESS APPROVAL
     //PC FUMIGATION CLEANLINESS APPROVAL
     elseif($page=="FumigationApprovePCSubmit")
     {
         if(isset($_POST['PCApprovalF']))
         {    
             $refNo =$_POST['supervisionRef'];

                 $sql="UPDATE fumigation SET approvalPC='1' WHERE supervisionRef='".$refNo."'";
                 mysqli_query($connect, $sql);
                 if ($sql)
                 {
                     $_SESSION['popup_code'] = "success";
                     $_SESSION['popup'] = "You have Successful Approve the report";
                     header("location: index.php?p=cleanlinessAndSupervision");
                 }

            }
     }
     //PC FUMIGATION CLEANLINESS APPROVAL

     //LIPA MKOPO ULIOMBWA KWA MKOPAJI
    elseif($page=="LipaMkopo")
    {
        if(isset($_POST['lipamkopo']))
        {    
            $row;
            $reference = rand();
            $mkopoid =$_POST['mkopoid'];
            $jina =$_POST['jina'];
            $rejesho =$_POST['rejesho'];
            $remark =$_POST['remark']; 
            $lisiti =$_FILES["lisiti"]["name"];
            $templisiti =$_FILES["lisiti"]["tmp_name"];

            $folder ="lisitipdf/";

                $sql = "INSERT INTO marejesho(mkopo_id, jina, mkopojumla, mkopobaki, lisiti, maliporeference, remark, tarehe)
                                    VALUES (
                                            '{$_POST['mkopoid']}',
                                            '{$_POST['jina']}',
                                            '{$_POST['rejesho']}',
                                            '{$_POST['rejesho']}',
                                            '{$lisiti}',
                                            '{$reference}',
                                            '{$_POST['remark']}',
                                            now())";
                mysqli_query($connect, $sql);

                if (move_uploaded_file($templisiti, $folder.$lisiti))
                {
                    $sql1="UPDATE mkopo SET hali_malipo='1' WHERE mkopo_id='".$mkopoid."'";
                    mysqli_query($connect, $sql1);

                    $_SESSION['popup'] = "Fedha ya Mkopo imelipwa kwa muhusika $jina";
                    $_SESSION['popup_code'] = "success";
                    header("location: index.php?p=mikopo");
                }else {
                    $_SESSION['popup'] = "Failed, Please Try Again";
                    $_SESSION['popup_code'] = "error";
                    header("location: index.php?p=mikopo");	
                }

            }
    }
    //LIPA MKOPO ULIOMBWA KWA MKOPAJI
    //FANYA MAREJESHO
    elseif($page=="fanyaMarejesho")
    {
        if(isset($_POST['lipamarejesho']))
        {    
            $row;
            $reference = rand();
            $mkopoid =$_POST['mkopoid'];
            $jina =$_POST['jina'];
            $mkopojumla =$_POST['mkopobaki'];
            $rejesho =$_POST['rejeshokiasi'];
            $remark =$_POST['remark']; 
            $lisiti =$_FILES["lisiti"]["name"];
            $templisiti =$_FILES["lisiti"]["tmp_name"];

            $mkopobakitena = $_POST['mkopobaki'] - $_POST['rejeshokiasi'];

            $folder ="lisitipdf/";

                $sql = "INSERT INTO marejesho(mkopo_id, jina, mkopojumla, rejesho, mkopobaki, lisiti, maliporeference, remark, tarehe)
                                    VALUES (
                                            '{$_POST['mkopoid']}',
                                            '{$_POST['jina']}',
                                            '{$_POST['mkopobaki']}',
                                            '{$_POST['rejeshokiasi']}',
                                            '{$mkopobakitena}',
                                            '{$lisiti}',
                                            '{$reference}',
                                            '{$_POST['remark']}',
                                            now())";
                mysqli_query($connect, $sql);

                if (move_uploaded_file($templisiti, $folder.$lisiti))
                {
                    if($mkopobakitena <= 0){
                        $sql1="UPDATE mkopo SET hali_malipo='2' WHERE mkopo_id='".$mkopoid."'";
                        mysqli_query($connect, $sql1);

                        $_SESSION['popup'] = "Rejesho la Kiasi $rejesho Limefanikiwa";
                        $_SESSION['popup_code'] = "success";
                        header("location: index.php?p=mikopoiliyomalizika");
                    }else{

                        $_SESSION['popup'] = "Rejesho la Kiasi $rejesho Limefanikiwa";
                        $_SESSION['popup_code'] = "success";
                        header("location: index.php?p=mikopohai");
                    }
                }else {
                    $_SESSION['popup'] = "Failed, Please Try Again";
                    $_SESSION['popup_code'] = "error";
                    header("location: index.php?p=mikopo");	
                }

            }
    }
    //FANYA MAREJESHO

    //REKODI MATUKIO
    elseif($page=="rekodimatukio")
    {
        if(isset($_POST['rekodi']))
        {    
            $mwezi =$_POST['mwezi'];
            $tarehe =$_POST['tarehe'];
            $tukio =$_POST['tukio'];
            $eneo =$_POST['eneo'];

                $sql = "INSERT INTO matukio(tukio, mwezi, tarehe_tukio, eneo, tarehe_kutangaza)
                                    VALUES (
                                            '{$_POST['tukio']}',
                                            '{$_POST['mwezi']}',
                                            '{$_POST['tarehe']}',
                                            '{$_POST['eneo']}',
                                            now())";
                mysqli_query($connect, $sql);

                if ($sql)
                {
                    $_SESSION['popup_code'] = "success";
                    $_SESSION['popup'] = "Umefanikiwa kurekodi Tukio";
                    header("location: index.php?p=dashboard");
                }

            }
    }
    //END REKODI MATUKIO
    //NUKUU YA VIKAO/MATUKIO
    elseif($page=="nukuuyavikaoSubmit")
    {
        if(isset($_POST['wasilisha']))
        {    
            $row;
            $tukioId =$_POST['tukioId'];
            $jinaKikao =$_POST['jinaKikao'];
            $mahudhulio =implode(",", $_POST['mahudhurio']);
            $mhutasari =$_POST['mhutasari'];
            $matumizi =$_POST['matumizi'];
            $nukuu =$_POST['nukuu'];
            $ambatanisho =$_FILES["ambatanisho"]["name"];
            $tempambatanisho =$_FILES["ambatanisho"]["tmp_name"];

            $folder ="ajendaVikao/";

                $sql = "INSERT INTO nukuuyavikao(tukio_id, tukio, mahudhurio, muhutasari, matumizi, nukuuMatumizi, ambatanisho, tarehe)
                VALUES (
                        '{$_POST['tukioId']}',
                        '{$_POST['jinaKikao']}',
                        '{$mahudhulio}',
                        '{$_POST['mhutasari']}',
                        '{$_POST['matumizi']}',
                        '{$_POST['nukuu']}',
                        '{$ambatanisho}',
                        now())";
                mysqli_query($connect, $sql);

                if (move_uploaded_file($tempambatanisho, $folder.$ambatanisho))
                {
                $sql1="UPDATE matukio SET status='1' WHERE id='".$tukioId."'";
                mysqli_query($connect, $sql1);

                $_SESSION['popup'] = "Kumbukumbu za Kikao/Tukio zimerekodiwa";
                $_SESSION['popup_code'] = "success";
                header("location: index.php?p=nukuuyavikao");
                }
            }
    }
        //END NUKUU YA VIKAO/MATUKIO

    //LIPISHA ADA
    elseif($page=="lipishaadasubmit")
    {
        if(isset($_POST['lipisha']))
        {    
            $row;
            $reference = rand();
            $userid =$_POST['userid'];
            $fedha =$_POST['fedha'];
            $financialyear =$_POST['financialyear'];
            $month =$_POST['month']; 
            $approval =$_POST['approval']; 
            $lisiti =$_FILES["lisiti"]["name"];
            $templisiti =$_FILES["lisiti"]["tmp_name"];

            $folder ="lisitipdf/";

                $sql = "INSERT INTO ada(user_id, amount, financial_year, month, lisiti, referencenumber, approval, date)
                                    VALUES (
                                            '{$_POST['userid']}',
                                            '{$_POST['fedha']}',
                                            '{$_POST['financialyear']}',
                                            '{$_POST['month']}',
                                            '{$lisiti}',
                                            '{$reference}',
                                            '{$_POST['approval']}',
                                            now())";
                mysqli_query($connect, $sql);

                if (move_uploaded_file($templisiti, $folder.$lisiti))
                {
                    $_SESSION['popup'] = "Umefanikiwa Kulipisha Ada";
                    $_SESSION['popup_code'] = "success";
                    header("location: index.php?p=ada");
                }else {
                    $_SESSION['popup'] = "Failed, Please Try Again";
                    $_SESSION['popup_code'] = "error";
                    header("location: index.php?p=ada");	
                }

            }
    }
    //END LIPISHA ADA
    //LIPISHA MCHANGO
    elseif($page=="lipishaMchangosubmit")
    {
        if(isset($_POST['lipisha']))
        {    
            $row;
            $reference = rand();
            $userid =$_POST['userid'];
            $fedha =$_POST['fedha'];
            $financialyear =$_POST['financialyear'];
            $month =$_POST['month']; 
            $approval =$_POST['approval']; 
            $lisiti =$_FILES["lisiti"]["name"];
            $templisiti =$_FILES["lisiti"]["tmp_name"];

            $folder ="lisitipdf/";

                $sql = "INSERT INTO mfukomaendeleo(user_id, amount, financial_year, month, lisiti, referencenumber, approval, date)
                                    VALUES (
                                            '{$_POST['userid']}',
                                            '{$_POST['fedha']}',
                                            '{$_POST['financialyear']}',
                                            '{$_POST['month']}',
                                            '{$lisiti}',
                                            '{$reference}',
                                            '{$_POST['approval']}',
                                            now())";
                mysqli_query($connect, $sql);

                if (move_uploaded_file($templisiti, $folder.$lisiti))
                {
                    $_SESSION['popup'] = "Umefanikiwa Kulipia Mchango";
                    $_SESSION['popup_code'] = "success";
                    header("location: index.php?p=mfukowaMaendeleo");
                }else {
                    $_SESSION['popup'] = "Failed, Please Try Again";
                    $_SESSION['popup_code'] = "error";
                    header("location: index.php?p=mfukowaMaendeleo");	
                }

            }
    }
    //END LIPISHA MCHANO
    //REKEBISHA MALIPO ADA
    elseif($page=="rekebishaMalipoAda")
    {
        if(isset($_POST['rekebishaAda']))
        {    
            $row;
            $adaid =$_POST['adaid'];
            $fedha =$_POST['fedha'];
            $financialyear =$_POST['financialyear'];
            $month =$_POST['month']; 
            $approvalVal = 0; 
            $lisiti =$_FILES["lisiti"]["name"];
            $templisiti =$_FILES["lisiti"]["tmp_name"];

            $folder ="lisitipdf/";

                $sql="UPDATE ada SET amount='".$fedha."',financial_year='".$financialyear."',month='".$month."', approval='".$approvalVal."', lisiti='".$lisiti."' WHERE ada_id='".$adaid."'";

                mysqli_query($connect, $sql);

                if (move_uploaded_file($templisiti, $folder.$lisiti))
                {
                    $_SESSION['popup'] = "Umefanikiwa Kurekebisha Malipo ya Ada";
                    $_SESSION['popup_code'] = "success";
                    header("location: index.php?p=ada");
                }else {
                    $_SESSION['popup'] = "Failed, Please Try Again";
                    $_SESSION['popup_code'] = "error";
                    header("location: index.php?p=ada");	
                }

            }
    }
    //END REKEBISHA MALIPO ADA
    //REKEBISHA MALIPO MFUKO WA MAENDELEO
    elseif($page=="rekebishaMalipoMfuko")
     {
         if(isset($_POST['rekebishaMchango']))
         {    
             $row;
             $mchangoid =$_POST['mchangoid'];
             $fedha =$_POST['fedha'];
             $financialyear =$_POST['financialyear'];
             $month =$_POST['month']; 
             $approvalVal = 0; 
             $lisiti =$_FILES["lisiti"]["name"];
             $templisiti =$_FILES["lisiti"]["tmp_name"];
 
             $folder ="lisitipdf/";
 
                 $sql="UPDATE mfukomaendeleo SET amount='".$fedha."',financial_year='".$financialyear."',month='".$month."', approval='".$approvalVal."', lisiti='".$lisiti."' WHERE mchango_id='".$mchangoid."'";
 
                 mysqli_query($connect, $sql);
 
                 if (move_uploaded_file($templisiti, $folder.$lisiti))
                 {
                     $_SESSION['popup'] = "Umefanikiwa Kurekebisha Malipo ya Ada";
                     $_SESSION['popup_code'] = "success";
                     header("location: index.php?p=mfukowaMaendeleo");
                 }else {
                     $_SESSION['popup'] = "Failed, Please Try Again";
                     $_SESSION['popup_code'] = "error";
                     header("location: index.php?p=mfukowaMaendeleo");	
                 }
 
             }
     }
     //END REKEBISHA MALIPO MFUKO WA MAENDELEO
    //KUBALI MALIPO YA ADA
    elseif($page=="kubaliMalipoAda")
        {
            if(isset($_POST['thibitishaAda']))
            {    
                $adaid =$_POST['adaid'];
                $remark =$_POST['remark'];
                $approvalVal = 1;
    
                    $sql="UPDATE ada SET approval='".$approvalVal."', remark='".$remark."' WHERE ada_id='".$adaid."'";
                    mysqli_query($connect, $sql);
    
                    if ($sql)
                    {
                        $_SESSION['popup_code'] = "success";
                        $_SESSION['popup'] = "Umekubali kuidhinisha Malipo";
                        header("location: index.php?p=thibitishamalipo");
                    }
    
                }
        }
    //KUBALI MALIPO YA ADA
    //KATAA MALIPO YA ADA
    elseif($page=="kataaMalipoAda")
        {
            if(isset($_POST['kataaAda']))
            {    
                $adaid =$_POST['adaid'];
                $remark =$_POST['remark'];
                $approvalVal = 2;
    
                    $sql="UPDATE ada SET approval='".$approvalVal."', remark='".$remark."' WHERE ada_id='".$adaid."'";
                    mysqli_query($connect, $sql);
    
                    if ($sql)
                    {
                        $_SESSION['popup_code'] = "success";
                        $_SESSION['popup'] = "Umekataa kuidhinisha Malipo";
                        header("location: index.php?p=thibitishamalipo");
                    }
    
                }
        }
    //KATAA MALIPO YA ADA    
    //KUBALI MCHANGO MFUKO WA MAENDELEO
    elseif($page=="kubaliMalipoMchango")
        {
            if(isset($_POST['thibitishaMchango']))
            {    
                $mchangoid =$_POST['mchangoid'];
                $remark =$_POST['remark'];
                $approvalVal = 1;
    
                    $sql="UPDATE mfukomaendeleo SET approval='".$approvalVal."', remark='".$remark."' WHERE mchango_id='".$mchangoid."'";
                    mysqli_query($connect, $sql);
    
                    if ($sql)
                    {
                        $_SESSION['popup_code'] = "success";
                        $_SESSION['popup'] = "Umekubali kuidhinisha Malipo";
                        header("location: index.php?p=thibitishamalipoMfuko");
                    }
    
                }
        }
    //KUBALI MCHANGO MFUKO WA MAENDELEO
    //KATAA MCHANGO MFUKO WA MAENDELEO
    elseif($page=="kataaMalipoMchango")
        {
            if(isset($_POST['kataaMchango']))
            {    
                $mchangoid =$_POST['mchangoid'];
                $remark =$_POST['remark'];
                $approvalVal = 2;
    
                    $sql="UPDATE mfukomaendeleo SET approval='".$approvalVal."', remark='".$remark."' WHERE mchango_id='".$mchangoid."'";
                    mysqli_query($connect, $sql);
    
                    if ($sql)
                    {
                        $_SESSION['popup_code'] = "success";
                        $_SESSION['popup'] = "Umekataa kuidhinisha Malipo";
                        header("location: index.php?p=thibitishamalipoMfuko");
                    }
    
                }
        }
    //KATAA MCHANGO MFUKO WA MAENDELEO 
     //TENGENEZA CHEO
     elseif($page=="cheosubmit")
     {
         if(isset($_POST['cheobtn']))
         {    
             $cheo =$_POST['cheo'];
 
                 $sql = "INSERT INTO vyeo(cheo)
                            VALUES (
                                    '{$_POST['cheo']}')";
                 mysqli_query($connect, $sql);
 
                 if ($sql)
                 {
                     $_SESSION['popup_code'] = "success";
                     $_SESSION['popup'] = "Umefanikiwa kurekodi Cheo";
                     header("location: index.php?p=viongozi");
                 }
 
             }
     }
     //END TENGENEZA CHEO

}
else
{
    $main_content="pages/login.php";
}


?>