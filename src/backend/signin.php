<?php
include('../../config/database.php');

$email = $_POST['e_mail'];
$passw = $_POST['p_sswd'];

$sql = "
SELECT
id,
email,
   password
FROM
   users
WHERE
    email = '$email' and
	password = '$passw' and
status = true
GROUP BY
id;
";
$res = pg_query($conn, $sql_email_exist);
if($res){
  $row = pg_fetch_assoc($res);
  if($row['total']>0){
    echo "Login ok";
  }else{
    echo"login failed";
  }
}
?>