@extends('layout.app')
@section('title','View Stock')
@section('breadcrumb')
    <div class="breadcrumb-item active"><a href="{{route('products.index')}}">Product</a></div>    
    <div class="breadcrumb-item"> <a href="{{route('editStock', $product->id)}}">Stock</a></div>
    <div class="breadcrumb-item">Stock Product {{$product->name}}</div>
@stop
@section('main-content')
<div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Stock Product {{$product->name}}</h4>
                    <div class="card-header-form">
                      <form>
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Search">
                          <div class="input-group-btn">
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                          </div>
                        </div>
                      </form>
                    </div> 
                            
                  </div>
                  <div class="card-body p-0">
                    @if($message = Session::get('success'))
                      <div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                          <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                          </button>
                          {{ $message }}
                        </div>
                      </div>                    
                    @endif
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <tr>
                        <th>No</th>
                        <th>Kind</th>
                        <th>Qty</th>
                        <th>Action</th>
                        </tr>
                        @foreach($stocks as $stock)
                          <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $stock -> kind}}</td>
                            <td>{{ $stock -> qty}}</td>                                                                                                   
                            <td>
                                <form action="{{route('deleteStockPost', $stock->id)}}" method="post">                                                              
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                          </tr>      
                        @endforeach                                                                
                      </table>                                                                 
                  </div>
                </div>
              </div>
              {{ $stocks->links() }}   
            </div>
@stop