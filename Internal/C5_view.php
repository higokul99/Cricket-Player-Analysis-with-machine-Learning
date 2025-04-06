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
<!-- --------------------------------------------------------- -->
<h1 align="center">Review match performance</h1>
<?php
$id = $_GET['id'];

$q="SELECT * FROM player_matchinfo WHERE id=$id"; //echo $q;
$result = mysql_query($q);
$row3 = mysql_fetch_assoc($result);

?>
<table align="left" width="70%">
    <tr>
        <td><h4>Career Details</h4></td>
        <td><span>[Record's are updated after their Club owner approved the data entered]<br></span></td>
    </tr>
<tr>
  <td>
  Competition
  </td>
  <td>
    <label>: <?php echo $row3['competition']; ?></label>
  </td>
</tr>
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
    <label>: <?php echo $row3['no_six']; ?></label>
  </td>
</tr>
<tr>
  <td>
  No of 4's
  </td>
  <td>
    <label>: <?php echo $row3['no_four']; ?></label>
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
  Overs (in Total)
  </td>
  <td>
    <label>: <?php echo $row3['overs']; ?></label>
  </td>
</tr>
<tr>
  <td>
  Runs on Over (in Total)
  </td>
  <td>
    <label>: <?php echo $row3['run_goton_balling']; ?></label>
  </td>
</tr>

<tr>
  <td>
  Wides
  </td>
  <td>
    <label>: <?php echo $row3['wide_ball']; ?></label>
  </td>
</tr>
<tr>
  <td>
  No Balls
  </td>
  <td>
    <label>: <?php echo $row3['no_ball']; ?></label>
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
    <td></td>
    <td>
        <?php
$status = $row3['status'];

switch ($status) {
    case 'New':
    ?>
    <div align="center">
        <button style="padding: 10px 20px; background-color: Green; color: #fff; border: none; border-radius: 5px; cursor: pointer; font-size: 20px;" name="editbtn">
            <a href="ControllerClub.php?Action2=Approved&TblName=player_matchinfo&id=<?php echo $id; ?>"  style='color: white;' >Approve</a>
        </button>
        <button style="padding: 10px 20px; background-color: Red; color: #fff; border: none; border-radius: 5px; cursor: pointer; font-size: 20px;" name="editbtn">
            <a href="ControllerClub.php?Action2=Rejected&TblName=player_matchinfo&id=<?php echo $id; ?>"  style='color: white;' >Reject</a>
        </button>
    </div>
    <?php 
        break;
    
    default:
        ?>
        <!-- code... -->

    <?php
        break;
}
                

?>
    </td>
</tr>

 </table>
<!-- --------------------------------------------------------- -->
<?php include('footer.php'); ?>