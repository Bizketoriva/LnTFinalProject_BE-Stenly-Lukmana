@extends('layouts.main')

@section('container')

<h1>Tambahkan Barang Ke Keranjang</h1>

<img src="{{ asset('/storage/item_images/'.$item->image) }}" alt="{{ $item->itemName }} Cover">
<h2>Nama Barang: {{ $item['itemName'] }}</h2>
<h3>Kategori Barang: {{ $item->category->name }}</h3>
<p>Rp.{{ number_format($item->price, 2, ',', '.') }}</p>
<p>Tersedia: {{ $item['quantity'] }}</p>

<form action = "/store-in-cart/{{ $item->id }}" method = "POST">
    @csrf
    <input type="hidden" name="user_id" value="{{ $user->id }}">
    <input type="hidden" name="item_id" value="{{ $item->id }}">
    <div class="mb-3">
        <div class="input-group">
        <span class="input-group-text">Jumlah Barang:</span>
        <input type="text" class="form-control" id="exampleInputPassword1" name = "amount" value = "{{ old('amount') }}">
        </div>
        @error('amount')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection