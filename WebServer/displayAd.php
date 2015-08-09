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

	   //echo json_encode( $dbreturn );

	   mysqli_close($con);
	}
?>	

<!DOCTYPE html>
<html lang="en">
<head>
  <title>AngelHack 2015 Demo</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

  <style type="text/css">
  	body {
  		background-color: black;
  	}
  </style>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <a href="<?php echo $dbreturn[0]['urlshop']; ?>">
  	<img class="img-responsive" src="<?php echo $dbreturn[0]['urlimage']; ?>" alt="Android Ads">
  </a>
</div>

</body>
</html>