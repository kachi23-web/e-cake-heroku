@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit/Update Product</h4>
        </div>
        <div class="card-body">
            {{-- /posts/{{ $post->id }} --}}
            <form action="{{url('update-products/'.$products->id)}}" method="POST" enctype="multipart/form-data">
                @method('PATCH')
                @csrf()
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <select class="form-select">
                            <option value="">{{ $products->category->name}}</option>
                            
                            </select>
                        <label for="">Name</label>
                        <input type="text" value="{{ $products->name }}" name="name" class="form-control ">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" value="{{ $products->slug }}" class="form-control " name="slug">
                    </div> 
                    <div class="col-md-12 mb-3">
                        <textarea name="description" rows="3" class="form-control">{{ $products->description }}</textarea>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Price</label>
                        <input type="text" value="{{ $products->selling_price }}" class="form-control " name="selling_price">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" {{ $products->status =="1" ? 'checked':''}} name="status">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Trending</label>
                        <input type="checkbox" {{ $products->trending =="1" ? 'checked':''}} name="trending">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta title</label>
                        <input type="text" value="{{ $products->meta_title}}" name="meta_title" class="form-control">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Keywords</label>
                        <textarea  row="3" name="meta_keywords" class="form-control">{{ $products->meta_keywords}}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Description</label>
                        <textarea row="3"  name="meta_description" class="form-control">{{ $products->meta_description}}</textarea>
                    </div>
                    @if($products->image)
                        <img src="{{ asset('assets/uploads/products/'.$products->image) }}" alt="products image">
                    @endif
                    <div class="col-md-12">
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" rel="tooltip" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
            {{-- <h1>Category Page</h1> --}}
        </div>
    </div>
    @endsection