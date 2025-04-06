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
        break;
}
?>
<!-- --------------------------------------------------------- -->
<h1 align="center">Approve Team Selection</h1>
<?php
$connection = mysqli_connect("localhost", "root", "", "your_database_name");
$sql = "SELECT * FROM teams WHERE status='Pending'";
$result = mysqli_query($connection, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table class='table table-striped table-bordered mx-auto'>";
    echo "<tr><th>Team ID</th><th>Team Name</th><th>Club</th><th>Email</th><th>Status</th><th>View</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['team_id'] . "</td>";
        echo "<td>" . $row['team_name'] . "</td>";
        echo "<td>" . $row['club_name'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['status'] . "</td>";
        $id = $row['team_id'];
        echo "<td><a style='display: inline-block; padding: 5px 10px; background-color: #4287f5; color: Black; text-decoration: none; border-radius: 5px;' href=A21_viewteamdetails.php?id=$id>View</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No records found";
}
?>
<!-- --------------------------------------------------------- -->
<?php include('footer.php'); ?>
