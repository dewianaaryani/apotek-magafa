@extends('layout.app')
@section('title','Product')
@section('main-content')
<div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Product Table</h4>
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
                    <a href="{{ route('products.create') }}" class="btn btn-primary">Add</a>          
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
                        <th>Name</th>
                        <th>Desc</th>
                        <th>Jenis</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th>Stok</th>
                        <th>Action</th>
                        </tr>
                        @foreach($products as $product)
                          <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $product -> name}}</td>
                            <td>{{ $product -> desc}}</td>
                            <td>{{ $product -> kind}}</td>
                            <td>{{ $product -> harga_beli}}</td>
                            <td>{{ $product -> harga_jual}}</td>                
                            <td>{{ $product -> stok}}</td>                                                                        
                            <td>
                              <form action="{{route('products.destroy', $product->id)}}" method="post">
                                <a href="{{route('products.edit', $product->id)}}" class="btn btn-warning">Edit</a>                            
                                <a href="{{route('editStock', $product->id)}}" class="btn btn-primary">Stock</a>                            
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
              {{ $products->links() }}   
            </div>
@stop