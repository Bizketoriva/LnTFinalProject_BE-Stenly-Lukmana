@extends('layouts.main')

@section('container')

<h1>Katalog Barang</h1>
@can('admin')
<br>
<button type="button" class="btn btn-primary" href="/create-item">Create New Item</button>
<br>
@endcan
@foreach($items as $item)
<br>
<a href="/display-item/{{ $item['id'] }}"><h2>Nama Barang: {{ $item['itemName'] }}</h2></a>
<img src="{{ asset('/storage/item_images/'.$item->image) }}" alt="{{ $item->itemName }} Cover">
<p>Kategori Barang: {{ $item->category->name }}</p>
<p>Rp.{{ number_format($item->price, 2, ',', '.') }}</p>
<p>Tersedia: {{ $item['quantity'] }}</p>
<a href="/add-to-cart-item/{{ $item->id }}"><button type="button" class="btn btn-warning mt-2">Masukkan ke keranjang</button></a>
<br>
@endforeach

@endsection