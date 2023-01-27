@extends('layouts.main')

@section('container')

<div class="container">
    @if(session('success'))
        <div class="alert alert-success">
            {{  session('success') }}
        </div>
    @endif

    @yield('content')

    <a href="/katalog" class="d-block mt-3 mb-3"> < Kembali ke Daftar Produk</a>
    <div class="row justify-content-center mb-5">
        <div class="col-md-8"></div>
        <h2 class="mb-3">{{ $product->nampro }}</h2>

        <p>By. <a href="/katalog?authors={{ $product->author->username }}" class="text-decoration-none">{{ $product->author->name }}</a> 
            in <a href="/katalog?category={{ $product->category->slug }}" class="text-decoration-none">{{ $product->category->name }}</a>
        </p>
        @if ($product->image)
            <div style="max-width: 100%;">
                <img src="{{ asset('storage/' . $product->image) }}" alt="" class="img-fluid" width="400" height="400" class="img-responsive">
            </div>
        @else
            <img src="https://source.unsplash.com/1200x400?meatball" class="img-fluid">
        @endif

        <style>
        .singpro .content .cta {
            margin-top: 1rem;
            display: inline-block;
            padding: 1rem 3rem;
            font-size: 1.4rem;
            color: #ffffff;
            text-shadow: 1px 1px 3px rgba(1,1,3, 0.5);
            background-color: rgb(0, 255, 42);
            border-radius: 0.3rem;
            box-shadow: 1px 1px 3px rgba(1,1,3, 0.5);
        }
        </style>
        @if ($product->stok < 1)
        <p class="my-3">Stok Produk Habis</p>
        <article class="my-3 fs-5">
            Deskripsi Produk : <p>{!! $product->body !!}</p>
        </article>
        <p>Harga: Rp. {!! $product->harga !!}</p>
        <section class="singpro" id="detail">
            <main class="content">
                <button class="cta btn btn-danger text-decoration-none">Masuk Keranjang</button>
            </main>
        </section>
        @else
        <p class="my-3">Stok Produk : {!! $product->stok !!}</p>
        <article class="my-3 fs-5">
            Deskripsi Produk : <p>{!! $product->body !!}</p>
        </article>
        <p>Harga: Rp. {!! $product->harga !!}</p>
        <section class="singpro" id="detail">
            <main class="content">
                <a href="{{ route('add_to_cart', $product->id) }}" class="cta text-decoration-none" onclick="addToCart()">Masuk Keranjang</a>
            </main>
        </section>
        @endif
        
    </div>
</div>
@endsection