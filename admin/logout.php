<!-- <script>
window.open('login.php','_self');
</script> -->

<?php
echo "<script>alert('无该学生信息'); </script>"
?>
<?php

session_start();
session_destroy();
header('location:../index.php');

?>