@extends('master2')
@section('content')
{!!HTML::style('css/app.css')!!}

{{$name1}}-{{$age}}-{{$address}}
<br>
Organization = {{$org}} || Post = {{$post}} || Salary = {{$salary}}
<br>
{{$arr['x']}}

@endsection

@section('iklan1')
Hello World
@endsection


<!--kalo xde dia ganti-->
@section('iklan2')
<!--parent untuk append-->
@parent
Iklan coming soon
@endsection


