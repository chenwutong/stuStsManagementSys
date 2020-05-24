<?php

include('../dbcon.php');

$id = $_REQUEST['id'];
$qry = "DELETE FROM `student` WHERE `id` = '$id'";
$run = mysqli_query($con, $qry);
if ($run == true) {
?>
    <script>
        alert('学生信息删除成功');
        window.open('deletestudent.php', 'self');
    </script>
<?php
}

?>