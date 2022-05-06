@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="pull-right">
                <a href="/home" class="btn btn-primary btn-sm my-3 pull-right" >Go Back</a>
             </div>
            <div class="card">

                <div class="card-header">{{ __('Create Product') }}</div>

                <div class="card-body">

                    <form method="POST" action="{{ route('product.update',$id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group ">
                          <label for="exampleFormControlInput1">Product Name</label>
                          <input type="text" class="form-control" id="exampleFormControlInput1" name="product_name" value="{{ $data->ProductName }}">
                        </div>
                        <div class="form-group ">
                            <label for="exampleFormControlInput1">Product Code</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="product_code" value="{{ $data->ProductCode }}">
                          </div>
                          <div class="form-group ">
                            <label for="exampleFormControlInput1">Product Price</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="product_price" value="{{ $data->Price }}">
                          </div>
                       
                        <div class="form-group ">
                          <label for="exampleFormControlTextarea1">Description</label>
                          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="product_description">{{ isset($data->Description) ? $data->Description : '' }}</textarea>
                        </div>

                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Status</label>
                          <select class="form-control" id="exampleFormControlSelect1" name="product_status">
                            <option value="1" {{ $data->IsActive ? 'selected' : '' }}>Enabled</option>
                            <option value="0">Disabled</option>
                            
                          </select>
                        </div>

                        <button type="submit" class="btn btn-success btn-block mt-3" style="width: 100% !important; ">Update</button>
                      </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
