@extends('layout')

@section('content')
<br /><br />
<h1>Edit Product Category</h1>
<form method="POST" action="{{ route('product-categories.update',$productCategory->id) }}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="name" class="form-label>">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{!! $productCategory->name !!}">
    </div>
    <div class="mb-3">
        <label for="name" class="form-label>">Description</label>
        <input type="text" class="form-control" id="description" name="description" value="{!! $productCategory->description !!}">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
@endsection