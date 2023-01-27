<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;

class ProductController extends Controller
{
    public function index()
    {
        $title = '';
        if(request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }

        if(request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }

        return view('products', [
            "title" => "Daftar Produk" . $title,
            "active" => 'products',
            "products" => Product::latest()->filter(request(['search','category', 'author']))->paginate(7)->withQueryString()
        ]);
    }

    public function show(Product $product)
    {
        return view('product', [
            "title" => "$product->nampro",
            "active" => 'products',
            "product" => $product
        ]);
    }

    public function cart()
    {
        return view('cart');
    }

    public function addToCart($id)
    {
        $product = Product::find($id);

        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
            with($product->decrement('stok',));
        } else {
            $cart[$id] = [
                "namaproduk" => $product->nampro,
                "gambar" => $product->image,
                "price" => $product->harga,
                "stock" => $product->stok,
                "quantity" => 1
            ];
            with($product->decrement('stok',));
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Produk sudah masuk keranjang!');
    }

    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart',[]);
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Keranjang sudah diperbaharui!');
        }
    }
 
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                $product = Product::findOrFail($request->id);
                with($product->increment('stok',));
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Produk sudah dihapus dari keranjang!');
        }
    }

    public function checkout(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Pesanan anda akan diproses!');
        }
        
    }

}