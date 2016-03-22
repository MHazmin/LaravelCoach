

@if(isset($msg))
<div class="alert alert-danger" role="alert"> 
    <strong>Caution!</strong> Loign tidak berjaya. </div>
@endif

<h1>Login Screen</h1>
<div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Login Form</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
               {!!Form::open(['url'=>'/login/auth'])!!}
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">User Id</label>
                      <div class="col-sm-10">
                        {!! Form::text('email','')!!}
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                      <div class="col-sm-10">
                        {!! Form::password('password','')!!}
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox"> Remember me
                          </label>
                        </div>
                      </div>
                    </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn btn-default">Cancel</button>
                    <button type="submit" class="btn btn-info pull-right">Sign in</button>
                  </div><!-- /.box-footer -->
                {!!Form::close()!!}
              </div>

