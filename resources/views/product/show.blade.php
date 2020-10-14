@extends('product.layout')

@section('content')
    
<div class="row">
    <div class="col-lg-12 mt-5">
        <div class="float-left">
            <h2>Show product</h2>
        </div>    
        <div class="float-right">
        <a class="btn btn-success" href="{{route('product.index')}}">Back</a>
        </div>    
    </div> 
</div>
<div class="row mt-5">
    <div class="col-xl-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Product Name</strong>
            {{ $product->product_name }}
        </div>
    </div>
    <div class="col-xl-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Product Code</strong>
            {{ $product->product_code }}
        </div>
    </div>
    <div class="col-xl-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Product Detail</strong>
            {{ $product->product_details }}
        </div>
    </div>
    <div class="col-xl-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Product Image</strong>
            <img src="{{ URL::to($product->product_logo )}}" alt="" height="170px" width="260px">
        </div>
    </div>
</div>

@endsection 