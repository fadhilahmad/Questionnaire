<?php 
	include ('./header_admin.php');
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

                    </div>
                </div>
            </div>
        </div>	
    </div>
	
</body>

<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title" id="title">Add New User
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class="modal-body">
                
                <div class="form-group row">
                    <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-lg" id="username" placeholder="Username" name="username">
                    </div>
                </div>
				
				<div class="form-group row">
                    <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control form-control-lg" id="password" placeholder="Password" name="password">
                    </div>
                </div>
				
				<div class="form-group row">
                    <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Full Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-lg" id="full_name" placeholder="Full name" name="full_name">
                    </div>
                </div>
				
				<div class="form-group row">
                    <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-lg" id="email" placeholder="Email" name="email">
                    </div>
                </div>
				
				<div class="form-group row">
                    <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Phone</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-lg" id="phone" placeholder="Phone" name="phone">
                    </div>
                </div>
				
            </div>
            <div class="modal-footer">
                <input type="hidden" id="id" >
                <button type="button" class="btn btn-danger" id="delete" data-dismiss="modal" style="display: none">Delete</button>
                <button type="button" class="btn btn-primary" id="update" style="display: none">Save changes</button>
                <button type="button" class="btn btn-primary" id="add">Add</button>
            </div>
        </div>
    </div>
</div>