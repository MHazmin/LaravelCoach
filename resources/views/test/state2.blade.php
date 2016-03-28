@extends('master2')
@section('content')


{!!Form::select('state',$state)!!}
<span id="dist"></span>


<script>
    $(function () {
       
        getState();
        $('select[name=state]').change(function () {
            getState();

        });

    });

    function getState() {
        var state = $('select[name=state]').val();
        $('#dist').load('/test/ref2/' + state+'/daerah');
    }
</script>

@endsection