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
//$conn = mysqli_connect("localhost", "root", "", "your_database_name");
$case = $_GET['case']; //echo $case;
$id = $_GET['id'];
$username = $_SESSION['username'];
$q="SELECT * FROM clubs WHERE email='$username'";
$result = mysqli_query($conn, $q);
$row = mysqli_fetch_assoc($result);

$id = $row['club_id'];
$name = $row['club_name'];
$email = $row['email'];
$phone_number= $row['owner_phono'];
$owner_name = $row['owner_name'];
$location = $row['location'];
$founded_year = $row['founded_year'];
$website = $row['website'];

echo "<form method='POST' action='ControllerClub.php' enctype='multipart/form-data'>";
echo "<table align=center>";

switch ($case) {

	case 'P2':
	echo "<tr>";
		echo "<td>";
		echo "Location";
		echo "</td>";
		echo "<td>";
		echo "<input type='text' name='location' value='$location'>";
		echo "</td>";
		echo "</tr>";
    echo "<tr>";
    echo "<td>";
    echo "Founded years";
    echo "</td>";
    echo "<td>";
    echo "<input type='text' name='founded_year' value='$founded_year'>";
    echo "</td>";
    echo "</tr>";
		echo "<tr>";
    echo "<tr>";
    echo "<td>";
    echo "Owner name";
    echo "</td>";
    echo "<td>";
    echo "<input type='text' name='owner_name' value='$owner_name'>";
    echo "</td>";
    echo "</tr>";

    echo "<tr>";
  echo "<td>Phone Number:</td>";
  echo "<td>";
    echo "<input type='text' name='ph_no' value='$phone_number'>";
  echo "</td>";
echo "</tr>";
echo "<tr>";
    echo "<td>";
    echo "Website URL";
    echo "</td>";
    echo "<td>";
    echo "<input type='url' name='website' value='$website'>";
    echo "</td>";
    echo "</tr>";
echo "<tr>";
  echo "<td>License Number:</td>";
  echo "<td>";
$lic_no = $row['lic_no'];
    echo "<input type='number' name='lic_no' value='$lic_no' minlength='12' maxlength='12' required>";  echo "</td>";
echo "</tr>";

echo "<tr>";
  echo "<td>License Upload (PDF):</td>";
  echo "<td>";
    echo "<input type='file' name='lic_doc' accept='.pdf' required>";  echo "</td>";
echo "</tr>";
echo "<tr>";
  echo "<td></td>";
  echo "<td>";
    echo "<input type='submit' name='Clubupdate'>";
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
