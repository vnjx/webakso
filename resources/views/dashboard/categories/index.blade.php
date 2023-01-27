@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Daftar Kategori</h1>
</div>
@if(session()->has('success'))
<div class="alert alert-success col-lg-6" role="alert">
  {{ session('success') }}
</div>
@endif

<div class="table-responsive col-lg-6">
  <a href="/dashboard/categories/create" class="btn btn-primary mb-3">Tambah Kategori Baru</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col" style="text-align: center; vertical-align: middle;">No</th>
              <th scope="col">Nama Kategori</th>
              <th scope="col">Tanggal Dibuat</th>
              <th scope="col">Tanggal Diedit</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($categories as $category)
              <tr>
                <td class="text-center" style="text-align: center; vertical-align: middle;">{{ $loop->iteration}}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->created_at }}</td>
                <td>{{ $category->updated_at }}</td>
                <td>
                    <a href="/categories" class="badge bg-info"><span data-feather="eye"></span></a>
                    <form action="/dashboard/categories/{{ $category->id }}" method="post" class="d-inline">
                      @method('delete')
                      @csrf
                      <button class="badge bg-danger border-0" onclick="return confirm('Hapus Kategori ini?')"><span data-feather="x-circle"></span></button>
                    </form>
                 </td>
              </tr>
            @endforeach
          </tbody>
        </table>
</div>
@endsection