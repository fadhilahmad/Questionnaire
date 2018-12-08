<?php

if(isset($_GET['id'])){
    $id = $_GET['id'];
    
$sql = "SELECT * FROM survey_answer sa 
        INNER JOIN question q ON sa.q_id = q.q_id
        WHERE sa.parent_id = '$id';";
$result = $conn->query($sql);
$answer_list = array();

while ($row = $result->fetch_assoc()) {
    $answer_list[$row['survey_id']]['q_desc'] = $row['q_desc'];
    $answer_list[$row['survey_id']]['q_section'] = $row['q_section'];
    $answer_list[$row['survey_id']]['answer'] = $row['answer'];
    }    
}
