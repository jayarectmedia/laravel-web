@extends('layout/aplikasi')

@section('content')
<div>
    <h1>{{$judul}}</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt suscipit nisi rem, nam officia sed aperiam
        nemo deleniti animi aliquam.</p>
    <p>
    <ul>
        <li>Email : {{$kontak['email']}}</li>
        <li>Instagram : {{$kontak['instagram']}}</li>
    </ul>
    </p>
</div>
@endsection