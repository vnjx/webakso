@extends('layouts.main')

@section('container')
<h1 class="mb-3 text-center">{{ $title }}</h1>

<div class="row justify-content-center mb-3">
    <div class="col-md-6">
        <form action="/katalog">
            @if (request('category'))
            <input type="hidden" name="category" value="{{ request('category') }}">
            @endif
            @if (request('author'))
            <input type="hidden" name="author" value="{{ request('author') }}">
            @endif
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
                <button class="btn btn-primary" type="submit">Search</button>
              </div>
        </form>
    </div>
</div>

@if ($products->count())
<div class="card mb-3 text-center">
    @if ($products[0]->image)
        <div style="max-height: 500px; overflow:hidden">
        <img src="{{ asset('storage/' . $products[0]->image) }}" alt="" class="img-fluid">
        </div>
    @else
            <img src="https://source.unsplash.com/1200x400?bakso" alt="" class="img-fluid">
    @endif
    <div class="card-body text-center">
      <h3 class="card-title"><a href="/products/{{ $products[0]->slug }}" class="text-decoration-none text-dark">{{ $products[0]->nampro }}</a></h3>
    <p>
        <small class="text-muted">
        By. <a href="/katalog?author={{ $products[0]->author->username }}" class="text-decoration-none">{{ $products[0]->author->name }}</a> 
        in <a href="/katalog?category={{ $products[0]->category->slug }}" class="text-decoration-none">{{ $products[0]->category->name }}</a> 
        {{ $products[0]->created_at->diffForHumans() }}
        </small>
    </p>
      <p class="card-text">{{ $products[0]->excerpt }}</p>
      <p>Harga: Rp. {{ $products[0]->harga}}</p>
      <a href="/products/{{ $products[0]->slug}}" class="text-decoration-none btn btn-primary">Beli Sekarang</a>
    </div>
</div>
<div class="container">
    <div class="row">
        @foreach ($products->skip(1) as $product)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="position-absolute px-3 py-2" style="background-color: rgba(0, 0, 0, 0.7)">
                        <a href="/katalog?category={{ $product->category->slug }}" class="text-white text-decoration-none">{{ $product->category->name }}</a>
                    </div>
                    @if ($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="" class="img-fluid">
                    @else
                    <img src="https://source.unsplash.com/500x400?bakso" alt="" class="img-fluid">
                    @endif
                    <div class="card-body">
                    <h5 class="card-title"><a href="/products/{{ $product->slug }}" class="text-black text-decoration-none">{{ $product->nampro }}</a></h5>
                    <p>
                        <small class="text-muted">
                        By. <a href="/katalog?author={{ $product->author->username }}" class="text-decoration-none">{{ $product->author->name }}</a>
                        {{ $product->created_at->diffForHumans() }}
                        </small>
                    </p>
                    <p class="card-text">{{ $product->excerpt }}</p>
                    <p>Harga: Rp. {!! $product->harga !!}</p>
                    <a href="/products/{{ $product->slug}}" class="btn btn-primary">Beli Sekarang</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@else
<p class="text-center fs-4">Produk tidak ditemukan.</p>
@endif

{{ $products->links() }}

@endsection