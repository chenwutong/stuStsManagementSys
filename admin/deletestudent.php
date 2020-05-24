<?php
session_start();
if (isset($_SESSION['uid'])) {
    echo "";
} else {
    header('location: ../login.php');
}

?>

<?php
include('header.php');
//include('titleheader.php');

?>
<div class="admintitle" align="center">
    <h4>
        <a href="admindash.php" style="float:left; margin-right:30px; color:#000; font-size:20px;">返回</a>
        <a href="logout.php" style="float:right; margin-right:30px; color:#000; font-size:20px;">退出登陆</a></h4>
    <h1> 欢迎来到学籍管理系统 </h1>
</div>
<h1 align="center">删除学生信息</h1>
<table align="center">
    <form action="deletestudent.php" method="post">
        <tr>
            <th>
                年级
            </th>
            <td>
                <input type="number" name="standard" placeholder="输入年级" required="required" />
            </td>

            <th>
                学生姓名
            </th>
            <td>
                <input type="text" name="stuname" placeholder="输入学生姓名" required="required" />
            </td>

            <td colspan="2"><input type="submit" name="submit" value="搜索" /></td>
        </tr>
    </form>
</table>
<br>

<table align="center" width="80%" border="1" style:"margin-top:10px;">
    <tr style="background-color:#000; color:#fff; ">
        <th>编号</th>
        <th>照片</th>
        <th>姓名</th>
        <th>学号</th>
        <th>操作</th>
    </tr>

    <?php

    if (isset($_POST['submit'])) {
        include('../dbcon.php');

        $standard = $_POST['standard'];
        $name = $_POST['stuname'];

        $sql = "SELECT * FROM `student` WHERE `standard`='$standard' AND `name`LIKE '%$name%' ORDER BY `id` ASC"; //顺序查找

        $run = mysqli_query($con, $sql);

        if (mysqli_num_rows($run) < 1) {
            echo "<tr><td colspan='5'>没有找到任何记录</td></tr>";
        } else {
            $count = 0;
            while ($data = mysqli_fetch_assoc($run)) {
                $count++;
    ?>
                <tr align="center">
                    <td><?php echo $data['id']; ?></td>
                    <td><img src="../dataimg/<?php echo $data['image']; ?>" style="max-width:100px;" /> </td>
                    <td><?php echo $data['name']; ?></td>
                    <td><?php echo $data['stuid']; ?></td>
                    <td><a href="deleteform.php?id=<?php echo $data['id']; ?>">删除</a></td>
                </tr>

    <?php
            }
        }
    }
    ?>

</table>