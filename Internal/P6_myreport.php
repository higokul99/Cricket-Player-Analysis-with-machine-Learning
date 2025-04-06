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

$username = $_SESSION['username'];
$q="SELECT * FROM player_reg WHERE email='$username'";
$result = mysql_query($q);
$row = mysql_fetch_assoc($result);
$id = $row['pid'];
$q3="SELECT * FROM player_career WHERE pid=$id"; //echo $q3;
$result3 = mysql_query($q3);
$row3 = mysql_fetch_assoc($result3);
?>
<h1 align="center">My Report</h1>

<table>
  <tr><td><h4>Career Details</h4><span>[Record's are updated after Club owner approved the data entered]<br></span></td></tr>

<tr>
  <td>
  Matches played
  </td>
  <td>
    <label>: <?php echo $row3['match_played']; ?></label>
  </td>
</tr>
<tr>
  <td>
  Runs Scored
  </td>
  <td>
    <label>: <?php echo $row3['run_scored']; ?></label>
  </td>
</tr>
<tr>
  <td>
  No of 6's
  </td>
  <td>
    
    <label>: <?php echo $row3['no_of_six']; ?></label>
  </td>
</tr>
<tr>
  <td>
  No of 4's
  </td>
  <td>
    <label>: <?php echo $row3['no_of_four']; ?></label>
  </td>
</tr>
<tr>
  <td>
  Centuries
  </td>
  <td>
    <label>: <?php echo $row3['centuries']; ?></label>
  </td>
</tr>
<tr>
  <td>
  Half Centuries
  </td>
  <td>
    <label>: <?php echo $row3['half_centuries']; ?></label>
  </td>
</tr>
<tr>
  <td>
  Batting Average
  </td>
  <td>
    <label>: <?php echo $row3['batting_avg']; ?></label>
  </td>
</tr>
<tr>
  <td>
  Top Score
  </td>
  <td>
    <label>: <?php echo $row3['top_score']; ?></label>
  </td>
</tr>
<tr>
  <td>
  Overs (in Total)
  </td>
  <td>
    <label>: <?php echo $row3['no_over_thrown']; ?></label>
  </td>
</tr>
<tr>
  <td>
  Economy
  </td>
  <td>
    <label>: <?php echo $row3['economy']; ?></label>
  </td>
</tr>
<tr>
  <td>
  Wides
  </td>
  <td>
    <label>: <?php echo $row3['wide_balls']; ?></label>
  </td>
</tr>
<tr>
  <td>
  No Balls
  </td>
  <td>
    <label>: <?php echo $row3['no_balls']; ?></label>
  </td>
</tr>
<tr>
  <td>
  Wickets
  </td>
  <td>
    <label>: <?php echo $row3['wickets']; ?></label>
  </td>
</tr>
<tr>
  <td>
  Catches
  </td>
  <td>
    <label>: <?php echo $row3['catches']; ?></label>
  </td>
</tr>
<tr>
  <td>
  Stumping
  </td>
  <td>
    <label>: <?php echo $row3['stumping']; ?></label>
  </td>
</tr>
<tr>
  <td>
  Run Outs
  </td>
  <td>
    <label>: <?php echo $row3['run_outs']; ?></label>
  </td>
</tr>
<tr>
  <td>
  <b><h3>Performance Grade</h3></b>
  </td>
  <td>
    <label><b><h3>: <?php echo $row3['grade']; ?></h3></b></label>
  </td>
</tr>
  </table>

<?php include('footer.php'); ?>