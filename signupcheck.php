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

                }

      
        

        try {
            
        
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $connection->prepare('SELECT * FROM users WHERE Email = :email');
            $stmt->execute(['email' => $Email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if($user != Null){
                $_SESSION['error'] ="Email already exists, please use other email.";
                   
                header("location: ../usersignup.php"); 
                exit();
            } else if($PassAgain != $Pass) {
                $_SESSION['error'] ="Password does not Match";
                   
                header("location: ../usersignup.php"); 
                exit();
            }

            else{
                $sql = $connection->prepare("INSERT INTO users (Name,Enroll,Email,Password) VALUES (:name,:enroll,:email,:pass)");
                $cmd = $sql->execute(['name' => $Name , 'enroll' => $Enroll, 'email' => $Email,'pass' => $Pass]);

                if($cmd){
                    $_SESSION['success'] ="Succesfully Registered , You can login now";
                   
                    header("location: ../usersignup.php"); 
                    exit();
                    
                }
                  
                else{
                    $_SESSION['error'] ="Something went wrong, please try again.";
                   
                    header("location: ../usersignup.php"); 
                    exit();
                    
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