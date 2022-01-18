@extends('layouts.admin')

@section('title')
    Orders
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Tracking Number</th>
                            <th>Total Price</th>
                            <th>Action</th> 
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $item)
                        <tr>
                          <td>{{ $item->tracking_no }}</td>
                          <td>{{ $item->total_price }}</td>
                          <td>
                              <a href="{{ url('#') }}" class="btn btn-primary "></a> 
                         </td>  
                        </tr>
                    </tbody>
                </table>
                 {{-- <div class="card">

                     <div class="card-body">
            
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    
@endsection