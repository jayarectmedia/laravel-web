@extends('layout/aplikasi')

@section('content')
<a href="/siswa/create" class="btn btn-primary mb-5">+Tambah data siswa</a>
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Foto</th>
            <th scope="col">Nomor Induk</th>
            <th scope="col">Nama</th>
            <th scope="col">Alamat</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <th scope="row">{{$loop->index +1}}</th>
            <td>
                @if ($item->foto)
                <img style="max-width:50px;max-height:50px" src="{{url('foto').'/'.$item->foto}}" />
                @endif
            </td>
            <td>{{$item->nomor_induk}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->alamat}}</td>
            <td>
                <a class="btn btn-secondary btn-sm" href="{{url('/siswa/'.$item->id)}}">Detail</a>
                <a class="btn btn-warning btn-sm" href="{{url('/siswa/'.$item->id.'/edit')}}">Edit</a>
                <form onsubmit="return confirm('Data akan dihapus')" action="{{'/siswa/'.$item->id}}" method="POST"
                    class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$data->links()}}
@endsection