<?php
session_start();

$hostname = "sql2.njit.edu";
$username = "rjc43";
$password = "pxNGdj5c";
$dbname1 = "rjc43";
try {
	    $conn = new mysqli($hostname, $username, $password, $dbname1);

	    //Delete
		if(isset($_POST['delbut']))
		{ 
			$_SESSION['id2']=$_POST['delbut'];
			echo "Delete " . $_POST['delbut'];
			header("Location: deltask.php");
		    exit;
			
		}

		//Edit
		else if(isset($_POST['editbut']))
		{ 


			$_SESSION['id2']=$_POST['editbut'];

			$newid=$_POST['editbut'];

			$sql1 = "SELECT id, owneremail, ownerid, createddate, duedate, message, isdone FROM todos WHERE id ='$newid'";
			$result = $conn->query($sql1);

			if ($result->num_rows > 0) 
	      	{
	  		  

		        while($row = $result->fetch_assoc()) {

		        	
		        	$_SESSION['duedate'] = $row['duedate'];    
		        	$_SESSION['message'] = $row['message'];    

		          
		        }

		        header("Location: edittask.php");
		        exit;


			  		
			  } 
	  		else 
	  		{
	  		}



			header("Location: edittask.php");
		    exit;


		}

		//Done
		else if(isset($_POST['donebut']))
		{ 


			$newid = $_POST['donebut'];

			$sql1 = "SELECT id, owneremail, ownerid, createddate, duedate, message, isdone FROM todos WHERE id ='$newid' ";
			$result = $conn->query($sql1);

			if ($result->num_rows > 0) 
	      	{
	  		  

		        while($row = $result->fetch_assoc()) {

		        	$id = $row['id'];         
		        	$owneremail = $row['owneremail'];    
		        	$ownerid = $row['ownerid'];    
		        	$createddate = $row['createddate'];    
		        	$duedate = $row['duedate'];    
		        	$message = $row['message'];    

		          
		        }

		        $sql3 = "DELETE FROM todos WHERE id ='$newid'";
				$conn->query($sql3);

		        $sql2 = "INSERT INTO todos (id, owneremail, ownerid, createddate, duedate, message, isdone) VALUES ('$id', '$owneremail', '$ownerid', '$createddate', '$duedate', '$message', 1)";
		        
		        $conn->query($sql2);


		        header("Location: welcome.php");
		        exit;


			  		
			  } 
	  		else 
	  		{
	  		}


			echo "Done " . $_POST['donebut'];
		}

}
catch(PDOException $e)
    {
    	echo "Connection failed: " . $e->getMessage() + "</br>";
    }


$conn = null;


?>