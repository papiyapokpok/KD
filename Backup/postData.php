<?php
 $dbservername = "localhost";
 $dbusername = "root";
 $dbpassword = "";
 $dbname = "GuestWifi";
 $con = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname) ;
 //
 // $sex = $_POST["sex"];
 // $fname = $_POST["fname"];
 // $lname = $_POST["lname"];
 // $card = $_POST["card"];
 // $address = $_POST["address"];
 // $tel = $_POST["tel"];
 // $email = $_POST["email"];
//
//  select * from wifi where status = 'N' limit 1
//  //$data
//  $data = array(
//    array(
//      '1' => 'ACB',
//    ),
//    array(
//      '2' => 'BCD',
//    ),
//  );
//
// foreach ($data as $key => $value) {

$sql = "SELECT * from guest where status = 'n' limit 1 " ;
$result = $con->query($sql);

$dataG = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $dataG['id'] = $row['id'];
      $dataG['pass'] = $row['pass'];
    }
}

 $username = $_POST["name"];
 $email = $_POST["email"];
 $tel = $_POST["tel"];
 $company = $_POST["company"];

 $sql = "INSERT INTO logwifi (username, email, tel, company, id, password)
         VALUES ('".$username."', '".$email."', '".$tel."', '".$company."', '".$dataG['id']."', '".$dataG['pass']."')";

 $sqlUpdate = "UPDATE guest SET status = 'u' where id='".$dataG['id']."' ";
 $con->query($sqlUpdate);
 // echo $sqlUpdate;
 if ($con->query($sqlUpdate) === TRUE) {
    // echo "Record updated successfully";
} else {
    // echo "Error updating record: " . $con->error;
}

 if ($con->query($sql)) {
   echo json_encode($dataG);
 } else {
   echo "error" . $sql . "<br>" . $con->error;
 }
 $con->close();
  ?>
