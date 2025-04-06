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
//$conn = mysqli_connect("localhost", "root", "", "your_database_name");
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
?>

<form action="" method="POST">
<table align="left" width="70%">
	<tr>
		<td>
			<span class="d-none d-lg-inline-flex">Club ID : <?php echo $id; ?></span><br>
			<h2><?php echo $_SESSION['name']; ?></h2>
			<span class="d-none d-lg-inline-flex">Email : <?php echo $email; ?></span><br>
		</td>
		<td>
			
			
		</td>
</tr>
</tr>
<tr><td><h4>Details</h4></td></tr>
<tr>
	<td>
	Location :
	</td>
	<td>
		<label>: <?php echo $location; ?></label>
	</td>
</tr>
<tr>
	<td>
	Founded year :
	</td>
	<td>
		<label>: <?php echo $founded_year; ?></label>
	</td>
</tr>
<tr>
	<td>
	Owner name
	</td>
	<td>
		<label>: <?php echo $owner_name; ?></label>
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
	Website
	</td>
	<td>
		<label>: <a href="<?php echo $website; ?>" target="_blank">Click here to open Link</a></label>
	</td>
</tr>
<tr>
	<td>
	License Number
	</td>
	<td>
		<label>: <?php echo $row['lic_no']; ?></label>
	</td>
</tr>
<tr>
	<td>
	License Doc
	</td>
	<td>
		<!-- <label>: <a href="ddocuments/licensedoc.pdf" target="_blank">Click here to open the PDF</a> -->
			<label>: <a href="<?php echo $row['lic_doc']; ?>" target="_blank">Click here to open the PDF</a>
</label>
	</td>
</tr>
<tr>
	<td>
	
	</td>
	<td>

		<a style='display: inline-block; padding: 5px 10px; background-color: #4287f5; color: Black; text-decoration: none; border-radius: 5px;' href="C1_editprofile.php?id=<?php echo $id; ?>&case=P2">Edit</a>
	</td>
</tr>
	</table>
</form>

<?php include('footer.php'); ?>
