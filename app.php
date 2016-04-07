

  <?php
$user_ip = getenv('REMOTE_ADDR');
$geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
$country = $geo["geoplugin_countryName"];
$city = $geo["geoplugin_city"];

  ?>

<head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>


	<center><div id="ticket">
		<form method="get" action="app.php">
	<label for="full-name"><label>
	<input type="text" name="full-name" placeholder="Full name"><br><br>
	<input type="text" name="email" placeholder="Email"><br><br>
	<!--
	<label for="email">Your Email <label>
	<input type="text" name="email"><br><br>

	<label for="bday">Your Birthday <label>
		<input type="date" name="bday"><br><br>
	
	<input type="radio" name="gender"
<?php if (isset($gender) && $gender=="1stclass") echo "checked";?>
value="1stclass">1st class
<input type="radio" name="gender"
<?php if (isset($gender) && $gender=="economyclass") echo "checked";?>
value="economyclass">Economy class <br><br> -->

	
	<!-- This is the save button-->
	<input type="submit" value="Buy a Ticket" name="submit">

<form>
	</div></center>
	
<div>
</body>

<?php 



  if(empty($_GET["full-name"])){
    
} else {
   echo $_GET["full-name"]."<br>";
}

if(empty($_GET["email"])){
    
} else {
   echo $_GET["email"]."<br>";
}




?>

<?php
$servername = "localhost";
$db_username = "webpr2016";
$db_password = "webpr16";

// Create connection
$conn = new mysqli($servername, $db_username, $db_password, "webpr2016_laugai");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



if(isset($_GET['submit'])){

	$stmt = $conn->prepare("INSERT INTO bilietai (name, email) VALUES (?,?)");


		
		//for each question mark its type with one letter
		$stmt->bind_param("ss", $_GET["full-name"], $_GET["email"]);
	
		
		//save
		if($stmt->execute()){
			
			
		}else{
			echo $stmt->error;
		}


}
?>








