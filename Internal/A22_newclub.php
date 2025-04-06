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
<h1 align="center">New Club Registration</h1>
<?php
$sql = "SELECT * FROM clubs WHERE status='New'";
$result = mysqli_query($conn, $sql);

// Check if there are any records
if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    echo "<table class='table table-striped table-bordered mx-auto'>";
    echo "<tr><th>Club ID</th><th>Club Name</th><th>Email</th><th>Owner Name</th><th>Phone Number</th><th>Status</th><th>View</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['club_id'] . "</td>";
        echo "<td>" . $row['club_name'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['owner_name'] . "</td>";
        echo "<td>" . $row['owner_phono'] . "</td>";
        echo "<td>" . $row['status'] . "</td>";
        $id = $row['club_id'];
        echo "<td><a style='display: inline-block; padding: 5px 10px; background-color: #4287f5; color: Black; text-decoration: none; border-radius: 5px;' href='A21_viewclubdetails.php?id=$id'>View</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No records found";
}
?>
<!-- --------------------------------------------------------- -->
<?php include('footer.php'); ?>
