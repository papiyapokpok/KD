<?php
    $dbservername = "localhost" ;
    $dbusername = "root" ;
    $dbpassword = "";
    $dbname = "GuestWifi" ;
    $Connect = mysqli_connect ($dbservername, $dbusername, $dbpassword, $dbname) ;
    if ($Connect){
          mysql_select_db($dbname);
          mysql_query("SET NAME UTF8");
          echo "Mydatabase is name $dbname";
    }else {
      echo "Fuck";
    }

 ?>
