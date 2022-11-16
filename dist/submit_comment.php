<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$con = mysqli_connect('localhost','root','');
if (!$con) {
    die('Could not connect: ' .mysqli_error($con));
}
mysqli_select_db($con, "amn");
$sql = $con->prepare("INSERT INTO comments (postid, name, content) VALUES (?,?,?)");
$sql->bind_param("iss",$_POST['postid'], $_POST['name'], $_POST['comment']);
$sql->execute();
$con->close();
?>