@extends('layouts.main')

@section('container')

<h1>Keranjang</h1>

@foreach($items as $item)

@php
    $cartItem = $cartItems->firstWhere('item_id', $item->id);
@endphp

<div>
    <h2>{{ $item->itemName }}</h2>
    <p>kategori Barang: {{ $item->category->name }}</p>

    @if($cartItem)
        <p>Jumlah Barang: {{ $cartItem->amount }}</p>
        <p>Subtotal: Rp.{{ number_format($cartItem->subtotal, 2, ',', '.') }}</p>
    @else
        <p>Jumlah Barang: 0</p>
        <p>Subtotal: -</p>
    @endif

    <a href="/add-to-cart-item/{{ $item->id }}"><button type="button" class="btn btn-warning mt-2">Change Amount</button></a>

</div>

@endforeach

<div>
    <h2>Total Harga: Rp.{{ number_format($cartItems->sum('subtotal'), 2, ',', '.') }}</h2>
    <a href="/print-faktur"><button type="button" class="btn btn-success mt-2">Cetak Faktur</button></a>
</div>

@endsection