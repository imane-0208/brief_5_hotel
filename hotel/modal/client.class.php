<?php
include'connect.class.php';

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
                    $logemail = $row['email'];
                    
                    /* if( $logemail == $email ){
                        echo "<script>alert('compte deja existe');</script>";
                        echo "<script>window.location.href = '../pages/sign_up.php';</script>";

                        
                    } */
                    
                        $querry3  = "INSERT INTO client (nom, prenom, phone,idlogin) VALUES ('$lname','$lname', '$phone', '$id_login')";
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





                
    }
        






?>