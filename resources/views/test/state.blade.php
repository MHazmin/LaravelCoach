@extends('master2')
@section('content')


{!!Form::select('state',$state)!!}
<input type="hidden" name="_token" value="{{ csrf_token() }}">
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
        alert(state);
        $('#dist').load('/test/ref2/' + state);
    }
</script>

@endsection