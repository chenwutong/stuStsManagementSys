<?php

function dispInfo($standard, $stuid)
{
    include('dbcon.php');
    $qry = "SELECT * FROM `student` WHERE `stuid`='$stuid' AND `standard`='$standard'";
    $run = mysqli_query($con, $qry);
    if (mysqli_num_rows($run) > 0) {
        $data = mysqli_fetch_assoc($run);
?>
        <table align="center" border="1" style="width:50%; margin-top:40px;">
            <tr>
                <th colspan="3">学生信息</th>
            </tr>
            <tr>
                <td rowspan="5"><img src="dataimg/<?php echo $data['image']; ?>" /></td>
                <th>学号</th>
                <td align="center"><?php echo $data['stuid'] ?></td>

            </tr>
            <tr>
                <th>姓名</th>
                <td align="center"><?php echo $data['name'] ?></td>
            </tr>
            <tr>
                <th>所在城市</th>
                <td align="center"><?php echo $data['city'] ?></td>
            </tr>
            <tr>
                <th>父母联络电话</th>
                <td align="center"><?php echo $data['pcont'] ?> </td>
            </tr>
            <tr>
                <th>年级</th>
                <td align="center"><?php echo $data['standard'] ?> </td>
            </tr>

    <?php
    } else {
        echo "<script>alert('无该学生信息'); </script>";
    }
}


    ?>