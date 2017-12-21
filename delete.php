<?php
    include 'config.php';
    if(!isset($_SESSION['user'])){
        header("location:login.php");
    }else if(isset($_GET['id'])){
        $id = $_GET['id'];
        
        $sql = mysql_query("SELECT status FROM users WHERE id='$id'");
        while($row = mysql_fetch_array($sql)){
            $status =  $row['status'];
        }
            echo $status;
            if($status == 1){
                 $sql = mysql_query("UPDATE users SET status = 0 WHERE id = '$id'");           
                if($sql){
                        header("location:index.php?status=Record Deleted Successfully");
                }    
            }else{
                 $sql = mysql_query("UPDATE users SET status = 1 WHERE id = '$id'");
                 if($sql){
                            header("location:index.php?status=Record Deleted Successfully");
                }
            }          
    }
?>