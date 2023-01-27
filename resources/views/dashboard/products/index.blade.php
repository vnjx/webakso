@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Stok Produk</h1>
</div>

@if(session()->has('success'))
<div class="alert alert-success" role="alert">
  {{ session('success') }}
</div>
@endif

<div class="table-responsive">
  <a href="/dashboard/products/create" class="btn btn-primary mb-3">Tambah Stok Produk</a>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col" style="text-align: center; vertical-align: middle;">No</th>
        <th scope="col">Nama Produk</th>
        <th scope="col">Stok Produk</th>
        <th scope="col">Harga Produk</th>
        <th scope="col">Kategori</th>
        <th scope="col">Keterangan</th>
        <th scope="col">Dibuat tanggal</th>
        <th scope="col">Diupdate tanggal</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($products as $products)
          <tr>
            <td style="text-align: center; vertical-align: middle;">{{ $loop->iteration}}</td>
            <td>{{ $products->nampro }}</td>
            <td>{{ $products->stok }}</td>
            <td>{{ $products->harga }}</td>
            <td>{{ $products->category->name}}</td>
            <td>{{ $products->excerpt }}</td>
            <td>{{ $products->created_at }}</td>
            <td>{{ $products->updated_at }}</td>
          <td>
            <a href="/dashboard/products/{{ $products->slug }}" class="badge bg-info"><span data-feather="eye"></span></a>
            <a href="/dashboard/products/{{ $products->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
            <form action="/dashboard/products/{{ $products->slug }}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button class="badge bg-danger border-0" onclick="return confirm('Hapus Produk ini?')"><span data-feather="x-circle"></span></button>
            </form>
         </td>
      </tr>
        @endforeach
    </tbody>
  </table>
</div>

@endsection