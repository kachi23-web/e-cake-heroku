@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
        <div class="card-body">
            <h4> User Details
                <a href="{{ url('users') }}" class="btn btn-primary btn-sm float-right">Back</a>
           </h4>
            <hr>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 mt-3">
                    <label for="Role">Role</label>
                    <div class="p-2 border">{{ $users->role_as == '0'? 'User' : 'Admin'}}</div>
            </div>
                <div class="col-md-4 mt-3">
                    <label for="first Name">first Name</label>
                    <div class="p-2 border">{{ $users->fname }}</div>
                </div>

                <div class="col-md-4 mt-3">
                        <label for="first Name">Last Name</label>
                        <div class="p-2 border">{{ $users->lname }}</div>
                </div>

                <div class="col-md-4 mt-3">
                            <label for="Email"></label>
                            <div class="p-2 border">{{ $users->email }}</div>
                </div>

                <div class="col-md-4 mt-3">
                        <label for="Phone">Phone</label>
                        <div class="p-2 border">{{ $users->phone }}</div>
                </div>

                <div class="col-md-4 mt-3">
                    <label for="address1">Address</label>
                    <div class="p-2 border">{{ $users->address1 }}</div>
                </div>

                <div class="col-md-4 mt-3">
                    <label for="address2">Address2</label>
                    <div class="p-2 border">{{ $users->address2 }}</div>
                </div>

                <div class="col-md-4 mt-3">
                    <label for="area"><Area></Area></label>
                    <div class="p-2 border">{{ $users->area }}</div>
                </div>


                <div class="col-md-4 mt-3">
                    <label for="city">City</label>
                    <div class="p-2 border">{{ $users->city }}</div>
                </div>

                <div class="col-md-4 mt-3">
                    <label for="state">state</label>
                    <div class="p-2 border">{{ $users->state }}</div>
            </div>
            

        </div>
    </div>
</div>
    @endsection