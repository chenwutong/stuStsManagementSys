<?php

session_start();
if (isset($_SESSION['uid'])) {
    echo "";
} else {
    header('location: ../login.php');
}

?>

<?php
//include('header.php');
?>
<html>

<head>
    <link href="../css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="admintitle" align="center">
        <h4><a href="logout.php" style="float:right; margin-right:30px; color:#000; font-size:20px;">退出登陆</a></h4>
        <h1 align="center"> 欢迎来到学籍管理模块 </h1>

    </div>

    <div class="dashboard">
        <table style="width:50%;" align="center">
            <tr>
                <td> 1.</td>
                <td><a href="addstudent.php">添加学生信息</a></td>
            </tr>
            <tr>
                <td> 2.</td>
                <td><a href="updatestudent.php">修改学生信息</a></td>
            </tr>
            <tr>
                <td> 3.</td>
                <td><a href="deletestudent.php">删除学生信息</a></td>
            </tr>

</body>

</html>