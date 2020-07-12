<?php
$username = $_POST['username'];
$email = $_POST['email'];
$rating = $_POST['rating'];
$review = $_POST['review'];
$movieid = $_POST['movieid'];

if(!empty($username)|| !empty($email)|| !empty($rating) || !empty($review) || !empty($reviewid) || !empty($movieid)){
  $host ="localhost";
  $dbUsername ="root";
  $dbPassword ="";
  $dbname ="reviews";

  //create fann_get_total_connections
  $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
  if(mysqli_connect_error()){
    die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
  }else {
    $sql ="INSERT Into reviews(username,email,rating,review,movieid) values('".$username."','".$email."','".$rating."','".$review."','".$movieid."') ";

    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
  }

}else {
  echo "All field are Required";
  die();
}

?>
<html>
<body>
  <button onclick="goBack()">Return</button>

  <script>
  function goBack() {
    window.history.back();
  }
  </script>
</body>
</html>
