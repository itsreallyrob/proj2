<?php
session_start();

if($_SESSION['errorsent']== true)
{

	$_SESSION['errorsent']=false;
}
else
{
	$_SESSION['errorsession'] = "";
	$_SESSION['errorsent']=false;
	$_SESSION['email']="";

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

				<form method="POST" action="validation.php">
					<div class="inputs">
						E-Mail: <input class="inputsignup"  type="text" name="email" id="email" value="<?php echo $_SESSION['email'];?>" ><br>
						Password: <input class="inputsignup"  type="password" name="password" id="password"><br><br>
					</div>


					<button type="signup" class="button">Sign In</button>      


				</form>
				<br>
				<form action="signup.php">
					<button type="signup" class="button">Sign Up</button>      <br><br><br>
				</form>

				<?php
					echo $_SESSION['errorsession'];

				?>

			</div>
		</div>
	</div>

</body>
</html>

