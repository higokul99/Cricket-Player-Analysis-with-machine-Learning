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

//echo $qq1;
    $result = mysql_query($qq1); 
    $row = mysql_fetch_assoc($result);
  $pid = $row['pid'];
  $as = $row['acquired_status'];

   $club_id = $row['club_id'];
$qq2 = "SELECT * FROM clubs WHERE club_id=$club_id";
   $result2 = mysql_query($qq2); 
   $row2 = mysql_fetch_assoc($result2);
   $club_name = $row2['club_name'];
?>
<h1 align="center">My Club</h1>
<center>
<div>
  <?php
if($as != 'Acquired')
{
  ?>

<h2 align="center">You are not acquired by any club yet. </h2>
<?php
}else{
  ?>
<!-- <table>
<tr>
  <td>
    Club ID
  </td>
  <td>
    
  </td>
</tr>
</table> -->

<table align="left" width="70%">
  <tr>
    <td>
      <span class="d-none d-lg-inline-flex">Club ID : <?php echo $club_id; ?></span><br>
      <h2><?php echo $club_name; ?></h2>
      <span class="d-none d-lg-inline-flex">Email : <?php echo $row2['email']; ?></span><br>
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
    <label>: <?php echo $row2['location']; ?></label>
  </td>
</tr>
<tr>
  <td>
  Founded year :
  </td>
  <td>
    <label>: <?php echo $row2['founded_year']; ?></label>
  </td>
</tr>
<tr>
  <td>
  Owner name
  </td>
  <td>
    <label>: <?php echo $row2['owner_name']; ?></label>
  </td>
</tr>
<tr>
  <td>
  Phone Number
  </td>
  <td>
    <label>: <?php echo $row2['owner_phono']; ?></label>
  </td>
</tr>
<tr>
  <td>
  Website
  </td>
  <td>
    <label>: <a href="<?php echo $row2['website']; ?>" target="_blank">Click here to open Link</a></label>
  </td>
</tr>
<tr>
  <td>
  License Number
  </td>
  <td>
    <label>: <?php echo $row2['lic_no']; ?></label>
  </td>
</tr>
<tr>
  <td>
  License Doc
  </td>
  <td>
    <!-- <label>: <a href="ddocuments/licensedoc.pdf" target="_blank">Click here to open the PDF</a> -->
      <label>: <a href="<?php echo $row2['lic_doc']; ?>" target="_blank">Click here to open the PDF</a>
</label>
  </td>
</tr>
<!-- <tr>
  <td>
  
  </td>
  <td>

    <a style='display: inline-block; padding: 5px 10px; background-color: #4287f5; color: Black; text-decoration: none; border-radius: 5px;' href="C1_editprofile.php?id=<?php echo $id; ?>&case=P2">Edit</a>
  </td>
</tr>
 -->


  </table>
<?php
}
?>
</div>
</center>
<?php include('footer.php'); ?>