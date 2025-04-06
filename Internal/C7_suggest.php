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
<h1 align="center">Suggest Players</h1>
<?php
$username = $_SESSION['username'];


$sql = "SELECT * FROM player_reg WHERE status='Approved' AND acquired_status = 'Acquired'";
$result = mysql_query($sql);

$sql2 = "SELECT * FROM player_reg WHERE status='Approved'";
$result2 = mysql_query($sql2);
$row1 = mysql_fetch_assoc($result2);
$id=$row1['pid'];

$q2="SELECT * FROM player_phy WHERE pid=$id";
$result2 = mysql_query($q2);
$row2 = mysql_fetch_assoc($result2);


$q3="SELECT * FROM player_career WHERE pid=$id ";
$result3 = mysql_query($q3);
$row3 = mysql_fetch_assoc($result3);

$q4="SELECT * FROM clubs WHERE email='$username'";
$result4 = mysql_query($q4);
$row4 = mysql_fetch_assoc($result4);

if($row3['grade'] != ''){
$Grade = $row3['grade'];
}else{
$Grade = 'Not Graded';
}



// Check if there are any records
if (mysql_num_rows($result) > 0) {
    // Output data of each row
    echo "<table class='table table-striped table-bordered mx-auto'>";
    echo "<tr><th>Player ID</th><th>Photo</th><th>Name</th><th>Role</th><th>Grade</th><th>Status</th><th>Action</th></tr>";
    while ($row = mysql_fetch_assoc($result)) {
        $ppid = $row['pid'];
        $qc = "SELECT * FROM suggested_players WHERE pid=$ppid";
        $qr = mysql_query($qc);
            if(mysql_num_rows($qr)==1){
                continue;
            }

        echo "<tr>";
        echo "<td>" . $row['pid'] . "</td>";
        $Pic = $row['photo'];
        echo "<td><img class='rounded-circle me-lg-2' src='" . $Pic . "' width='100px' height='100px'</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row2['role'] . "</td>";
        echo "<td>" . $row3['grade'] . "</td>";
        echo "<td>" . $row['status'] . "</td>";
        $Pid = $row['pid'];
        $Pname = $row['name'];
        $photo = $row['photo'];
        $club_id = $row4['club_id'];
        $club_name = $row4['club_name'];
        $grade = $row3['grade'];
        $role = $row2['role'];
        $Link = "ControllerClub.php?Action3=1&pid=$Pid&pname=$Pname&photo=$photo&club_id=$club_id&club_name=$club_name&grade=$grade&role=$role";
        echo "<td><a style='display: inline-block; padding: 5px 10px; background-color: Green; color: #fff; text-decoration: none; border-radius: 5px;' href='" . $Link . "''>Suggest</a></td>";

        // $Link2 = "ControllerClub.php?pid=$Pid";
        // echo "<td><a style='display: inline-block; padding: 5px 10px; background-color: #e74c3c; color: #fff; text-decoration: none; border-radius: 5px;' href='" . $Link2 . "''>Withdraw</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No records found";
}


?>

<!-- --------------------------------------------------------- -->
<?php include('footer.php'); ?>