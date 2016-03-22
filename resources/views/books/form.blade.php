@extends('master2')
@section('content')

<script src="/jqueryform/jform.js" type="text/javascript"></script>

<legend>Carian Buku </legend>

<div class="col-md-6 well">
    <div class="row">
        <div class="col col-md-5">Title</div>
        <div class="col col-md-5"><input type="text" id="title" class="form-control"></div>
    </div>
    <div class="row">
        <div class="col col-md-5">Author</div>
        <div class="col col-md-5"><input type="text" id="author" class="form-control"></div>
    </div>
    <div class="row">
        <div class="col col-md-5"></div>
        <div class="col col-md-5"><input type="submit" id="submit"value="Search" class="btn btn-primary"></div>
    </div>
</div>

<!--paksa result trun bwh-->
<div style="clear: both"></div>
<div id="result"></div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <form class="form-horizontal"  id="myform" method="post" action="/book/update">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="id" id="id"value="">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                </div>

                <div class="modal-body">

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="title2" id="title2" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Author</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="author2" id="author2" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Page Count</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="page2" id="page2" placeholder="">
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



<script>
$(function(){
   $('#submit').click(function(){
       var tajuk = $('#title').val();
       $('#result').load('/book/search-result',{title:tajuk,_token:'{{csrf_token()}}'});
   }); 
   
   $('#myform').ajaxForm({
       success: tutup
   });
   
   function tutup(txt){
       if(txt === 'ok'){
           //hide pop up
           
           $('#myModal').modal('hide');
       }
   }
   

});

</script>
@endsection