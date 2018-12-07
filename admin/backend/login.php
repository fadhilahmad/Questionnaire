<?php

//$sqls = "SELECT * FROM admin WHERE status = 1";
//$resultselect = $conn->query($sqls);

include ('../config.php');

//-------------------------------------------------------------------LOGIN ADMIN--------------------------------------------------------------------------

if(isset($_POST['submit'])){
    
    $errorlogin = array();
    
    if(!empty($_POST['username'])){
        $username = $_POST['username'];
    }else{
        $username = null;
        $errorlogin[] = "You forgot to enter username";
    }
    
    if(!empty($_POST['password'])){
        $password = $_POST['password'];
    }else{
        $password = null;
        $errorlogin[] = "You forgot to enter password";
    }
    
    if(empty($errorlogin)){
        
        $sql = "SELECT * FROM admin WHERE admin.username='$username' and admin.password='$password'";
		
	//$result = mysqli_query($conn, 'SELECT * FROM admin WHERE admin.username="' . $username . '" and admin.password"' . $password);
	
        $result = mysqli_query($conn, $sql);
        
	if(mysqli_num_rows($result) == 1){
				
            while($row = mysqli_fetch_array($result)){
		$admin_id = $row['admin_id'];
            }
				
            header('Location: manage_user.php');
            exit();
				
	}else{
            echo 'Invalid account <br>';
	}
	mysqli_close($conn);
        
    }else{
//        foreach($errorlogin as $values){
//            echo $values."<br>";
//        }
    }
    
}

//-------------------------------------------------------------------LOGIN ADMIN--------------------------------------------------------------------------


