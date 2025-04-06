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
<h1 align="center">Rejected Players</h1>
<?php
$sql = "SELECT * FROM player_reg WHERE status='Rejected'";
$result = mysql_query($sql);

// Check if there are any records
if (mysql_num_rows($result) > 0) {
    // Output data of each row
    echo "<table class='table table-striped table-bordered mx-auto'>";
    echo "<tr><th>FID</th><th>Name</th><th>Email</th><th>Phone Number</th><th>Gender</th><th>View</th></tr>";
    while ($row = mysql_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['pid'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['ph_no'] . "</td>";
        echo "<td>" . $row['gender'] . "</td>";
        
        $id = $row['pid'];
        $email = $row['email'];
        echo "<td><a style='display: inline-block; padding: 5px 10px; background-color: #4287f5; color: Black; text-decoration: none; border-radius: 5px;' href=A11_playerdetails.php?id='$id'>View</a></td>";
        echo "<td><a style='display: inline-block; padding: 5px 10px; background-color: Yellow; color: Black; text-decoration: none; border-radius: 5px;' href=A_UniversalController.php?Action=New&TblName=player_reg&id=$email>Re-Apply</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No records found";
}



?>

<!-- --------------------------------------------------------- -->
<?php include('footer.php'); ?>