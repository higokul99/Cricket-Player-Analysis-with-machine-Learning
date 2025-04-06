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
<h1 align="center">Suggested Players From Clubs for Team</h1>
<?php
$connection = mysqli_connect("localhost", "root", "", "your_database_name");
$qc = "SELECT * FROM suggested_players";
$qr = mysqli_query($connection, $qc);

if (mysqli_num_rows($qr) > 0) {
    echo "<table class='table table-striped table-bordered mx-auto'>";
    echo "<tr><th>Player ID</th><th>Photo</th><th>Name</th><th>Role</th><th>Grade</th><th>Status</th></tr>";
    while ($row = mysqli_fetch_assoc($qr)) {
        echo "<tr>";
        echo "<td>" . $row['pid'] . "</td>";
        echo "<td><img class='rounded-circle' src='" . $row['photo'] . "' width='100px' height='100px'></td>";
        echo "<td>" . $row['pname'] . "</td>";
        echo "<td>" . $row['role'] . "</td>";
        echo "<td>" . $row['grade'] . "</td>";
        echo "<td>" . $row['status'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No records found";
}
?>
<!-- --------------------------------------------------------- -->
<?php include('footer.php'); ?>
