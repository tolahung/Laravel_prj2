@extends('layout')
@section('content')
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
@foreach($user_info as $key => $users)
            <h1>Thong tin tai khoan</h1><br>
            <p  style="float: left">Name:&nbsp</p>
            <p> {{$users->name}}</p>
            <p  style ="float: left" >Email:&nbsp</p>
            <p>{{$users->email}}</p>
            <p>id: {{$users->id}}</p>
            <a href="{{url('/get-account-logout')}}"><i class="fa fa-key"></i> Log Out</a>


@endforeach
</body>
</html>
@endsection
