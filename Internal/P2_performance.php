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
?>
<div>
<h1 align="center">Add your Match Performance</h1>

<form action="ControllerPlayer.php" method="post">
  <table align="center">
    <tr>
      <th><label for="pid">Player ID:</label></th>
      <td><input type="number" id="pid" name='pid' value="<?php echo $pid; ?>" disabled></td>
    </tr>
    <tr>
      <th><label for="competition">Competition Name ( TEST/ODI/T20 etc ):</label></th>
      <td>
        <select name="competition">
          <option value="ODI">ODI</option>
          <option value="TEST">TEST</option>
          <option value="T20">T20</option>
        </select>
      </td>
    </tr>

    <tr>
      <th><label for="matches_played">Add your Match Details :</label></th>
      <td><input type="number" id="matches_played" name="matches_played" value="1" hidden></td>
    </tr>

    <tr>
      <th><label for="run_scored">Run Scored:</label></th>
      <td><input type="number" id="run_scored" name="run_scored" pattern="^0$" required></td>
    </tr>
    <tr>
      <th><label for="no_six">Number of 6's:</label></th>
      <td><input type="number" id="no_six" name="no_six" required></td>
    </tr>
    <tr>
      <th><label for="no_four">Number of 4's:</label></th>
      <td><input type="number" id="no_four" name="no_four" required></td>
    </tr>
    <tr>
      <th><label for="centuries">Centuries (100's):</label></th>
      <td><input type="number" id="centuries" name="centuries" required></td>
    </tr>
    <tr>
      <th><label for="half_centuries">Half Centuries (50's):</label></th>
      <td><input type="number" id="half_centuries" name="half_centuries" required></td>
    </tr>
    <tr id="bowling_fields">
      <th><label for="balling_avg">Total Over thrown:</label></th>
      <td><input type="number" id="balling_avg" name="overs"></td>
    </tr>
    <tr id="bowling_fields">
      <th><label for="balling_avg">Total Runs on your Bowling:</label></th>
      <td><input type="number" id="balling_avg" name="balling_run"></td>
    </tr>
    <tr id="bowling_fields">
      <th><label for="wickets">No of Wide balls:</label></th>
      <td><input type="number" id="wickets" name="wide"></td>
    </tr>
    <tr id="bowling_fields">
      <th><label for="wickets">No of No balls:</label></th>
      <td><input type="number" id="wickets" name="noball"></td>
    </tr>
    <tr id="bowling_fields">
      <th><label for="wickets">Wickets:</label></th>
      <td><input type="number" id="wickets" name="wickets"></td>
    </tr>
    <tr id="bowling_fields">
      <th><label for="catches">Catches:</label></th>
      <td><input type="number" id="catches" name="catches"></td>
    </tr>
    <tr id="bowling_fields">
      <th><label for="stumping">Stumping:</label></th>
      <td><input type="number" id="stumps" name="stumping"></td>
    </tr>
    <tr id="bowling_fields">
      <th><label for="stumping">Run Out:</label></th>
      <td><input type="number" id="stumps" name="runout"></td>
    </tr>
    <tr>
      <th></th>
      <td><button type="submit" name="Performance">Add Match Data</button></td>
    </tr>
  </table>
</form>

<?php include('footer.php'); ?>
