@extends('master2')

@section('content')
@foreach($arr as $no)
<li>{{$no}}</li>
@endforeach

@forelse($arr2 as $no2)
{{$no2}}
@empty
tiada data
@endforelse

@endsection