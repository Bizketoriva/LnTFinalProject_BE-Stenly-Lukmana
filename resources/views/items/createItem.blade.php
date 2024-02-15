@extends('layouts.main')

@section('container')

<h1>Create Item</h1>

<form action = "/store-item" method = "POST" enctype="multipart/form-data">
    @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nama Barang</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name = "itemName" value = "{{ old('itemName') }}">
    @error('itemName')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Kategori Barang</label>
    <select type="text" class="form-select" id="exampleInputEmail1" aria-describedby="emailHelp" name = "category_id" value = "{{ old('title') }}">
      <option selected>Open this select menu</option>
      @foreach($categories as $category)
      <option value="{{ $category->id }}">{{ $category->name }}</option>
      @endforeach
    </select>
    @error('title')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Harga Barang</label>
    <div class="input-group">
    <span class="input-group-text">Rp.</span>
    <input type="text" class="form-control" id="exampleInputPassword1" name = "price" value = "{{ old('price') }}">
    </div>
    @error('price')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Jumlah Tersedia</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name = "quantity" value = "{{ old('quantity') }}">
    @error('quantity')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Item Image</label>
    <input type="file" class="form-control" id="exampleInputPassword1" name = "image" value = "{{ old('image') }}">
    @error('image')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection