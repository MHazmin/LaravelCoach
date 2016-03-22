@extends('master2')
@section('content')
<br>
@if(Session::has('msg'))
<div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Danger!</strong> This alert box could indicate a dangerous or potentially negative action.
  </div>
@endif

<a href="/transaction/create" class="btn btn-info">New</a>




<h1>
    
            Transaction Money
            <small></small>
          </h1>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Responsive Hover Table</h3>
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
                    <th>Type</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <?php $x = 1 ?>
                    @foreach($trans as $data)
                <th scope="row"><?php echo $x ?></th> 
                    <td>{{$data->type}}</td> 
                    <td>{{$data->amount}}</td>
                    <td>{{$data->trans_dt}}</td>
                    <td>
                        
                        <a href='/transaction/update/{{$data->id}}'>Update</a>
                        <a href='/transaction/delete/{{$data->id}}'>Delete</a>
                    </td>
                </tr>
                <?php $x++ ?>
                @endforeach
                </tr>

            </tbody></table>
    </div><!-- /.box-body -->
</div>
@endsection







