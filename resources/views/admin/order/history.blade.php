@extends('layouts.admin')

@section('title')
        oOders

@section('content')
    <div class="container">
         <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4> Orders History</h4>
                        <a href="{{ 'orders' }}" class="btn btn-info float-right ">New Orders</a>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Order Date</th>
                                <th>Tracking Number</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th>Cake details</th>
                                <th>Action</th> 
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $item)
                            <tr>
                              <td>{{ date('d-m-y',strtotime($item->created_at))}}</td>  
                              <td>{{ $item->tracking_no }}</td>
                              <td>{{ $item->total_price }}</td>
                              <td>{{ $item->status == '0'?'pending' : 'completed' }}</td>
                              <td>{{ $item->cake_details }}</td>
                              <td>
                                  <a href="{{ url('admin/view-order/'.$item->id) }}" class="btn btn-info ">view</a> 
                             </td>  
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>
 @endsection