@extends('layout/aplikasi')
@section('content')
<div class="w-50 center border rounded px-3 py-3 mx-auto">
    <h1>Login</h1>
    <form action="/post/login" method="POST">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" value="{{Session::get('email')}}">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <div class="mb-3 d-grid">
            <button name="submit" type="submit" class="btn btn-success">
                Login
            </button>
        </div>
    </form>
</div>
@endsection