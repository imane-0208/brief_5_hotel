<?php


include "connect.class.php";   
class Client {


    /* connection */
    public function __construct(){

        $connection = new connection();
        $this->conn= $connection->connect();
    }
    /* sign up */
    public function register($Fname , $Lname , $email  , $Phone ,$password){

        $query  =    $this->conn->prepare("SELECT idlogin FROM login WHERE email= ?");
        $query->execute([$email]);

        $result    =   $query->rowCount();
        if ($result == 0) {  


            /* insert in login table */

            $stm = $this->conn->prepare("INSERT into login (email, password) VALUES (?,?)");
            $stm->execute([$email,$password]);


            /* get id login */

            $idc  = $this->conn->lastInsertId();



            /* insert in custclientomer table */
            $sql      =   "INSERT INTO client (`idc`, `fname`, `lname`, `phone`) VALUES (?,?,?,?) ";
            $registerClient   =   $this->conn->prepare($sql);
            $registerClient->execute([$idc,$Fname,$Lname,$Phone]);
            header("location:../view/login.php");
              
        } else {  
            die('error!!!!'); 
        }  
    }




    /* sign in */
    public function login($email){

        
        $stmt   =   $this->conn->prepare("SELECT * FROM login WHERE email = ?");
        $stmt->execute([$email]);
        $row    =   $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }




/*  Get The Information Of client */




    public function selectClient($selectiduser){
        $stmtclient      = $this->conn->prepare("SELECT * FROM client WHERE idc = ?");
        $stmtclient->execute([$selectiduser]);
        $rows            =   $stmtclient->fetch(PDO::FETCH_ASSOC);
        return $rows;
    }





}



/* include'connect.class.php';

Class client{
    

    public function insert(){

        $base = new connect();
        if (isset($_POST['submit'])) {
            
                if (isset($_POST['submit'])) {
                    
                    $fname = $_POST['fname'];
                    $lname = $_POST['lname'];
                    $phone = $_POST['phone'];
                    $email = $_POST['email'];
                    $pass = md5($_POST['passw']);
        
                    $querry  = "INSERT INTO login (email, password) VALUES ('$email', '$pass')";
        
                    $base->getConnection()->exec($querry);
        
                    $query  = "SELECT id , email FROM login WHERE email = '$email'";
                    
        
                    $sql = $base->getConnection()->prepare($query);
                    $sql->execute();
                    $row = $sql->fetch();
        
                    $id_login = $row['id'];
                    $logemail = $row['email']; */
                    
                    /* if( $logemail == $email ){
                        echo "<script>alert('compte deja existe');</script>";
                        echo "<script>window.location.href = '../pages/sign_up.php';</script>";

                        
                    } */
                    
                        /* $querry3  = "INSERT INTO client (nom, prenom, phone,idlogin) VALUES ('$lname','$lname', '$phone', '$id_login')";
                        $base->getConnection()->exec($querry3);

                        echo "<script>alert('your register passed successfully');</script>";
                        echo "<script>window.location.href = '../pages/login.php';</script>";

                    
     
                }
            }
        }


        public function login(){
            session_start();
            $base = new connect();
            if (isset($_POST['login'])){
                $usermail = $_POST['usermail'];
                $pass = $_POST['pass'];


                $myquery  = "SELECT * FROM login WHERE email = '$usermail' and password = '$pass'";
        
                $mysql = $base->getConnection()->prepare($myquery);
                $mysql->execute();

                $row = $mysql->fetch();

                $_SESSION['email'] = $row['email'];
                $_SESSION['id'] = $row['id'];

                    echo "<script>alert('your login passed successfully');</script>";
                    echo "<script>window.location.href = '../pages/reservation.php';</script>";

                

                
            }


        }





                
    } */
        






?>