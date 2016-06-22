<?php  
$con=mysqli_connect("mysql.hostinger.kr","u209793501_skins","dudgus347@","u209793501_db");  

if (mysqli_connect_errno($con))  
{  
   echo "Failed to connect to MySQL: " . mysqli_connect_error();  
}  
  
  
   
$res = mysqli_query($con,"select * from bus1 union select * from bus2 union select * from bus3 union select * from bus4");  
   
$result = array();  
   
while($row = mysqli_fetch_array($res)){  
  array_push($result,  
    array('last'=>$row[1],'current'=>$row[2],'date'=>$row[3],'seat'=>$row[4] ,'dest'=>$row[5] 
    ));  
}  
   
echo json_encode(array("result"=>$result));  
   
mysqli_close($con);    
?>  