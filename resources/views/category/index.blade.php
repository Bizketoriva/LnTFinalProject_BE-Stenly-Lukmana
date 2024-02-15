@extends('layouts.main')

@section('container')


<h1>Categories</h1>
<br>
<button type="button" class="btn btn-primary" href="/create-category">Create Category</button>
<br>
@foreach($categories as $category)
<br>
<a><h4>Category: {{ $category['name'] }}</h4></a>
@endforeach

@endsection