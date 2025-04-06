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
<h1 align="center">Approve Team Selection</h1>


<!-- --------------------------------------------------------- -->
<?php include('footer.php'); ?>