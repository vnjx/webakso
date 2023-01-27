@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Daftar Divisi</h1>
</div>
@if(session()->has('success'))
<div class="alert alert-success col-lg-6" role="alert">
  {{ session('success') }}
</div>
@endif

<div class="table-responsive col-lg-6">
  <a href="/dashboard/origins/create" class="btn btn-primary mb-3">Input Divisi</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col" style="text-align: center; vertical-align: middle;">No</th>
              <th scope="col">Divisi</th>
              <th scope="col">Tanggal Dibuat</th>
              <th scope="col">Tanggal Diedit</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($origins as $origin)
              <tr>
                <td class="text-center" style="text-align: center; vertical-align: middle;">{{ $loop->iteration}}</td>
                <td>{{ $origin->divisi }}</td>
                <td>{{ $origin->created_at }}</td>
                <td>{{ $origin->updated_at }}</td>
                <td>
                    <a href="" class="badge bg-info"><span data-feather="eye"></span></a>
                    <form action="/dashboard/origins/{{ $origin->id }}" method="post" class="d-inline">
                      @method('delete')
                      @csrf
                      <button class="badge bg-danger border-0" onclick="return confirm('Hapus Divisi ini?')"><span data-feather="x-circle"></span></button>
                    </form>
                 </td>
              </tr>
            @endforeach
          </tbody>
        </table>
</div>
@endsection