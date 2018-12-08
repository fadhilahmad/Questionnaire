<?php 
	include ('./header_admin.php');
        include ('./backend/manage_question.php');
?>
<body>
    <?php 
        if(isset($_SESSION['username'])){
    ?>
    <div class="container">	
	<div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="btn-group pull-right">
                            <a href="#" class="btn btn-default btn-xs syncButton" id="addNew" data-toggle="modal" data-target="#modal"><i class="glyphicon glyphicon-plus"></i></a>
                        </div>                
                            <center><h3 class="panel-title">MANAGE QUESTION</h3></center>
                    </div>
                    <div class="panel-body">
                            <?php
                                  $no = 1;
//                                  echo '<pre>';
//                                  print_r($question_list);
//                                  echo '</pre>';
                                  foreach($question_list as $key => $value) { ?>
                        
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <div class="btn-group pull-right">
                                                <a href="#" id="editQuestion" data-toggle="modal" data-target="#modal<?php echo $no;  ?>" class="btn btn-default btn-xs syncButton"><i class="glyphicon glyphicon-asterisk"></i></a>
                                            </div>                
                                            <center><h7 class="panel-title">Question <?php echo $no; ?></h7></center>
                                        </div>
                                        <div class="panel-body">
                                            <div class='row'>
                                                <div class='col-xs-2'>Created Date</div>
                                                <div class='col-xs-10'>: <strong><?php echo $value['created']; ?></strong></div>
                                                <div class='col-xs-2'>Updated Date </div>
                                                <div class='col-xs-10'>: <strong><?php echo $value['updated']; ?></strong></div>
                                                <div class='col-xs-2'>Section</div>
                                                <div class='col-xs-10'>: <strong><?php echo $value['q_sec']; ?></strong></div>
<!--                                            <div class='col-xs-2'>Post Type</div>
                                                <div class='col-xs-10'>: <strong><?php echo $value['type']; ?></strong></div>
                                                <div class='col-xs-2'>Filter Type</div>
                                                <div class='col-xs-10'>: <strong><?php echo $value['filter']; ?></strong></div>-->
                                                <div class='col-xs-2'>Question Description</div>
                                                <div class='col-xs-10'>: <strong><?php echo $value['q_desc']; ?></strong></div>
                                                
                                               <?php  $word = "Answer Description";                                                  
                                                     foreach($value as $answer) { if(is_array($answer)){  $input_type=$answer['input_type'];?>
                                                    <div class='col-xs-2'><?php echo $word; ?></div>
                                                    <div class='col-xs-10'>: <strong><?php echo $answer['ans_desc']; ?></strong></div>                                               
                                                     <?php $word='';}} ?>
                                                    <div class='col-xs-2'>Answer type</div>
                                                    <div class='col-xs-10'>: <strong><?php echo ucfirst($input_type); ?></strong></div>
                                            </div>
                                        </div>
                                    </div> 
                                                 
                            <?php include 'manage_question2.php'; $no++; } ?>
                    </div>
                </div>
            </div>
        </div>	
    </div>
    <?php   
	}
    ?>
</body>

<form id="questionForm" action="manage_question.php" method="post" >
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title" id="title">Add Question
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            
            <div class="modal-body">           
                <div class='panel panel-primary'>        
                    <div class='panel-heading'>Question</div>
                    <div class='panel-body'>

                        <div class='form-group form-group-sm'>
                            <label class='control-label col-sm-4'>Description</label>
                            <div class='col-sm-8'>
                                <input type='text' name='question_desc' value='' class='form-control' required="required" autocomplete="off"/>
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group form-group-sm">
                            <label class="control-label col-sm-4">Section</label>
                            <div class="col-sm-8">                      
                                <select name='question_section' class='form-control'>
                                    <option value='1'>1</option>
                                    <option value='2'>2</option>
                                </select>
                            </div>
                        </div>
                        <br><br>
<!--                        <div class="form-group form-group-sm">
                            <label class="control-label col-sm-4">Post Type</label>
                            <div class="col-sm-8">                      
                                <select name='post_type' class='form-control'>
                                    <option value='0'>Both</option>
                                    <option value='1'>Undergraduate</option>
                                    <option value='2'>Postgraduate</option>
                                </select>
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group form-group-sm">
                            <label class="control-label col-sm-4">Filter Type</label>
                            <div class="col-sm-8">                      
                                <select name='filter_type' class='form-control'>
                                    <option value='0'>No</option>
                                    <option value='1'>Yes</option>
                                </select>
                            </div>
                        </div>
                        <br><br>-->
                    </div>
                </div>
                
                <div class='panel panel-primary'>        
                    <div class='panel-heading'>Answer</div>
                    <div class='panel-body'>

                        <div class="form-group form-group-sm">
                            <label class="control-label col-sm-4">Input Type</label>
                            <div class="col-sm-8">                      
                                <select name='answer_input' class='form-control'>
                                    <option value='text'>Text</option>
                                    <option value='radio'>Radio</option>
                                    <option value='checkbox'>Checkbox</option>
                                    <option value='satisfaction'>Satisfaction</option>
                                    <option value='yes/no'>Yes/no</option>
                                </select>
                            </div>
                        </div>
                        <br><br>
                        <div id='answer'>
                        <div class="ansList1">
                        <div class='form-group form-group-sm'>
                            <label class='control-label col-sm-4'>Description</label>
                            <div class='col-sm-7'>
                                <input type='text' name='answer_desc[]' required="required" class='form-control' autocomplete="off"/>
                            </div>
                            <div class='col-sm-1 answerSpatial' data-listid='1'>
                                <div class='btn btn-default btn-sm addAnswer' data-listid='1'><i class='glyphicon glyphicon-plus'></i></div>
                            </div>
                        </div>
                        <br>
                        </div>
                        <br><br>
                        </div>
                        <br><br>                      
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <input type="hidden" id="id" >
                <button type="sumbit" name="submitQuestion" class="btn btn-primary" id="add">Add</button>
            </div>
        </div>
    </div>
</div>
</form>

<script>

$('#answer').on('click', '.addAnswer', function () {
            
            var index = $(this).data('listid') + 1;
            var current = $(this).data('listid');
            
            var $deleteButton = "<div class='btn btn-default btn-sm deleteAnswer' data-delid='" + current + "'><i class='glyphicon glyphicon-trash'></i></div>";       
            $('.answerSpatial[data-listid="' + current + '"]').html($deleteButton);
            
            var $addAnswer = "<div class='form-group form-group-sm ansList"+index+"'>";
                $addAnswer += "<label class='control-label col-sm-4'></label>";
                $addAnswer += "<div class='col-sm-7'>";
                $addAnswer += "<input type='text' name='answer_desc[]' required='required' class='form-control' autocomplete='off'/>";
                $addAnswer += "</div>";
                $addAnswer += "<div class='col-sm-1 answerSpatial' data-listid="+index+">";
                $addAnswer += "<div class='btn btn-default btn-sm addAnswer' data-listid="+index+"><i class='glyphicon glyphicon-plus'></i></div>";
                $addAnswer += "</div><br><br></div>";
            $($addAnswer).appendTo('#answer');

});

$('#answer').on('click', '.deleteAnswer', function () {
    
            var deleteid = $(this).data('delid');
            if (deleteid > 1) {
                $('.ansList' + deleteid).remove();
            }
            console.log(deleteid);
            
});
</script>