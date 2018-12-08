<?php 
	include ('./header_admin.php');
        include ('./backend/manage_report2.php');
?>
<body>
    <?php 
        if(isset($_SESSION['username'])){
    ?>
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-primary">
            <div class="panel-heading">               
                <center><h3 class="panel-title">RESPONDENT'S ANSWER</h3></center>
            </div>
    <div class="panel-body">
        <table class="table table-bordered table-condensed text-center">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Question</th>
                    <th class="text-center">Section</th>
                    <th class="text-center">Answer</th>
                </tr>
            </thead>
            <tbody>
<!--            <pre>
                 <?php print_r($answer_list); ?>
            </pre>-->
                <?php $no=1;  foreach($answer_list as $value){ ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $value['q_desc']; ?></td>
                    <td><?php echo $value['q_section']; ?></td>
                    <td><?php echo $value['answer']; ?></td>
                </tr>
                <?php $no++; } ?>
            </tbody>
        </table>
        </div>
        </div>
      </div>
    </div>
</div>  
    <?php   
	}
    ?>
</body>