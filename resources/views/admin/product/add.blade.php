@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Add Cake</h4>
        </div>
        <div class="card-body">
            <form action="{{url('insert-products')}}" method="POST" enctype="multipart/form-data">
               @csrf
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <select class="form-select" name="cate_id">
                        <option value="">Select a Category </option>
                        @foreach($category as $item)
                             <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" class="form-control" name="slug">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">small description</label>
                        <input type="text" class="form-control" name="small_description">
                    </div>
                    <div class="col-md-12 mb-3">
                        <textarea name="description" rows="3" class="form-control"></textarea>
                        </div>
                    <div class="col-md-6 mb-3">
                        <label for="">original price</label>
                        <input type="number" class="form-control" name="original_price">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">selling price</label>
                        <input type="text" class="form-control" name="selling_price">
                    </div> 
                    <div class="col-md-6 mb-3">
                        <label for="">Quantity</label>
                        <input type="number" class="form-control" name="qty">
                    </div> 
                    <div class="col-md-6 mb-3">
                        <label for="">tax</label>
                        <input type="number" class="form-control" name="tax">
                    </div> 
                    <div class="col-md-6 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" name="status">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">trending</label>
                        <input type="checkbox" class=" " name="trending">
                    </div> 
                    <div class="col-md-12 mb-3">
                        <label for="">Meta title</label>
                        <input type="text" name="meta_title" class="form-control">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Keywords</label>
                        <textarea  row="3" name="meta_keywords" class="form-control"></textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Description</label>
                        <textarea row="3 " name="meta_description" class="form-control"></textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="col-md-12 mb-3">
                        <button type="submit" rel="tooltip" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
            {{-- <h1>Category Page</h1> --}}
        </div>
    </div>
    @endsection