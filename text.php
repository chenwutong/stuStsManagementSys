<?php
include("dbcon.php");
$id = mysqli_query($con,"SELECT MAX(id) from student");
$id =mysqli_fetch_array($id);
$id[0]+=1;
echo $id[0];
?>