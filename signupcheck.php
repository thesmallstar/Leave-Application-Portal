<?php 

   require 'db.php' ;
   session_start();

 
    if(!isset($_POST['submit'])){
        echo '<script language="javascript"> alert("Access Denied") </script>'; 
        header("Refresh: 1; url=usersignup.php");
    }

    else{
   
        $nametest=trim($_POST['Name']);
        $enrolltest=trim($_POST['Enroll']);
        $emailtest=trim($_POST['Email']);
        $passwordtest=trim($_POST['Password']);

        if( !empty($nametest) && !empty($enrolltest) && !empty($emailtest) && !empty($passwordtest)){
            

            $Name = htmlentities($_POST['Name']);
            $Enroll = htmlentities($_POST['Enroll']);
            $Pass = md5(htmlentities($_POST['Password']));
            $Email = htmlentities($_POST['Email']);
        }
<<<<<<< HEAD:signupcheck.php
        else{
                    echo '<script language="javascript">alert("Try Again!")</script>';
                    header("Refresh: 1; url=usersignup.php");
=======
        else{        

            if(empty($passwordtest)){
                $_SESSION['error'] ="Password Cannot be only spaces.";
                header("location: ../usersignup.php"); 
                exit();
            }
            $_SESSION['error'] ="Please fill all the fields";
                    //echo '<script language="javascript">alert("T header("Refresh: 1; url=../usersignup.php");
                    header("location: ../usersignup.php"); 
                    exit();

>>>>>>> 6e45332... Merge branch 'master' of https://github.com/thesmallstar/Leave-Application-Portal:core/signupcheck.php
                }

      
        

        try {
            
        
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $connection->prepare('SELECT * FROM users WHERE Email = :email');
            $stmt->execute(['email' => $Email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if($user != Null){
<<<<<<< HEAD:signupcheck.php
                echo '<script language="javascript"> alert("Email Already Exists") </script>' ;   
                header("Refresh: 1; url=usersignup.php"); 
=======
                $_SESSION['error'] ="Email already exists, please use other email.";
                   
                header("location: ../usersignup.php"); 
                exit();
            } else if($PassAgain != $Pass) {
                $_SESSION['error'] ="Password does not Match";
                   
                header("location: ../usersignup.php"); 
                exit();
>>>>>>> 6e45332... Merge branch 'master' of https://github.com/thesmallstar/Leave-Application-Portal:core/signupcheck.php
            }

            else{
                $sql = $connection->prepare("INSERT INTO users (Name,Enroll,Email,Password) VALUES (:name,:enroll,:email,:pass)");
                $cmd = $sql->execute(['name' => $Name , 'enroll' => $Enroll, 'email' => $Email,'pass' => $Pass]);

                if($cmd){
<<<<<<< HEAD:signupcheck.php
                      echo '<script language="javascript"> alert("Succesfully Registered , You can login now") </script>' ; 
                    header("Refresh: 1; url=index.php"); 
                }
                  
                else{
                    echo '<script language="javascript"> alert("Try Again !") </script>' ;     
                    header("Refresh: 1; url=usersignup.php");
=======
                    $_SESSION['success'] ="Succesfully Registered , You can login now";
                   
                    header("location: ../usersignup.php"); 
                    exit();
                    
                }
                  
                else{
                    $_SESSION['error'] ="Something went wrong, please try again.";
                   
                    header("location: ../usersignup.php"); 
                    exit();
                    
>>>>>>> 6e45332... Merge branch 'master' of https://github.com/thesmallstar/Leave-Application-Portal:core/signupcheck.php
                }
                
            }

        }
        
        catch(PDOException $e){
                echo '<script language="javascript">';
                echo '$sql . "<br>" . $e->getMessage();';
                echo '</script>';   
                header("Refresh: 1; url=usersignup.php");
            }

        $connection = null;
    }

?>