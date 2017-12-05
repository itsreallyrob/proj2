<?php


$hostname = "sql2.njit.edu";
$username = "rjc43";
$password = "pxNGdj5c";
$dbname1 = "rjc43";
try {
	    $conn = new mysqli($hostname, $username, $password, $dbname1);


	    session_start();
  		
      //Create Variables
      $desc = $_POST['desc'];
      $datedue = $_POST['datedue'];
      $timedue = $_POST['timedue'];
      $useremail = $_SESSION['email'];
      $totaldue = $datedue . " " . $timedue;
      $date = date('Y-m-d H:i:s');

      $_SESSION['errorsession2'] = "";
      $_SESSION['errorsent2']=false;
      $newid = $_SESSION['id2'];



      
      //Check if any text boxes were not fileld out
      if($desc == "" || $datedue == "" || $timedue == "")
      {
        $_SESSION['errorsession2'] = "You did not fill everything out!";
        $_SESSION['errorsent2']=true;
        header("Location: newtask.php");
        exit;
      }

      //Check if email already exists
  		$sql = "SELECT id, fname, lname, email, password, phone, birthday, gender FROM accounts WHERE email = '$useremail'";
		  $result = $conn->query($sql);

		  if ($result->num_rows > 0) 
      {
  		  

        while($row = $result->fetch_assoc()) {

        $userid = $row['id'];         
          
        }

        $sql3 = "DELETE FROM todos WHERE id ='$newid' ";
        $conn->query($sql3);


        //Create new entry into database
        $sql2 = "INSERT INTO todos (owneremail, ownerid, createddate, duedate, message, isdone) VALUES ('$useremail', '$userid', '$date', '$totaldue', '$desc', 0)";
        
        $conn->query($sql2);


        header("Location: welcome.php");
        exit;


		  		
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