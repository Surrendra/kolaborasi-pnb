@extends('layout')

@section('content')
<br /><br />
<div class="row">
    <div class="col-sm-12">
        <h1>Product Categories</h1>
    </div>
    <div class="col-sm-12">
        <a href="{{ route('product-categories.create') }}" class="btn btn-primary">Create</a>
    </div>
</div>
<br />
<div class="row">
    <div class="col-md-12">
        <table class="table table-hovered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1; @endphp
                @foreach ($productCategories as $productCategory)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $productCategory->name }}</td>
                        <td>{{ $productCategory->description }}</td>
                        <td>
                            <form method="post" action="{!! route('product-categories.destroy',$productCategory->id) !!}">
                                @csrf  @method('DELETE')
                                <a href="{!! route('product-categories.edit',$productCategory->id) !!}" class="btn btn-primary"> Edit</a> 
                                <button type="submit" class="btn btn-danger">Delete</button> 
                            </form>
                        </td>
                    </tr>
                    @php $i++ @endphp
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection