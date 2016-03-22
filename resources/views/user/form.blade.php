@extends('master2')
@section('content')

@if (isset($errors))
@foreach($errors->all() as $error)
<li>{{$error}}</li>
@endforeach
@endif

<br>

<div class="col-md-6">
    <!-- general form elements -->
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Quick Example</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        {!! Form::open(array('url'=> '/user/save', 'class'=>'form'))!!}
        {!! Form::hidden('id',$user->id)!!}
        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                {!!Form::text('name',$user->name,array('class' => 'form-control'))!!}
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                {!!Form::text('email',$profile->email,array('class' => 'form-control'))!!}
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Position</label>
                {!!Form::text('position',$profile->post,array('class' => 'form-control'))!!}
            </div>
            

        </div><!-- /.box-body -->

        <div class="box-footer">
            {!! Form::submit('Submit')!!}
        </div>

        {!! Form::close()!!}
    </div><!-- /.box -->


</div>


@endsection