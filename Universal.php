<?php 
include_once('db_connection.php');

//-------------------------- Universal Registration code------------------------------------
     
 
     // Register user
     if(isset($_POST['registerbtn'])){
        $error_message = "";$success_message = "";


         $type_of_account = trim($_POST['typeofaccount']);
         //$type_of_account ='Player';

         $name = trim($_POST['name']);
         $email = trim($_POST['email']);
         $password = trim($_POST['password']);
         $confirmpassword = trim($_POST['cpassword']);
         $username = $email;
         $isValid = true;
         //echo "TOA:".$type_of_account;

         // Check fields are empty or not
         if($name == '' || $email == '' || $password == '' || $confirmpassword == ''){
             $isValid = false;
             $error_message = "Please fill all fields.";
         }
 
         // Check if confirm password matching or not
         if($isValid && ($password != $confirmpassword) ){
             $isValid = false;
             $error_message = "Confirm password not matching.";
         }
 
         // Check if Email-ID is valid or not
         if ($isValid && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
               $isValid = false;
               $error_message = "Invalid Email-ID.";
         }
 
         if($isValid){
 
             // Check if Email-ID already exists
             // $stmt = $connection->prepare("SELECT * FROM users WHERE email = ?");
             // $stmt->bind_param("s", $email);
             // $stmt->execute();
             // $result = $stmt->get_result();
             // $stmt->close();
             $query_register = mysql_query("SELECT username FROM login WHERE username='$username'");
             $result = mysql_fetch_array($query_register);
             if($result){
                 $isValid = false;
                 $error_message = "Email-ID is already existed.";
             }
             
         }
 echo $isValid;
         // Insert records
         if($isValid){
             // $insertSQL = "INSERT INTO register(name,email,phone_number,password) VALUES(?,?,?,?)";
             // $stmt = $con->prepare($insertSQL);
             // $stmt->bind_param("ssis",$name,$email,$phone_number,$password);
             // $stmt->execute();
             // $stmt->close();
             //echo "TOA:".$type_of_account;
             switch($type_of_account)
             {
                case 'Player':
                    $SQL_query = "INSERT INTO player_reg(name,email,photo,status) VALUES('$name','$email','profilepic/default.png','New')";
                    echo $SQL_query;
                     $sql_register = mysql_query($SQL_query);
                     
                     $sql_login = mysql_query("INSERT INTO login(username,password,name,type,account_status) VALUES('$email','$password','$name','$type_of_account','New')");
                     echo "INSERT INTO login VALUES('$email','$password','$type_of_account')";
                     if($sql_register && $sql_login)
                     {
$Qx = "SELECT pid FROM player_reg WHERE email='$email'"; echo $Qx;
$EX = mysql_query($Qx);
$Row = mysql_fetch_assoc($EX);
$pid = $Row['pid'];

//Player Phy
$Q3 = "INSERT INTO player_phy(pid,status) VALUES($pid,'New')"; echo $Q3;
$X3 = mysql_query($Q3);

//Player career
$Q4 = "INSERT INTO player_career(pid,status) VALUES($pid,'New')"; echo $Q4;
$X4 = mysql_query($Q4);
                         echo "<script>alert('Account created successfully.!')</script>";
                         echo "<script>location.href='index.php'</script>";
                     }
                     else
                     {
                         //$error_message = "Registration failed due to any reason.";
                         echo "<script>alert('Registration failed due to any reason!')</script>";
                         //echo "<script>location.href='index.php'</script>";
                     }
                     break;
                case 'Club':
                         $sql_register = mysql_query("INSERT INTO clubs(club_name,email,status) VALUES('$name','$email','New')");
                         //echo "INSERT INTO register_warehouse VALUES('$name','$email',$phone_number)";
                         $sql_login = mysql_query("INSERT INTO login(username,password,name,type,account_status) VALUES('$email','$password','$name','$type_of_account','New')");
                         echo "INSERT INTO login(username,password,name,type,account_status) VALUES('$email','$password','$name','$type_of_account','New')";
                         if($sql_register && $sql_login)
                         {
                             //$success_message = "Account created successfully.";
                             echo "<script>alert('Account created successfully.!')</script>";
                             echo "<script>location.href='index.php'</script>";
                         }
                         else
                         {
                             //$error_message = "Registration failed due to any reason.";
                             echo "<script>alert('Registration failed due to any reason!')</script>";
                             echo "<script>location.href='index.php'</script>";
                         }
                         break;
                default:
                        echo "<script>alert('Default error!')</script>";
                        break;
                         
             }
             
         }else{
            //echo "<script>alert('Error!')</script>";
            echo $error_message;
         }
     }


//-------------------------- Universal Registration code-----------------xxxxxxxxxxx-------------------




//-------------------------- Universal login code------------------------------------

if(isset($_POST['loginbtn'])){

$username = $_POST['username'];
$password = $_POST['password'];

$table = 'login';
//$sql = "SELECT * FROM $table WHERE username = '$username' AND (account_status = 'New' OR account_status = 'Approved')";

$sql = "SELECT * FROM $table WHERE username = '$username' AND (account_status = 'New' OR account_status = 'Approved')";

//$result = $conn->query($sql);
$result = mysql_query($sql);
//$result->num_rows
if (mysql_num_rows($result) > 0) 
{
    $_SESSION['username'] = $username;
    //$row = $result->fetch_assoc();
    $row = mysql_fetch_assoc($result);
    $Table_Password = $row['password'];
    $type_of_user = $row['type'];

    if ($password == $Table_Password) 
    {
        echo "<script>alert('Login successful! Welcome, $username.');</script>";
        //echo "Login successful! Welcome, $username.";
        //Special condition
        //$root = 'Wednesday';

switch ($type_of_user) {
    case 'Player':
        echo "Member login success";
        $_SESSION['usertype'] = $type_of_user;
        echo "<script>location.href='Internal/index.php'</script>";
        break;

    case 'Admin':
        echo "Admin login success!";
        $_SESSION['usertype'] = $type_of_user;
        echo "<script>location.href='Internal/index.php'</script>";
        break;

    case 'Club':
        $_SESSION['usertype'] = $type_of_user;
        echo "Trainer login success!";
        echo "<script>location.href='Internal/index.php'</script>";
        
        break;

    default:
        echo "Internal Error occured!";
        echo "<script>alert('Internal Error occured!');</script>";
        //echo "<script>location.href='Admin2/2index.php'</script>";
        break;
    }
    }
    else 
    {
        $message = "Invalid Password. Try Again!";
        $location = "login2.php";

        echo "<script>alert('$message');</script>";
        echo "<script>location.href = '$location';</script>";
        echo $message;
    }
    
}else {

    $message = "Error 2000 : Invalid Username or Account is Blocked/Rejected!";
    $location = "index.php";

    echo "<script>alert('$message');</script>";
    echo "<script>location.href = '$location';</script>";
    echo $message;
}
}
//-------------------------- Universal login code----XXXXXXXXXXXXXXXXXXX--------------------------------
?>