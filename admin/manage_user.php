<?php 
    include ('./header_admin.php');
    include ('backend/manage_user.php');
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
                        <center><h3 class="panel-title">MANAGE USER</h3></center>
                        <br>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered table-condensed text-center">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Username</th>
                                    <th class="text-center">Full name</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Phone</th>
                                    <th class="text-center">Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no=1;
                                    foreach ($resultselect as $values){
                                ?>
                                <tr>
                                    <?php
                                        $editadmin_id = $values['admin_id'];
                                        $editusername = $values['username']
                                    ?>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $values['username']; ?></td>
                                    <td><?php echo $values['full_name']; ?></td>
                                    <td><?php echo $values['email']; ?></td>
                                    <td><?php echo $values['phone']; ?></td>
                                    <td><div class="btn btn-warning itemList" data-toggle="modal" data-target="#modal">Edit
                                        <input type="hidden" id="admin_ids" value="<?php echo $values['admin_id']; ?>">
                                        <input type="hidden" id="username" value="<?php echo $values['username']; ?>" >
                                        <input type="hidden" id="passwords" value="<?php echo $values['password']; ?>" >
                                        <input type="hidden" id="full_names" value="<?php echo $values['full_name']; ?>" >
                                        <input type="hidden" id="emails" value="<?php echo $values['email']; ?>" >
                                        <input type="hidden" id="phones" value="<?php echo $values['phone']; ?>" >
                                    </div></td>
                                </tr>
                                <?php 
                                    $no++;
                                    }
                                ?>
                            </tbody>
                        </table>
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
            <form action="manage_user.php" method="post">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Username</label>
                        <div class="col-sm-10">
                            <input type="hidden" class="form-control form-control-lg" name="admin_id" id="admin_id" placeholder="Username">
                            <input type="text" class="form-control form-control-lg" name="usernames" id="usernames" placeholder="Username">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control form-control-lg" name="password" id="password" placeholder="Password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Full Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-lg" name="full_name" id="full_name" placeholder="Full name">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-lg" name="email" id="email" placeholder="Email">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Phone</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-lg" name="phone" id="phone" placeholder="Phone">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="admin_id" >
                    <button type="submit" class="btn btn-danger" id="delete" name="delete" style="display: none">Delete</button>
                    <button type="submit" class="btn btn-primary" id="update" name="edit" style="display: none">Save changes</button>
                    <input type="submit" class="btn btn-primary" id="add" name="submit" value="Add">
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    
    $(document).ready(function(){
        
        /************************************** Edit function *******************************/
        $('.itemList').each(function(){
            $(this).click(function(event){
                var admin_id = $(this).find('#admin_ids').val();
                var username = $(this).find('#username').val();
                var password = $(this).find('#passwords').val();
                var full_name = $(this).find('#full_names').val();
                var email = $(this).find('#emails').val();
                var phone = $(this).find('#phones').val();
                $('#title').text('Edit');
                $('#delete').show('400');
                $('#update').show('400'); 
                $('#add').hide('400');
                $('#admin_id').val(admin_id);
                $('#usernames').val(username);
                $('#password').val(password);
                $('#full_name').val(full_name);
                $('#email').val(email);
                $('#phone').val(phone);
                console.log(admin_id,username,password,full_name,email, phone);
            });
        });
        /************************************** Edit function *******************************/
        
        /****************************** Alert empty in add new function *********************/
        $('#add').click(function(event){
            var usernames = $('#username').val();
            var password = $('#password').val();
            var full_name = $('#full_name').val();
            var email = $('#email').val();
            var phone = $('#phone').val();
            if(usernames=="" || password=="" || full_name=="" || email=="" || phone==""){
                alert('Please fill all section');
            }else{
                
            }
        });
        /****************************** Alert empty in add new function *********************/
        
        /******************************** Alert empty in edit function **********************/
        $('#update').click(function(event){
            var usernames = $('#username').val();
            var password = $('#password').val();
            var full_name = $('#full_name').val();
            var email = $('#email').val();
            var phone = $('#phone').val();
            if(usernames=="" || password=="" || full_name=="" || email=="" || phone==""){
                alert('Please fill all section');
            }else{
                
            }
        });
        /******************************** Alert empty in edit function **********************/
            
        /************************************ Add new function ******************************/
        $('#addNew').each(function(){
            $(this).click(function(event){
                $('#title').text('Add Item');
                $('#delete').hide('400');
                $('#update').hide('400');    
                $('#add').show('400');
                $('#admin_id').val("");
                $('#usernames').val("");
                $('#password').val("");
                $('#full_name').val("");
                $('#email').val("");
                $('#phone').val("");
            });
        });
        /************************************ Add new function ******************************/
        
    });
        
</script>