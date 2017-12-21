<?php 
    include 'config.php';
    if(!isset($_SESSION['user'])){
        header("location:login.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
<body>
    <?php include 'header.php'; ?>
    <aside style="background-color:lightgray;">
        <a href="insert.php">Insert Data</a>
        <a href="update.php">Update Data</a>
    </aside>
    <section>
    
        <div><?php if(isset($_GET['status'])){echo $_GET['status'];}?></div>
            <b>Active Users</b>
        <table border="1">
            
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Contact</th>
            <th colspan="2">Actions</th>
            <?php
                $sql = mysql_query("SELECT * FROM users WHERE status = 1");
                while($row = mysql_fetch_array($sql)){
            ?>        
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['contact'];  ?></td>
                    <td><a href="update.php?id=<?php echo $row['id']; ?>">Update</a></td>
                    <td><a href="delete.php?id=<?php echo $row['id']; ?>">Deactive</a></td>
                </tr>                          
            <?php       
            }
            ?>
        </table>
        
        <b>Deactive Users</b>
        <table border="1">
            
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Contact</th>
            <th colspan="2">Actions</th>
            <?php
                $sql = mysql_query("SELECT * FROM users WHERE status = 0");
                while($row = mysql_fetch_array($sql)){
            ?>        
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['contact'];  ?></td>
                    <td><a href="update.php?id=<?php echo $row['id']; ?>">Update</a></td>
                    <td><a href="delete.php?id=<?php echo $row['id']; ?>">Active</a></td>
                </tr>                          
            <?php       
            }
            ?>
        </table>
    </section>
    <footer>
    
    </footer>
</body>
</html>