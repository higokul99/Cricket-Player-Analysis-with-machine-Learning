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
        <h1 align="center">Upload Output</h1>
            <form action="" method='POST' enctype='multipart/form-data'>
                <center>
                    <table>
                        <tr><td>Upload CSV FILE:</td> <td><input type='file' name='csv_info' /></td></tr>
                        <tr><td><button name='submit' value='Upload' >Upload</button></td></tr>
                    </table>
                </center>
            </form>

    </div>
</div>
<?php
$lineNumber = 1;
if(isset($_POST['submit'])){
    
if($_FILES['csv_info']['name']){
    
  $arrFileName = explode('.',$_FILES['csv_info']['name']);
   if($arrFileName[1] == 'csv'){
       
     $handle = fopen($_FILES['csv_info']['tmp_name'], "r");
     while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
  if ($lineNumber > 1) {  // Skip the first line (header)
    $pid = $data[0];
    $result = $data[1];
    $pid=$data[0];
    $result = $data[1];
        
    $sql="UPDATE player_career SET grade='$result',status='Predicted' where pid=$pid";
    echo $sql;
         
    mysqli_query($conn, $sql);
    if($sql)
    {
        echo "<script>alert('Updated Played ID : $pid !');</script>";
    }
    else
    {
        echo"<script>alert('error');</script>";
    }
  }
  $lineNumber++;
}
     
    fclose($handle);
}
}
}
?>
<?php include('footer.php'); ?>
