<?php
session_start();
require_once("connect.php");
if(!empty($_GET["NameLib"]) && !empty($_GET["LastnameLib"]) && !empty($_GET["User"]) && !empty($_GET["Pass"])
&& isset($_GET["NameLib"]) && isset($_GET["LastnameLib"]) && isset($_GET["User"]) && isset($_GET["Pass"]))
{
  $sql = "SELECT * FROM librarian WHERE Username = '".$_GET["User"]."'";
  $qry = $conn->query($sql);
  $row = $qry->fetch_assoc();
  if(!$row)
  {
    $sql = "INSERT INTO librarian VALUES(null,'".$_GET["NameLib"]."','".$_GET["LastnameLib"]."','".$_GET["User"]."','".$_GET["Pass"]."',0,NOW())";
    $qty = $conn->query($sql);
    if($qty)
    {
      echo "SUCCESS";
    }
  }
  else {
    echo "ERROR";
  }
}
else {
  echo "ERROR";
}
?>
