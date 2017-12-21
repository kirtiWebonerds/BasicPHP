<?php
	include 'config.php';
	if(!isset($_SESSION['user'])){
        header('location:login.php');
    }else if(isset($_POST['submit'])){
		
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
                    
                    $check = mysql_query("SELECT name FROM users WHERE name = '$name' ");
                    if(mysql_num_rows($check) == 1){
                        $error = "Name Already Exist Please Choose Different name.";    
                    }else{
                        $sql = mysql_query("INSERT INTO users (name,email,contact) VALUES ('$name','$email','$contact')");	
                    if($sql){
                            $success = "Data inserted Success";
                            unset($name,$email,$contact);
                    }else{
                        $error = "Error Occured Please Try Again";
                    }         
                }
	               
			}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title> Insert record</title>
</head>
<body>
    
    <?php include 'header.php'; ?>
	<div style="color:red;"><?php if(isset($error)){ echo $error;}?></div>
	<div style="color:green;"><?php if(isset($success)){ echo $success;}?></div>	
	<form method="POST">
	<label> Name
		<input type="text" name="name" placeholder="enter Your name" value="<?php if(isset($name)){echo $name;}?>">
	</label>	
	<label> Email
		<input type="email" name="email" placeholder="Enter email id" value="<?php if(isset($email)){echo $email;}?>">
	</label>
	<label> Contact Number	
		<input type="text" name="contact" placeholder="Enter Contact Number" value="<?php if(isset($contact)){echo $contact;}?>">
	</label>	
		<input type="submit" name="submit" value="Insert">		
	</form>
    <a href="index.php">Display Records</a>
</body>
</html>