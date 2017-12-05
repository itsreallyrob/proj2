<?php


$hostname = "sql2.njit.edu";
$username = "rjc43";
$password = "pxNGdj5c";
$dbname1 = "rjc43";
try {
	    $conn = new mysqli($hostname, $username, $password, $dbname1);


	    session_start();
  		
      //Create Variables
      $_SESSION['errorsession'] = "";
      $_SESSION['errorsent']=false;
      $_SESSION['email'] = $_POST['email'];
      $_SESSION['password'] = $_POST['password'];
      $_SESSION['fname'] = $_POST['fname'];
      $_SESSION['lname'] = $_POST['lname'];
      $_SESSION['phone'] = $_POST['phone'];
      $_SESSION['birthday'] = $_POST['birthday'];
      $_SESSION['gender'] = $_POST['gender'];
  		
      $useremail = $_POST['email'];
      $userpass = $_POST['password'];
      $userfname = $_POST['fname'];
      $userlname = $_POST['lname'];
      $userphone = $_POST['phone'];
      $userbirthday = $_POST['birthday'];
      $usergender = $_POST['gender'];



      
      //Check if any text boxes were not fileld out
      if($useremail == "" || $userpass == "" || $userfname == "" || $userlname == "" || $userphone == "" || $userbirthday == "" || $usergender == "")
      {
        $_SESSION['errorsession'] = "You did not fill everything out!";
        $_SESSION['errorsent']=true;
        header("Location: signup.php");
        exit;
      }

      //Check if email already exists
  		$sql = "SELECT id, fname, lname, email, password, phone, birthday, gender FROM accounts WHERE email = '$useremail'";
		  $result = $conn->query($sql);

		  if ($result->num_rows > 0) 
      {
  		  $_SESSION['errorsession'] = "That email already exists!";
        $_SESSION['errorsent']=true;

        header("Location: signup.php");
        exit;
		  		
		  } 
  		else 
  		{
  		    
        //Create new entry into database
        $sql2 = "INSERT INTO accounts (email, fname, lname, password, phone, birthday, gender) VALUES ('$useremail', '$userfname', '$userlname', '$userpass', '$userphone', '$userbirthday', '$usergender')";
        
        $conn->query($sql2);


        $_SESSION['errorsent']=true;
        header("Location: index.php");
        exit;



  		}

    }
catch(PDOException $e)
    {
    	echo "Connection failed: " . $e->getMessage() + "</br>";
    }


$conn = null;

?>