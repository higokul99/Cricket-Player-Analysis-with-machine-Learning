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
<h1 align="center">My Profile</h1>
<?php


$username = $_SESSION['username'];

$q="SELECT * FROM player_reg WHERE email='$username'";
$result = mysql_query($q);
$row = mysql_fetch_assoc($result);

$id = $row['pid'];
$name = $row['name'];
$_SESSION['User_name'] = $row['name'];
$email = $row['email'];
$phone_number= $row['ph_no'];
$gender = $row['gender'];
$dob = $row['dob'];
$blood_grp = $row['blood_grp'];
$address = $row['address'];

$q2="SELECT * FROM player_phy WHERE pid=$id";
$result2 = mysql_query($q2);
$row2 = mysql_fetch_assoc($result2);





function getAge($dateOfBirth) {
  $today = new DateTime('today');
  $birthDate = new DateTime($dateOfBirth);
  $interval = $today->diff($birthDate);
  return $interval->y;
}

// Example usage
//$dateOfBirth = "1990-05-23";
$dateOfBirth = $dob;
$age = getAge($dateOfBirth);



?>


<form action="" method="POST">
<table align="left" width="70%">
	<tr>
		<td>
			<img class="rounded-circle me-lg-2" src="<?php echo $profilpic; ?>" alt="" style="width: 200px; height: 200px;">
		</td>
		<td>
			<span class="d-none d-lg-inline-flex">Player ID : <?php echo $id; ?></span><br>
			<h2><?php echo $_SESSION['name']; ?></h2>
			<span class="d-none d-lg-inline-flex">Email : <?php echo $email; ?></span><br>
			<span class="d-none d-lg-inline-flex">Gender : <?php echo $gender; ?></span><br>
			<span class="d-none d-lg-inline-flex">Age : <?php echo $age; ?>yrs </span>
		</td>
</tr>
</tr>
<tr><td><h4>Personal Details</h4></td></tr>
<tr>
	<td>
	Gender :
	</td>
	<td>
		<label>: <?php echo $gender; ?></label>
	</td>
</tr>
<tr>
	<td>
	Date of birth :
	</td>
	<td>
		<label>: <?php echo $dob; ?></label>
	</td>
</tr>

<tr>
	<td>
	Phone Number
	</td>
	<td>
		<label>: <?php echo $phone_number; ?></label>
	</td>
</tr>
<tr>
	<td>
	Home Address
	</td>
	<td>
		<label>: <?php echo $address; ?></label>
	</td>
</tr>
<tr>
	<td>
	
	</td>
	<td>

		<a style='display: inline-block; padding: 5px 10px; background-color: #4287f5; color: Black; text-decoration: none; border-radius: 5px;' href="P1_editprofile.php?id=<?php echo $id; ?>&case=P1">Edit</a>
	</td>
</tr>

<tr><td><h4>Personal ID</h4></td></tr>

<tr>
	<td>
	Profile Pic
	</td>
	<td>
		<label>: Click Edit to change</label>
	</td>
</tr>
<tr>
	<td>
	Identification mark
	</td>
	<td>
		<label>: <?php echo $row['identification_mark'];; ?></label>
	</td>
</tr>
<tr>
	<td>
	Aadhaar Number
	</td>
	<td>
		<label>: <?php echo $row['aadhaar_no']; ?></label>
	</td>
</tr>
<tr>
	<td>
	Aadhaar Doc
	</td>
	<td>
		<label>: <a href="<?php echo $row['aadhaar_doc']; ?>" target="_blank">Click here to open the PDF</a>
</label>
	</td>
</tr>
<tr>
	<td>
	
	</td>
	<td>
		<a style='display: inline-block; padding: 5px 10px; background-color: #4287f5; color: Black; text-decoration: none; border-radius: 5px;' href="P1_editprofile.php?id=<?php echo $id; ?>&case=P2">Edit</a>
	</td>
</tr>
<tr><td><h4>Physical Details</h4></td></tr>

<tr>
	<td>
	Height
	</td>
	<td>
		<label>: <?php echo $row2['height']; ?> cm</label>
	</td>
</tr>
<tr>
	<td>
	Weight
	</td>
	<td>
		<label>: <?php echo $row2['weight']; ?> kg</label>
	</td>
</tr>
<tr>
	<td>
	Batting hand
	</td>
	<td>
		<label>: <?php echo $row2['batting']; ?></label>
	</td>
</tr>
<tr>
	<td>
	Bowling Type
	</td>
	<td>
		<label>: <?php echo $row2['bowling']; ?></label>
	</td>
</tr>
<tr>
	<td>
	Role
	</td>
	<td>
		<label>: <?php echo $row2['role']; ?></label>
	</td>
</tr>
<tr>
	<td>
	
	</td>
	<td>
		<a style='display: inline-block; padding: 5px 10px; background-color: #4287f5; color: Black; text-decoration: none; border-radius: 5px;' href="P1_editprofile.php?id=<?php echo $id; ?>&case=Physical">Edit</a>
	</td>
</tr>


	</table>
</form>


<?php include('footer.php'); ?>