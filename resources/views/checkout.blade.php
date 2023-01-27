@extends('layouts.main')

@section('container')

@if(session('cart'))
<h1>Checkout Pesanan</h1>
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
      </tr>
      <tr>
        <td colspan="5"align="right">
          <button class="btn btn-success checkout_cart"><i class="bi bi-credit-card-2-back"></i> Pesan Sekarang</a>
        </td>
      </tr>
      @endforeach
      @else
      <h1>Anda belum memesan apapun!</h1>
    @endif
    </tbody>
</table>
@endsection

@section('scripts')
<script type="text/javascript">

  $(".checkout_cart").click(function (e) {
        e.preventDefault();
   
        var ele = $(this);
   
        if(confirm("Do you really want to remove?")) {
            $.ajax({
                url: '{{ route('checkout_cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });

</script>
@endsection
