@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Profil Pengguna</h1>
</div>

<div class="table-responsive col-lg-6">
        <table class="table table-striped table-sm">
            @foreach ($user as $user)
            <ul>
                <li class="nav-item"><h5>Nama Lengkap : {{ $user->name }}</h5></li>
                <li class="nav-item"><h5>Username : {{ $user->username }}</h5></li>
                <li class="nav-item"><h5>Alamat Email : {{ $user->email }}</h5></li>
                <li class="nav-item"><h5>No Telepon : {{ $user->phone }}</h5></li>
                <li class="nav-item"><h5>Alamat Rumah : {{ $user->address }}</h5></li>
                <li class="nav-item"><h5>Waktu Registrasi : {{ date('M d, Y h:i A', strtotime($user->created_at)) }}</h5></li>
            </ul>
            @endforeach
        </table>
</div>
@endsection