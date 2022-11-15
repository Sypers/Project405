<?php
$con = mysqli_connect('localhost','root','');
if (!$con) {
    die('Could not connect: ' .mysqli_error($con));
}

mysqli_select_db($con, "amn");
$sql = "SELECT * FROM posts";
$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result)) {
    echo "<div class=post-preview>";
    echo "<a href=post.html?id=" . $row['id'] . ">";
    echo "<h2 class=post-title>" . $row['title'] . "</h2>";
    echo "</a>";
    echo "<p class=post-meta>Posted By:" .$row['author']. ", On Date: " .$row['date']. "</p>";
    echo "</div>";
    # Divider
    echo "<hr class=my-4>";
}
$con->close();
?>