@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="pull-right">
                <a href="{{ route('product.create') }}" class="btn btn-primary btn-sm my-3 pull-right" >Create Product</a>
             </div>

            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card">

                <div class="card-header">{{ __('Product') }}</div>

                {{-- @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif --}}

           
                

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('product.search')}}">
                        @csrf
                        <div class="form-row my-2">
                            <div class="col-md-10">
                                <input type="text" class="form-control" placeholder="Search Product..." name="search">
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-secondary btn-block">Search</button>
                            </div>
                        </div>
                    </form>


                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">Product ID</th>
                            <th scope="col">Product Code</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Price</th>
                            <th scope="col">Status </th>
                            <th scope="col" class="text-center">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @if (isset($data))

                                @if (count($data) > 0)
                                    @foreach ($data as $p)
                                    <tr>
                                        <th scope="row">{{ $p->Productid }}</th>
                                        <td>{{ $p->ProductCode}}</td>
                                        <td>{{ $p->ProductName }}</td>
                                        <td>{{ $p->Description }}</td>
                                        <td>{{ $p->Price }}</td>
                                        
                                        <td>
                                            @if ( $p->IsActive)
                                            <span class="badge badge-pill badge-success"> Active </span>
                                            @else
                                            <span class="badge badge-pill badge-danger"> Not Active </span>
                                            @endif
                                        </td>
                                    
                                        <td class="text-center">
                                            <a href="{{ route('product.edit',$p->Productid)}}" class="btn btn-sm btn-success">View</a>
                                            <form action="{{ route('product.show',$p->Productid) }}" method="POST" style="display: inline">
                                                @csrf
                                                @method("DELETE")
                                                <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                @else
                                <tr>
                                    <td colspan="100" class="text-center">
                                        <p>NO DATA FOUND..</p>
                                    </td>
                                </tr>

                                @endif
                         
                             
                            @else
                                @foreach ($products as $p)
                                <tr>
                                    <th scope="row">{{ $p->Productid }}</th>
                                    <td>{{ $p->ProductCode}}</td>
                                    <td>{{ $p->ProductName }}</td>
                                    <td>{{ $p->Description }}</td>
                                    <td>{{ $p->Price }}</td>
                                    
                                    <td>
                                        @if ( $p->IsActive)
                                        <span class="badge badge-pill badge-success"> Active </span>
                                        @else
                                        <span class="badge badge-pill badge-danger"> Not Active </span>
                                        @endif
                                    </td>
                                
                                    <td class="text-center">
                                        <a href="{{ route('product.edit',$p->Productid)}}" class="btn btn-sm btn-success">View</a>
                                        <form action="{{ route('product.show',$p->Productid) }}" method="POST" style="display: inline">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            @endif

                         
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
