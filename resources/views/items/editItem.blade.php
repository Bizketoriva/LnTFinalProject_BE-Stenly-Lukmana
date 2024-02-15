@extends('layouts.main')
 
@section('container')

<h1>Edit Book</h1>

<form action = "/update-item/{{ $item->id }}" method = "POST">
    @csrf
    @method('PATCH')
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nama Barang:</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name = "itemName" value = "{{ old('itemName', $item->itemName) }}">
    @error('itemName')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Harga Barang</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name = "price" value = "{{ old('price', $item->price) }}">
    @error('price')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Jumlah Tersedia</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name = "quantity" value = "{{ old('quantity', $item->quantity) }}">
    @error('quantity')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection