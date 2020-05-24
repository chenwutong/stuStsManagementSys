<?php

$con = mysqli_connect('localhost', 'root', 'qhhmaqjz', 'sms');

if ($con == false) {
    echo "数据库连接成功";
}
$stuid = $_POST['stuid'];
$name = $_POST['name'];
$city = $_POST['city'];
$pcon = $_POST['pcon'];
$std = $_POST['standard'];
$imagename = $_FILES['simg']['name'];
$tempname = $_FILES['simg']['tmp_name'];
$id = $_POST['id'];
move_uploaded_file($tempname, "../dataimg/$imagename");

$qry = "UPDATE `student` SET `name` = '$name', `city` = '$city', `pcont` = '$pcon', `standard` = '$std', `stuid` = '$stuid', `image` = '$imagename' WHERE `id` = '$id'";

$run = mysqli_query($con, $qry);

if ($run == true) {
?>
    <script>
        alert('数据更新成功');
        window.open('updateform.php?id=<?php echo $id; ?>', 'self');
    </script>
<?php
} else {
    echo "<script>alert('数据更新失败');</script>";
}

?>