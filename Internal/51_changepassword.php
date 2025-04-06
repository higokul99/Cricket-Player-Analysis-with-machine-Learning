<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #317fde;
            padding-top: 200px;
        }
        .login-form {
            width: 400px;
/*            height: 60%;*/
            margin: 0 auto;
        }
        .login-form form {
            margin-bottom: 15px;
            background: #fff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .login-form h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .form-control,
        .btn {
            min-height: 38px;
            border-radius: 2px;
            
        }
        .btn {
            font-size: 15px;
            font-weight: bold;
            background-color: #317fde;
        }
    </style>
</head>
<body>
    <div class="login-form">
        <form method="post" action="#">
            <h2 class="text-center">Change Password</h2>
            <div class="form-group">
                <input type="password" class="form-control" name="current" placeholder="Current Password" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="new" placeholder="New Password" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="newconfirm" placeholder="Confirm new Password" required="required">
            </div>
            <div class="form-group">
                
                <input type="submit" name="ChangePassword" value="Reset" class="btn btn-primary btn-block">
            </div>
        </form>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
session_start();
include_once('../db_connection.php');

if(isset($_POST['ChangePassword']))
{
    $username = $_SESSION['username'];

    $current_password = $_POST['current'];
    $new_password = $_POST['new'];
    $confirm_new_password = $_POST['newconfirm'];

    $q = "SELECT password FROM login WHERE username='$username'";
    $result = mysqli_query($connection, $q);
    $row = mysqli_fetch_assoc($result);
    $tbl_password = $row['password'];

    if($tbl_password == $current_password)
    {
        if($new_password == $confirm_new_password)
        {
            $q = "UPDATE login SET password = '$new_password' WHERE username='$username'";
            $result = mysqli_query($connection, $q);
            if($result){
                echo "<script>alert('Password Updated! Re-login now.');</script>";
                echo "<script>location.href='logout.php';</script>";
            }else{
                echo "<script>alert('Internal Error occured. Contact Developer!');</script>";
                echo "<script>location.href='logout.php';</script>";
            }
        }else
        {
            echo "<script>alert('New Password and Confirm password Did not match! try again.');</script>";
        }
    }else
    {
        echo "<script>alert('Current Password does not Match! Logging you out.');</script>";
        echo "<script>location.href='logout.php';</script>";
    }
}
?>






