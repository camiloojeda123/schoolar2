<?php

    include('../config/database.php');
    $fname  = $_POST['f_name'];
    $lname  = $_POST['l_name'];
    $email  = $_POST['e_mail'];
    $passwd = $_POST['passw'];

    $enc_pass= sha1($passwd);
    $sql_email_exist = "SELECT COUNT(email) as total FROM users WHERE email = '$email' LIMIT 1 " ;
    $res = pg_query($conn,$sql_email_exist);

    if($res){
        $row = pg_fetch_assoc($res);
        if($row['total']>0){
            echo " Email already exist";
            header('Refresh: 0; URL=http://localhost/schoolar/src/signin.html');
        }else{
            $sql = "INSERT INTO users (firstname, lastname, email, password)
            VALUES('$fname','$lname','$email','$enc_pass')";      

    $res = pg_query($conn, $sql);

    if($res){
        
        echo "<script>alert('Use has been created. Go to login!')";
        header('Refresh: 0; URL=http://localhost/schoolar/src/signin.html');
        
    }else{
        echo "Error";
    }
        }

    }
              
?>