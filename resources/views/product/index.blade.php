@extends('product.layout')

@section('content')
    
<div class="row">
    <div class="col-lg-12 mt-5">
        <div class="float-left">
            <h2>Product List</h2>
        </div>    
        <div class="float-right">
        <a class="btn btn-success" href="{{route('product.create')}}">Add New Product</a>
        </div>    
    </div> 
    <table class="table table-bordered mt-3">
      <thead>
        <tr>
            <th width="150px">Product Name</th>
            <th width="150px">Product Code</th>
            <th width="250px">Product Details</th>
            <th width="100px">Product Logo</th>
            <th width="200px">Action</th>
        </tr>
      </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->product_code }}</td>
                <td>{{ $product->product_details }}</td>
                <td><img src="{{ URL::to($product->product_logo )}}" alt="" height="70px" width="80px"></td>
                <td>
                    <a href="{{ url('/products/show/'.$product->id) }}"class="btn btn-info">Show</a>
                    <a href="{{ url('/products/edit/'.$product->id) }}" class="btn btn-primary">Edit</a>
                    <a href="{{ url('/products/delete/'.$product->id) }}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $products->links()}}
</div>

@endsection