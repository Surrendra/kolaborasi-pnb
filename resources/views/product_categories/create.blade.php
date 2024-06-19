@extends('layout')

@section('content')
<br /><br />
<h1>Create Product Category</h1>
<form method="POST" action="{{ route('product-categories.store') }}">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label>">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{!! old('name') !!}">
        @if ($errors->has('name'))
            <div class="alert alert-danger">
                {{ $errors->first('name') }}
            </div>
        @endif
    </div>
    <div class="mb-3">
        <label for="name" class="form-label>">Description</label>
        <input type="text" class="form-control" id="description" value="{!! old('description') !!}" name="description">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
@endsection