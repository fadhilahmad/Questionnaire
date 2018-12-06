<?php
//-------------------------------------------------------------------DISPLAY ALL QUESTION--------------------------------------------------------------------------

$sql = "SELECT * FROM question WHERE status = 1";
$result = $conn->query($sql);

//while ($row = $result->fetch_assoc()) {
//    $data['question_list'][$row['id']]['q_desc'] = $row['q_desc'];
//    $data['question_list'][$row['id']]['q_sec'] = $row['q_section'];
//    $data['question_list'][$row['id']]['type'] = $row['section'];
//    $data['question_list'][$row['id']]['filter'] = $row['section'];
//    $data['question_list'][$row['id']]['filter'] = date('Y-m-d', $row['update_date']);
//}


//---------------------------------------------------------------------ADD NEW QUESTION----------------------------------------------------------------------------

if(isset($_POST['submitQuestion'])){
    
$question_desc = $_POST['question_desc'];
$question_section = $_POST['question_section'];
$post_type = $_POST['post_type'];
$filter_type = $_POST['filter_type'];
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
    } 
    
    else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}

//---------------------------------------------------------------------UPDATE QUESTION-----------------------------------------------------------------------------

