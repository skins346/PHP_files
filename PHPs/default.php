<?php  

$con=mysqli_connect("mysql.hostinger.kr","u209793501_skins","dudgus347@","u209793501_db");  
  

if (mysqli_connect_errno($con))  
{  
   echo "Failed to connect to MySQL: " . mysqli_connect_error();  
}  

$date = $_POST['date'];  
$last = $_POST['last'];  
$current = $_POST['current'];  
$bus_id = $_POST['bus_id'];
$seat = $_POST['seat'];
$dest = $_POST['dest'];


if ($bus_id == 1) {
  $result =  mysqli_query($con,"delete from bus1"); 
  $result2 = mysqli_query($con,"insert into bus1 (last, current, date, seat, dest) values ('$last','$current','$date','$seat','$dest')");
  $result3 = mysqli_query($con,"insert into Data (last, current, date) values ('$last','$current','$date')");

} 

else if ($bus_id == 2) {
  $result =  mysqli_query($con,"delete from bus2");  
  $result2 = mysqli_query($con,"insert into bus2 (last, current, date, seat, dest) values ('$last','$current','$date','$seat','$dest')");
  $result3 = mysqli_query($con,"insert into Data (last, current, date) values ('$last','$current','$date')");

}
else if ($bus_id == 3) {
  $result =  mysqli_query($con,"delete from bus3");  
  $result2 = mysqli_query($con,"insert into bus3 (last, current, date, seat, dest) values ('$last','$current','$date','$seat','$dest')");
  $result3 = mysqli_query($con,"insert into Data (last, current, date) values ('$last','$current','$date')");

}
else if ($bus_id == 4) {
  $result =  mysqli_query($con,"delete from bus4");  
  $result2 = mysqli_query($con,"insert into bus4 (last, current, date, seat, dest) values ('$last','$current','$date','$seat','$dest')");
  $result3 = mysqli_query($con,"insert into Data (last, current, date) values ('$last','$current','$date')");

}
else
  echo "ID error!"; 

mysqli_close($con);  
?>  