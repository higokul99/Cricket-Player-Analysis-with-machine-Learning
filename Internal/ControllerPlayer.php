<?php
include_once('../db_connection.php'); 


if(isset($_POST['Strength']))
{

	
	$Email = $_SESSION['username'];
	$preference = $_POST['player-preference'];
	$qq1 = "SELECT pid FROM player_reg WHERE email='$Email'";
    $result = mysql_query($qq1); 
    $row = mysql_fetch_assoc($result);
	$pid = $row['pid'];
	

	
$isValid=true;
    if($isValid)
    {
    	$q = "UPDATE player_phy SET preference='$preference' WHERE pid=$pid"; echo $q;
    	$result = mysql_query($q);
    	if($result)
    	{
    		echo "<script>alert('Preference Updated Successfully')</script>";
    		echo "<script>location.href='index.php';</script>";

    	}else{
    		echo "<script>alert('Preference Update Failed! Contact Developer')</script>";
    		echo "<script>location.href='index.php';</script>";
    	}
    }else{
    	echo $error_message;
		echo "<script>alert($error_message)</script>";
		echo "<script>location.href='index.php';</script>";
    }

}


if(isset($_POST['P1']))
{

	
	$Email = $_SESSION['username'];
	$gender = $_POST['gender'];
	$dob = $_POST['dob'];
	$ph_no = $_POST['ph_no'];
	$address = $_POST['address'];

	$isValid =true;
	if($isValid){
					$qq1 = "SELECT ph_no FROM player_reg WHERE ph_no=$ph_no";
             $query = mysql_query($qq1); 
             $result = mysql_fetch_array($query);
             $query2 = mysql_query("SELECT owner1_phono,owner2_phno FROM clubs WHERE owner1_phono=$ph_no OR owner2_phno=$ph_no"); 
             $result2 = mysql_fetch_array($query2);
             if($result && $result2){
                 $isValid = false;
                 $error_message = 'Phone Number is already existed.';
             }
             }

    if($isValid)
    {
    	$q = "UPDATE player_reg SET gender='$gender',dob='$dob',ph_no='$ph_no',address='$address' WHERE email='$Email'"; echo $q;
    	$result = mysql_query($q);
    	if($result)
    	{
    		echo "<script>alert('Profile Updated Successfully')</script>";
    		echo "<script>location.href='P1_viewprofile.php';</script>";

    	}else{
    		echo "<script>alert('Profile Updated Failed! Contact Developer')</script>";
    		echo "<script>location.href='P1_viewprofile.php';</script>";
    	}
    }else{
    	echo $error_message;
		echo "<script>alert($error_message)</script>";
		echo "<script>location.href='P1_viewprofile.php';</script>";
    }

}

//----------------------------------------------------
if(isset($_POST['Physical']))
{

	
	$Email = $_SESSION['username'];
	$qq1 = "SELECT pid FROM player_reg WHERE email='$Email'";
    $result = mysql_query($qq1); 
    $row = mysql_fetch_assoc($result);
	$pid = $row['pid'];

	$height = $_POST['height'];
	$weight = $_POST['weight'];
	$batting_hand = $_POST['batting_hand'];
	$bowling_type = $_POST['bowling_type'];
	$role = $_POST['role'];

	$isValid =true;

    if($isValid)
    {
    	$q = "UPDATE player_phy SET height=$height,weight=$weight,batting='$batting_hand',bowling='$bowling_type',role='$role' WHERE pid='$pid'"; echo $q;
    	$result = mysql_query($q);
    	if($result)
    	{
    		echo "<script>alert('Profile Updated Successfully')</script>";
    		echo "<script>location.href='P1_viewprofile.php';</script>";

    	}else{
    		echo "<script>alert('Profile Updated Failed! Contact Developer')</script>";
    		echo "<script>location.href='P1_viewprofile.php';</script>";
    	}
    }else{
		echo "<script>alert('Technical Error! Contact Developer')</script>";
		echo "<script>location.href='P1_viewprofile.php';</script>";
    }

}


if (isset($_POST['P2'])) {
	$Email = $_SESSION['username'];
	$qq1 = "SELECT pid FROM player_reg WHERE email='$Email'";
    $result = mysql_query($qq1); 
    $row = mysql_fetch_assoc($result);
	$pid = $row['pid'];

	$image_name = $_FILES['profilepic']['name'];
	echo $image_name;
$image_extension = pathinfo($image_name, PATHINFO_EXTENSION);
echo $image_extension;

  	$identification_mark = $_POST['identification_mark']; // Get identification mark
  	$aadhaar_number = $_POST['aadhaar_number']; // Get Aadhaar number
  	$aadhaar_upload = $_FILES['aadhaar_upload'];

	  $new_filename = 'Pic_'.$Email . "." . $image_extension;

	  $target_dir = "profilepic/"; // Change this to your upload directory
	  $target_file = $target_dir . $new_filename;

	  echo $target_dir;
	  
	  if (move_uploaded_file($_FILES['profilepic']['tmp_name'], $target_file)) {
		echo "Profile picture uploaded successfully.";
	  } else {
		echo "Error uploading profile picture.";
	  }
	  
	  
	
	  // Process Aadhaar upload (consider validation for PDF format)
	  if ($aadhaar_upload['error'] === UPLOAD_ERR_OK) {
		$target_dir2 = "ddocuments/"; // Change this to your upload directory (same or separate)
		$target_file2 = $target_dir2 . '_aadhaar_of'. $Email .'.pdf';
		if (move_uploaded_file($aadhaar_upload["tmp_name"], $target_file2)) {
		  echo "Aadhaar upload successful.";
		} else {
		  echo "Error uploading Aadhaar document.";
		}
	  }

	  $Q = "UPDATE player_reg SET identification_mark='$identification_mark',aadhaar_no='$aadhaar_number',photo='$target_file',aadhaar_doc='$target_file2' WHERE pid=$pid";
	  $Result = mysql_query($Q);
	  if ($result) {
		echo "<script>alert('Profile Updated Successfully')</script>";
    	echo "<script>location.href='P1_viewprofile.php';</script>";
	  } else {
		echo "<script>alert('Profile Updated Failed! Contact Developer')</script>";
    	echo "<script>location.href='P1_viewprofile.php';</script>";
	  }
	
}



//----------------------------------------------------
if(isset($_POST['Performance']))
{
	$Email = $_SESSION['username'];
	$qq1 = "SELECT pid FROM player_reg WHERE email='$Email'";
    $result = mysql_query($qq1); 
    $row = mysql_fetch_assoc($result);
	$pid = $row['pid'];

	
  	$competition = $_POST['competition'];
	$matches_played = $_POST['matches_played'];

	$run_scored = $_POST['run_scored'];
	$no_six = $_POST['no_six'];
	$no_four = $_POST['no_four'];
	$centuries = $_POST['centuries'];
	$half_centuries = $_POST['half_centuries'];

	
	$overs = $_POST['overs'];
	$balling_run = $_POST['balling_run'];
	$wide = $_POST['wide'];
	$noball = $_POST['noball'];


	$wickets = $_POST['wickets'];
	$catches = $_POST['catches'];
	$stumping = $_POST['stumping'];
	$runout = $_POST['runout'];
	$Check=true;
	switch ($competition) {
		case 'ODI':
			if(($run_scored < (($no_six*6) + ($no_four*4))) OR ($overs*6 < ($wide+$noball)) OR ($run_scored < ($centuries*100)+($half_centuries*50)) OR ($wickets>10) OR ($catches>10) OR ($stumping>10) OR ($catches>10) OR ($wickets+$catches+$stumping+$runout > 10) OR ($run_scored > 1800) )
				{
					$Check=false;
					echo "<script>alert('ODI - Data entered may not be correct. Try Again')</script>";
					echo "<script>location.href='index.php';</script>";
				}
			break;
		case 'TEST':
			if(($run_scored < (($no_six*6) + ($no_four*4))) OR ($overs*6 < ($wide+$noball)) OR ($run_scored < ($centuries*100)+($half_centuries*50)) OR ($wickets>10) OR ($catches>10) OR ($stumping>10) OR ($catches>10) OR ($wickets+$catches+$stumping+$runout > 10) OR $over>450 OR $run_scored > 16200)
				{
					$Check=false;
					echo "<script>alert('TEST - Data entered may not be correct. Try Again')</script>";
					echo "<script>location.href='index.php';</script>";
				}
			break;
		case 'T20':
			if(($run_scored < (($no_six*6) + ($no_four*4))) OR ($overs*6 < ($wide+$noball)) OR ($run_scored < ($centuries*100)+($half_centuries*50)) OR ($wickets>10) OR ($catches>10) OR ($stumping>10) OR ($catches>10) OR ($wickets+$catches+$stumping+$runout > 10) OR $over>4 OR $run_scored > 720)
				{
					$Check=false;
					echo "<script>alert('T20 - Data entered may not be correct. Try Again')</script>";
					echo "<script>location.href='index.php';</script>";
				}
			break;	
		default:
			echo "<script>alert('Failed! Contact Developer')</script>";
    		echo "<script>location.href='index.php';</script>";
			break;
	}

	
	
	if($Check)
	{
		$Q = "INSERT INTO player_matchinfo(pid,competition,match_played,run_scored,no_six,no_four,centuries,half_centuries,overs,run_goton_balling,wide_ball,no_ball,wickets,catches,stumping,run_outs,status)
		VALUES($pid,'$competition',1,$run_scored,$no_six,$no_four,$centuries,$half_centuries,$overs,$balling_run,$wide,$noball,$wickets,$catches,$stumping,$runout,'New')";
		echo $Q;
		$Result = mysql_query($Q);
	
		if($Result && $Check)
		{
			
			echo "<script>alert('Data Added Successfully')</script>";
			echo "<script>location.href='index.php';</script>";
		}else{
			echo "<script>alert('Execution Failed! Contact Developer')</script>";
			echo "<script>location.href='index.php';</script>";
		}
	}else{
		echo "<script>alert('Execution Failed! Contact Developer')</script>";
		echo "<script>location.href='index.php';</script>";
	}
	

  	
}
?>