@extends('layout.app')
@section('title','Edit Stock Product')
@section('breadcrumb')
    <div class="breadcrumb-item active"><a href="{{route('products.index')}}">Product</a></div>    
    <div class="breadcrumb-item">Edit Stock</div>
@stop
@section('main-content')
<div class="card card-primary">
    <div class="card-header">
        <h4 class="float-left">Edit Stock</h4>
        <div class="card-header-form">
        <a href="{{ route('viewStock',  $product->id) }}" class="btn btn-primary float-right">View</a>
        </div> 
             
    </div>
    @if(session('status'))
        <div class="col-12">         
            <div class="alert alert-danger mt-1 mb-1">{{session('status')}}</div>
        </div>
    @endif
         
    <div class="card-body">
        <form method="POST" action="{{route('editStockPost', $product->id)}}" enctype="multipart/form-data">
            @csrf
        
            <div class="row">
                <div class="form-group col-6">
                    <label for="name">Product Name</label>
                    <input disabled id="name" type="text" class="form-control" name="name" value="{{$product->name}}" >
                </div>   
                @error('name')
                    <div class="col-6">         
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    </div>
                @enderror
                <div class="form-group col-6">
                    <label for="name">Desc</label>
                    <input disabled id="name" type="text" class="form-control" name="desc" value="{{$product->desc}}" >
                </div>   
                @error('desc')
                    <div class="col-6">         
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    </div>
                @enderror
            </div>                
            <div class="row">
                <div class="form-group col-6">
                    <label for="name">Jenis</label>
                    <input disabled id="name" type="text" class="form-control"  name="kind" value="{{$product->kind}}" >
                </div>   
                @error('jenis')
                    <div class="col-6">         
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    </div>
                @enderror
                <div class="form-group col-6">
                    <label for="name">Harga Beli</label>
                    <input disabled id="name" type="text" class="form-control" name="harga_beli" value="{{$product->harga_beli}}" >
                </div>   
                @error('harga_beli')
                    <div class="col-6">         
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    </div>
                @enderror
            </div>            
         
            <div class="row">
                <div class="form-group col-6">
                    <label for="name">Harga Jual</label>
                    <input disabled id="name" type="text" class="form-control" name="harga_jual" value="{{$product->harga_jual}}" >
                </div>   
                @error('harga_jual')
                    <div class="col-6">         
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    </div>
                @enderror
                <div class="form-group col-6">
                    <label for="name">Stok</label>
                    <input disabled id="name" type="text" class="form-control" name="stok" value="{{$product->stok}}" >
                </div>   
                @error('stok')
                    <div class="col-6">         
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    </div>
                @enderror
            </div>        

            <div class="row">
                <div class="form-group col-12">
                    <label for="name">Jenis</label>
                    <select class="form-control selectric" name="kind_stock">
                        <option>Open this select menu</option>
                            <option value="masuk">Stok Masuk</option>
                            <option value="retur">Retur / Dikembalikan</option>
                      </select>          
                </div>   
                @error('kind')
                    <div class="col-6">         
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    </div>
                @enderror
            </div>  
            <div class="row">
                <div class="form-group col-12">
                        <label for="name">Jumlah</label>
                        <input  id="name" type="text" class="form-control" name="qty"  >
                    </div>   
                    @error('qty')
                        <div class="col-6">         
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        </div>
                    @enderror
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