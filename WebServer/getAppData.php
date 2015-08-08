<?php
	//header('Content-type: application/json');

	require_once('connectDB.php'); 
	
	if(isset($_GET['appid'])) {
		$con=mysqli_connect($mysql_host, $mysql_user, $mysql_password, $mysql_database);

		$appid = $_GET['appid'];
		
		// Check connection
		if (mysqli_connect_errno()) {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

		$sql = "SELECT * FROM wrapper_main WHERE appid = $appid";
		$result = mysqli_query($con, $sql);

		$dbreturn;
		$ctr = 0;
		while($row = mysqli_fetch_array($result)) {
			  $dbreturn[$ctr]['appid'] = $row['appid'];
			  $dbreturn[$ctr]['name'] = $row['name'];
			  $dbreturn[$ctr]['urlimage'] = $row['urlimage'];
			  $dbreturn[$ctr]['urlshop'] = $row['urlshop'];

			  $ctr = $ctr + 1;
		}

	   echo json_encode( $dbreturn );

	   mysqli_close($con);
	}
		
?>	




















































