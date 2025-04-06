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
<h1 align="center">My Contract Players</h1>
<?php
$conn = mysqli_connect("localhost", "username", "password", "database_name");

$sql = "SELECT pr.*, cp.club_id, pp.role
FROM player_reg pr
INNER JOIN clubs_players cp ON pr.pid = cp.pid
INNER JOIN player_phy pp ON pr.pid = pp.pid;
";
$result = mysqli_query($conn, $sql);
$result2 = mysqli_query($conn, $sql);
$row1 = mysqli_fetch_assoc($result2);
$id = $row1['pid'];
$role = $row1['role'];

$q2 = "SELECT * FROM player_phy WHERE pid=$id";
$result2 = mysqli_query($conn, $q2);
$row2 = mysqli_fetch_assoc($result2);

if (mysqli_num_rows($result) > 0) {
    echo "<table class='table table-striped table-bordered mx-auto'>";
    echo "<tr><th>Player ID</th><th>Photo</th><th>Name</th><th>Role</th><th>Status</th><th>View</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['pid'] . "</td>";
        $Pic = $row['photo'];
        echo "<td><img class='rounded-circle me-lg-2' src='" . $Pic . "' width='100px' height='100px'></td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $role . "</td>";
        echo "<td>" . $row['status'] . "</td>";
        $Link = "C2_view.php?id=" . $row['pid'];
        echo "<td><a href='" . $Link . "'>View</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No records found";
}

mysqli_close($conn);
?>

<!-- --------------------------------------------------------- -->
<?php include('footer.php'); ?>
