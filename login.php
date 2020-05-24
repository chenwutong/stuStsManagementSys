<?php
  
session_start();

if (isset($_SESSION['uid'])) {
    header('location:admin/admindash.php');
}
?>
<html lang="en_US">

<head>
    <meta charset="UTF-8">
    <title> 管理员登陆 </title>

</head>

<body>
    <h1 align="center">管理员登陆</h1><br>
    <form action="login.php" method="post">

        <table align="center">
            <tr>
                <td>用户名</td>
                <td><input type="text" name="uname"></td>
            </tr>
            <tr>
                <td>密码</td>
                <td><input type="password" name="pass"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="login" value="登录"></td>
            </tr>

        </table>

    </form>
</body>

</html>

<?php

include('dbcon.php');

if (isset($_POST['login'])) {

    $username = mysqli_real_escape_string($con, $_POST['uname']);
    $password = mysqli_real_escape_string($con, $_POST['pass']);

    $qry = "SELECT * FROM `admin` WHERE `username` = '$username' AND `password` = '$password'";

    $run = mysqli_query($con, $qry);

    $row = mysqli_num_rows($run);

    if ($row >= 1) {
        $data = mysqli_fetch_assoc($run);
        $id = $data['id'];



        $_SESSION['uid'] = $id;

        header('location:admin/admindash.php');
    } else {
?>
        <script>
            alert('用户名或密码错误');
            window.open('login.php', '_self')
        </script>
<?php
    }
}

?>