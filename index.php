<html>

<head>
    <title>学籍管理系统</title>
</head>

<body>

    <h3 align="right"><a href="login.php">管理员登陆</a></h3>
    <h1 align="center">学籍管理程序</h1>

    <form method="post" action="index.php">
        <table style="width:50%;" align="center" border="1">
            <tr>
                <td colspan="2" align="center">学生信息</td>
            </tr>
            <tr>
                <td align="center">选择年级</td>
                <td>
                    <select name="std">
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td align="center">输入学号</td>
                <td><input type="text" name="stuid"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="submit" value="查询信息"></td>
            </tr>
        </table>
    </form>

</body>

</html>
<?php

if (isset($_POST['submit'])) {
    $standard = $_POST['std'];
    $stuid = $_POST['stuid'];
    include('dbcon.php');
    include('function.php');
    dispInfo($standard, $stuid);
}

?>