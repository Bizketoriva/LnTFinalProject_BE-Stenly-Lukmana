@extends('layouts.main')

@section('container')

<img src="{{ asset('/storage/item_images/'.$item->image) }}" alt="{{ $item->itemName }} Cover">
<h2>Nama Barang: {{ $item['itemName'] }}</h2>
<h3>Kategori Barang: {{ $item->category->name }}</h3>
<p>Rp.{{ number_format($item->price, 2, ',', '.') }}</p>
<p>Tersedia: {{ $item['quantity'] }}</p>

<a href="/add-to-cart-item/{{ $item->id }}"><button type="button" class="btn btn-warning mt-2">Masukkan ke keranjang</button></a>

@can('admin')
<br>
<br>
<a href="/edit-item/{{ $item->id }}"><button type="button" class="btn btn-warning mt-2">Edit</button></a>
<br>
<br>
<form action="/delete-item/{{ $item->id }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
</form>
@endcan

@endsection