<?php

//-------------------------------------------------------------------DISPLAY ALL USER--------------------------------------------------------------------------

$sqls = "SELECT * FROM admin WHERE status = 1";
$resultselect = $conn->query($sqls);

//-------------------------------------------------------------------DISPLAY ALL USER--------------------------------------------------------------------------

//---------------------------------------------------------------------ADD NEW USER----------------------------------------------------------------------------

if(isset($_POST['submit'])){
    
    $erroradd = array();
    
    if(!empty($_POST['usernames'])){
        $usernames = $_POST['usernames'];
    }else{
        $usernames = null;
        $erroradd[] = "You forgot to enter username";
    }
    
    if(!empty($_POST['password'])){
        $passwords = $_POST['password'];
    }else{
        $passwords = null;
        $erroradd[] = "You forgot to enter password";
    }
    
    if(!empty($_POST['full_name'])){
        $full_name = $_POST['full_name'];
    }else{
        $full_name = null;
        $erroradd[] = "You forgot to enter full name";
    }
    
    if(!empty($_POST['email'])){
        $email = $_POST['email'];
    }else{
        $email = null;
        $erroradd[] = "You forgot to enter email";
    }
    
    if(!empty($_POST['phone'])){
        $phone = $_POST['phone'];
    }else{
        $phone = null;
        $erroradd[] = "You forgot to enter phone";
    }
    
    if(empty($erroradd)){
        
        $sql = "INSERT INTO admin(username, password, full_name, email, phone, status, created_date, updated_date) "
            . "VALUES ('$usernames', '$passwords', '$full_name', '$email', '$phone', 1, NOW(), NOW())";

        $result = mysqli_query($conn, $sql);

        if($result){
            //echo "New record created successfully";
            header("Refresh:0");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
        
    }else{
//        foreach($erroradd as $values){
//            echo $values."<br>";
//        }
    }
    
}
    
//---------------------------------------------------------------------ADD NEW USER----------------------------------------------------------------------------

//---------------------------------------------------------------------UPDATE USER----------------------------------------------------------------------------

if(isset($_POST['edit'])){
    
    $erroredit = array();
    
    if(!empty($_POST['admin_id'])){
        $admin_id = $_POST['admin_id'];
    }else{
        $admin_id = null;
        $erroredit[] = "Admin id is null";
    }
    
    if(!empty($_POST['usernames'])){
        $usernames = $_POST['usernames'];
    }else{
        $usernames = null;
        $erroredit[] = "You forgot to enter username";
    }
    
    if(!empty($_POST['password'])){
        $passwords = $_POST['password'];
    }else{
        $passwords = null;
        $erroredit[] = "You forgot to enter password";
    }
    
    if(!empty($_POST['full_name'])){
        $full_name = $_POST['full_name'];
    }else{
        $full_name = null;
        $erroredit[] = "You forgot to enter full name";
    }
    
    if(!empty($_POST['email'])){
        $email = $_POST['email'];
    }else{
        $email = null;
        $erroredit[] = "You forgot to enter email";
    }
    
    if(!empty($_POST['phone'])){
        $phone = $_POST['phone'];
        echo $phone;
    }else{
        $phone = null;
        $erroredit[] = "You forgot to enter phone";
    }
    
    if(empty($erroredit)){

        $sql = "UPDATE admin "
                . "SET username='$usernames', password='$passwords', full_name='$full_name', email='$email', phone='$phone', updated_date=NOW()"
                . "WHERE admin_id='$admin_id'";

        $result = mysqli_query($conn, $sql);

        if($result){
            header("Refresh:0");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
        
    }else{
//        foreach($erroradd as $values){
//            echo $values."<br>";
//        }
    }
    
}
    
//---------------------------------------------------------------------UPDATE USER----------------------------------------------------------------------------
   
//---------------------------------------------------------------------DELETE USER----------------------------------------------------------------------------

if(isset($_POST['delete'])){
    
    $errordelete = array();
    
    if(!empty($_POST['admin_id'])){
        $admin_id = $_POST['admin_id'];
    }else{
        $admin_id = null;
        $errordelete[] = "Admin id is null";
    }
    
    if(!empty($_POST['usernames'])){
        $usernames = $_POST['usernames'];
    }else{
        $usernames = null;
        $errordelete[] = "You forgot to enter username";
    }
    
    if(!empty($_POST['password'])){
        $passwords = $_POST['password'];
    }else{
        $passwords = null;
        $errordelete[] = "You forgot to enter password";
    }
    
    if(!empty($_POST['full_name'])){
        $full_name = $_POST['full_name'];
    }else{
        $full_name = null;
        $errordelete[] = "You forgot to enter full name";
    }
    
    if(!empty($_POST['email'])){
        $email = $_POST['email'];
    }else{
        $email = null;
        $errordelete[] = "You forgot to enter email";
    }
    
    if(!empty($_POST['phone'])){
        $phone = $_POST['phone'];
        echo $phone;
    }else{
        $phone = null;
        $errordelete[] = "You forgot to enter phone";
    }
    
    if(empty($errordelete)){

        $sql = "DELETE FROM admin WHERE admin_id='$admin_id'";
        $result = mysqli_query($conn, $sql);

        if($result){
            header("Refresh:0");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }else{
//        foreach($erroradd as $values){
//            echo $values."<br>";
//        }
    }
    
}

//---------------------------------------------------------------------DELETE USER----------------------------------------------------------------------------


?>