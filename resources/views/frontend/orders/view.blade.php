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
                        <h4>Order View</h4>
                        <a href="{{ url('orders') }}" class="btn btn-warning text-white float-right ">Back</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 order-details" style="color: black">
                                <h4>Delivery Details</h4>
                                <hr>
                                <label for="">First Name</label>
                                <div class="border p-2 text-color" >{{ $orders->name }}</div>
                                <label for="">Last Name</label>
                                <div class="border p-2">{{ $orders->lname }}</div>
                                <label for="">Email</label>
                                <div class="border p-2">{{ $orders->email }}</div>
                                <label for="">Phone</label>
                                <div class="border p-2">{{ $orders->phone }}</div>
                                <label for="">Address</label>
                                <div class="border p-2">
                                {{  $orders->address1 }},<br>
                                {{  $orders->street }},<br>
                                {{  $orders->city }},
                                {{  $orders->state }}  
 
                                
                                
                            </div>
                            </div>

                            <div class="col-md-6">
                                <h4>Order Details</h4>
                                <hr>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Quantity</th>
                                            <th>Total Price</th>
                                            <th>Image</th>
                                            {{-- <th>Action</th>  --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders->orderitems as $item)
                                        <tr>
                                          <td>{{ $item->products['name'] }}</td>
                                          <td>{{ $item->qty }}</td>
                                          <td>{{ $item->price }}</td>
                                          <td>
                                              <img src="{{ asset('assets/uploads/products/'.$item->products->image )}}" alt="product image" width="20%"></td>
                                         </td>  
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                                <h4 class="px-2">Grand Total: <span class="float-end">{{ $orders->total_price }}</span></h4>
                                <h6 class="px-2">payment Mode {{ $orders->payment_mode}}</h6>
                            </div>

                        </div>
                    </div>
                   
                </div>
                
                 {{-- <div class="card">

                     <div class="card-body">
            
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    
@endsection