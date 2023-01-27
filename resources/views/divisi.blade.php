@extends('layouts.main')

@section('container')
    <h1 class="mb-5">Divisi : {{ $origin }}</h1>

    @foreach ($daftarproduk as $produk)
        <article class="mb-5">
        <h2>
        <a href="/daftarproduk/{{ $produk->slug }}">{{ $produk->nampro }}</a>
        </h2>
        <p>{{ $produk->excerpt }}</p>
        </article>
    @endforeach

@endsection