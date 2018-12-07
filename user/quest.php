<?php
    include '../config.php';
    include './backend/quest.php';
?>
<html>	
    <head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">	
	<title>Survey</title>		
    </head>	
	<body style="font-family: Arial, Helvetica, sans-serif;">		
            <div class="container">
		<h1 style="text-align: center;">Student Satisfaction of UUM Services</h1>		
		<center><img src="../image/uumlogo.jpg" alt="UUM Logo" width="400" height="150"></center><br><br>
			<!--
			<p align="justify" style="font-size:15px;">Center for Testing, Measurement and Appraisal (CeTMA) UUM is conducting a survey pertaining to student satisfaction towards the services offered at Universiti Utara 
			Malaysia. Participation in this survey will provide information in order to improve the quality of services for the welfare of students in the future. The information 
			provided on the survey is remains confidential and will not be disclosed to any third parties without prior written consent of UUM.</p>
			<p style="font-size:15px;">The average time to complete this survey is 10 minutes.</p>
			
			<p style="font-size:13px; font-weight:bold;">There are 50 questions in this survey</p>
			
			<p style="font-size:13px; font-weight:bold;">Please answer the following questions by choosing the option which best represent yourself accordingly.</p>
			
			-->
                    <h2>Section 1: Respondent's Background</h2>
                    <!-- Questions --><br>
                    <form action="quest.php" method="post">
                        <div class="row">
<!--                            <div class="col-md-12 col-md-offset-0">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">            
                                        <h3 class="panel-title">Question 1</h3>
                                    </div>						
                                    <div class="panel-body">
                                        <p><strong>Gender</strong></p>
                                        <p style="font-size:13px;">Please choose <strong>only one</strong> of the following:</p>
                                        <input type="radio" name="gender" value="male" required="required"> Male<br>
                                            <input type="radio" name="gender" value="female"> Female<br>							
                                    </div>							
                                </div>					
                            </div>-->

                            <?php
                                $no = 1;
                                foreach($question_list as $key => $value) { ?>
                        
                                    <div class="col-md-12 col-md-offset-0">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">            
                                                <h3 class="panel-title">Question <?php echo $no; ?></h3>
                                            </div>						
                                            <div class="panel-body">
                                                <h3><strong><?php echo $value['q_desc']; ?></strong></h3>
                                                    <?php display($conn,$no, $value['q_id'], $value) ?>							
                                            </div>							
                                        </div>					
                                    </div> 
                                                 
                            <?php $no++; } ?>
                        </div>
                    
                    <div class="row">
                        <center><button class="btn btn-default btn-lg" type="submit" value="Submit">Submit</button></center>	
                    </div><br><br>
                    </form>
            </div>		
	</body>	
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
