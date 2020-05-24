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
include('../dbcon.php');

$id = $_GET['id'];

$sql = "SELECT * FROM `student` WHERE `id` = '$id'";
$run = mysqli_query($con, $sql);

$data = mysqli_fetch_assoc($run);

?>
<div class="admintitle" align="center">
    <h4>
        <a href="admindash.php" style="float:left; margin-right:30px; color:#000; font-size:20px;">返回</a>
        <a href="logout.php" style="float:right; margin-right:30px; color:#000; font-size:20px;">退出登陆</a></h4>
    <h1> 欢迎来到学籍管理系统 </h1>
</div>
<h1 align="center">学生信息修改</h1>
<form method="post" action="updatedata.php" enctype="multipart/form-data">

    <table align="center" border="1" style="width:40%; margin-top:40px;">
        <tr>
            <th>学号</th>
            <td><input type="text" name="stuid" value=<?php echo $data['stuid'] ?> required></td>
        </tr>
        <tr>
            <th>姓名</th>
            <td><input type="text" name="name" value=<?php echo $data['name'] ?> required></td>
        </tr>
        <tr>
            <th>所在城市</th>
            <td><input type="text" name="city" value=<?php echo $data['city'] ?> required></td>
        </tr>
        <tr>
            <th>父母联系方式</th>
            <td><input type="text" name="pcon" value=<?php echo $data['pcont'] ?> required></td>
        </tr>
        <tr>
            <th>年级</th>
            <td><input type="number" name="standard" value=<?php echo $data['standard'] ?> required></td>
        </tr>
        <tr>
            <th>照片</th>
            <td><input type="file" name="simg" required> </td>
        </tr>

        <tr>
            <td colspan="2" align="center">
                <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
                <input type="submit" name="submit" value="确定"></td>
        </tr>
    </table>
</form>