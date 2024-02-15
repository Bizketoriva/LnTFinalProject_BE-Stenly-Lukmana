@extends('layouts.main')

@section('container')

<h1>Cetak Faktur</h1>

<form action = "/store-faktur" method = "POST">
    @csrf
    <input type="hidden" name="invoice" value="{{ uniqid() }}">
    <input type="hidden" name="user_id" value="{{ $user->id }}">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Alamat Pengiriman</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name = "address" value = "{{ old('address') }}">
    @error('address')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Kode Pos</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name = "postal" value = "{{ old('postal') }}">
    @error('postal')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <input type="hidden" name="total" value="{{ $cartItems->sum('subtotal') }}">
  <h2>Total Harga: Rp.{{ number_format($cartItems->sum('subtotal'), 2, ',', '.') }}</h2>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection