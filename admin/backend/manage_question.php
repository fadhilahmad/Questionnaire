<?php
//-------------------------------------------------------------------DISPLAY ALL QUESTION--------------------------------------------------------------------------

$sql = "SELECT * FROM question WHERE status = 1";
$result = $conn->query($sql);
$question_list = array();

while ($row = $result->fetch_assoc()) {
    $question_list[$row['q_id']]['q_id'] = $row['q_id'];
    $question_list[$row['q_id']]['q_desc'] = $row['q_desc'];
    $question_list[$row['q_id']]['q_sec'] = $row['q_section'];
    $question_list[$row['q_id']]['no_type'] = $row['post_type'];
    $question_list[$row['q_id']]['no_filter'] = $row['filter_type'];
    if($row['post_type']==0){
        $question_list[$row['q_id']]['type'] = 'Both';
    }elseif ($row['post_type']==1) {
        $question_list[$row['q_id']]['type'] = 'Undergraduate';
    }elseif ($row['post_type']==2) {
        $question_list[$row['q_id']]['type'] = 'Postgraduate';
    }
    if($row['filter_type']==0){
        $question_list[$row['q_id']]['filter'] = 'No';
    }elseif ($row['filter_type']==1) {
        $question_list[$row['q_id']]['filter'] = 'Yes';
    }
    $question_list[$row['q_id']]['created'] = $row['created_date'];
    $question_list[$row['q_id']]['updated'] = $row['updated_date'];
    
        $q_id = $row['q_id'];
        $ans_sql = "SELECT * FROM answer WHERE q_id = $q_id AND status = 1";
        $ans_result = $conn->query($ans_sql);

            while ($ans_row = $ans_result->fetch_assoc()) {
            $question_list[$row['q_id']][$ans_row['ans_id']]['ans_id'] = $ans_row['ans_id'];
            $question_list[$row['q_id']][$ans_row['ans_id']]['ans_desc'] = $ans_row['ans_desc'];
            $question_list[$row['q_id']][$ans_row['ans_id']]['input_type'] = $ans_row['input_type'];
            }
}


//---------------------------------------------------------------------ADD NEW QUESTION----------------------------------------------------------------------------

if(isset($_POST['submitQuestion'])){
    
$question_desc = $_POST['question_desc'];
$question_section = $_POST['question_section'];
$post_type = 0; //$_POST['post_type'];
$filter_type = 0; //$_POST['filter_type'];
$answer_input = $_POST['answer_input'];
$ans_desc = array();
$ans_desc = $_POST['answer_desc'];

$sql = "INSERT INTO question (q_desc, q_section, post_type, filter_type, q_no, status, created_date, updated_date)
VALUES ('$question_desc', '$question_section', '$post_type', '$filter_type', '1', '1', NOW(), NOW())";

if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    
    foreach($ans_desc as $value) {
            $sql = "INSERT INTO answer (q_id, ans_desc, input_type, status, created_date, updated_date)"
            . "VALUES ('$last_id', '$value', '$answer_input', '1', NOW(), NOW())";
        $conn->query($sql);            
        }
    }else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
    header("Refresh:0");
}

//---------------------------------------------------------------------UPDATE QUESTION-----------------------------------------------------------------------------

if(isset($_POST['update'])){

$q_id = $_POST['question_id'];    
$question_desc = $_POST['question_desc'];
$question_section = $_POST['question_section'];
$post_type = 0; //$_POST['post_type'];
$filter_type = 0; //$_POST['filter_type'];
$answer_input = $_POST['answer_input'];
$ans_desc = array();
$ans_desc = $_POST['answer_desc'];
$ans_id = array();
$ans_id = $_POST['ans_id'];

$sql = "UPDATE question 
        SET q_desc = '$question_desc', q_section='$question_section', post_type='$post_type', filter_type='$filter_type',updated_date=NOW()
        WHERE q_id = '$q_id';";

if ($conn->query($sql) === TRUE) {
    $i=0;
    foreach($ans_desc as $key => $value) {
        $idd = $ans_id[$i];
            $sql = "UPDATE answer "
            . "SET ans_desc ='$value' , input_type = '$answer_input' ,updated_date = NOW()"
            . "WHERE ans_id = '$idd';";
            if ($conn->query($sql) === FALSE) {
                 echo "Error: " . $sql . "<br>" . $conn->error;
            
            }
        $i++;
        }
    }else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
    header("Refresh:0");
}

//---------------------------------------------------------------------DELETE QUESTION-----------------------------------------------------------------------------

if(isset($_POST['delete'])){

$q_id = $_POST['question_id'];    
$ans_id = array();
$ans_id = $_POST['ans_id'];

$sql = "UPDATE question 
        SET status = '0',updated_date=NOW()
        WHERE q_id = '$q_id';";

if ($conn->query($sql) === TRUE) {
    foreach($ans_id as $key => $value) {
            $sql = "UPDATE answer "
            . "SET status = '0' ,updated_date = NOW()"
            . "WHERE ans_id = '$value';";
            if ($conn->query($sql) === FALSE) {
                 echo "Error: " . $sql . "<br>" . $conn->error;
            
            }
        }
    }else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
   header("Refresh:0");
}
