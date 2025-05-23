<?php
include('../config/database.php');

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1" align="center">
        <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>E_mail</th>
            <th>Status</th>
            <th>Photo</th>
            <td>...</td>
        </tr>
        
        <?php
        //Here Code
        $sql="select firstname, lastname, email, case when status = true then 'Active' else 'no active' end as status
	    from users";
        $res = pg_query($conn, $sql);
        if(!$res){
            echo "Query error";
            exit;
        }
        while($row = pg_fetch_ASSOC($res) ){
            echo "<tr>";
            echo "<td>".$row['firstname']."</td>";
            echo "<td>".$row['lastname']."</td>";
            echo "<td>".$row['email']."</td>";
            echo "<td>".$row['status']."</td>";
            echo "<td align='center' ><img src='photo_users/photo_default.png' width='30'></td>";
            echo "<td>";
            echo "<a href=''><img src='icons/usuario.png' width='20'></a>";
            echo "<a href='http://127.0.0.1//schoolar/src/delete.php'><img src='icons/delete.png' width='25'></a>";
            echo "<a href=''><img src='icons/search.png' width='20'></a>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
            

    </table>
    
</body>
</html>