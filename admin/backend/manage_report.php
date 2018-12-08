<?php
//-------------------------------------------------------------------DISPLAY ALL RSPONDENTS--------------------------------------------------------------------------

$sql = "SELECT * FROM survey_parent WHERE status = 1";
$result = $conn->query($sql);
$respondent_list = array();

while ($row = $result->fetch_assoc()) {
    $respondent_list[$row['parent_id']]['id'] = $row['parent_id'];
    $respondent_list[$row['parent_id']]['created_date'] = $row['created_date'];
}