<?php
include_once('../db_connection.php'); 

//--------------------------------ADMIN Universal action -------------------------------

if(isset($_GET['Action']))
{
    $TableName = $_GET['TblName']; //Name of table
    //$FieldName = "status";
    $Unique_Id = $_GET['id']; // Unique ID like Email
    $Status = $_GET['Action']; // Approve OR Reject will come

    $Query_reg = "UPDATE $TableName SET status='$Status' WHERE email = '$Unique_Id'"; echo $Query_reg;
    $Result_reg = mysqli_query($conn, $Query_reg); 
    $Query_log = "UPDATE login SET account_status='$Status' WHERE username = '$Unique_Id'"; echo $Query_log;
    $Result_log = mysqli_query($conn, $Query_log);  

    //Checking if Execution is good
    $location = "A_viewfaculty.php";
    if( $Result_reg && $Result_log)
    {
        $message = $Status.'!'; 
        //$message = "hi";

        echo "<script>alert('$message');</script>";
        echo $message;
        echo "<script>location.href='$location'</script>";
    }else
    {
        $message = "Internal Error. Contact Developer!";

        echo "<script>alert('$message');</script>";
        echo $message;
        echo "<script>location.href='$location'</script>";
    }
}
?>
