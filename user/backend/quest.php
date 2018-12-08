<?php
//-------------------------------------------------------------------CHECK SETTING--------------------------------------------------------------------------
$sql = "SELECT * FROM setting"; 
$result = $conn->query($sql);
$data = $result->fetch_assoc();

$sql_count = "SELECT COUNT(parent_id) AS respon_count
              FROM survey_parent
              WHERE STATUS=1";
$result_count = $conn->query($sql_count);
$no_respon = $result_count->fetch_assoc();

date_default_timezone_set("Asia/Kuala_Lumpur");
$time = date("h:i:s");
$day = date("Y-m-d");
$count = $no_respon['respon_count'];

//echo $no_respon['respon_count']."<br>";
//echo $data['open_time']."<br>";
//echo $data['no_respondent']."<br>";
//echo $time."<br>";
//echo $day."<br>";

if($time >= $data['open_time'] && $time <= $data['close_time'] && $count < $data['no_respondent']  && $day <= $data['close_day'] ){
    $open = true;
} else {
    $open = false;
}

//-------------------------------------------------------------------DISPLAY ALL QUESTION--------------------------------------------------------------------------

$sql = "SELECT * FROM question WHERE status = 1 AND q_section = 1 ";  //AND post_type = 0 AND filter_type = 0
$result = $conn->query($sql);
$question_list = array();

if($result->num_rows > 0){
    $set = TRUE;
}else{
    $set = FALSE;
}

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
    
        $q_id = $row['q_id'];
        $ans_sql = "SELECT * FROM answer WHERE q_id = $q_id AND status = 1";
        $ans_result = $conn->query($ans_sql);

            while ($ans_row = $ans_result->fetch_assoc()) {
            $question_list[$row['q_id']][$ans_row['ans_id']]['ans_id'] = $ans_row['ans_id'];
            $question_list[$row['q_id']][$ans_row['ans_id']]['ans_desc'] = $ans_row['ans_desc'];
            $question_list[$row['q_id']][$ans_row['ans_id']]['input_type'] = $ans_row['input_type'];
            }

}

//-------------------------------------------------------------------DISPLAY FUNCTION--------------------------------------------------------------------------
function display($conn,$no,$q_id,array $answer) {
    
    $sql = "SELECT * FROM answer WHERE q_id = '$q_id' AND status = '1' LIMIT 1;";
    $result = $conn->query($sql);
    while ($row = $result->fetch_array()) {
    $input_type = $row['input_type'];
    break;            
    }
    
    $name = "survey[][".$q_id."]";

    switch ($input_type) {
    case "text":
        echo "Please write your answer here:<br><br>";
        echo "<div class='row'><div class='col-lg-12'><input type='text' name='".$name."' ></div></div>";
//            foreach($answer as $value) {                   
//                echo "<input type='text' name='".$name."' >";
//            }
        break;
    case "radio":
        echo "<p style='font-size:13px;'>Please choose <strong>only one</strong> of the following:</p>";
            foreach($answer as $value) {
                if(is_array($value)){
                    $ans_desc = $value['ans_desc'];
                    echo "<input type='radio' name='".$name."' value='".$ans_desc."' required='required'> ".$ans_desc."<br>";               
                }
            }
        break;
    case "checkbox":
        echo "<p style='font-size:13px;'>Please choose <strong>all</strong> that apply:</p>";
            $set = 1;
            foreach($answer as $value) {
                if(is_array($value)){
                    $ans_desc = $value['ans_desc'];
                    echo "<input type='checkbox' name='".$name."_".$set."' value='".$ans_desc."' > ".$ans_desc."<br>";               
                }
            }$set++;
        break;
    case "satisfaction":
        echo "<p style='font-size:13px;'>Please choose the appropriate response for each item:</p>";
            ?> <div class="row">
                    <div class='col-xs-5'><center>Item</center></div>                                   
                    <div class='col-xs-1'>1</div>
                    <div class='col-xs-1'>2</div>
                    <div class='col-xs-1'>3</div>
                    <div class='col-xs-1'>4</div>
                    <div class='col-xs-1'>5</div>
                    <div class='col-xs-1'>6</div>
                    <div class='col-xs-1'>7</div>
                </div>
            <?php
                $set = 1;
                foreach($answer as $value) {
                    if(is_array($value)){
                        $ans_desc = $value['ans_desc'];
                        ?>
                        <div class="row">
                            <div class='col-xs-5'><?php echo $ans_desc;  ?></div>                                   
                            <div class='col-xs-1'><input type="radio" name="<?php echo $name."_".$set; ?>" value="1" required="required"></div>
                            <div class='col-xs-1'><input type="radio" name="<?php echo $name."_".$set; ?>" value="2" ></div>
                            <div class='col-xs-1'><input type="radio" name="<?php echo $name."_".$set; ?>" value="3" ></div>
                            <div class='col-xs-1'><input type="radio" name="<?php echo $name."_".$set; ?>" value="4" ></div>
                            <div class='col-xs-1'><input type="radio" name="<?php echo $name."_".$set; ?>" value="5" ></div>
                            <div class='col-xs-1'><input type="radio" name="<?php echo $name."_".$set; ?>" value="6" ></div>
                            <div class='col-xs-1'><input type="radio" name="<?php echo $name."_".$set; ?>" value="7" ></div>
                        </div>            
                        <?php
                    }
                    $set++;
                }
        break;
    case "yes/no":
         echo "<p style='font-size:13px;'>Please choose the appropriate response for each item:</p>";
         ?> <div class="row">
                    <div class='col-xs-6'><center>Item</center></div>                                   
                    <div class='col-xs-3'>Yes</div>
                    <div class='col-xs-3'>No</div>
                </div>
            <?php
                $set = 1;
                foreach($answer as $value) {
                    if(is_array($value)){
                        $ans_desc = $value['ans_desc'];
                        ?>
                        <div class="row">
                            <div class='col-xs-6'><?php echo $ans_desc;  ?></div>                                   
                            <div class='col-xs-3'><input type="radio" name="<?php echo $name."_".$set; ?>" value="Yes" required="required"></div>
                            <div class='col-xs-3'><input type="radio" name="<?php echo $name."_".$set; ?>" value="No" ></div>
                        </div>            
                        <?php
                    }
                    $set++;
                }
        break;
    default:
        echo "No question";
}    
}

//-------------------------------------------------------------------SUBMIT FUNCTION--------------------------------------------------------------------------
if (isset($_POST['submit'])){
    
    $survey=array();
    $survey=$_POST['survey'];
//    echo "<pre>";
//    print_r($survey);
//    echo "</pre>";
    
    $sql = "INSERT INTO survey_parent (status, created_date)
    VALUES ('1', NOW())";

    if ($conn->query($sql) === TRUE) {
        $parent_id = $conn->insert_id;
    
    foreach ($survey as $value){
        foreach ($value as $k=>$v){
    //    echo "id=".$k.",ans=".$v."<br>";
        
            $sql = "INSERT INTO survey_answer (q_id, parent_id, answer)
            VALUES ('$k','$parent_id','$v')";

            $conn->query($sql);
            
            }
        }
    }
    
   header("Location: quest2.php?parent=".$parent_id);
       
}