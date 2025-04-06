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
<h1 align="center">Review Players</h1>
<?php
$email = $_SESSION['username'];
$q2="SELECT * FROM clubs WHERE email='$email'";
$result2 = mysql_query($q2);
$row2 = mysql_fetch_assoc($result2);
$club_id = $row2['club_id'];


$sql = "SELECT * FROM clubs_players cp JOIN player_matchinfo pm ON pm.pid = cp.pid INNER JOIN player_reg pr ON pm.pid = pr.pid WHERE cp.club_id=$club_id AND pm.status = 'New';";
//echo $sql;
$result2 = mysql_query($sql);




// Check if there are any records
if (mysql_num_rows($result2) > 0) {
    // Output data of each row
    echo "<table class='table table-striped table-bordered mx-auto'>";
    echo "<tr><th>Match ID</th><th>Player ID</th><th>Name</th><th>Competition</th><th>Role</th><th>Status</th><th>Review</th></tr>";
    while ($row1 = mysql_fetch_assoc($result2)) {
        echo "<tr>";
        echo "<td>" . $row1['id'] . "</td>";
        echo "<td>" . $row1['pid'] . "</td>";
        echo "<td>" . $row1['name'] . "</td>";
        echo "<td>" . $row1['competition'] . "</td>";
        echo "<td>" . $row1['role'] . "</td>";
        echo "<td>" . $row1['status'] . "</td>";
        $Link = "C5_view.php?id=".$row1['id'];
        echo "<td><a href='" . $Link . "''>View</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No records found";
}


?>

<!-- --------------------------------------------------------- -->
<?php include('footer.php'); ?>