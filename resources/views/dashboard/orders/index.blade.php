@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Pesanan Anda</h1>
</div>
<table id="checkout.session" class="table table-hover table-condensed">
    <thead>
      <tr>
        <th scope="col" style="text-align: center; vertical-align: middle;">No</th>
        <th style="width: 30%">Produk</th>
        <th style="width: 15%">Harga 1Pcs</th>
        <th style="width: 15%">Qty</th>
        <th style="width: 30%" class="text-center">Total</th>
        <th style="width: 10%">Status</th>
      </tr>
    </thead>
    <tbody>
      @if(session('cart'))
      @php $total = 0 @endphp
            @foreach(session('cart') as $id => $details)
                @php $total += $details['price'] * $details['quantity'] @endphp
                <tr data-id="{{ $id }}">
                  <td style="text-align: center; vertical-align: middle;">{{ $loop->iteration}}</td>
                    <td data-th="Produk">
                      <div class="row">
                            <h5 class="nomargin">{{ $details['namaproduk'] }}</h5>
                          </div>
                        </div>
                      </div>
                    </td>
                    <td data-th="Harga">Rp. {{ $details['price'] }}</td>
                    <td data-th="Qty"> {{ $details['quantity'] }}</td>
                    <td data-th="Subtotal" class="text-center">Rp. {{ $details['price'] * $details['quantity'] }}</td>
                    <td class="actions" data-th="">
                      <button class="btn btn-warning"><i class="bi bi-trash3"></i> PROSES</button>
                    </td>
                </tr>
            @endforeach
    </tbody>
    @else
    @endif
</table>
@endsection