<?php
session_start();

if($_SESSION['errorsent2']== true)
{

	$_SESSION['errorsent2']=false;
}
else
{
	$_SESSION['errorsession2'] = "";
	$_SESSION['errorsent2']=false;
	$_SESSION['desc'] = "";
	$_SESSION['datedue'] = "";
	$_SESSION['timedue'] = "";


}


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
 
				New Task
				<br><br>

				
				

				<form method="POST" action="addtask.php">


					Description: <input class="inputsignup" type="text" name="desc" ><br>
					Date Due (YYYY-MM-DD): <input class="inputsignup"  type="text" name="datedue" ><br>
					Time Due (HH:MM): <input class="inputsignup"  type="text" name="timedue" ><br>
					<button type="signin" class="button2">Add</button>      <br><br><br>
				</form>


				<?php
					echo $_SESSION['errorsession2'];

				?>


				<br><br>
				<form action="welcome.php">
					<button type="signin" class="button">Back</button>      <br><br><br>
				</form>

			</div>
		</div>
	</div>

</body>
</html>

