<?php
$con = mysqli_connect('localhost','root','');
if (!$con) {
    die('Could not connect: ' .mysqli_error($con));
}
$clause = "%".$_GET['q']."%";
mysqli_select_db($con, "amn");
$sql = $con->prepare("SELECT id,title FROM posts WHERE title LIKE ?");
$sql->bind_param("s",$clause);
$sql->execute();
$result = $sql->get_result();

if(mysqli_num_rows($result) > 0){
    while ($row = mysqli_fetch_assoc($result)) {
        //echo "<p>".$row['title']."</p>";
        echo "<a href=post.html?id=".$row['id'].">".$row['title']."</a><br>";
    }
} else {
    echo "<p>No matches found</p>";
}
?>