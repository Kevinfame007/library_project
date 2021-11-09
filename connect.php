<?php
$Host = "localhost";
$User = "root";
$Pass = "";
$db   = "library";

$conn = new mysqli($Host,$User,$Pass,$db);
if($conn->connect_error)
{
  die("error");
}
?>
