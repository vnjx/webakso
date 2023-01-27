@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Aktifitas Pengguna</h1>
</div>
@if(session()->has('success'))
<div class="alert alert-success col-lg-6" role="alert">
  {{ session('success') }}
</div>
@endif

<div class="table-responsive col-lg-6">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col" style="text-align: center; vertical-align: middle;">No</th>
              <th scope="col">Nama User</th>
              <th scope="col">Akses</th>
              <th scope="col">Tanggal Registrasi</th>
              <th scope="col">Tanggal diEdit</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($user as $user)
              <tr>
                <td class="text-center" style="text-align: center; vertical-align: middle;">{{ $loop->iteration}}</td>
                <td>{{ $user->name }}</td>
                @if($user->an_admin == 1)
                <td>{{ $user->an_admin }}-Admin</td>
                @else
                <td>{{ $user->an_admin }}-Pengguna</td>
                @endif
                <td>{{ $user->created_at }}</td>
                <td>{{ $user->updated_at }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
</div>
@endsection