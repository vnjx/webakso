@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <h2 class="mb-3">{{ $product->nampro }}</h2>
            
            <a href="/dashboard/products" class="btn btn-success"><span data-feather="arrow-left"></span> Kembali ke Dashboard</a>
            <a href="/dashboard/products/{{ $product->slug }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
            <form action="/dashboard/products/{{ $product->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span>Hapus</button>
              </form>

            @if ($product->image)
            <div style="max-width: 100%;">
            <img src="{{ asset('storage/' . $product->image) }}" alt="" class="img-fluid mt-3">
            </div>
            @else
            <img src="https://source.unsplash.com/1200x400" alt="" class="img-fluid mt-3">
            @endif

            <style>
                .singpro .content .cta {
                    margin-top: 1rem;
                    display: inline-block;
                    padding: 1rem 3rem;
                    font-size: 1.4rem;
                    color: #ffffff;
                    background-color: rgb(0, 255, 42);
                    border-radius: 0.3rem;
                    box-shadow: 1px 1px 3px rgba(1,1,3, 0.5);
                }
                </style>
                <p>Stok Produk : {!! $product->stok !!}</p>
                <article class="my-3 fs-5">
                    Deskripsi Produk : <p>{!! $product->body !!}</p>
                </article>
                <p>Harga: Rp. {!! $product->harga !!}</p>
        </div>
    </div>
</div>
@endsection