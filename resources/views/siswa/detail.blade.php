@extends('layout/aplikasi')

@section('content')
<div>
    <a href="/siswa" class="btn btn-primary">Kembali</a>
    <h1>{{$data->name}}</h1>
    <p>Nomor Induk : {{$data->nomor_induk}}</p>
    <p>Alamat : {{$data->nomor_induk}}</p>
</div>
@endsection