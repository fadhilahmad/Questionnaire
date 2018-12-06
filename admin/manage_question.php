<?php 
	include ('./header_admin.php');
        include ('./backend/manage_question.php');
?>
<body>
	
    <div class="container">	
	<div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="btn-group pull-right">
                            <a href="#" id="addNew" data-toggle="modal" data-target="#modal"><button class="btn default" ><i class="glyphicon glyphicon-plus"></i></button></a>
                        </div>                
                            <center><h3 class="panel-title">MANAGE QUESTION</h3></center>
                        <br>
                    </div>
                    <div class="panel-body">
                            <?php
//                                  foreach($question_list as $value) {
//                                       echo $value;           
//                                    }
//                                  echo $question_list;   
                            //print_r($question_list);
                            ?>
                    </div>
                </div>
            </div>
        </div>	
    </div>
	
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
                        <div class="form-group form-group-sm">
                            <label class="control-label col-sm-4">Post Type</label>
                            <div class="col-sm-8">                      
                                <select name='post_type' class='form-control'>
                                    <option value='0'>Both</option>
                                    <option value='1'>Undergrade</option>
                                    <option value='2'>Postgrade</option>
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
                        <br><br>
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
                                    <option value='radio'>Radio Button</option>
                                    <option value='checkbox'>Checkbox</option>
                                    <option value='satisfaction'>Satisfaction</option>
                                </select>
                            </div>
                        </div>
                        <br><br>
                        <div id='answer'>
                        <div class="ansList1">
                        <div class='form-group form-group-sm'>
                            <label class='control-label col-sm-4'>Description</label>
                            <div class='col-sm-7'>
                                <input type='text' name='answer_desc[]' class='form-control' autocomplete="off"/>
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
                <button type="button" class="btn btn-danger" id="delete" data-dismiss="modal" style="display: none">Delete</button>
                <button type="button" class="btn btn-primary" id="update" style="display: none">Save changes</button>
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
                $addAnswer += "<input type='text' name='answer_desc[]' class='form-control' autocomplete='off'/>";
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