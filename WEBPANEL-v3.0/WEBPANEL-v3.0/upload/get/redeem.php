<?php


include '../connect_database.php'; 

    if($_SERVER['REQUEST_METHOD']=='POST'){

       $username = $_POST['username'];
       $points= $_POST['points'];
       $type= $_POST['type'];
       $date= $_POST['date'];
        
$sql = "SELECT points FROM users WHERE login = '$username'";
$result = $connect->query($sql);
$row = $result->fetch_assoc();
//echo $row["points"];

$prev_points = $row["points"];
$now_points = $points;
$total = $prev_points - $now_points;


$sqlmain = "UPDATE users SET points = '$total' WHERE login = '$username'";


  $sqlspend = "insert into track_red(username,points,type,date) values ('$username','$points','$type',CURRENT_DATE())";


$result = $connect->query($sqlmain);
$result2 = $connect->query($sqlspend);

if($result == 1 && $result2 == 1){

echo "1";

}else{

echo "unable to do redeem - contact developer";

}

/**
echo $username;
echo $points;
echo $type;
echo $date;
  **/

 }else{
        echo '404 - Not Found <br/>';
        echo 'the Requested URL is not found on this server ';
    }
?>