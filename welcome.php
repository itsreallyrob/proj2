<?php
session_start();

$hostname = "sql2.njit.edu";
$username = "rjc43";
$password = "pxNGdj5c";
$dbname1 = "rjc43";

$useremail = $_SESSION['email'];

?>


<!doctype html>
<html>
<head>
	<title>To Do List</title>
	<link href="style.css" type="text/css" rel="stylesheet" />
</head>



<body>
	
	<div class="content">
		<div class="top_block top_side">
			<div class="content" >


				<P class="titlep">To Do List</P>

			</div>
		</div>
		<div class="background middle">
		</div>
		<div class="middle">
			<div class="contentbody">

				</br></br>
 
				<?php echo "Hello " . $_SESSION["fname"] . " " . $_SESSION["lname"] . ".<br>"; ?>

				<form action="newtask.php">
					<br>
					<button type="signin" class="button2" name="taskbutton">New Item</button>      <br><br><br>
				</form>

				<?php


					try 
					{
						$conn = new mysqli($hostname, $username, $password, $dbname1);


						// $sql = "SELECT id, fname, lname, email, password, phone, birthday, gender FROM accounts WHERE email = '$useremail'";
						// $result = $conn->query($sql);

						// if ($result->num_rows > 0) 
				  //     	{
				  		
				  //       	while($row = $result->fetch_assoc()) {
				  //       		$userid = $row['id'];   
				  //       	}
						// }

						$sql2 = "SELECT id, owneremail, ownerid, createddate, duedate, message, isdone FROM todos WHERE owneremail = '$useremail'";
						$result = $conn->query($sql2);

						$completed = [];
						$notcompleted = [];

						if ($result->num_rows > 0) 
				      	{
				  		
				        	while($row = $result->fetch_assoc()) {
				        		$createddate = $row['createddate'];
				        		$duedate = $row['duedate'];  
				        		$message = $row['message'];  
				        		$isdone = $row['isdone'];  
				        		$id = $row['id'];  

				        		//echo $message . " " . $duedate . " " . $isdone . "<br>";

				        		$newarray = [$message, $duedate];

				        		if($isdone == 0)
				        		{
				        			$notcompleted[$id] = $newarray;
				        		}
				        		else
				        		{
				        			$completed[$id] = $newarray;
				        		}


				        	}



				        	echo '<form method="POST" action="buttons.php">';

				        	echo "Incomplete Tasks <br>";
							echo '<table align="center" border="2">';
				        	foreach($notcompleted as $x => $x_value) {
				        		echo "<tr>";
							    echo "<td>" . $x_value[0] . "</td> <td>" . $x_value[1] . "</td>";
							    echo "<td>" . '<button type="submit" class="button3" name="donebut" value="' . $x . '">Done</button>' . "</td>";
							    echo "<td>" . '<button type="submit" class="button3" name="delbut" value="' . $x . '">Del</button>' . "</td>";
							    echo "<td>" . '<button type="submit" class="button3" name="editbut" value="' . $x . '">Edit</button>' . "</td>";
							    echo "</tr>";
							}
							echo "</table>";
				        	echo "<br> Completed Tasks: <br>";
				        	echo '<table align="center" border="2">';
				        	foreach($completed as $x => $x_value) {
				        		echo "<tr>";
							    echo "<td>" . $x_value[0] . "</td> <td>" . $x_value[1] . "</td>";
							    echo "<td>" . '<button type="submit" class="button3" name="delbut" value="' . $x . '">Del</button>' . "</td>";
							    echo "</tr>";
							}
							echo "</table>";
							echo '</form>';







						}
						else
						{

						}



					}
					catch(PDOException $e)
					    {
					    	echo "Connection failed: " . $e->getMessage() + "</br>";
					    }


					$conn = null;



				?>



				<br><br>
				<form action="index.php">
					<button type="signin" class="button">Sign Out</button>      <br><br><br>
				</form>

			</div>
		</div>
	</div>

</body>
</html>
