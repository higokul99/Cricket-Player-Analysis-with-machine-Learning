<?php
include_once('../db_connection.php'); 

//----------------------------------------------------
if(isset($_POST['Clubupdate']))
{
	$Email = $_SESSION['username'];
	
	$location = $_POST['location'];
	$founded_year = $_POST['founded_year'];
	$owner_name = $_POST['owner_name'];
	$website = $_POST['website'];
	$ph_no = $_POST['ph_no'];
	$lic_no = $_POST['lic_no'];
	$lic_doc = $_FILES['lic_doc'];

	if ($lic_doc['error'] === UPLOAD_ERR_OK) {
		$target_dir2 = "ddocuments/"; 
		$target_file2 = $target_dir2 . '_aadhaar_of_'. $Email .'.pdf';
		if (move_uploaded_file($lic_doc["tmp_name"], $target_file2)) {
			echo "License upload successful.";
		} else {
			echo "Error uploading License document.";
		}
	}

	$isValid = true;

	if($isValid)
	{
		$q = "UPDATE clubs SET location='$location',founded_year=$founded_year,owner_name='$owner_name',owner_phono='$ph_no',website='$website',lic_no='$lic_no',lic_doc='$target_file2' WHERE email='$Email'";
		echo $q;
		$result = mysqli_query($conn, $q);
		if($result)
		{
			echo "<script>alert('Profile Updated Successfully')</script>";
			echo "<script>location.href='index.php';</script>";
		}else{
			echo "<script>alert('Profile Updated Failed! Contact Developer')</script>";
			echo "<script>location.href='index.php';</script>";
		}
	}else{
		echo "<script>alert('Technical Error! Contact Developer')</script>";
		echo "<script>location.href='index.php';</script>";
	}
}

//--------------------------------ADMIN Universal action -------------------------------

if(isset($_GET['Action']))
{
	$TableName = $_GET['TblName'];
	$Unique_Id = $_GET['id'];
	$Status = $_GET['Action'];

	$sql = "SELECT * FROM player_reg WHERE email='$Unique_Id'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	$pid = $row['pid'];

	$sqlx = "SELECT * FROM player_phy WHERE pid='$pid'";
	$resultx = mysqli_query($conn, $sqlx);
	$rowx = mysqli_fetch_assoc($resultx);
	$role = $rowx['role'];

	$Username = $_SESSION['username'];
	$sql2 = "SELECT * FROM clubs WHERE email='$Username'";
	$result2 = mysqli_query($conn, $sql2);
	$row2 = mysqli_fetch_assoc($result2);
	$club_id = $row2['club_id'];

	$Query_reg = "INSERT INTO $TableName(club_id,pid,role,status) VALUES($club_id,$pid,'$role','New')";
	echo $Query_reg;
	$Result_reg = mysqli_query($conn, $Query_reg); 
	$Query_log = "UPDATE player_reg SET acquired_status='Acquired' WHERE pid = '$pid'";
	echo $Query_log;
	$Result_log = mysqli_query($conn, $Query_log);  

	$location = "index.php";
	if($Result_reg && $Result_log)
	{
		$message = $Status.'!';
		echo "<script>alert('$message');</script>";
		echo $message;
		echo "<script>location.href='$location'</script>";
	}else{
		$message = "Internal Error. Contact Developer!";
		echo "<script>alert('$message');</script>";
		echo $message;
		echo "<script>location.href='$location'</script>";
	}
}

//--------------------------------ADMIN Universal action -------------------------------

if(isset($_GET['Action2']))
{
	$TableName = $_GET['TblName'];
	$Unique_Id = $_GET['id'];
	$Status = $_GET['Action2'];
	$email = $_SESSION['username'];

	$Qfetch = "SELECT pid FROM player_matchinfo WHERE id='$Unique_Id'";
	$Result = mysqli_query($conn, $Qfetch); 
	$Rowf = mysqli_fetch_assoc($Result);
	$pid = $Rowf['pid'];

	$Query_reg = "UPDATE $TableName SET status='Approved',club_id='$email' WHERE pid = '$pid'";
	echo $Query_reg;
	$Result_reg = mysqli_query($conn, $Query_reg); 
	
	$Q2 = "SELECT SUM(match_played) AS total_matches,
			SUM(run_scored) AS total_runs,
			COUNT(no_six) AS total_sixes,
			COUNT(no_four) AS total_fours,
			COUNT(centuries) AS total_centuries,
			COUNT(half_centuries) AS total_half_centuries,
			MAX(run_scored) AS top_score,
			SUM(overs) AS total_overs_bowled,
			SUM(run_goton_balling) AS total_runs_conceded,
			SUM(wide_ball) AS total_wides,
			SUM(no_ball) AS total_no_balls,
			SUM(wickets) AS total_wickets,
			SUM(catches) AS total_catches,
			SUM(stumping) AS total_stumpings,
			SUM(run_outs) AS total_run_outs
		  FROM player_matchinfo WHERE pid=$pid";
	echo $Q2;

	$Result2 = mysqli_query($conn, $Q2);
	$Row = mysqli_fetch_assoc($Result2);

	if($Row['total_matches'] != 0){
		$batting_avg = $Row['total_runs']/$Row['total_matches'];
	}else{
		$batting_avg = 0;
	}

	if($Row['total_overs_bowled'] != 0){
		$economy = $Row['total_runs_conceded']/$Row['total_overs_bowled'];
	}else{
		$economy = 0;
	}

	$Q3 = "UPDATE player_career 
		SET match_played = " . $Row['total_matches'] . ",
			run_scored = " . $Row['total_runs'] . ",
			no_of_six = " . $Row['total_sixes'] . ",
			no_of_four = " . $Row['total_fours'] . ",
			batting_avg = " . $batting_avg . ",
			centuries = " . $Row['total_centuries'] . ",
			half_centuries = " . $Row['total_half_centuries'] . ",
			top_score = " . $Row['top_score'] . ",
			no_over_thrown = " . $Row['total_overs_bowled'] . ",
			economy = " . $economy . ",
			wide_balls = " . $Row['total_wides'] . ",
			no_balls = " . $Row['total_no_balls'] . ",
			wickets = " . $Row['total_wickets'] . ",
			catches = " . $Row['total_catches'] . ",
			run_outs = " . $Row['total_run_outs'] . ",
			stumping = " . $Row['total_stumpings'] . ",
			status = 'Updated' 
		WHERE id = '$Unique_Id'";
	echo $Q3;

	$Result3 = mysqli_query($conn, $Q3);

	$location = "index.php";
	if($Result_reg && $Result3)
	{
		$message = $Status.'!';
		echo "<script>alert('$message');</script>";
		echo $message;
		echo "<script>location.href='$location'</script>";
	}else{
		$message = "Internal Error. Contact Developer!";
		echo "<script>alert('$message');</script>";
		echo $message;
		echo "<script>location.href='$location'</script>";
	}
}

//--------------------------------
if(isset($_GET['Action3']))
{
	if($_GET['Action3'] == 1)
	{
		$status = 'New';
		$pid = $_GET['pid'];
		$pname = $_GET['pname'];
		$photo = $_GET['photo'];
		$club_id = $_GET['club_id'];
		$club_name = $_GET['club_name'];
		$grade = $_GET['grade'];
		$role = $_GET['role'];

		$Q1 = "INSERT INTO suggested_players(pid,pname,photo,club_id,club_name,grade,role,status) VALUES($pid,'$pname','$photo',$club_id,'$club_name','$grade','$role','$status')";
		echo $Q1;
		$Result1 = mysqli_query($conn, $Q1);

		if($Result1){
			echo "<script>alert('Player Suggested Successfully')</script>";
			echo "<script>location.href='index.php';</script>";
		}else{
			echo "<script>alert('Suggestion Failed due to some error!')</script>";
			echo "<script>location.href='index.php';</script>";
		}
	}else{
		$status = $_GET['Action3'];
		$pid = $_GET['pid'];
		$Q1 = "DELETE FROM suggested_players WHERE pid = $pid";
		echo $Q1;
		$Result1 = mysqli_query($conn, $Q1);

		if($Result1){
			echo "<script>alert('Player Withdraw Success')</script>";
			echo "<script>location.href='index.php';</script>";
		}else{
			echo "<script>alert('Failed due to some error!')</script>";
			echo "<script>location.href='index.php';</script>";
		}
	}
}
?>
