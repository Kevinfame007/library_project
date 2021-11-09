<?php
session_start();
require_once("connect.php");

if(isset($_SESSION["username"]) && isset($_GET["key"]))
{
  if($_GET["key"] == "book")
  {
    $sql = "SELECT * FROM book";
    $qty = $conn->query($sql);

    while($row = $qty->fetch_assoc())
    {
      echo $row["Name_Book"]."|";
    }
  }
  else if($_GET["key"] == "person")
  {
    $sql = "SELECT * FROM member";
    $qty = $conn->query($sql);

    while($row = $qty->fetch_assoc())
    {
      echo $row["Name_Member"]." ".$row["Lastname_Member"]."|";
    }
  }
}
else {
  header("location: index.php");
}

?>
