<?php
session_start();
require_once("connect.php");
if(!empty($_GET["value"]) && isset($_GET["value"]))
{
  $sql = "SELECT * FROM member WHERE Name_Member = '".$_GET["value"]."'";
  $qry = $conn->query($sql);
  $row = $qry->fetch_assoc();
  $sql = "UPDATE list SET isReturn = 1 WHERE id_Member = '".$row["id_Member"]."'";
  $qry = $conn->query($sql);

  if($qry)
  {
    echo "SUCCESS";
  }
  else {
    echo "ERROR";
  }
}
else {
  echo "ERROR";
}
?>
