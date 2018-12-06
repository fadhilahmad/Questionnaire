@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class='form-group form-group-sm'>
            <label class='control-label col-sm-2'>Select Year</label>
            <div class='col-sm-5'>
                <select name='year' id="year" class='form-control' >                         
                        <option value='2018'>2018</option>
                        <option value='2019'>2019</option>                             
                </select>
            </div>
      </div>
   </div>
   <br>
   <div class="row">
      <div class='form-group form-group-sm'>
          <label class='control-label col-sm-2'>Select Month</label>
          <div class='col-sm-5'>
              <select name='month' id="month" class='form-control' >                         
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                    <option>10</option>
                    <option>11</option>
                    <option>12</option>                            
              </select>
          </div>
      </div>
  </div>
  <br>
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="btn-group pull-right">
                    <a href="#" id="addNew" data-toggle="modal" data-target="#modal"><button class="btn default" ><i class="glyphicon glyphicon-plus"></i></button></a>
                </div>                
                <h3 class="panel-title">ITEM LIST</h3>
                <br>
            </div>
    <div class="panel-body">
        <table class="table table-bordered table-condensed text-center">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Item</th>
                    <th class="text-center">Price</th>
                    <th class="text-center">Tag</th>
                    <th class="text-center">Date</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; ?>
                @foreach($budjet as $post)
                <tr>
                    <td><?php echo $no; ?></td>
                    <td>{{$post['item']}}</td>
                    <td>{{$post['price']}}</td>
                    <td>{{$post['tag']}}</td>
                    <td>{{$post['date']}}</td>
                    <td><div class="btn btn-warning itemList" data-toggle="modal" data-target="#modal">Edit
                        <input type="hidden" id="itemId" value="{{$post->id}}">
                        <input type="hidden" id="itemItem" value="{{$post->item}}" >
                        <input type="hidden" id="itemPrice" value="{{$post->price}}" >
                        <input type="hidden" id="itemTag" value="{{$post->tag}}" >
                        <input type="hidden" id="itemDate" value="{{$post->date}}" >
                        </div></td>
<!--                    <td><a href="#" class="btn btn-warning itemList" data-toggle="modal" data-target="#modal" >Edit</a>
                          
                        <input type="hidden" id="itemId" value="{{$post->id}}" >
                    </td>-->
<!--                    
                    <td><a href="{{action('BudjetController@edit', $post['id'])}}" class="btn btn-warning">Edit</a></td>
                    <td>
                        <form action="{{action('BudjetController@destroy', $post['id'])}}" method="post">{{csrf_field()}}
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>-->
                </tr>
                <?php $no++; ?>
                @endforeach
            </tbody>
        </table>
        </div>
        </div>
      </div>
    </div>
  </div>

<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title" id="title">Add Item
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class="modal-body">
                
                <div class="form-group row">
                    <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Item</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-lg" id="item" placeholder="item" name="item">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Price</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-lg" id="price" placeholder="price" name="price">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Tag</label>
                    <div class="col-sm-10">
                        <select class="form-control form-control-lg" id="tag" name="tag">
                            <option value="Food">Food</option>
                            <option value="Bill">Bill</option>
                            <option value="Fuel">Fuel</option>
                            <option value="Ciggarete">Ciggarete</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Date</label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control form-control-lg" id="date" name="date">
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

@endsection
<script src="{{ asset('js/app.js') }}"></script>
<script>
    $(document).ready(function(){
            
        $('[name=month]').change(function (e) {
            e.preventDefault();
            var month = $('#month').val();
            var year = $('#year').val();
            console.log(year);
            $.post('filter', {'month': month, 'year': year, '_token': $('input[name=_token]').val() }, 
                function(data){  
                console.log(data);
                });
        });
        
        $('[name=year]').change(function (e) {
            e.preventDefault();
            var year = $('#year').val();
            var month = $('#month').val();
            $.post('filter', {'month': month, 'year': year, '_token': $('input[name=_token]').val() }, 
                function(data){  
                console.log(data);
                });
        });
        
        $('.itemList').each(function(){
                $(this).click(function(event){
                   var id = $(this).find('#itemId').val();
                   var item = $(this).find('#itemItem').val();
                   var price = $(this).find('#itemPrice').val();
                   var tag = $(this).find('#itemTag').val();
                   var date = $(this).find('#itemDate').val();
                    $('#title').text('Edit');
                    $('#delete').show('400');
                    $('#update').show('400');    
                    $('#add').hide('400');
                    $('#id').val(id);
                    $('#item').val(item);
                    $('#price').val(price);
                    $('#tag').val(tag);
                    $('#date').val(date);
                    console.log(id,item,price,tag,date);
                });
            });
                
            $('#addNew').each(function(){
                $(this).click(function(event){
                    $('#title').text('Add Item');
                    $('#delete').hide('400');
                    $('#update').hide('400');    
                    $('#add').show('400');
                    $('#id').val("");
                    $('#item').val("");
                    $('#price').val("");
                    $('#tag').val("Food");
                    $('#date').val("");
                    console.log('sampai');
                });
            });
            
            $('#add').click(function(event){
                var item = $('#item').val();
                var price = $('#price').val();
                var tag = $('#tag').val();
                var date = $('#date').val();
                if(item=="" || price=="" || date==""){
                    alert('Please fill all section');
                    //$('#modal').modal('show');
                }else{
                $.post('budjet', {'item': item,'price':price,'tag':tag,'date':date, '_token': $('input[name=_token]').val() }, function(data){
                    $('#modal').modal('hide');
                    location.reload();               
                });
                }
            });
            
            $('#delete').click(function(event){
                var id = $('#id').val();
                $.post('delete', {'id': id,'_token': $('input[name=_token]').val() }, function(data){
                    $('#modal').modal('hide');
                    location.reload();                  
                });
                    console.log(id);
            });
            
            $('#update').click(function(event){
                var id = $('#id').val();
                var item = $('#item').val();
                var price = $('#price').val();
                var tag = $('#tag').val();
                var date = $('#date').val();
                if(item=="" || price=="" || date==""){
                    alert('Please fill all section');
                    //$('#modal').modal('show');
                }else{
                $.post('update', {'id':id,'item': item,'price':price,'tag':tag,'date':date, '_token': $('input[name=_token]').val() }, function(data){
                    $('#modal').modal('hide');
                    location.reload();               
                });
                }
                console.log(id);
            });
            
    });
</script>