@extends('layout.app')
@section('title','Create Transaction')
@section('breadcrumb')
    <div class="breadcrumb-item">Bayar</div>
@stop
@section('main-content')
<div class="card card-primary">
    <div class="card-header"><h4>Bayar</h4></div>
    @if(session('status'))
        <div class="col-12">
            <div class="alert alert-danger mt-1 mb-1">{{session('status')}}</div>
        </div>
    @endif
    <div class="card-body">
    <form method="POST" action="{{route('endTransaction', $transaction->id)}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group col-12">
                    <label for="name">Bayar</label>
                    <input id="name" type="text" class="form-control" name="pay" >
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