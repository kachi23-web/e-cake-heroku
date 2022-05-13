@extends('layouts.frontend')

@section('title')
   My Orders
@endsection

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>My Orders</h4>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Tracking Number</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th>Cake_details</th>
                                <th>Action</th> 
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $item)
                            <tr>
                              <td>{{ $item->tracking_no }}</td>
                              <td>{{ $item->total_price }}</td>
                              <td>{{ $item->status == '0'?'pending' : 'completed' }}</td>
                              <td>
                                  <a href="{{ url('view-order/'.$item->id) }}" class="btn btn-info ">view</a> 
                             </td>  
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                 {{-- <div class="card">

                     <div class="card-body">
            
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    
@endsection