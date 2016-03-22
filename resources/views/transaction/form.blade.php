@extends('master2')
@section('content')
<br>
@if (isset($errors))
@foreach($errors->all() as $error)
<li>{{$error}}</li>
@endforeach
@endif
<section class="content">
          <div class="row">
            <!-- left column -->
           <!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">
              <!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Horizontal Form</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" action="/transaction/store">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <input type="hidden" name="id" value="{{$tran->id}}">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Date</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" name="trans_dt" placeholder="Date">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Type</label>                     
                       <div class="col-sm-10">
                      <select class="form-control" name="type" >
                        <option @if ($tran->type === 'IN') selected @endif> IN</option>
                        <option @if ($tran->type === 'OUT') selected @endif>OUT</option>
                      </select>              
                    </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Amount</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" name="amount" placeholder="Amount" value="{{$tran->amount}}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Account ID</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" name="account_id" placeholder="Account ID" value="{{$tran->acct_id}}">
                      </div>
                    </div>
                  
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    
                      <input type="submit" class="btn btn-info pull-right" value="Submit">
                  </div><!-- /.box-footer -->
                </form>
              </div><!-- /.box -->
              <!-- general form elements disabled -->
         
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section>

@endsection