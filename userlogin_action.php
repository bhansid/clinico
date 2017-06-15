<?php
include "connection.php";
$mno=$_REQUEST['mno'];
$pass=$_REQUEST['pass'];
echo $email." ".$pass;
$select="select * from usersignup";
$res=mysqli_query($conn,$select);
$flag=false;
while ($row=mysqli_fetch_array($res)){
    if($row[0] == $mno && $row[2] == $pass){
        $flag=true;
        break;
    }
}
if($flag == true){
    session_start();
    $_SESSION['user']=$mno;
    header("location:userhome.php");
}
else{
    header("location:userlogin.php?msg=Incorrect Username or Password");
}