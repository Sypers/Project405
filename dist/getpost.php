<?php
header('Content-Type: text/xml');
$con = mysqli_connect('localhost','root','');
if (!$con) {
    die('Could not connect: ' .mysqli_error($con));
}
mysqli_select_db($con, "amn");
$sql = $con->prepare("SELECT * FROM posts where id = ?");
$sql->bind_param("i",$_GET['id']);
$sql->execute();
$result = $sql->get_result();
global $t; global $a; global $d; global $c;

$dom = new DOMDocument();
$dom->formatOutput = true;
$root = $dom->createElement("Post");
$root = $dom->appendChild($root);
$title = $dom->createElement("Title");
$author = $dom->createElement("Author");
$content = $dom->createElement("Content");
$date = $dom->createElement("Date");
while ($row = mysqli_fetch_assoc($result)) {
    $stmt = $con->prepare("UPDATE posts SET clicks = clicks + 1 WHERE id=?");
    $stmt->bind_param("i",$_GET['id']);
    $stmt->execute();
    //echo "<Title>" .$row['title']. "</Title>";
    //echo "<Content>" .$row['content']. "</Content>";
    //echo "<Author>" .$row['author']. "</Author>";
    //echo "<Date>" .$row['date']. "</Date>";
    $t = $row['title'];
    $c = $row['content'];
    $a = $row['author'];
    $d = $row['date'];
}
$title->nodeValue = $t;
$title->setAttribute("id","title");
$root->appendChild($title);
$author->nodeValue = $a;
$author->setAttribute("id","author");
$root->appendChild($author);
$content->nodeValue = $c;
$content->setAttribute("id","content");
$root->appendChild($content);
$date->nodeValue = $d;
$date->setAttribute("id","date");
$root->appendChild($date);
echo $dom->saveXML();
?>