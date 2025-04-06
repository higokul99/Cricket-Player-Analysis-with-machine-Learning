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
$qq1 = "SELECT pid FROM player_reg WHERE email='$Email'";
$result = mysqli_query($conn, $qq1); 
$row = mysqli_fetch_assoc($result);
$pid = $row['pid'];
$qq2 = "SELECT preference FROM player_phy WHERE pid=$pid"; 
$result2 = mysqli_query($conn, $qq2); 
$row2 = mysqli_fetch_assoc($result2);
?>
<h1 align="center">My Strength Preference</h1>

<style type="text/css">
	.preference-container {
  text-align: center;
  font-size: 20px;
}
</style>

<form method="POST" action="ControllerPlayer.php">
<div class="preference-container">
	<label>Selected Preference : </label><label><?php echo $row2['preference']; ?></label><br>
  <label for="player-preference">My Preference:</label><br>
  <select id="player-preference" name="player-preference">
    <option value="Opening Batsman">Opening Batsman</option>
    <option value="Middle Order Batsman">Middle Order Batsman</option>
    <option value="Opening Bowler">Opening Bowler</option>
    <option value="Middle Order Bowler">Middle Order Bowler</option>
    <option value="Batsman">Batsman</option>
    <option value="Bowler">Bowler</option>
    <option value="Wicket Keeper">Wicket Keeper</option>
  </select>
</div>
<div class="preference-container">
  <input type="submit" name="Strength">
</div>
</form>
<?php include('footer.php'); ?>
