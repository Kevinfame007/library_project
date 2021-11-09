<?php
session_start();
require_once("connect.php");
date_default_timezone_set("Asia/Bangkok");
if(isset($_GET["Type"]))
{
  if($_GET["Type"] == "day")
  {
    $format = date("Y-m-d");
  }
  else if($_GET["Type"] == "month")
  {
    $format = date("Y-m%");
  }
  else if($_GET["Type"] == "year")
  {
    $format = date("Y%");
  }
  $sql = "SELECT * FROM list WHERE Borrow_Date LIKE '".$format."'";
  $qry = $conn->query($sql);
  while(  $row = $qry->fetch_assoc())
  {
    $sql = "SELECT * FROM librarian WHERE id_Librarian = '".$row["id_Librarian"]."'";
    $qry_Lib = $conn->query($sql);
    $row_Lib = $qry_Lib->fetch_assoc();

    $sql = "SELECT * FROM member WHERE id_Member ='".$row["id_Member"]."'";
    $qry_Mem = $conn->query($sql);
    $row_Mem = $qry_Mem->fetch_assoc();

    $sql = "SELECT * FROM book WHERE id_Book = '".$row["id_Book"]."'";
    $qry_Book = $conn->query($sql);
    $row_Book = $qry_Book->fetch_assoc();

    echo $row_Mem["Name_Member"]." ".$row_Mem["Lastname_Member"]."?";
    echo $row_Book["Name_Book"]."?";
    echo $row_Lib["Name_Librarian"]." ".$row_Lib["Lastname_Librarian"]."?";

    echo $row["Borrow_Date"]."?";
    echo $row["Return_Date"]."?";

    if($row["isReturn"])
    {
      echo "คืนแล้ว"."|";
    }
    else {
      echo "ยังไม่คืน"."|";
    }
  }
}
else {
  header("location: index.php");
}
?>
