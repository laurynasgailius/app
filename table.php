<?php
	//table.php
	//getting our config.php
	$servername = "localhost";
$db_username = "webpr2016";
$db_password = "webpr16";
	
	//create connection
	$mysql = new mysqli("localhost", $db_username, $db_password, "webpr2016_laugai");
	
	//IF THERE IS "?DELETE=ROW_ID" in the url
	if (isset ($_GET["delete"])){
		
		echo "Deleting row with id:".$_GET["delete"];
		
		$stmt=$mysql->prepare("UPDATE messages_sample SET deleted=NOW() WHERE id = ?");
		
		echo $mysql->error;
		
		//replace the "?"
		$stmt->bind_param("i", $_GET["delete"]);
		
		if($stmt->execute()){
			echo "deleted successfully";
		}else{
			echo $stmt->error;
		}
		
		
	}
	
	
		
	$stmt = $mysql->prepare("INSERT INTO bilietai (name, email) VALUES (?,?)");
	
	
	
	//SQL sentence
	$stmt = $mysql->prepare("SELECT id, name, email, created FROM bilietai WHERE deleted IS NULL ORDER BY created LIMIT 5");
	
	//if error in sentence
	echo $mysql->error;
	

	
	//save

	
	$table_html = "";
	$table_html .= "<table>";
	
	//add something to string
	$table_html .= "<tr>";
		$table_html .= "<tr>";
		$table_html .= "<th>ID</th>";
		$table_html .= "<th>Location</th>";
		$table_html .= "<th>Created</th>";
		$table_html .="<th>Deleted</th>";
	$table_html .= "</tr>";
	
	
	//Get Result
	while($stmt->fetch()){
		
		//DO SOMETHING FOR EACH ROW
		//echo $id."".$message."<br>";
		$table_html .= "<tr>"; //start new row
			$table_html .= "<td>".$location."</td>"; //add columns
			$table_html .= "<td>".$time."</td>";
			$table_html .= "<td>".$punishment."</td>";
			$table_html .= "<td>".$name."</td>";
			$table_html .= "<td>".$created."</td>";
			$table_html .= "<td><a href='?delete=".$id."'>x</a></td>";
		$table_html .= "<tr>"; //end row
		
		//echo $id."".$message."<br>";
	
	}
	
		$table_html .= "</table>";
	echo $table_html;
?>

<a href="app.php">APP<a/>