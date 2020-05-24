<?php

session_start();
if (isset($_SESSION['uid'])) {
    echo "";
} else {
    header('location: ../login.php');
}

?>
<?php


if (isset($_POST['submit'])) {
    $_POST['submit'] = false;
}

include('header.php');
?>
<div class="admintitle" align="center">
    <h4>
        <a href="admindash.php" style="float:left; margin-right:30px; color:#000; font-size:20px;">返回</a>
        <a href="logout.php" style="float:right; margin-right:30px; color:#000; font-size:20px;">退出登陆</a></h4>
    <h1> 欢迎来到学籍管理系统 </h1>
</div>
<br>
<h1 align="center"> 添加学生信息</h1><br>
<form method="post" action="addstudent.php" enctype="multipart/form-data">

    <table align="center" border="1" style="width:70%; margin-top:40px;">
        <tr>
            <th>学号</th>
            <td><input type="number" name="stuid" placeholder="输入学号" required></td>
        </tr>
        <tr>
            <th>全名</th>
            <td><input type="text" name="name" placeholder="输入全名" required></td>
        </tr>
        <tr>
            <th>所在城市</th>
            <td><input type="text" name="city" placeholder="输入所在城市" required></td>
        </tr>
        <tr>
            <th>父母联系方式</th>
            <td><input type="text" name="pcon" placeholder="输入父母联系电话" required></td>
        </tr>
        <tr>
            <th>入学年级</th>
            <td><input type="number" name="standard" placeholder="输入入学年级" required></td>
        </tr>
        <tr>
            <th>照片</th>
            <td><input type="file" name="simg" required> </td>
        </tr>

        <tr>
            <td colspan="2" align="center"><input type="submit" name="submit" value="确定"></td>
        </tr>
    </table>
</form>

</body>

</html>
<?php
if (isset($_POST['submit'])) {
    $con = mysqli_connect('localhost', 'root', 'qhhmaqjz', 'sms');

    if ($con == false) {
        echo "数据库连接失败";
    }
    $stuid = $_POST['stuid'];
    $name = $_POST['name'];
    $city = $_POST['city'];
    $pcon = $_POST['pcon'];
    $std = $_POST['standard'];
    $imagename = $_FILES['simg']['name'];
    $tempname = $_FILES['simg']['tmp_name'];

    move_uploaded_file($tempname, "../dataimg/$imagename");


    //include("dbcon.php");
    $maxid = mysqli_query($con, "SELECT MAX(id) from student");
    $sid = mysqli_fetch_array($maxid);
    $id = $sid[0] += 1;

    $qry = "INSERT INTO `student`(`id`,`name`, `city`, `pcont`, `standard`, `stuid`,`image`) VALUES ('$id','$name','$city','$pcon','$std','$stuid','$imagename')";

    $run = mysqli_query($con, $qry);

    if ($run == true) {
        echo "<script>alert('数据添加成功');</script>";
    } else {
        echo "<script>alert('数据添加失败');</script>";
    }
}


?>