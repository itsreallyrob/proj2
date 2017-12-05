
<?php
session_start();

$hostname = "sql2.njit.edu";
$username = "rjc43";
$password = "pxNGdj5c";
$dbname1 = "rjc43";
try {
	    $conn = new mysqli($hostname, $username, $password, $dbname1);


	    	$alex = $_SESSION['id2'];


			$sql = "DELETE FROM todos WHERE id='$alex'";
			mysqli_query($conn, $sql);

			header("Location: welcome.php");
		    exit;

}
catch(PDOException $e)
    {
    	echo "Connection failed: " . $e->getMessage() + "</br>";
    }




?>