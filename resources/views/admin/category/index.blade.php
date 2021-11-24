@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
        <div class="card-body">
            <h4>Category Page</h4>
            <hr>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead >
                <tbody>
                    @foreach($category as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->description }}</td>
                            <td>
                                <img src="{{ asset('assets/uploads/category/'.$item->image) }}" class="category-image w-25" alt="image here">
                            </td>
                            <td>
                                <a href="{{ url('edit-categories/'.$item->id) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ url('delete-categories/'.$item->id) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
    </div>
    @endsection