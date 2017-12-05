<?php


$hostname = "sql2.njit.edu";
$username = "rjc43";
$password = "pxNGdj5c";
$dbname1 = "rjc43";
try {
	    //$conn = new PDO("mysql:host=$hostname;dbname=rjc43", $username, $password);
	    $conn = new mysqli($hostname, $username, $password, $dbname1);


	    session_start();
  		$useremail = $_POST['email'];
  		$userpass = $_POST['password'];
      $_SESSION['email'] = $_POST['email'];
      $_SESSION['errorsession'] = "";
      $_SESSION['errorsent']=false;

  		
  		echo $useremail . " " . $userpass . "</br>";

  		if($useremail == "")
  		{
  			
  			$_SESSION['errorsession'] = "You did not enter an email!";
  			$_SESSION['errorsent']=true;
  			header("Location: index.php");
  			exit;
  		}
  		if($userpass == "")
  		{
  			
  			$_SESSION['errorsession'] = "You did not enter a password!";
  			$_SESSION['errorsent']=true;
  			header("Location: index.php");
  			exit;
  		}
  		

  		$sql = "SELECT id, fname, lname, email, password, phone, birthday, gender FROM accounts WHERE email = '$useremail' AND password ='$userpass'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		    while($row = $result->fetch_assoc()) {

		      $_SESSION['id'] = $row['id'];
		  		$_SESSION['fname'] = $row['fname'];
		  		$_SESSION['lname'] = $row['lname'];
		  		$_SESSION['password'] = $row['password'];
		  		$_SESSION['email'] = $row['email'];
          $_SESSION['phone'] = $row['phone'];
          $_SESSION['birthday'] = $row['birthday'];
          $_SESSION['gender'] = $row['gender'];

          echo $_SESSION['id'] . "</br>";
          echo $_SESSION['fname'] . "</br>";
          echo $_SESSION['lname'] . "</br>";
          echo $_SESSION['password'] . "</br>";
          echo $_SESSION['email'] . "</br>";
          header("Location: welcome.php");
        exit;
		  		
		    }
		} 
		else 
		{
		    $_SESSION['errorsession'] = "Incorrect Information!";
  			$_SESSION['errorsent']=true;
        echo $_SESSION['errorsession'] . "</br>";
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