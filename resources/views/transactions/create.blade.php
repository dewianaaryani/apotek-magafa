@extends('layout.app')
@section('title','Create Transaction')
@section('breadcrumb')
    <div class="breadcrumb-item active"><a href="{{route('transactions.index')}}">Product</a></div>    
    <div class="breadcrumb-item">Create</div>
@stop
@section('main-content')
<div class="card card-primary">
    <div class="card-header"><h4>Create New Transactions</h4></div>
    @if(session('status'))
        <div class="col-12">
            <div class="alert alert-danger mt-1 mb-1">{{session('status')}}</div>
        </div>
    @endif
    <div class="card-body">
    <form method="POST" action="{{route('transactions.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group col-12">
                    <label>Customer</label>
                    <select class="form-control selectric" name="customer_id">
                    <option>Open this select menu</option>
                    @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                    @endforeach    
                    </select>                      
                </div>           
            </div> 
            <div class="row">
                <div class="form-group col-12">
                    <label>Kasir</label>
                    <select class="form-control selectric" name="cashier_id">
                    <option>Open this select menu</option>
                    @foreach ($cashiers as $cashier)
                            <option value="{{ $cashier->id }}">{{ $cashier->name }}</option>
                    @endforeach    
                    </select>                      
                </div>           
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