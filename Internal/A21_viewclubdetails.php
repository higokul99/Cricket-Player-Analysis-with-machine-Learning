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
<h1 align="center">Players Details</h1>
<?php
$username = $_GET['id'];

$q = "SELECT * FROM clubs WHERE club_id=$username";
$result = mysqli_query($conn, $q);
$row = mysqli_fetch_assoc($result);

$id = $row['club_id'];
$name = $row['club_name'];
$email = $row['email'];
$owner_name = $row['owner_name'];
$phone_number = $row['owner_phono'];
$status = $row['status'];
?>

<form action="" method="POST">
<table align="left" width="70%">
    <tr>
        <td>
            <span class="d-none d-lg-inline-flex">Club ID : <?php echo $id; ?></span><br>
            <h2><?php echo $name; ?></h2>
            <span class="d-none d-lg-inline-flex">Email : <?php echo $email; ?></span><br>
        </td>
    </tr>
    <tr><td><h4>Details</h4></td></tr>
    <tr>
        <td>Founded Year :</td>
        <td><label>: <?php echo $row['founded_year']; ?></label></td>
    </tr>
    <tr>
        <td>Location :</td>
        <td><label>: <?php echo $row['location']; ?></label></td>
    </tr>
    <tr>
        <td>Owner Name</td>
        <td><label>: <?php echo $owner_name; ?></label></td>
    </tr>
    <tr>
        <td>Phone Number</td>
        <td><label>: <?php echo $phone_number; ?></label></td>
    </tr>
    <tr>
        <td>Website</td>
        <td>
            <label>: <?php $link = $row['location']; ?>
                <a href="<?php echo $link; ?>" target="_blank">Click here to open Link</a>
            </label>
        </td>
    </tr>
    <tr><td><h4>Personal ID</h4></td></tr>
    <tr>
        <td>License Number</td>
        <td><label>: <?php echo $phone_number; ?></label></td>
    </tr>
    <tr>
        <td>License Document</td>
        <td>
            <label>: <a href="<?php echo $row['lic_doc']; ?>" target="_blank">Click here to open the PDF</a></label>
        </td>
    </tr>
</table>
</form>

<?php
switch ($status) {
    case 'New':
        ?>
        <div align="center">
            <button style="padding: 10px 20px; background-color: Green; color: #fff; border: none; border-radius: 5px; cursor: pointer; font-size: 20px;" name="editbtn">
                <a href="A_UniversalController.php?Action=Approved&TblName=clubs&id=<?php echo $email; ?>" style='color: white;'>Approve</a>
            </button>
            <button style="padding: 10px 20px; background-color: Red; color: #fff; border: none; border-radius: 5px; cursor: pointer; font-size: 20px;" name="editbtn">
                <a href="A_UniversalController.php?Action=Rejected&TblName=clubs&id=<?php echo $email; ?>" style='color: white;'>Reject</a>
            </button>
        </div>
        <?php 
        break;
    case 'Approved':
        ?>
        <div align="center">
            <button style="padding: 10px 20px; background-color: Red; color: #fff; border: none; border-radius: 5px; cursor: pointer; font-size: 20px;" name="editbtn">
                <a href="A_UniversalController.php?Action=Rejected&TblName=clubs&id=<?php echo $email; ?>" style='color: white;'>Reject</a>
            </button>
        </div>
        <?php
        break;
    case 'Rejected':
        ?>
        <div align="center">
            <button style="padding: 10px 20px; background-color: Green; color: #fff; border: none; border-radius: 5px; cursor: pointer; font-size: 20px;" name="editbtn">
                <a href="A_UniversalController.php?Action=Approved&TblName=clubs&id=<?php echo $email; ?>" style='color: white;'>Approve</a>
            </button>
        </div>
        <?php
        break;
    case 'Revoked':
        ?>
        <div align="center">
            <button style="padding: 10px 20px; background-color: Green; color: #fff; border: none; border-radius: 5px; cursor: pointer; font-size: 20px;" name="editbtn">
                <a href="A_UniversalController.php?Action=Approved&TblName=clubs&id=<?php echo $email; ?>" style='color: white;'>Approve</a>
            </button>
            <button style="padding: 10px 20px; background-color: Red; color: #fff; border: none; border-radius: 5px; cursor: pointer; font-size: 20px;" name="editbtn">
                <a href="A_UniversalController.php?Action=Rejected&TblName=clubs&id=<?php echo $email; ?>" style='color: white;'>Reject</a>
            </button>
        </div>
        <?php
        break;
    default:
        // code...
        break;
}
?>
<!-- --------------------------------------------------------- -->
<?php include('footer.php'); ?>
