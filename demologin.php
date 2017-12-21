<?php
	 if(isset($_POST['submit'])){
		
			$name = $_POST['name'];
			$email = $_POST['email'];
			$contact = $_POST['contact'];

			if($name == ""){
				$error = "Please Enter your name";
			}else if($email == ""){
				$error = "Please Enter your Email id";
			}else if($contact == ""){
				$error = "Please Enter your Contact Number";
			}else{
                    
                   $success = "Login page opened";
	               
			}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title> Insert record</title>
</head>
<body>
    
    
	<div style="color:red;"><?php if(isset($error)){ echo $error;}?></div>
	<div style="color:green;"><?php if(isset($success)){ echo $success;}?></div>	
	<form method="POST">
	<label> Name
		<input type="text" name="name" placeholder="enter Your name" value="<?php if(isset($name)){echo $name;}?>" required>
	</label>	
	<label> Email
		<input type="email" name="email" placeholder="Enter email id" value="<?php if(isset($email)){echo $email;}?>">
	</label>
	<label> Contact Number	
		<input type="text" name="contact" placeholder="Enter Contact Number" value="<?php if(isset($contact)){echo $contact;}?>" required>
	</label>	
		<input type="submit" name="submit" value="Insert">		
	</form>
   
</body>
</html>