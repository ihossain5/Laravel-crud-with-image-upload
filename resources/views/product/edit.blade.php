@extends('product.layout')

@section('content')
        
    <div class="row">
        <div class="col-lg-12 mt-5">
            <div class="float-left">
                <h2>Edit your product</h2>
            </div>    
            <div class="float-right">
            <a class="btn btn-success" href="{{route('product.index')}}">Back</a>
            </div>    
        </div> 
    </div>

<form action="{{ url('/products/update/'.$product->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="row">
            <div class="col-xl-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Product Name</strong>
                <input type="text" name="product_name" class="form-control" value="{{$product->product_name}}">
                    @error('product_name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="col-xl-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Product Code</strong>
                    <input type="text" name="product_code" class="form-control" value="{{$product->product_code}}">
                    @error('product_code')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="col-xl-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product Details</strong>
                    <textarea name="product_details" class="form-control" id="" cols="30" rows="5">
                        {{$product->product_details}}
                    </textarea>
                    @error('product_details')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="col-xl-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product Logo</strong>
                    <input type="file" name="product_logo">
                    @error('product_logo')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="col-xl-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product Old Image</strong>
                    <img src="{{ URL::to($product->product_logo )}}" alt="" height="70px" width="80px">
                <input type="hidden" name="old_logo" value="{{$product->product_logo}}">
                </div>
            </div>
            <div class="col-xl-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-secondary">Submit</button>
                </div>
            </div>
        </div>
    </form>
@endsection
