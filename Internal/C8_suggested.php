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
<h1 align="center">Suggested Players</h1>
<?php
$username = $_SESSION['username'];
$q4="SELECT * FROM clubs WHERE email='$username'";
$result4 = mysql_query($q4);
$row4 = mysql_fetch_assoc($result4);

$x = $row4['club_id'];
$qc = "SELECT * FROM suggested_players WHERE club_id=$x"; //echo $qc;
        $qr = mysql_query($qc);


// Check if there are any records
if (mysql_num_rows($qr) > 0) {
    // Output data of each row
    echo "<table class='table table-striped table-bordered mx-auto'>";
    echo "<tr><th>Player ID</th><th>Photo</th><th>Name</th><th>Role</th><th>Grade</th><th>Status</th><th>Action</th></tr>";
    while ($row = mysql_fetch_assoc($qr)) {
        echo "<tr>";
        echo "<td>" . $row['pid'] . "</td>";
        $Pic = $row['photo'];
        echo "<td><img class='rounded-circle me-lg-2' src='" . $Pic . "' width='100px' height='100px'</td>";
        echo "<td>" . $row['pname'] . "</td>";
        echo "<td>" . $row['role'] . "</td>";
        echo "<td>" . $row['grade'] . "</td>";
        echo "<td>" . $row['status'] . "</td>";
        $Pid = $row['pid'];
        $Pname = $row['pname'];
        $photo = $row['photo'];
        $club_id = $row['club_id'];
        $club_name = $row['club_name'];
        $grade = $row['grade'];
        $role = $row['role'];
        // $Link = "ControllerClub.php?pid=$Pid?pname=$Pname?photo=$photo?club_id=$club_id?club_name=$club_name?grade=$grade?role=$role";
        // echo "<td><a style='display: inline-block; padding: 5px 10px; background-color: Green; color: #fff; text-decoration: none; border-radius: 5px;' href='" . $Link . "''>Suggest</a></td>";

        $Link2 = "ControllerClub.php?Action3=Withdraw&pid=$Pid";
        echo "<td><a style='display: inline-block; padding: 5px 10px; background-color: #e74c3c; color: #fff; text-decoration: none; border-radius: 5px;' href='" . $Link2 . "''>Withdraw</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No records found";
}


?>

<!-- --------------------------------------------------------- -->
<?php include('footer.php'); ?>