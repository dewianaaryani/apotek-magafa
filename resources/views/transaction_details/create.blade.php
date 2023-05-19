@extends('layout.app')
@section('title','Add Transaction')
@section('breadcrumb')
    <div class="breadcrumb-item active"><a href="{{route('transactions.index')}}">Transaction</a></div>    
    <div class="breadcrumb-item">Add Transaction Detail</div>
@stop
@section('main-content')
<div class="card card-primary">
    <div class="card-header">
        <h4 class="float-left">Add Transaction Detail</h4>
        <div class="card-header-form">
        
    </div> 
             
    </div>
    @if(session('status'))
        <div class="col-12">         
            <div class="alert alert-danger mt-1 mb-1">{{session('status')}}</div>
        </div>
    @endif
         
    <div class="card-body">
        <form method="POST" action="{{route('storeDetailTransaction', $transaction->id)}}" enctype="multipart/form-data">
            @csrf
        
            <div class="row">
                
                    <div class="form-group col-12">
                        <label>Product</label>
                        <select class="form-control selectric" name="product_id">
                        <option>Open this select menu</option>
                        @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach    
                        </select>                      
                    </div>           
                
                @error('product_id')
                    <div class="col-6">         
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    </div>
                @enderror
            </div>
            <div class="row">
                <div class="form-group col-12">
                    <label for="name">QTY</label>
                    <input id="name" type="text" class="form-control" name="qty" >
                </div>   
                @error('qty')
                    <div class="col-12">         
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    </div>
                @enderror
            </div>                
           
            <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg btn-block">
                Submit
            </button>
            </div>
        </form>
    </div>
</div>

@stop