@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Penjualan</h1>
</div>
<div class="row justify-content-start">
  <div class="col-2">
    <form method="POST" action="/select">
      {{ csrf_field() }}
      <div class="mb-4">
        <label>Tanggal Awal :</label>
        <input type="date" class="form-control" name="fdate">
        <label>Tanggal Akhir :</label>
        <input type="date" class="form-control" name="sdate">
        <input type="submit" value="Cari Post" class="btn btn-info mt-2">
      </div>
    </form>
  </div>
</div>
<div class="container">
  
</div>
@if(session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
  {{ session('success') }}
</div>
@endif


<div class="table-responsive">
  <a href="/dashboard/posts/create" class="btn btn-primary mb-3">Data Penjualan Baru</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col" style="text-align: center; vertical-align: middle;">No</th>
              <th scope="col">Barang Keluar</th>
              <th scope="col">Bagian Asal</th>
              <th scope="col">Stok Keluar</th>
              <th scope="col">Total Penjualan</th>
              <th scope="col">Tanggal Upload</th>
              <th scope="col" >Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($posts as $post)
              <tr>
                <td style="text-align: center; vertical-align: middle;">{{ $loop->iteration}}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->origin->divisi }}</td>
                <td>{{ $post->product_id }}</td>
                <td>{{ $post->qty }}</td>
                <td>{{ date('M d, Y h:i A', strtotime($post->created_at)) }}</td>
                <td>
                    <a href="/dashboard/posts/{{ $post->slug }}" class="badge bg-info"><span data-feather="eye"></span></a>
                    <a href="/dashboard/posts/{{ $post->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                    <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                      @method('delete')
                      @csrf
                      <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span></button>
                    </form>
                 </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        <a href="/dashboard/posts/print" class="btn btn-success me-auto mt-2" onclick="window.open('/dashboard/posts/print', '_blank'); return false;">Cetak Data</a>
</div>
@endsection