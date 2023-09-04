<?php 
  include("../connection.php");
  
   $name = $_POST['name'];
  
   $sql = "SELECT * FROM st_details WHERE `index` LIKE '$name%'";  
   $query = mysqli_query($mysqli,$sql);
   $data='';
   while($row = mysqli_fetch_assoc($query))
   {
       $data .=  "<tr><td>".$row['index']."</td><td>".$row['name']."</td><td>".$row['gpa']."</td></tr>";
   }
    echo $data;
 ?>