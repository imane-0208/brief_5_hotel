<?php
/* include '../modal/client.class.php';
$client1 = new client();
$insert = $client1->insert(); */


session_start();

if($_SERVER['REQUEST_METHOD']=='POST') {
  include "../model/client.class.php";

  $posts=new Client();

/* Sign Up */
  if (isset($_POST['register'])) {

    $Fname = $_POST['fname'];
    $Lname = $_POST['lname'];
    $email = $_POST['email'];
    $nbrPhone = $_POST['phone'];
    $password = $_POST['passw'];
    
    $hashed_password  =    md5($password);

    $posts->register($Fname , $Lname , $email ,  $nbrPhone, $hashed_password );
    //header("location:../view/login.php");

  }

/* Login */
   if (isset($_POST['login'])) {
    $email    = $_POST['usermail'];
    $password = $_POST['pass'];
   
    $hashed_password=md5($password);
   
    $row=$posts->login($email);

    $passworddb   = $row['password'];
    $selectidlogin = $row['idlogin'];

     if ($passworddb==$hashed_password ) {
      $_SESSION['idc']     = $selectidlogin;
      $_SESSION['email']  = $email;
      header("location:../view/reserver.php");
      
     
      /* $rows=$posts->selectClient($selectidlogin);
      $_SESSION['fname']  = $rows['fname'];
      $_SESSION['lname']  = $rows['lname']; */
      header("location:../view/reserver.php");
    }else {
      header("location:../view/login.php");
    }
  

}

else {
  echo 'Error : You Can\'t  Browse This Page';
}
}


?>