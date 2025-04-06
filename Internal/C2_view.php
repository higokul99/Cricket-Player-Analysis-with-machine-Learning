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
<h1 align="center">Players Details</h1>
<?php
$username = $_GET['id'];

$conn = mysqli_connect("localhost", "root", "", "cricclub");

$q="SELECT * FROM player_reg WHERE pid=$username";
$result = mysqli_query($conn, $q);
$row = mysqli_fetch_assoc($result);

$id = $row['pid'];
$name = $row['name'];
$email = $row['email'];
$phone_number= $row['ph_no'];
$gender = $row['gender'];
$dob = $row['dob'];
$blood_grp = $row['blood_grp'];
$address = $row['address'];
$profilpic = $row['photo'];
$status = $row['status'];

$q2="SELECT * FROM player_phy WHERE pid=$id";
$result2 = mysqli_query($conn, $q2);
$row2 = mysqli_fetch_assoc($result2);

function getAge($dateOfBirth) {
  $today = new DateTime('today');
  $birthDate = new DateTime($dateOfBirth);
  $interval = $today->diff($birthDate);
  return $interval->y;
}

$dateOfBirth = $dob;
$age = getAge($dateOfBirth);

$q3="SELECT * FROM player_career WHERE pid=$id";
$result3 = mysqli_query($conn, $q3);
$row3 = mysqli_fetch_assoc($result3);
?>
<form action="" method="POST">
<table align="left" width="70%">
    <tr>
        <td>
            <img class="rounded-circle me-lg-2" src="<?php echo $profilpic; ?>" alt="" style="width: 200px; height: 200px;">
        </td>
        <td>
            <span class="d-none d-lg-inline-flex">Player ID : <?php echo $id; ?></span><br>
            <h2><?php echo $name; ?></h2>
            <span class="d-none d-lg-inline-flex">Email : <?php echo $email; ?></span><br>
            <span class="d-none d-lg-inline-flex">Gender : <?php echo $gender; ?></span><br>
            <span class="d-none d-lg-inline-flex">Age : <?php echo $age; ?>yrs </span>
        </td>
</tr>
</tr>
<tr><td><h4>Personal Details</h4></td></tr>
<tr>
    <td>Gender :</td>
    <td><label>: <?php echo $gender; ?></label></td>
</tr>
<tr>
    <td>Date of birth :</td>
    <td><label>: <?php echo $dob; ?></label></td>
</tr>
<tr>
    <td>Phone Number</td>
    <td><label>: <?php echo $phone_number; ?></label></td>
</tr>
<tr>
    <td>Home Address</td>
    <td><label>: <?php echo $address; ?></label></td>
</tr>
<tr><td><h4>Personal ID</h4></td></tr>
<tr>
    <td>Profile Pic</td>
    <td><label>: Click Edit to change</label></td>
</tr>
<tr>
    <td>Identification mark</td>
    <td><label>: <?php echo $row['identification_mark']; ?></label></td>
</tr>
<tr>
    <td>Aadhaar Number</td>
    <td><label>: <?php echo $row['aadhaar_no']; ?></label></td>
</tr>
<tr>
    <td>Aadhaar Doc</td>
    <td><label>: <a href="<?php echo $row['aadhaar_doc']; ?>" target="_blank">Click here to open the PDF</a></label></td>
</tr>
<tr><td><h4>Physical Details</h4></td></tr>
<tr>
    <td>Height</td>
    <td><label>: <?php echo $row2['height']; ?> cm</label></td>
</tr>
<tr>
    <td>Weight</td>
    <td><label>: <?php echo $row2['weight']; ?> kg</label></td>
</tr>
<tr>
    <td>Batting hand</td>
    <td><label>: <?php echo $row2['batting']; ?></label></td>
</tr>
<tr>
    <td>Bowling Type</td>
    <td><label>: <?php echo $row2['bowling']; ?></label></td>
</tr>
<tr>
    <td>Role</td>
    <td><label>: <?php echo $row2['role']; ?></label></td>
</tr>
<tr><td><h4>Career Details</h4><span>[Record's are updated after their Club owner approved the data entered]<br></span></td></tr>
<tr>
  <td>Matches played</td>
  <td><label>: <?php echo $row3['match_played']; ?></label></td>
</tr>
<tr>
  <td>Runs Scored</td>
  <td><label>: <?php echo $row3['no_of_six']; ?></label></td>
</tr>
<tr>
  <td>No of 6's</td>
  <td><label>: <?php echo $row3['run_scored']; ?></label></td>
</tr>
<tr>
  <td>No of 4's</td>
  <td><label>: <?php echo $row3['no_of_four']; ?></label></td>
</tr>
<tr>
  <td>Batting Average</td>
  <td><label>: <?php echo $row3['batting_avg']; ?></label></td>
</tr>
<tr>
  <td>Centuries</td>
  <td><label>: <?php echo $row3['centuries']; ?></label></td>
</tr>
<tr>
  <td>Half Centuries</td>
  <td><label>: <?php echo $row3['half_centuries']; ?></label></td>
</tr>
<tr>
  <td>Batting Average</td>
  <td><label>: <?php echo $row3['batting_avg']; ?></label></td>
</tr>
<tr>
  <td>Top Score</td>
  <td><label>: <?php echo $row3['top_score']; ?></label></td>
</tr>
<tr>
  <td>Overs (in Total)</td>
  <td><label>: <?php echo $row3['no_over_thrown']; ?></label></td>
</tr>
<tr>
  <td>Economy</td>
  <td><label>: <?php echo $row3['economy']; ?></label></td>
</tr>
<tr>
  <td>Wides</td>
  <td><label>: <?php echo $row3['wide_balls']; ?></label></td>
</tr>
<tr>
  <td>No Balls</td>
  <td><label>: <?php echo $row3['no_balls']; ?></label></td>
</tr>
<tr>
  <td>Wickets</td>
  <td><label>: <?php echo $row3['wickets']; ?></label></td>
</tr>
<tr>
  <td>Catches</td>
  <td><label>: <?php echo $row3['catches']; ?></label></td>
</tr>
<tr>
  <td>Stumping</td>
  <td><label>: <?php echo $row3['stumping']; ?></label></td>
</tr>
<tr>
  <td>Run Outs</td>
  <td><label>: <?php echo $row3['run_outs']; ?></label></td>
</tr>
<tr>
  <td><b><h3>Performance Grade</h3></b></td>
  <td><label><b><h3>: <?php echo $row3['grade']; ?></h3></b></label></td>
</tr>
</table>
</form>
<?php
switch ($status) {
    case 'New':
    ?>
    <div align="center">
        <button style="padding: 10px 20px; background-color: Green; color: #fff; border: none; border-radius: 5px; cursor: pointer; font-size: 20px;" name="editbtn">
            <a href="A_UniversalController.php?Action=Approved&TblName=player_reg&id=<?php echo $email; ?>"  style='color: white;' >Approve</a>
        </button>
        <button style="padding: 10px 20px; background-color: Red; color: #fff; border: none; border-radius: 5px; cursor: pointer; font-size: 20px;" name="editbtn">
            <a href="A_UniversalController.php?Action=Rejected&TblName=player_reg&id=<?php echo $email; ?>"  style='color: white;' >Reject</a>
        </button>
    </div>
    <?php 
        break;
    case 'Approved':
    ?>
    <div align="center">
        <button style="padding: 10px 20px; background-color: Green; color: #fff; border: none; border-radius: 5px; cursor: pointer; font-size: 20px;" name="editbtn">
            <a href="ControllerClub.php?Action=Acquired&TblName=clubs_players&id=<?php echo $email; ?>"  style='color: white;' >Sign Contract</a>
        </button>
    </div>
    <?php
        break;
    case 'Rejected':
    ?>
        <div align="center">
        <button style="padding: 10px 20px; background-color: Green; color: #fff; border: none; border-radius: 5px; cursor: pointer; font-size: 20px;" name="editbtn">
            <a href="A_UniversalController.php?Action=Approved&TblName=player_reg&id=<?php echo $email; ?>"  style='color: white;' >Approve</a>
        </button>
    </div>
    <?php
        break;
    case 'Revoked':
        ?>
        <div align="center">
        <button style="padding: 10px 20px; background-color: Green; color: #fff; border: none; border-radius: 5px; cursor: pointer; font-size: 20px;" name="editbtn">
            <a href="A_UniversalController.php?Action=Approved&TblName=player_reg&id=<?php echo $email; ?>"  style='color: white;' >Approve</a>
        </button>
        <button style="padding: 10px 20px; background-color: Red; color: #fff; border: none; border-radius: 5px; cursor: pointer; font-size: 20px;" name="editbtn">
            <a href="A_UniversalController.php?Action=Rejected&TblName=player_reg&id=<?php echo $email; ?>"  style='color: white;' >Reject</a>
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
<!-- --------------------------------------------------------- -->
<?php include('footer.php'); ?>
