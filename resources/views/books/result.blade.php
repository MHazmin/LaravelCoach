
<h1>Senarai Buku
    <small></small>
</h1>
<div id="result" class="box">
    <div class="box-header">
        <h3 class="box-title">Responsive Hover Table</h3>
        <div class="box-tools">
            <div class="input-group" style="width: 150px;">
                <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
                <div class="input-group-btn">
                    <button type="submit"class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>
    </div><!-- /.box-header -->
    <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
            <tbody><tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <?php $x = 1 ?>
                    @foreach($books as $data)
                    <th scope="row">{{$x}}</th> 
                    <td><li class="book" value="{{$data->id}}">{{$data->title}}</li></td> 

            <td>{{$data->author}}</td>
            <td>

                <a href="#" val='{{$data->id}}' id="update" data-toggle="modal" data-target="#myModal">Update</a>
                <a href='/transaction/delete/{{$data->id}}'>Delete</a>
            </td>
            </tr>
            <?php $x++ ?>
            @endforeach
            </tr>

            </tbody>

        </table>
        {!!$books->render()!!}

    </div><!-- /.box-body -->
</div>




<!--
<script>
$(function(){
   $('#submit').click(function(){
       $('#result').load('/book/search-result');
   }); 
});

</script>-->
<script>

    $('#result li a').click(function (e) {
        e.preventDefault();
        var link = $(this).attr('href');
        var tajuk = $('#title').val();
        link = link + "&title=" + tajuk;

        //return false; 
        // alert('link');
        $('#result').load(link);
    });
    
    $('#update').click(function(){
       
        var id = $(this).attr('val');

        $.get('/book/details/'+id,function(details){
           // alert(details.title);
        $('#title2').val(details.title);
        $('#author2').val(details.author);     
        $('#id').val(details.id);
        });
    });

</script>

