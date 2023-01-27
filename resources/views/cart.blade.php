@extends('layouts.main')

@section('container')

@if(session('cart'))
<table id="cart" class="table table-hover table-condensed">
  <thead>
    <tr>
      <th style="width: 50%">Produk</th>
      <th style="width: 10%">Harga</th>
      <th style="width: 8%">Quantity</th>
      <th style="width: 22%" class="text-center">Sub Total</th>
      <th style="width: 10%"></th>
    </tr>
  </thead>
  <tbody>
    @php $total = 0 @endphp
            @foreach(session('cart') as $id => $details)
                @php $total += $details['price'] * $details['quantity'] @endphp
                <tr data-id="{{ $id }}">
                    <td data-th="Produk">
                      <div class="row">
                        <div class="col-sm-3 hidden-xs"><img src="{{ asset('storage/') }}/{{ $details['gambar'] }}" width="70" height="100" class="img-responsive" />
                          <div class="col-sm-9">
                            <h4 class="nomargin">{{ $details['namaproduk'] }}</h4>
                          </div>
                        </div>
                      </div>
                    </td>
                    <td data-th="Harga">Rp. {{ $details['price'] }}</td>
                    <td data-th="Qty">
                      <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity cart_update" min="1" />
                    </td>
                    <td data-th="Subtotal" class="text-center">Rp. {{ $details['price'] * $details['quantity'] }}</td>
                    <td class="actions" data-th="">
                      <button class="btn btn-danger btn-sm cart_remove"><i class="bi bi-trash3"></i> Hapus</button>
                    </td>
                </tr>
            @endforeach
  </tbody>
  <tfoot>
    <tr>
      <td colspan="5" align="right"><h3><strong>Total Rp. {{ $total }}</strong></h3></td>
    </tr>
    <tr>
      <td colspan="5" align="right">
        <a href="{{ url('/katalog') }}" class="btn btn-danger"> <i class="bi bi-backspace-fill"></i> Lanjut Belanja</a>
        <a href="{{ url('/checkout') }}" class="btn btn-success"> <i class="bi bi-credit-card-2-back"></i> Checkout</a>
      </td>
    </tr>
  </tfoot>
  @else
  <h1>Keranjang anda masih kosong!</h1>
  @endif
</table>
@endsection

@section('scripts')
<script type="text/javascript">

  $(".cart_update").change(function (e) {
      e.preventDefault();

      var ele = $(this);

      $.ajax({
            url: '{{ route('update_cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id"), 
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });


  $(".cart_remove").click(function (e) {
    e.preventDefault();

    var ele = $(this);

    if(confirm("Hapus produk dari keranjang?")) {
            $.ajax({
                url: '{{ route('remove_from_cart') }}',
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