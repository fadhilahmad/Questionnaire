<form id="questionForm<?php echo $no;  ?>" action="manage_question.php" method="post" >
<div class="modal fade" id="modal<?php echo $no;  ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title" id="title<?php echo $no;  ?>">Edit Question
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
                                <input type='text' name='question_desc' value='<?php echo $value['q_desc']; ?>' class='form-control' required="required" autocomplete="off"/>
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group form-group-sm">
                            <label class="control-label col-sm-4">Section</label>
                            <div class="col-sm-8">                      
                                <select name='question_section' class='form-control'>
                                    <option value='<?php echo $value['q_sec']; ?>'><?php echo $value['q_sec']; ?></option>
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
                                    <option value='<?php echo $value['no_type']; ?>'><?php echo $value['type']; ?></option>
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
                                    <option value='<?php echo $value['no_filter']; ?>'><?php echo $value['filter']; ?></option>
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
                                    <option value='<?php echo $input_type; ?>'><?php echo ucfirst($input_type); ?></option>
                                    <option value='text'>Text</option>
                                    <option value='radio'>Radio</option>
                                    <option value='checkbox'>Checkbox</option>
                                    <option value='satisfaction'>Satisfaction</option>
                                </select>
                            </div>
                        </div>
                        <br><br>
                        <div id='answer<?php echo $no;  ?>'>
                            <?php  $nn=1;$word = "Description";                                                  
                                foreach($value as $answer) { if(is_array($answer)){  ?>
                                    <div class="ansList<?php echo $nn;  ?>">
                                    <div class='form-group form-group-sm'>
                                        <label class='control-label col-sm-4'><?php echo $word;  ?></label>
                                        <div class='col-sm-8'>
                                            <input type='text' name='answer_desc[]' value="<?php echo $answer['ans_desc'];  ?>" class='form-control' autocomplete="off"/>
                                            <input type="hidden" name="ans_id[]" value="<?php echo $answer['ans_id'];  ?>">
                                        </div>
                                    </div>
                                    <br>
                                    </div>
                                    <br>                                              
                            <?php $word=''; $nn++;}} ?>

                        </div>
                        <br><br>                      
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <input type="hidden" name="question_id" value="<?php echo $value['q_id']; ?>" >
                <button type="submit" name="delete" class="btn btn-danger" id="delete<?php echo $no;  ?>">Delete</button>
                <button type="submit" name="update" class="btn btn-primary" id="update<?php echo $no;  ?>" >Save changes</button>
            </div>
        </div>
    </div>
</div>
</form>
