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
<!-- Sidebar End -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <h1>Legal Document</h1>
        
    </div>
</div>
<?php include('footer.php'); ?>