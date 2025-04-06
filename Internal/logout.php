<?php
session_start();
session_destroy();
echo "<script>alert('Logged Out Successfully');</script>";
//header("Location: ../index.php");

echo "<script>location.href='../index.php'</script>";


?>