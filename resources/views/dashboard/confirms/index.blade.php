@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Daftar Pesanan</h1>
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
              <th scope="col">Pesanan</th>
              <th scope="col">Harga Pesanan</th>
              <th scope="col">Qty</th>
              <th scope="col">Total Harga</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @if (session('cart'))
            @php $total = 0 @endphp
            @foreach(session('cart') as $id => $details)
                @php $total += $details['price'] * $details['quantity'] @endphp
                <tr data-id="{{ $id }}">
                  <td style="text-align: center; vertical-align: middle;">{{ $loop->iteration}}</td>
                    <td data-th="Produk">
                      <div class="row">
                            <p class="nomargin">{{ $details['namaproduk'] }}</p>
                      </div>
                    </td>
                    <td data-th="Harga">Rp. {{ $details['price'] }}</td>
                    <td data-th="Qty"> {{ $details['quantity'] }}</td>
                    <td data-th="Subtotal" class="text-center">Rp. {{ $details['price'] * $details['quantity'] }}</td>
                    <td class="actions" data-th="">
                      <button class="btn btn-success" onclick="return confirm('Konfirmasi Pesanan ini?')"><i class="bi bi-trash3"></i> Konfirmasi</button>
                      <form action="/dashboard/orders" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                          <button class="btn btn-danger btn-sm cart_remove" onclick="return confirm('Batalkan Pesanan ini?')"><i class="bi bi-trash3"></i> Hapus</button>
                      </form>

                    </td>
                </tr>
            @endforeach
          </tbody>
          @else
        @endif
        </table>
</div>
@endsection