<?php
session_start();
require_once("connect.php");
date_default_timezone_set("Asia/Bangkok");
if(isset($_GET["username"]) && isset($_GET["password"]))
{
  $sql = "SELECT * FROM librarian WHERE Username = '".$_GET["username"]."' AND Password = '".$_GET["password"]."'";
  $qry = $conn->query($sql);
  $row = $qry->fetch_assoc();
  if($row)
  {
    if($row["is_Login"] == 0)
    {
      $sql = "UPDATE librarian SET is_Login = 1,Last_Event = NOW() WHERE id_Librarian = '".$row["id_Librarian"]."'";
      $conn->query($sql);
      $_SESSION["id_Lib"] = $row["id_Librarian"];
      $_SESSION["username"] = $row["Username"];
      $_SESSION["Name_Librarian"] = $row["Name_Librarian"];
      $_SESSION["Lastname_Librarian"] = $row["Lastname_Librarian"];
      $_SESSION["status"] = "Login";
      echo "Login_Success|";
      echo $_SESSION["Name_Librarian"]." ".$_SESSION["Lastname_Librarian"];
    }
    else {

      $StartDate = new DateTime();
		  $StartDate = $StartDate->format('Y-m-d H:i:s');

      $EndDate = new DateTime($row["Last_Event"]);
      $EndDate->add(new DateInterval('PT5M'));
		  $EndDate = $EndDate->format('Y-m-d H:i:s');

      if($EndDate <= $StartDate)
  		{
  			//echo "OVER_TIME_LOGIN|";
        $sql = "UPDATE librarian SET Last_Event = NOW() WHERE id_Librarian = '".$row["id_Librarian"]."'";
        $conn->query($sql);
        $_SESSION["id_Lib"] = $row["id_Librarian"];
        $_SESSION["username"] = $row["Username"];
        $_SESSION["Name_Librarian"] = $row["Name_Librarian"];
        $_SESSION["Lastname_Librarian"] = $row["Lastname_Librarian"];
        $_SESSION["status"] = "Login";
        echo "Login_Success|";
        echo $_SESSION["Name_Librarian"]." ".$_SESSION["Lastname_Librarian"];
  			return;
  		}
      else {
          echo "Login_Already|";
      }
    }
  }
}
else {
  header("location: index.php");
}
?>
