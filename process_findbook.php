<?php
session_start();
require_once("connect.php");
if(isset($_GET["Key"]))
{
  $sql = "SELECT * FROM book WHERE Name_Book LIKE '%".$_GET["Key"]."' OR Name_Book LIKE '%".$_GET["Key"]."%' OR Name_Book LIKE '".$_GET["Key"]."%'";
  $qty = $conn->query($sql);
  while($row = $qty->fetch_assoc())
  {
    echo $row["id_Book"]."?";
    echo $row["Name_Book"]."?";
    echo $row["Author_Book"]."?";
    echo $row["Picture"]."?";
    echo $row["qty_Book"]."?";
    echo $row["Publisher"]."|";
  }
}
else {
  header("location: index.php");
}

?>
