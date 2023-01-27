@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Pesanan Anda</h1>
</div>
<table id="cart" class="table table-hover table-condensed">
    <thead>
      <tr>
        <th style="width: 50%">Produk</th>
        <th style="width: 10%">Harga</th>
        <th style="width: 10%">Quantity</th>
        <th style="width: 30%" class="text-center">Total</th>
      </tr>
    </thead>
    <tbody>
        @php $total = 0 @endphp
        @if(session('cart'))
            @foreach(session('cart') as $id => $details)
                @php $total += $details['price'] * $details['quantity'] @endphp
                <tr data-id="{{ $id }}">
        <td data-th="Produk">
            <div class="row">
              <div class="col-sm-3 hidden-xs"><img src="{{ asset('storage/') }}/{{ $details['gambar'] }}" width="70" height="100" class="img-responsive" /><h4 class="nomargin">{{ $details['namaproduk'] }}</h4>
              </div>
            </div>
          </td>
          <td data-th="Harga">Rp. {{ $details['price'] }}</td>
          <td data-th="Qty" align="center">{{ $details['quantity'] }}</td>
          <td data-th="Subtotal" class="text-center">Rp. {{ $details['price'] * $details['quantity'] }}</td>
        </tr>
        <tr>
          <td colspan="5" align="right"><h3><strong>Total Rp. {{ $total }}</strong></h3></td>
        </tr>
      @endforeach
    @endif
    </tbody>
</table>
@endsection