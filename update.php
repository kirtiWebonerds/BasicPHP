<?php
	include 'config.php';
    if(!isset($_SESSION['user'])){
        header("location:login.php");
    }
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = mysql_query("SELECT name , email ,contact FROM users WHERE id = '$id'");
        while($row = mysql_fetch_array($sql))
        {
            $name=$row['name'];
            $email=$row['email'];
            $contact=$row['contact'];
        }
}
    if(isset($_POST['submit'])){
		
            $id = $_GET['id'];
			//$name = $_POST['name'];
			$email = $_POST['email'];
			$contact = $_POST['contact'];

            if($email == ""){
				$error = "Please Enter your Email id";
			}else if($contact == ""){
				$error = "Please Enter your Contact Number";
			}else{
                    
                    
                        $sql = mysql_query("UPDATE users SET email = '$email', contact='$contact' WHERE id ='$id'");	
                    if($sql){
                            header("location:index.php?status=Data Updated Successfully");
                    }else{
                        echo "Error Occured Please Try Again";
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
	<form method="POST">
	<label> Name
		<input type="text" name="name" placeholder="enter Your name" value="<?php if(isset($name)){echo $name;}?>" disabled>
	</label>	
	<label> Email
		<input type="email" name="email" placeholder="Enter email id" value="<?php if(isset($email)){echo $email;}?>">
	</label>
	<label> Contact Number	
		<input type="text" name="contact" placeholder="Enter Contact Number" value="<?php if(isset($contact)){echo $contact;}?>">
	</label>	
		<input type="submit" name="submit" value="Update">		
	</form>
</body>
</html>