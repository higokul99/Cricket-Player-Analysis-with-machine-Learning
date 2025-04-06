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

$Email = $_SESSION['username'];
$qq1 = "SELECT pr.*, cp.club_id, c.club_name
FROM player_reg pr
INNER JOIN clubs_players cp ON pr.pid = cp.pid
INNER JOIN clubs c ON cp.club_id = c.club_id WHERE pr.email = '$Email'";
$result = mysqli_query($conn, $qq1); 
$row = mysqli_fetch_assoc($result);
$pid = $row['pid'];
$as = $row['acquired_status'];
?>
<h1 align="center">My Contract</h1>
<div>
  <?php
if($as != 'Acquired')
{
  ?>
<h2 align="center">You are not acquired by any club yet. </h2>
<?php
}else{
  ?>
<h2>You are  acquired by any club yet. </h2>
<?php
}
?>
</div>
<?php include('footer.php'); ?>
