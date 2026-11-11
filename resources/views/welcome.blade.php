@extends('layouts.main')

@section('content')
    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>
    Linkora
    </h1>

    <div>
        <a href='{{ route('contacts.index') }}'>Browse People</a>
        <a href='{{ route('contacts.create') }}'>Add Someone</a>
        <a href='{{ route('contacts.show',1) }}'>View a Profile</a>
    </div>
    
</body>
</html>

@endsection