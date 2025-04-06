<?php include('header.php'); ?>
<!-- Sidebar Start -->
<?php 
$type = $_SESSION['AccountType'];
switch ($type) {
case 'Admin':
include('includes_admin/navbar.php'); 
break;
case 'Player':
include('includes_players/navbar.php'); 
break;
case 'Club':
include('includes_club/navbar.php'); 
break;

default:
// code...
break;
}
?>
<div>
<h1 align="center">Update Profile</h1>

<?php

$case = $_GET['case']; //echo $case;
$id = $_GET['id'];
$username = $_SESSION['username'];

echo "<form method='POST' action='ControllerPlayer.php' enctype='multipart/form-data'>";
echo "<table align=center>";

switch ($case) {
	case 'P1':

		echo "<tr>";
  echo "<td>Gender:</td>";
  echo "<td>";
    echo "<select name='gender'>";
      echo "<option value='Male'>Male</option>";
      echo "<option value='Female'>Female</option>";
      echo "<option value='Other'>Other</option>";
    echo "</select>";
  echo "</td>";
  echo "</tr>";
echo "<tr>";
  echo "<td>Date of Birth:</td>";
  echo "<td>";
  //$condition = `date('Y-m-d', strtotime('-18 years'))`;
   // echo "<input type='date' name='dob' max='$condition' required>";  
  ?> <input type="date" id="dob" name="dob" max="<?php echo date('Y-m-d', strtotime('-18 years')); ?>" required><?php
  echo "</td>";
echo "</tr>";

		echo "<tr>";
		echo "<td>";
		echo "Phone Number :";
		echo "</td>";
		echo "<td>";
		echo "<input type='number' name='ph_no' required>";
		echo "</td>";
		echo "</tr>";

		echo "<tr>";
		echo "<td>";
		echo "Home Address :";
		echo "</td>";
		echo "<td>";
		echo "<input type='text' name='address' required>";
		echo "</td>";
		echo "</tr>";


		echo "<tr>";
		echo "<td>";
		echo "</td>";
		echo "<td>";
		echo "<input type='submit' name='P1'>";
		echo "</td>";
		echo "</tr>";

		break;

	case 'P2':
	echo "<tr>";
		echo "<td>";
		echo "Profile Pic (size less than 500Kb)";
		echo "</td>";
		echo "<td>";
		echo "<input type='file' name='profilepic' required>";
		echo "</td>";
		echo "</tr>";
		echo "<tr>";
  echo "<td>Identification Mark:</td>";
  echo "<td>";
    echo "<input type='text' name='identification_mark'>";
  echo "</td>";
echo "</tr>";

echo "<tr>";
  echo "<td>Aadhaar Number:</td>";
  echo "<td>";
    echo "<input type='number' name='aadhaar_number' minlength='12' maxlength='12' required>";  echo "</td>";
echo "</tr>";

echo "<tr>";
  echo "<td>Aadhaar Upload (PDF):</td>";
  echo "<td>";
    echo "<input type='file' name='aadhaar_upload' accept='.pdf' required>";  echo "</td>";
echo "</tr>";
echo "<tr>";
  echo "<td></td>";
  echo "<td>";
    echo "<input type='submit' name='P2'>";
  echo "</td>";
echo "</tr>";

		break;

	case 'Physical':
		echo "<tr>";
  echo "<td>Height (in cm):</td>";
  echo "<td>";
    echo "<input type='number' name='height' placeholder='e.g., 180'>";  
  echo "</td>";
echo "</tr>";

echo "<tr>";
  echo "<td>Weight (in KG):</td>";
  echo "<td>";
    echo "<input type='number' name='weight' placeholder='e.g., 75'>";  
  echo "</td>";
echo "</tr>";

echo "<tr>";
  echo "<td>Batting Hand:</td>";
  echo "<td>";
    echo "<select name='batting_hand'>";
      echo "<option value='Right'>Right</option>";
      echo "<option value='Left'>Left</option>";
    echo "</select>";
  echo "</td>";
echo "</tr>";

echo "<tr>";
  echo "<td>Bowling Type:</td>";
  echo "<td>";
    echo "<select name='bowling_type'>";
      echo "<option value='Right-arm pace'>Right-arm pace</option>";
      echo "<option value='Left-arm pace'>Left-arm pace</option>";
      echo "<option value='Off-spin'>Off-spin</option>";
      echo "<option value='Leg-spin'>Leg-spin</option>";
      echo "<option value='Other'>Other</option>";
    echo "</select>";
  echo "</td>";
echo "</tr>";

echo "<tr>";
  echo "<td>Role:</td>";
  echo "<td>";
    echo "<select name='role'>";
      echo "<option value='Batsman'>Batsman</option>";
      echo "<option value='Bowler'>Bowler</option>";
      echo "<option value='All-rounder'>All-rounder</option>";
      echo "<option value='Wicket-keeper'>Wicket-keeper</option>";
    echo "</select>";
  echo "</td>";
echo "</tr>";

echo "<tr>";
  echo "<td></td>";
  echo "<td>";
    echo "<input type='submit' name='Physical'>";
  echo "</td>";
echo "</tr>";
		break;

	default:
		echo "Something happened!";
		break;
}



echo "</table>";
echo "</form>";
?>
<?php include('footer.php'); ?>