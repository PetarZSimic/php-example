<?php include "includes/db.php";?>
<?php ob_start();?>
<?php session_start();?>


<?php 
    if(isset($_POST['login'])){       
        $username = $_POST['username'];
        $password = $_POST['password'];    
            
        $username = mysqli_real_escape_string($connection, $username);
        $password = mysqli_real_escape_string($connection, $password);
        
            
        $query = "SELECT * FROM admins WHERE username = '$username'";
        
        $select_admin = mysqli_query($connection,$query);
        $count = mysqli_num_rows($select_admin);    
        
        if($count != 0){    
            while($row = mysqli_fetch_assoc($select_admin)){
                $db_username = $row['username'];
                $db_password = $row['password'];
                $db_firstname = $row['firstname'];
                $db_lastname = $row['lastname'];
                $db_role = $row['role'];
            } 

            if($username===$db_username && $password===$db_password){
                $_SESSION['username'] = $db_username;
                $_SESSION['password'] = $db_password;
                $_SESSION['firstname'] = $db_firstname;
                $_SESSION['lastname'] = $db_lastname;
                $_SESSION['role'] = $db_role;

                header("Location: index.php");
            } else {
                header("Location: index.php");
            }    
        } else{            
            $query = "SELECT * FROM subscriber WHERE username = '$username'";
            $select_sub = mysqli_query($connection,$query);
                
            while($row = mysqli_fetch_assoc($select_sub)){
                $db_username = $row['username'];
                $db_password = $row['password'];
                $db_firstname = $row['firstname'];
                $db_lastname = $row['lastname'];
                $db_role = $row['role'];
                $db_email = $row['email'];
                $db_phone = $row['phoneNumber'];
            } 

            if($username===$db_username && password_verify($password,$db_password)){

                $_SESSION['username'] = $db_username;
                $_SESSION['password'] = $db_password;
                $_SESSION['firstname'] = $db_firstname;
                $_SESSION['lastname'] = $db_lastname;
                $_SESSION['role'] = $db_role;
                $_SESSION['phoneNumber'] = $db_phone;
                $_SESSION['email'] = $db_email;

                header("Location: index.php");
            } else {
                header("Location: index.php");
            } 
        } 
    }
?>








