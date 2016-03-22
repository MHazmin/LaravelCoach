@extends('master2')
@section('content')
<br>
@if(Session::has('msg'))
<div class="alert alert-info" role="alert"> 
    <strong>Well done!</strong> You successfully read this important alert message. </div>
@endif

<a href="/user/create" class="btn btn-success">Create User</a>
<h1>
            User Transaction
            <small></small>
          </h1>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">User List(User HasOne Profile)</h3>
        <div class="box-tools">
            <div class="input-group" style="width: 150px;">
                <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
                <div class="input-group-btn">
                    <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>
    </div><!-- /.box-header -->
    <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
            <tbody><tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Position</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <?php $x = 1 ?>
                    @foreach($users as $data)
                <th scope="row"><?php echo $x ?></th> 
                    <td>{{$data->name}}</td> 
                    <td>@if($data->mprofile){{$data->mprofile->email}}@endif</td> 
                    <td>@if($data->mprofile){{$data->mprofile->post}}@endif</td> 
                    <td>
                        <a href="/user/update/{{$data->id}}"<i class="fa fa-pencil"></i>&nbsp;
                        <a href="/user/delete/{{$data->id}}"<i class="fa fa-trash"></i>
                    </td>
                </tr>
                <?php $x++ ?>
                @endforeach
                </tr>

            </tbody></table> {!!$users->render()!!}
    </div><!-- /.box-body -->
    
  
@endsection

<script>
    window.setTimeout(function() {
    $(".alert-info").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 5000);
</script>