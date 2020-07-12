<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reviews";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT username,rating,review FROM reviews where movieid='movie5'";
$result = $conn->query($sql);
$res = [];
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    array_push($res,$row["username"]);
    array_push($res,$row["rating"]);
    array_push($res,$row["review"]);
  }
}
$conn->close();
?>


<!DOCTYPE html>
<html>
<head>
  <title>Daily Review</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
  body {
    margin: 0;
    background: #333333;
  }

  .topnav {
    overflow: hidden;
    background-color: #000000;
    margin: auto;
    width: 100%;
  }

  .topnav a {
    float: left;
    display: block;
    color: #f2f2f2;
    text-align: center;
    padding: 1% 5%;
    text-decoration: none;
    font-size: 28px;
    font-family: "Arial", Sans-serif;
  }

  .topnav a:hover {
    background-color: #ddd;
    color: black;
  }

  .topnav a.active {
    background-color: #ff3333;
    color: white;
  }

  .topnav .icon {
    display: none;
  }

  @media screen and (max-width: 900px) {
    .topnav a:not(:first-child) {display: none;}
    .topnav a.icon {
      float: right;
      display: block;
    }
  }

  @media screen and (max-width: 900px) {
    .topnav.responsive {position: relative;}
    .topnav.responsive .icon {
      position: absolute;
      right: 0;
      top: 0;
    }
    .topnav.responsive a {
      float: none;
      display: block;
      text-align: left;
    }
  }
  * {
    box-sizing: border-box;
  }
  .logo img:hover {
    animation: shake 0.5s;
    animation-iteration-count: infinite;
  }
  @keyframes shake {
    0% { transform: translate(1px, 1px) rotate(0deg); }
    10% { transform: translate(-1px, -2px) rotate(-1deg); }
    20% { transform: translate(-3px, 0px) rotate(1deg); }
    30% { transform: translate(3px, 2px) rotate(0deg); }
    40% { transform: translate(1px, -1px) rotate(1deg); }
    50% { transform: translate(-1px, 2px) rotate(-1deg); }
    60% { transform: translate(-3px, 1px) rotate(0deg); }
    70% { transform: translate(3px, 1px) rotate(-1deg); }
    80% { transform: translate(-1px, -1px) rotate(1deg); }
    90% { transform: translate(1px, 2px) rotate(0deg); }
    100% { transform: translate(1px, -2px) rotate(-1deg); }
  }
  .logo img {
    display: block;
    margin-left: auto;
    margin-right: auto;
  }



  /* Better box-sizing */
  * { box-sizing: border-box; }

  /* 1rem = 10px */
  html { font-size: 62.5%; }

  /* Default body */
  body {
    margin: 0;
    opacity: 0;
    font: 1.6rem/1.875 'Avenir Next', sans-serif;
  }

  /* Loaded body */
  body.loaded {
    opacity: 1;
    transition: 1s opacity;
  }

  /* Default banner */
  .banner {
    position: relative;
    width: 100%;
    height: 40rem;
    padding: 0 5%;
    overflow: hidden;
    backface-visibility: hidden;
  }

  /* Default image container */
  .banner .background {
    width: 100%;
    height: 100%;
    position: absolute;
    left: 0;
    top: 0;
    z-index: -1;
    transform: translate3d(0,0,0) scale(1.25);
    background: black url(../images/mov5.jpg) no-repeat center center;
    background-size: cover;
  }

  /* Loaded image container */
  .loaded .banner .background {
    transform: scale(1);
    transition: 6.5s transform;
  }


  main {
    width: 90%;
    margin: 5rem auto;
  }

  main p { margin: 0 0 3rem 0; }



  .info_table table {
    border-collapse: collapse;
    width: 100%;
    color: #ffffff;
  }

  .info_table th, td {
    text-align: left;
    padding: 8px;
  }



  input[type=text], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
  }
  input[type=email], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
  }
  input[type=submit] {
    background-color: #cc0000;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }
  input[type=submit]:hover {
    background-color: #b30000;
  }
  .container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
  }
  .checked {
    color: orange;
  }


</style>
</head>
<body>
  <div style="background-color:black" class="logo">
    <img src="../images/logo.png" height=100px width=100px style="display:block;class ">
  </div>
  <div class="topnav" id="myTopnav" >
    <a href="../homepage.html">Home</a>
    <a href="../movies.html" class="active">Movies</a>
    <a href="../tvshows.html">TV Shows</a>
    <a href="../toprated.html">Top Rated</a>
    <a href="../genre.html">Genre</a>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
      <i class="fa fa-bars"></i>
    </a>
  </div>

  <header class="banner">
    <span class="background"></span>

  </header>

  <!-- Other stuff -->
  <main>
    <article>
      <h1 style="color:#ffffff;">Shutter Island</h1>
      <div style="margin:7%">
        <table class="info_table" style="color:#ffffff;">
          <tr>
            <th>Synopsis:</th>
            <td>Teddy Daniels and Chuck Aule, two US marshals, are sent to an asylum on a remote island in order to investigate the disappearance of a patient, but Teddy uncovers a shocking truth about the place.</td>
          </tr>
          <tr>
            <th>Release Date:</th>
            <td>04 June 2010 (India)</td>
          </tr>
          <tr>
            <th>Director:</th>
            <td>Martin Scorsese</td>
          </tr>
          <tr>
            <th>Budget:</th>
            <td>29.48 crores USD</td>
          </tr>
          <tr>
            <th>Music director:</th>
            <td>Robbie Robertson</td>
          </tr>
          <tr>
            <th>Rating:</th>
            <td><span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star"></span></td>
            </tr>
          </table>
        </div>
        <div style="margin: 0% auto 0% 27%;">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/qdPw9x9h5CY" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <div class="container" style="margin:10%">
          <table id='review-con1' style="padding:15px;"></table>
          <table id='review-con2' style="padding:15px;"></table>
          <table id='review-con3' style="padding:15px;"></table>

        </div>
      </div>
      <div class="container" style="margin:10%">
        <form action="../insert.php" method="post">

          <label for="username">Username</label>
          <input type="text" id="username" name="username" placeholder="Your Username..">

          <label for="email">Email-ID</label>
          <input type="email" id="email" name="email" placeholder="Your email..">

          <label for="rating">Star Rating</label>
          <select id="rating" name="rating">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>

          <label for="review">Review</label>
          <textarea id="review" name="review" placeholder="Write your review.." style="height:200px"></textarea>
          <input type='hidden' value='movie5' name='movieid' >
          <input type="submit" value="Submit">

        </form>
      </div>
    </article>
  </main>

  <script>
  var res = <?php echo(json_encode($res)); ?>;
  var table = document.getElementById("review-con");
  var i = 0;

  document.addEventListener("DOMContentLoaded", function(event) {
    document.getElementById("review-con1").innerHTML = '<tr><td>'+res[0]+'</td><td>Rating:'+res[1]+'/5</td></tr><tr><td colspan="2">'+res[2]+'</td></tr>';
    document.getElementById("review-con2").innerHTML = '<tr><td>'+res[3]+'</td><td>Rating:'+res[4]+'/5</td></tr><tr><td colspan="2">'+res[5]+'</td></tr>';
    document.getElementById("review-con3").innerHTML = '<tr><td>'+res[6]+'</td><td>Rating:'+res[7]+'/5</td></tr><tr><td colspan="2">'+res[8]+'</td></tr>';
  });

  function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
      x.className += " responsive";
    } else {
      x.className = "topnav";
    }
  }

  // Trigger class name on load
  window.onload = function() {
    document.body.className += ' loaded'
  };


</script>

</body>
</html>
