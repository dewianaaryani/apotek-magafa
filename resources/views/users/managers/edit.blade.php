@extends('layout.app')
@section('title','Edit Manager')
@section('breadcrumb')
    <div class="breadcrumb-item active"><a href="{{route('managers.index')}}">Manager</a></div>    
    <div class="breadcrumb-item">Edit</div>
@stop
@section('main-content')
<div class="card card-primary">
    <div class="card-header"><h4>Edit Manager</h4></div>
    @if(session('message'))
        <div class="col-12">         
            <div class="alert alert-danger mt-1 mb-1">{{session('message')}}</div>
        </div>
    @endif
    <div class="card-body">
        <form method="POST" action="{{route('managers.update', $manager->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="form-group col-12">
                    <label for="name">Manager Name</label>
                    <input id="name" type="text" class="form-control" name="name" value="{{$manager->name}}" autofocus>
                </div>   
                @error('name')
                    <div class="col-12">         
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    </div>
                @enderror
            </div>          
            <div class="row">
                <div class="form-group col-12">
                    <label for="name">Alamat</label>
                    <input id="name" type="text" class="form-control" name="address" value="{{$manager->address}}">
                </div>   
                @error('address')
                    <div class="col-12">         
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    </div>
                @enderror
            </div>          
            <div class="row">
                <div class="form-group col-12">
                    <label for="name">No. Telp</label>
                    <input id="name" type="text" class="form-control" name="phone_number" value="{{$manager->phone_number}}">
                </div>   
                @error('phone_number')
                    <div class="col-12">         
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    </div>
                @enderror
            </div>            
            <div class="row">
                <div class="form-group col-12">
                    <label for="name">Email</label>
                    <input id="name" type="text" class="form-control" name="email" value="{{$manager->email}}">
                </div>   
                @error('email')
                    <div class="col-12">         
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    </div>
                @enderror
            </div>            
            <div class="row">
                <div class="form-group col-12">
                    <label for="name">Password</label>
                    <input id="name" type="password" class="form-control" name="password" value="{{$manager->password}}">
                </div>   
                @error('password')
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