@extends('layout.app')
@section('title','Create Product')
@section('breadcrumb')
    <div class="breadcrumb-item active"><a href="{{route('products.index')}}">Product</a></div>    
    <div class="breadcrumb-item">Create</div>
@stop
@section('main-content')
<div class="card card-primary">
    <div class="card-header"><h4>Create New Product</h4></div>
    @if(session('status'))
        <div class="col-12">         
            <div class="alert alert-danger mt-1 mb-1">{{session('status')}}</div>
        </div>
    @endif
    <div class="card-body">
        <form method="POST" action="{{route('products.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group col-12">
                    <label for="name">Product Name</label>
                    <input id="name" type="text" class="form-control" name="name" autofocus>
                </div>   
                @error('name')
                    <div class="col-12">         
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    </div>
                @enderror
            </div>          
            <div class="row">
                <div class="form-group col-12">
                    <label for="name">Desc</label>
                    <input id="name" type="text" class="form-control" name="desc" >
                </div>   
                @error('desc')
                    <div class="col-12">         
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    </div>
                @enderror
            </div>          
            <div class="row">
                <div class="form-group col-12">
                    <label for="name">Jenis</label>
                    <input id="name" type="text" class="form-control" name="kind" >
                </div>   
                @error('jenis')
                    <div class="col-12">         
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    </div>
                @enderror
            </div>            
            <div class="row">
                <div class="form-group col-12">
                    <label for="name">Harga Beli</label>
                    <input id="name" type="text" class="form-control" name="harga_beli" >
                </div>   
                @error('harga_beli')
                    <div class="col-12">         
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    </div>
                @enderror
            </div>            
            <div class="row">
                <div class="form-group col-12">
                    <label for="name">Harga Jual</label>
                    <input id="name" type="text" class="form-control" name="harga_jual" autofocus>
                </div>   
                @error('harga_jual')
                    <div class="col-12">         
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    </div>
                @enderror
            </div>        
            <div class="row">
                <div class="form-group col-12">
                    <label for="name">Stok</label>
                    <input id="name" type="text" class="form-control" name="stok" autofocus>
                </div>   
                @error('stok')
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