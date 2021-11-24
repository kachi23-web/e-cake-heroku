@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit/Update Category</h4>
        </div>
        <div class="card-body">
            {{-- /posts/{{ $post->id }} --}}
            <form action="{{url('update-categories/'.$category->id)}}" method="POST" enctype="multipart/form-data">
                @method('PATCH')
                @csrf()
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">Name</label>
                        <input type="text" value="{{ $category->name }}" name="name" class="form-control form-control-2">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" value="{{ $category->slug }}" class="form-control form-control-2" name="slug">
                    </div> 
                    <div class="col-md-12 mb-3">
                    <textarea name="description" rows="3" class="form-control form-control-2">{{ $category->description }}</textarea>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" {{ $category->status =="1" ? 'checked':''}} name="status">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Popular</label>
                        <input type="checkbox" {{ $category->popular =="1" ? 'checked':''}} name="popular">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta title</label>
                        <input type="text" value="{{ $category->meta_title}}" name="meta_title" class="form-control form-control-2">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Keywords</label>
                        <textarea  row="3" name="meta_keywords" class="form-control">{{ $category->meta_keywords}}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Description</label>
                        <textarea row="3"  name="meta_descrip" class="form-control">{{ $category->meta_descrip}}</textarea>
                    </div>
                    @if($category->image)
                        <img src="{{ asset('assets/uploads/category/'.$category->image) }}" alt="category image">
                    @endif
                    <div class="col-md-12">
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" rel="tooltip" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
            {{-- <h1>Category Page</h1> --}}
        </div>
    </div>
    @endsection