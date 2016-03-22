@extends('master2')
@section('content')
<script src="/jqueryform/jform.js" type="text/javascript"></script>
<script>
    $(function () {
        $('#myform').ajaxForm();
//        $('#submit').click(function(){
//            $('#myModal').remove();
//        });
    });
</script>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
    Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <form class="form-horizontal"  id="myform" method="post" action="/book/update">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                </div>

                <div class="modal-body">

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="title" id="title" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Author</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="author" id="author" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Page Count</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="page" id="page" placeholder="">
                        </div>
                    </div>


                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" id="submit"class="btn btn-primary"  value="Hantar">
                </div>
            </div>
        </form>
    </div>

</div>
</div>



@endsection