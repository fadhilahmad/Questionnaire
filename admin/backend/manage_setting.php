<?php

//-------------------------------------------------------------------CHECK SETTING--------------------------------------------------------------------------
$sql = "SELECT * FROM setting"; 
$result = $conn->query($sql);
$data = $result->fetch_assoc();

if($result->num_rows > 0){
    $open_time = $data['open_time'];
    $close_time = $data['close_time'];
    $close_day = $data['close_day'];
    $no_res = $data['no_respondent'];
    $button = "UPDATE";
} else {
    $button = "SUBMIT";
}

//-------------------------------------------------------------------SETTING UPDATE/ADD--------------------------------------------------------------------------

if(isset($_POST['submit'])){
    
    $errorsettings = array();
    if(isset($_POST['open'])){
        $open = $_POST['open'];
    }else{
        $open = null;
        $errorsettings[] = "You forgot to select open time";
    }
    if(isset($_POST['close'])){
        $close = $_POST['close'];
    }else{
        $close = null;
        $errorsettings[] = "You forgot to select close time";
    }
    $time = strtotime($_POST['close_date']);
    if($time){
        $close_date = date('Y-m-d', $time);
    }else{
        $close_date = null;
       $errorsettings[] = 'Invalid Date: ' . $_POST['dateFrom'];
    }
    if(!empty($_POST['num'])){
        $num = $_POST['num'];
    }else{
        $num = null;
        $errorsettings[] = "You forgot to enter number of respondent";
    }
    
    if(empty($errorsettings)){
        $sql = "SELECT * FROM setting WHERE setting_id=1";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) == 0){
            $sql = "INSERT INTO setting (open_time, close_time, close_day, no_respondent)
		VALUES('$open', '$close', '$close_date', '$num')";
            $result = mysqli_query($conn, $sql);
            echo '<script language="javascript">';
            echo 'alert("New setting data inserted");';
            echo '</script>';
            header("Refresh:0");
        }else{
            $sql = "UPDATE setting "
                . "SET setting.open_time='$open', setting.close_time='$close', setting.close_day='$close_date', setting.no_respondent='$num'"
                . "WHERE setting.setting_id=1";
            $result = mysqli_query($conn, $sql);
            echo '<script language="javascript">';
            echo 'alert("Setting updated");';
            echo '</script>';
            header("Refresh:0");
        }
    }else{
//        foreach($erroradd as $values){
//            echo $values."<br>";
//        }
    }
}

