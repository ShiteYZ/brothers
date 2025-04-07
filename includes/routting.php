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
    elseif($page=="members" && isset($_SESSION['userName']))
    {
        $main_content="pages/members.php";    
    }
    elseif($page=="ada" && isset($_SESSION['userName']))
    {
        $main_content="pages/ada.php";    
    }
    elseif($page=="mfukowaMaendeleo" && isset($_SESSION['userName']))
    {
        $main_content="pages/mfukowaMaendeleo.php";    
    }
    elseif($page=="lipiaada" && isset($_SESSION['userName']))
    {
        $main_content="pages/lipiaada.php";    
    }
    elseif($page=="lipishaada" && isset($_SESSION['userName']))
    {
        $main_content="pages/lipishaada.php";    
    }
    elseif($page=="lipiamfuko" && isset($_SESSION['userName']))
    {
        $main_content="pages/lipiamfuko.php";    
    }
    elseif($page=="lipishamfuko" && isset($_SESSION['userName']))
    {
        $main_content="pages/lipishamfuko.php";    
    }
    elseif($page=="register" && isset($_SESSION['userName']))
    {
        $main_content="pages/register.php";    
    }
    elseif($page=="AdafinancialYearSelection" && isset($_SESSION['userName']))
    {
        $main_content="pages/AdafinancialYearSelection.php";    
    }
    elseif($page=="MfukofinancialYearSelection" && isset($_SESSION['userName']))
    {
        $main_content="pages/MfukofinancialYearSelection.php";    
    }
    elseif($page=="mikopo" && isset($_SESSION['userName']))
    {
        $main_content="pages/mikopo.php";    
    }
    elseif($page=="mikopohai" && isset($_SESSION['userName']))
    {
        $main_content="pages/mikopohai.php";    
    }
    elseif($page=="mikopoiliyomalizika" && isset($_SESSION['userName']))
    {
        $main_content="pages/mikopoiliyomalizika.php";    
    }
    elseif($page=="miradi" && isset($_SESSION['userName']))
    {
        $main_content="pages/miradi.php";    
    }
    elseif($page=="miradidetails" && isset($_SESSION['userName']))
    {
        $main_content="pages/miradidetails.php";    
    }
    elseif($page=="mashartiMkopo" && isset($_SESSION['userName']))
    {
        $main_content="pages/mashartiMkopo.php";    
    }
    elseif($page=="personalprofile" && isset($_SESSION['userName']))
    {
        $main_content="pages/personalprofile.php";    
    }
    elseif($page=="thibitishamalipo" && isset($_SESSION['userName']))
    {
        $main_content="pages/thibitishaMalipo.php";    
    }
    elseif($page=="thibitishamalipoMfuko" && isset($_SESSION['userName']))
    {
        $main_content="pages/thibitishaMalipoMfuko.php";    
    }
    elseif($page=="AdaLisitiPreview" && isset($_SESSION['userName']))
    {
        $main_content="pages/adaLisitiPreview.php";    
    }
    elseif($page=="mfukoLisitiPreview" && isset($_SESSION['userName']))
    {
        $main_content="pages/mfukoLisitiPreview.php";    
    }
    elseif($page=="miradiLisitiPreview" && isset($_SESSION['userName']))
    {
        $main_content="pages/miradiLisitiPreview.php";    
    }
    elseif($page=="miradiNyarakaPreview" && isset($_SESSION['userName']))
    {
        $main_content="pages/miradiNyarakaPreview.php";    
    }
    elseif($page=="malipoAdaKataliwa" && isset($_SESSION['userName']))
    {
        $main_content="pages/malipoAdaKataliwa.php";    
    }
    elseif($page=="malipoMfukoKataliwa" && isset($_SESSION['userName']))
    {
        $main_content="pages/malipoMfukoKataliwa.php";    
    }
    elseif($page=="nukuuyavikao" && isset($_SESSION['userName']))
    {
        $main_content="pages/nukuuyavikao.php";    
    }
    elseif($page=="nukuuyavikaoForm" && isset($_SESSION['userName']))
    {
        $main_content="pages/nukuuyavikaoForm.php";    
    }
    elseif($page=="report" && isset($_SESSION['userName']))
    {
        $main_content="pages/report.php";    
    }
    elseif($page=="michangoAdaReport" && isset($_SESSION['userName']))
    {
        $main_content="pages/michangoAdaReport.php";    
    }
    elseif($page=="viongozi" && isset($_SESSION['userName']))
    {
        $main_content="pages/viongozi.php";    
    }
    elseif($page=="editMember" && isset($_SESSION['userName']))
    {
        $main_content="pages/editMember.php";    
    }
    elseif($page=="wasifuwangu" && isset($_SESSION['userName']))
    {
        $main_content="pages/wasifuwangu.php";    
    }
    // LOGIN PAGE
	elseif($page=="logincheck")
    {
       $username=$_POST['username'];
	   $password=$_POST['password'];

       $sql = "SELECT * FROM members WHERE login_name = '$username'";
		$result = $connect->query($sql);

		if($result->num_rows == 1) {
			$password = md5($password);
			// exists
			$mainSql = "SELECT * FROM members WHERE login_name = '$username' AND password = '$password'";
			$mainResult = $connect->query($mainSql);

			if($mainResult->num_rows == 1) {
				$value = $mainResult->fetch_assoc();
				$user_id = $value['user_id'];
				$user_name = $value['login_name'];
				$previlege = $value['previlege'];

				// set session
				$_SESSION['userId'] = $user_id;
				$_SESSION['userName'] = $user_name;
				$_SESSION['previlege'] = $previlege;

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
    elseif($page=="addnewmembersubmit")
    {
        
                if(isset($_POST['memberregister']))
                {    
                  $row;
                  $folder ="passports/";
                  $firstname =$_POST['firstName'];
                  $middlename =$_POST['middleName'];
                  $lastname =$_POST['lastName'];
                  $dob =$_POST['birthdayDate'];
                  $gender =$_POST['gender'];
                  $nida =$_POST['Nida'];
                  $address =$_POST['Address'];  
                  $phone =$_POST['phoneNumber']; 
                  $email =$_POST['emailAddress']; 
                  $Akaunti =$_POST['Akaunti']; 
                  $Akaunti2 =$_POST['Akaunti2']; 
                  $username =$_POST['emailAddress']; 
                  $password =md5($_POST['lastName']); 
                  $previlege =$_POST['Previlege'];  
                  $passport =$_FILES["passport"]["name"];   
                  $temppassport =$_FILES["passport"]["tmp_name"];

                        $sql = "INSERT INTO members(fname, mname, lname, bday, gender, nida, login_name, password, address, contact, email, akaunti_benki, akaunti2, previlege, passport)
                                            VALUES (
                                                    '{$_POST['firstName']}',
                                                    '{$_POST['middleName']}',
                                                    '{$_POST['lastName']}',
                                                    '{$_POST['birthdayDate']}',
                                                    '{$_POST['gender']}',
                                                    '{$_POST['Nida']}',
                                                    '{$_POST['emailAddress']}',
                                                    '".$password."',
                                                    '{$_POST['Address']}',
                                                    '{$_POST['phoneNumber']}',
                                                    '{$_POST['emailAddress']}',
                                                    '{$_POST['Akaunti']}',
                                                    '{$_POST['Akaunti2']}',
                                                    '{$_POST['Previlege']}',
                                                    '{$passport}')";
                        mysqli_query($connect, $sql);

                        if (move_uploaded_file($temppassport, $folder.$passport))
                        {
                            
                                    $_SESSION['popup_code'] = "success";
                                    $_SESSION['popup'] = "Umesajili Umefanikiwa";
                                    header("location: index.php?p=members");
                                
                        }
                        else{
                            $_SESSION['popup'] = "Failed, Try Again";
                            $_SESSION['popup_code'] = "error";
                            header("location: index.php?p=members");
                        } 

                    }
                
        
    }
	//END OF REGISTRATION PANEL
        //START EDIT MEMBER PANEL
        elseif($page=="editmembersubmit")
        {
            
                    if(isset($_POST['editbtnmemberregister']))
                    {    
                      $row;
                      $folder ="passports/";
                      $userid =$_POST['userid'];
                      $firstname =$_POST['firstName'];
                      $middlename =$_POST['middleName'];
                      $lastname =$_POST['lastName'];
                      $dob =$_POST['birthdayDate'];
                      $gender =$_POST['gender'];
                      $nida =$_POST['Nida'];
                      $address =$_POST['Address'];  
                      $phone =$_POST['phoneNumber']; 
                      $email =$_POST['emailAddress']; 
                      $Akaunti =$_POST['Akaunti']; 
                      $Akaunti2 =$_POST['Akaunti2']; 
                      $username =$_POST['emailAddress']; 
                      $password =md5($_POST['lastName']); 
                      $previlege =$_POST['Previlege'];  
                      $passport =$_FILES["passport"]["name"];   
                      $temppassport =$_FILES["passport"]["tmp_name"];

                      $sql="UPDATE members SET fname ='".$firstname."', mname ='".$middlename."', lname ='".$lastname."', bday ='".$dob."', gender ='".$gender."', nida ='".$nida."', login_name ='".$username."', password ='".$password."', address ='".$address."', contact ='".$phone."', email ='".$email."', akaunti_benki ='".$Akaunti."', akaunti2 ='".$Akaunti2."', previlege ='".$previlege."', passport ='".$passport."' WHERE user_id='".$userid."'";
                          
                            mysqli_query($connect, $sql);
    
                            if (move_uploaded_file($temppassport, $folder.$passport))
                            {
                                
                                        $_SESSION['popup_code'] = "success";
                                        $_SESSION['popup'] = "Umefanikiwa Kurekebisha Taarifa";
                                        header("location: index.php?p=members");
                                    
                            }
                            else{
                                $_SESSION['popup'] = "Failed, Try Again";
                                $_SESSION['popup_code'] = "error";
                                header("location: index.php?p=members");
                            } 
    
                        }
                    
            
        }
        //END OF EDIT MEMBER PANEL
        //BADILI PASSWORD
        elseif($page=="badilipassword")
        {
            if(isset($_POST['badilipasswordSubmit']))
            {    
                $userid =$_POST['userid'];
                $loginname =$_POST['loginname'];
                $password =md5($_POST['password']); 
    
                    $sql="UPDATE members SET password='".$password."' WHERE user_id='".$userid."'";
                    mysqli_query($connect, $sql);
    
                    if ($sql)
                    {
                        $_SESSION['popup_code'] = "success";
                        $_SESSION['popup'] = "Umefanikiwa kubadili password";
                        header("location: index.php?p=wasifuwangu");
                    }
    
                }
        }
    //BADILI PASSWORD
    //START REGISTER FAMILY PANEL
    elseif($page=="registerFamily")
    {
        
                if(isset($_POST['registerFamilySubmit']))
                {    
                    $row;
                    $folder ="passports/";
                    $userid =$_POST['userid'];
                    $name =$_POST['name'];
                    $dob =$_POST['dob'];
                    $contact =$_POST['contact'];
                    $relation =$_POST['relation'];
                    $passport =$_FILES["passport"]["name"];   
                    $temppassport =$_FILES["passport"]["tmp_name"];   

                            $sql = "INSERT INTO family(user_id, names, dob, contact, relation, passport)
                                                VALUES (
                                                        '{$_POST['userid']}',
                                                        '{$_POST['name']}',
                                                        '{$_POST['dob']}',
                                                        '{$_POST['contact']}',
                                                        '{$_POST['relation']}',
                                                        '{$passport}')";
                            mysqli_query($connect, $sql);

                            if (move_uploaded_file($temppassport, $folder.$passport))
                            {
                                
                                        $_SESSION['popup_code'] = "success";
                                        $_SESSION['popup'] = "Umesajili kikamilifu Mwanafamilia";
                                        header("location: index.php?p=members");
                                    
                            }
                            else{
                                $_SESSION['popup'] = "Failed, Try Again";
                                $_SESSION['popup_code'] = "error";
                                header("location: index.php?p=members");
                            } 
            }  
        
    }
    //END OF REGISTER FAMILY

     //SAJILI MRADI MPYA
     elseif($page=="addnewMradi")
     {
         
        $row;
        $jina =$_POST['jina'];
        $eneo =$_POST['eneo'];
        $thamani =$_POST['thamani'];
        $image =$_FILES["picha"]["name"];
        $tempimage =$_FILES["picha"]["tmp_name"];
        
        $folder ="uploads/";

              $sql = "INSERT INTO miradi(jina, eneo, thamani, picha)
                                  VALUES (
                                          '{$_POST['jina']}',
                                          '{$_POST['eneo']}',
                                          '{$_POST['thamani']}',
                                          '{$image}')";
              mysqli_query($connect, $sql);

              if (move_uploaded_file($tempimage, $folder.$image))
              {
                $_SESSION['popup'] = "Umefanikiwa kuongeza mradi mpya";
                $_SESSION['popup_code'] = "success";
                header("location: index.php?p=miradi");
              }else {
                $_SESSION['popup'] = "Failed, Please Try Again";
                $_SESSION['popup_code'] = "error";
                header("location: index.php?p=miradi");	
            }
                 
         
     }
     //END OF SAJILI MRADI MPYA
    //START WEKEZA MRADI
    elseif($page=="mradiwekezo")
    {
        
                if(isset($_POST['submitwekezo']))
                {    
                    $row;
                    $folder ="lisitipdf/";
                    $mradiid =$_POST['mradiid'];
                    $thamani =$_POST['thamani'];
                    $wekezo =$_POST['wekezo'];
                    $lengo =$_POST['lengo'];
                    $lisiti =$_FILES["lisiti"]["name"];   
                    $templisiti =$_FILES["lisiti"]["tmp_name"];   

                            $sql = "INSERT INTO wekezomiradi(mradi_id, thamani, wekezo_thamani, lisiti, lengo, tarehe)
                                                VALUES (
                                                        '{$_POST['mradiid']}',
                                                        '{$_POST['thamani']}',
                                                        '{$_POST['wekezo']}',
                                                        '{$lisiti}',
                                                        '{$_POST['lengo']}',
                                                        now())";
                            mysqli_query($connect, $sql);

                            if (move_uploaded_file($templisiti, $folder.$lisiti))
                            {
                                
                                        $_SESSION['popup_code'] = "success";
                                        $_SESSION['popup'] = "Umefanikiwa Kuwasilisha";
                                        header("location: index.php?p=miradi");
                                    
                            }
                            else{
                                $_SESSION['popup'] = "Failed, Try Again";
                                $_SESSION['popup_code'] = "error";
                                header("location: index.php?p=miradi");
                            } 
            }  
        
    }
    //END OF WEKEZA MRADI
    //START NYARAKA MRADI
    elseif($page=="mradiNyaraka")
    {
        
                if(isset($_POST['nyarakaSubmit']))
                {    
                    $row;
                    $folder ="nyarakaMiradi/";
                    $mradiid =$_POST['mradiid'];
                    $jinanyaraka =$_POST['jinanyaraka'];
                    $remark =$_POST['remark'];
                    $nyaraka =$_FILES["nyaraka"]["name"];   
                    $tempnyaraka =$_FILES["nyaraka"]["tmp_name"];   

                            $sql = "INSERT INTO nyarakamiradi(mradi_id, jina_nyaraka, nyaraka, tarehe)
                                                VALUES (
                                                        '{$_POST['mradiid']}',
                                                        '{$_POST['jinanyaraka']}',
                                                        '{$nyaraka}',
                                                        now())";
                            mysqli_query($connect, $sql);

                            if (move_uploaded_file($tempnyaraka, $folder.$nyaraka))
                            {
                                
                                        $_SESSION['popup_code'] = "success";
                                        $_SESSION['popup'] = "Umefanikiwa Kuwasilisha Nyaraka";
                                        header("location: index.php?p=miradi");
                                    
                            }
                            else{
                                $_SESSION['popup'] = "Failed, Try Again";
                                $_SESSION['popup_code'] = "error";
                                header("location: index.php?p=miradi");
                            } 
            }  
        
    }
    //END OF NYARAKA MRADI

     //MAOMBI YA MKOPO
    elseif($page=="maombiMkopo")
    {
        
                if(isset($_POST['recodimkopo']))
                {    
                  $userid =$_POST['userid'];
                  $jina =$_POST['jina'];
                  $mkopo =$_POST['mkopo'];
                  $riba =$_POST['riba'];
                  $rejesho =$_POST['rejesho'];
                  $tarehekuchukua =$_POST['tarehekuchukua'];
                  $tarehekurudisha =$_POST['tarehekurudisha'];  
                  $dhumuni =$_POST['dhumuni']; 
                  $akaunti =$_POST['akaunti']; 

                        $sql = "INSERT INTO mkopo(user_id, jina, kiasi_mkopo, riba, marejesho, tarehe_kuchukua, tarehe_kurudisha, dhumuni, benki, tarehe)
                                            VALUES (
                                                    '{$_POST['userid']}',
                                                    '{$_POST['jina']}',
                                                    '{$_POST['mkopo']}',
                                                    '{$_POST['riba']}',
                                                    '{$_POST['rejesho']}',
                                                    '{$_POST['tarehekuchukua']}',
                                                    '{$_POST['tarehekurudisha']}',
                                                    '{$_POST['dhumuni']}',
                                                    '{$_POST['akaunti']}',
                                                    now())";
                        mysqli_query($connect, $sql);

                        if ($sql)
                        {
                            $_SESSION['popup_code'] = "success";
                            $_SESSION['popup'] = "Umefanikiwa kuomba Mkopo";
                            header("location: index.php?p=mikopo");
                        }

                    }
                
        
    }
	//END OF MAOMBI YA MKOPO
     //IDHINISHA MKOPO
     elseif($page=="idhinishaMkopo")
     {
         if(isset($_POST['idhinisha']))
         {    
             $mkopoid =$_POST['mkopoid'];
             $mtiasahihi =$_POST['mtiasahihi'];
             $remark =$_POST['remark'];
             $sahihi =$_POST['sahihi'];
             $jina =$_POST['jina'];

             if($mtiasahihi == 'Mwenyekiti'){
                 $sql="UPDATE mkopo SET sahihi_mwenyekiti='".$sahihi."', remark='".$remark."' WHERE mkopo_id='".$mkopoid."'";
                 mysqli_query($connect, $sql);
                 if ($sql)
                 {
                     $_SESSION['popup_code'] = "success";
                     $_SESSION['popup'] = "Umeidhinisha Mkopo wa $jina";
                     header("location: index.php?p=mikopo");
                 }
             }
             elseif($mtiasahihi == 'Katibu'){
                $sql="UPDATE mkopo SET sahihi_katibu='".$sahihi."', remark='".$remark."' WHERE mkopo_id='".$mkopoid."'";
                mysqli_query($connect, $sql);
                if ($sql)
                {
                    $_SESSION['popup_code'] = "success";
                    $_SESSION['popup'] = "Umeidhinisha Mkopo wa $jina";
                    header("location: index.php?p=mikopo");
                }
            }
            elseif($mtiasahihi == 'Mhazini'){
                $sql="UPDATE mkopo SET sahihi_hazina='".$sahihi."', remark='".$remark."' WHERE mkopo_id='".$mkopoid."'";
                mysqli_query($connect, $sql);
                if ($sql)
                {
                    $_SESSION['popup_code'] = "success";
                    $_SESSION['popup'] = "Umeidhinisha Mkopo wa $jina";
                    header("location: index.php?p=mikopo");
                }
            }

            }
     }
     //IDHINISHA MKOPO
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