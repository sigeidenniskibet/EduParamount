<?php
if (isset($_POST['submit'])){
	$Phonenumber = $_POST['phonenumber'];
	$Fullname = $_POST['fullname'];
	$password = $_POST['password'];

	// start datbase connection
	$servername = "localhost";
	$username = "root";
	$password = '';
	$dbname = "eduparamountdb";

	// create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	// check connection
	if (!$conn) {
		die("coection failed" . mysql_connect_error());
	}else{
		echo "success";

	} 

	// enddb connection
	if (empty($Phonenumber) && empty($Fullname) && empty($Password)) {
	echo"All fields are required";
		
	}else{ 
	 

		// save in db
		$sql ="INSERT INTO `createaccounttbl`(`phonenumber`, `fullname`, `password`) VALUES ('$Phonenumber','$Fullname','$password')";
		if (mysqli_query($conn,$sql) == true) {
         header("location:screen4.php");
			echo"Registration successful";
			
		}else{
			echo"Something went wrong .Please try again...!";
	
           }

       }

   }



?>

<!DOCTYPE html>
<html>
<head>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>EduParamount</title>
</head>

<body>

	<img src="images/ol.png" id="two">
<br>
		<h1> Create Account</h1>
	<form method="POST">
	<label id="mo">Enter Phone number</label>
	<br>
	<br>
	<input type="text" name="phonenumber" id="bo" ><br>
	<br>
	<label id="mo">Fullname</label>
	<br>
	<br>
	<input type="text" name="fullname" id="bo">
	<br>
	<br>
	<label id="mo">Password</label>
	<br>
	<br>
	<input type="Password" name="password" id="bo">
	<br>
	<br>
	<button name="submit" id="ml">Submit</button>
	</form>
		<br><br>
	<!-- <h1="text" name="" id="op" alt="screen4.html"></a> -->
	<h3 id="om">Already have an Account?log in</h3>
	<h4 id="om">Term of use /privacy policy</h4>

</body >
<style type="text/css">
	body{
		background-color: #4FB8D9;
		text-align: center;


	}
	h1{
		font-size: 16px;
	}
	#one{

		width: 30px;
		height: 30px;
/*		margin-top: 10%;*/

	}
	#two{
		width: 50%;
		height: 50%px;
/*		margin-top:95p*/
	}
		
		#mo{
/*			text-align:center ;*/
			border-radius: 100px;

		}
		#bo{
			border-radius: 7px;
			width: 55%;
			height: 35px;
			
		

		}
		#om{
/*			text-align: center;*/

		}
		#op{
/*			text-align:center ;*/
			
		

		}
		#ml{
			width: 40%;
			height: 45px;
			text-align:center ;
			border-radius: 100px;

		}
</style>
</html>


	
	

	
		
	
		

	
